<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\ParieursTable;
use Authorization\Exception\ForbiddenException;
use Cake\ORM\TableRegistry;

/**
 * Paris Controller
 *
 * @property \App\Model\Table\ParisTable $Paris
 * @method \App\Model\Entity\Paris[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParisController extends AppController
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
            'contain' => ['Profs'],
        ];
        $paris = $this->paginate($this->Paris);
        $this->set(compact('paris'));
    }

    /**
     * View method
     *
     * @param string|null $id Paris id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paris = $this->Paris->get($id, [
            'contain' => ['Profs', 'Parieurs'],
        ]);
        try{
            $this->Authorization->Authorize($paris);
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
        $this->set(compact('paris'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($arrival_hour=NULL)
    {   $this->Authorization->skipAuthorization();
        $paris = $this->Paris->newEmptyEntity();
        try{
            $this->Authorization->Authorize($paris);
            if ($this->request->is('post')) {
                $paris = $this->Paris->patchEntity($paris, $this->request->getData());
                if ($this->Paris->save($paris)) {
                    $this->Flash->success(__('The paris has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The paris could not be saved. Please, try again.'));
            }
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
        $profs = $this->Paris->Profs->find('list', ['limit' => 200])->all();
        $this->set(compact('paris', 'profs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Paris id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null,$arrival_hour=NULL)
    {
        $paris = $this->Paris->get($id, [
            'contain' => [],
        ]);
        try{
            $this->Authorization->Authorize($paris);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $paris = $this->Paris->patchEntity($paris, $this->request->getData());
                $paris->arrival_hour=$arrival_hour;
                if ($this->Paris->save($paris)) {
                    $this->Flash->success(__('The paris has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The paris could not be saved. Please, try again.'));
            }

        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
        $profs = $this->Paris->Profs->find('list', ['limit' => 200])->all();
        $this->set(compact('paris', 'profs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Paris id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paris = $this->Paris->get($id);
        try{
            $this->Authorization->Authorize($paris);
            if ($this->Paris->delete($paris)) {
                $this->Flash->success(__('The paris has been deleted.'));
            } else {
                $this->Flash->error(__('The paris could not be deleted. Please, try again.'));
            }
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['controller'=>'users','action' => 'interface']);
        }
        

        return $this->redirect(['action' => 'index']);
    }

    public function terminer($id = null)
    {
        date_default_timezone_set('Europe/Paris');
        $heure = date("H:i:s");
        $this->edit($id, $heure);
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $parisTable = TableRegistry::getTableLocator()->get('Paris');
        $parieursTable = TableRegistry::getTableLocator()->get('Parieurs');
        $profsTable = TableRegistry::getTableLocator()->get('Profs');
        $parisEntity = $parisTable->get($id);
        $arrivalHour = $parisEntity->arrival_hour;
        $parieurs= $parieursTable->findByParis_id($id)->all();

        foreach($parieurs as $parieur){
            $hourEstimee = $parieur->heure_estimee;
            $differenceInMinutes = abs(strtotime($arrivalHour) - strtotime($hourEstimee)) / 60;
            $multiplicateur= $profsTable->findById($parisEntity->prof_id)->first()->multiplicateur;
			if(($differenceInMinutes <=1 || $differenceInMinutes >=1)&& $differenceInMinutes < 2){
                $multiplicateur=$multiplicateur;
            }else{
                $multiplicateur=0;
            }
            
            if($multiplicateur!=0){
                $parieur->nbEcuGagne= $multiplicateur*$parieur->nbEcuParier;
                $parieursTable->save($parieur);
                $user= $usersTable->findById($parieur->user_id)->first();
                $user->ecu+=$parieur->nbEcuGagne;
                $usersTable->save($user);
                $historiqueTable = TableRegistry::getTableLocator()->get('Historique');
                $historique = $historiqueTable->newEmptyEntity();
                $historique->date = date("Y-m-d");
                $historique->ref_users =$user->id;
                $historique->description='+'.$parieur->nbEcuGagne.' Ecus Paris';
                $historiqueTable->save($historique);
            }else{
                $parieur->nbEcuGagne=0;
                $parieursTable->save($parieur);
            }
        }

    }

}
