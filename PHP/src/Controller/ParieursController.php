<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\Exception\ForbiddenException;
use Cake\ORM\TableRegistry;
/**
 * Parieurs Controller
 *
 * @property \App\Model\Table\ParieursTable $Parieurs
 * @method \App\Model\Entity\Parieurs[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParieursController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Paris', 'Users'],
        ];
        $parieurs = $this->paginate($this->Parieurs);

        $this->set(compact('parieurs'));
    }

    /**
     * View method
     *
     * @param string|null $id Parieurs id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parieurs = $this->Parieurs->get($id, [
            'contain' => ['Paris', 'Users'],
        ]);
        try{
            $this->Authorization->Authorize($parieurs);
        
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('parieurs'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($idParis = null)
    {
        date_default_timezone_set('Europe/Paris');
		$heure = date("H:i:s");
		$parisTable = TableRegistry::getTableLocator()->get('Paris');
		$usersTable = TableRegistry::getTableLocator()->get('Users');
		$this->Authorization->skipAuthorization();

		$paris = $parisTable->findById($idParis)->first();
        if (($paris->arrival_hour !== null||strtotime($paris->course_hour) - strtotime($heure) < 10 * 60) && strtotime($heure) < strtotime('16:30')) {
            $this->Flash->error(__('Pari cloturé.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'interface']);
        }
        // Récupérer l'identité de l'utilisateur actuel
        $userIdentity = $this->request->getAttribute('identity');

        // Vérifier si l'utilisateur a assez d'argent pour parier
        $user = $usersTable->get($userIdentity->id);
        $argentUtilisateur = $user->ecu;
        $parieurs = $this->Parieurs->newEmptyEntity();
        try{
            $this->Authorization->Authorize($parieurs);
            if ($this->request->is('post')) {
                
                $parieurs = $this->Parieurs->patchEntity($parieurs, $this->request->getData());
				$parieurs->nbEcuParier=abs($parieurs->nbEcuParier);
                // Assurez-vous que l'utilisateur a assez d'argent pour parier
			  if($parieurs->nbEcuParier<20){
			  	$this->Flash->error(__('le nombre d\'écu parié doit être plus grand ou égal à 20 '));
				
			  }else if ($argentUtilisateur >= $parieurs->nbEcuParier) {
                    $parieurs->user_id = $userIdentity->id;
                    $parieurs->paris_id = $idParis;
					$now = date('Y/m/d');
				  	$user->dernierParis = $now;
                    // Déduire le montant paré de l'argent de l'utilisateur
                    $user->ecu -= $parieurs->nbEcuParier;
                    
                    if ($this->Parieurs->save($parieurs) && $usersTable->save($user)) {
                        $historiqueTable = TableRegistry::getTableLocator()->get('Historique');
                        $historique = $historiqueTable->newEmptyEntity();
                        $historique->date = date("Y-m-d");
                        $historique->ref_users =$user->id;
                        $historique->description='-'.$parieurs->nbEcuParier.' Ecus Paris';
                        $historiqueTable->save($historique);
                        $this->Flash->success(__('The parieurs has been saved.'));

                        return $this->redirect(['controller' => 'Users', 'action' => 'interface']);
                    }
                    $this->Flash->error(__('The parieurs could not be saved. Please, try again.'));
                } else {
                    $this->Flash->error(__('Insufficient Ecu'));
                }
            }
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        

        $paris = $this->Parieurs->Paris->find('list', ['limit' => 200])->all();
        $users = $this->Parieurs->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('parieurs', 'paris', 'users'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Parieurs id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parieurs = $this->Parieurs->get($id, [
            'contain' => [],
        ]);
        try{
            $this->Authorization->Authorize($parieurs);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $parieurs = $this->Parieurs->patchEntity($parieurs, $this->request->getData());
                if ($this->Parieurs->save($parieurs)) {
                    $this->Flash->success(__('The parieurs has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The parieurs could not be saved. Please, try again.'));
            }
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
        $paris = $this->Parieurs->Paris->find('list', ['limit' => 200])->all();
        $users = $this->Parieurs->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('parieurs', 'paris', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Parieurs id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parieurs = $this->Parieurs->get($id);
        try{
            $this->Authorization->Authorize($parieurs);
            if ($this->Parieurs->delete($parieurs)) {
                $this->Flash->success(__('The parieurs has been deleted.'));
            } else {
                $this->Flash->error(__('The parieurs could not be deleted. Please, try again.'));
            }

        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
