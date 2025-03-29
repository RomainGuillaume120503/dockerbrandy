<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\Exception\ForbiddenException;
use Cake\Event\EventInterface;

/**
 * Profs Controller
 *
 * @property \App\Model\Table\ProfsTable $Profs
 * @method \App\Model\Entity\Profs[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function beforeFilter(EventInterface $event)
    {
        parent::initialize();
    }
    public function index()
    {
        $profs = $this->paginate($this->Profs);
        try{
            $this->Authorization->skipAuthorization();
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
        $this->set(compact('profs'));
    }

    /**
     * View method
     *
     * @param string|null $id Profs id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profs = $this->Profs->get($id, [
            'contain' => [],
        ]);
        try{
            $this->Authorization->Authorize($profs);
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
        $this->set(compact('profs'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profs = $this->Profs->newEmptyEntity();
        try{
            $this->Authorization->Authorize($profs);
            if ($this->request->is('post')) {
                $profs = $this->Profs->patchEntity($profs, $this->request->getData());
                if ($this->Profs->save($profs)) {
                    $this->Flash->success(__('The profs has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The profs could not be saved. Please, try again.'));
            }
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
        $this->set(compact('profs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Profs id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profs = $this->Profs->get($id, [
            'contain' => [],
        ]);
        try{
            $this->Authorization->Authorize($profs);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $profs = $this->Profs->patchEntity($profs, $this->request->getData());
                if ($this->Profs->save($profs)) {
                    $this->Flash->success(__('The profs has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The profs could not be saved. Please, try again.'));
            }
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
        $this->set(compact('profs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Profs id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profs = $this->Profs->get($id);
        try{
            $this->Authorization->Authorize($profs);
                    if ($this->Profs->delete($profs)) {
                        $this->Flash->success(__('The profs has been deleted.'));
                    } else {
                        $this->Flash->error(__('The profs could not be deleted. Please, try again.'));
                    }
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        

        return $this->redirect(['action' => 'index']);
    }
}
