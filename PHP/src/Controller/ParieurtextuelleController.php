<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\Exception\ForbiddenException;
use Cake\ORM\TableRegistry;

/**
 * Parieurtextuelle Controller
 *
 * @property \App\Model\Table\ParieurtextuelleTable $Parieurtextuelle
 * @method \App\Model\Entity\Parieurtextuelle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParieurtextuelleController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $parieurtextuelle = $this->paginate($this->Parieurtextuelle);
        try{
            $this->Authorization->skipAuthorization();
            $this->set(compact('parieurtextuelle'));
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
    }

    /**
     * View method
     *
     * @param string|null $id Parieurtextuelle id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parieurtextuelle = $this->Parieurtextuelle->get($id, [
            'contain' => [],
        ]);
        try{
            $this->Authorization->Authorize($parieurtextuelle);
            $this->set(compact('parieurtextuelle'));
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }

        
    }

    public function terminer($id = null, $choix = null)
    {
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $parieursTable = TableRegistry::getTableLocator()->get('ParieurTextuelle');
        $parisTable = TableRegistry::getTableLocator()->get('Paristextuelle');
        $parieurs = $parieursTable->findByRefparistext($id)->all();
        $parisEntity = $parisTable->findById($id)->first();
        foreach ($parieurs as $parieur) {
            $choixParieurs = $parieur->choix;
            if ($choixParieurs == $choix) {
                $user = $usersTable->findById($parieur->refUsers )->first();
                $user->ecu += 10; // Mettre à jour la propriété "ecu" avec la nouvelle valeur
                $usersTable->save($user); // Sauvegarder l'entité mise à jour
                $parisEntity->cloture=true;
                $parisTable->save($parisEntity);
                $historiqueTable = TableRegistry::getTableLocator()->get('Historique');
                $historique = $historiqueTable->newEmptyEntity();
                $historique->date = date("Y-m-d");
                $historique->ref_users =$user->id;
                $historique->description='+10 Ecus paris textuelle';
                $historiqueTable->save($historique);
            }
        }
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($idParis,$idUser,$choix)
    {
        $parisTable = TableRegistry::getTableLocator()->get('Paristextuelle');
        $parisEntity = $parisTable->get($idParis);

        $this->Authorization->skipAuthorization();
        $parieurtextuelle = $this->Parieurtextuelle->newEmptyEntity();
        try{
            $this->Authorization->Authorize($parieurtextuelle);
            $parieurtextuelle->refParisText=$idParis;
            $parieurtextuelle->refUsers=$idUser;
            $parieurtextuelle->choix = $choix;

            // Vérifier si l'utilisateur a déjà parié sur ce pari
            $existingParieur = $this->Parieurtextuelle->find()
                ->where([
                    'refParisText' => $idParis,
                    'refUsers' => $idUser
                ])
                ->first();
            if(!$parisEntity->cloture){
                if(!$existingParieur){
                    if ($this->Parieurtextuelle->save($parieurtextuelle)) {
                        $this->Flash->success(__('The parieurtextuelle has been saved.'));
                        if($parisEntity->idCreateur == $idUser)
                        {
                        $this->terminer($idParis,$choix);
                        }
                        return $this->redirect(['controller'=>'Users','action' => 'parisTextuelle']);
                    }
                    $this->Flash->error(__('The parieurtextuelle could not be saved. Please, try again.'));
                }else{
                    $this->Flash->error(__('Vous avez déjà parié sur ce pari.'));
                    return $this->redirect(['controller'=>'Users','action' => 'parisTextuelle']);
                }
            }else{
                $this->Flash->error(__('Paris cloturé'));
                return $this->redirect(['controller'=>'Users','action' => 'parisTextuelle']);
            }
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
        
    }


    /**
     * Edit method
     *
     * @param string|null $id Parieurtextuelle id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parieurtextuelle = $this->Parieurtextuelle->get($id, [
            'contain' => [],
        ]);
        try{
            $this->Authorization->Authorize($parieurtextuelle);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $parieurtextuelle = $this->Parieurtextuelle->patchEntity($parieurtextuelle, $this->request->getData());
                if ($this->Parieurtextuelle->save($parieurtextuelle)) {
                    $this->Flash->success(__('The parieurtextuelle has been saved.'));

                    return $this->redirect(['controller'=>'Users','action' => 'index']);
                }
                $this->Flash->error(__('The parieurtextuelle could not be saved. Please, try again.'));
            }
            $this->set(compact('parieurtextuelle'));
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Parieurtextuelle id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parieurtextuelle = $this->Parieurtextuelle->get($id);
        try{
            $this->Authorization->Authorize($parieurtextuelle);
                if ($this->Parieurtextuelle->delete($parieurtextuelle)) {
                $this->Flash->success(__('The parieurtextuelle has been deleted.'));
            } else {
                $this->Flash->error(__('The parieurtextuelle could not be deleted. Please, try again.'));
            }

            return $this->redirect(['controller'=>'Users','action' => 'index']);
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
    }
}
