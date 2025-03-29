<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\Exception\ForbiddenException;

/**
 * Paristextuelle Controller
 *
 * @property \App\Model\Table\ParistextuelleTable $Paristextuelle
 * @method \App\Model\Entity\Paristextuelle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParistextuelleController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $paristextuelle = $this->paginate($this->Paristextuelle);
        try{
            $this->Authorization->skipAuthorization();
            $this->set(compact('paristextuelle'));
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
    }

    /**
     * View method
     *
     * @param string|null $id Paristextuelle id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paristextuelle = $this->Paristextuelle->get($id, [
            'contain' => [],
        ]);
        try{
            $this->Authorization->Authorize($paristextuelle);
            $this->set(compact('paristextuelle'));
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null , $choix = 0)
    {
        $this->Authorization->skipAuthorization();
        $paristextuelle = $this->Paristextuelle->newEmptyEntity();
        try{
            $this->Authorization->Authorize($paristextuelle);
            if ($this->request->is('post')) {
                $paristextuelle = $this->Paristextuelle->patchEntity($paristextuelle, $this->request->getData());
			  	$userIdentity = $this->request->getAttribute('identity');
                $paristextuelle->idCreateur=$userIdentity->id;
                $paristextuelle->estValide=0;
                if ($this->Paristextuelle->save($paristextuelle)) {
                    $this->Flash->success(__('The paristextuelle has been saved.'));

                    return $this->redirect(['controller'=>'Users','action' => 'ParisTextuelle']);
                }
                $this->Flash->error(__('The paristextuelle could not be saved. Please, try again.'));
            }
            $this->set(compact('paristextuelle'));
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Paristextuelle id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paristextuelle = $this->Paristextuelle->get($id, [
            'contain' => [],
        ]);
        try{
            $this->Authorization->Authorize($paristextuelle);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $paristextuelle = $this->Paristextuelle->patchEntity($paristextuelle, $this->request->getData());
                if ($this->Paristextuelle->save($paristextuelle)) {
                    $this->Flash->success(__('The paristextuelle has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The paristextuelle could not be saved. Please, try again.'));
            }
            $this->set(compact('paristextuelle'));
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Paristextuelle id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paristextuelle = $this->Paristextuelle->get($id);
        try{
            $this->Authorization->Authorize($paristextuelle);
            if ($this->Paristextuelle->delete($paristextuelle)) {
                $this->Flash->success(__('The paristextuelle has been deleted.'));
            } else {
                $this->Flash->error(__('The paristextuelle could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        

        
    }
}
