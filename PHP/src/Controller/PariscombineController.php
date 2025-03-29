<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
/**
 * Pariscombine Controller
 *
 * @property \App\Model\Table\PariscombineTable $Pariscombine
 * @method \App\Model\Entity\Pariscombine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PariscombineController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $pariscombine = $this->paginate($this->Pariscombine);

        $this->set(compact('pariscombine'));
    }

    /**
     * View method
     *
     * @param string|null $id Pariscombine id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pariscombine = $this->Pariscombine->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('pariscombine'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parisTable = TableRegistry::getTableLocator()->get('Paris');
        $paris = $parisTable->find()->where(['arrival_hour IS' => null])->order(['id' => 'DESC']);
        $this->Authorization->skipAuthorization();
        $pariscombine = $this->Pariscombine->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData('pariscombine');

            
            $savedPariscombine = [];

            foreach ($data as $entry) {
                $pariscombine = $this->Pariscombine->newEmptyEntity();
                $pariscombine = $this->Pariscombine->patchEntity($pariscombine, $entry);
                if(strtotime($entry['heureParie']) != null){
                    
                    if ($this->Pariscombine->save($pariscombine)) {
                        $savedPariscombine[] = $pariscombine;
                    } else {
                        
                        $this->Flash->error(__('Some pariscombine could not be saved. Please, try again.'));
                    }
                }
                
            }

            if (!empty($savedPariscombine)) {
                $this->Flash->success(__('The pariscombine has been saved.'));
                return $this->redirect(['controller'=>'users','action' => 'interface']);
            }
        }

        $this->set(compact('pariscombine','paris'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pariscombine id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pariscombine = $this->Pariscombine->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pariscombine = $this->Pariscombine->patchEntity($pariscombine, $this->request->getData());
            if ($this->Pariscombine->save($pariscombine)) {
                $this->Flash->success(__('The pariscombine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pariscombine could not be saved. Please, try again.'));
        }
        $this->set(compact('pariscombine'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pariscombine id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pariscombine = $this->Pariscombine->get($id);
        if ($this->Pariscombine->delete($pariscombine)) {
            $this->Flash->success(__('The pariscombine has been deleted.'));
        } else {
            $this->Flash->error(__('The pariscombine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
