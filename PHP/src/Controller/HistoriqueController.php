<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Historique Controller
 *
 * @property \App\Model\Table\HistoriqueTable $Historique
 * @method \App\Model\Entity\Historique[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HistoriqueController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $historique = $this->paginate($this->Historique);

        $this->set(compact('historique'));
    }

    /**
     * View method
     *
     * @param string|null $id Historique id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $historique = $this->Historique->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('historique'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $historique = $this->Historique->newEmptyEntity();
        if ($this->request->is('post')) {
            $historique = $this->Historique->patchEntity($historique, $this->request->getData());
            if ($this->Historique->save($historique)) {
                $this->Flash->success(__('The historique has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The historique could not be saved. Please, try again.'));
        }
        $this->set(compact('historique'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Historique id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $historique = $this->Historique->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $historique = $this->Historique->patchEntity($historique, $this->request->getData());
            if ($this->Historique->save($historique)) {
                $this->Flash->success(__('The historique has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The historique could not be saved. Please, try again.'));
        }
        $this->set(compact('historique'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Historique id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $historique = $this->Historique->get($id);
        if ($this->Historique->delete($historique)) {
            $this->Flash->success(__('The historique has been deleted.'));
        } else {
            $this->Flash->error(__('The historique could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
