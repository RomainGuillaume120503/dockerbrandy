<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
/**
 * Transfert Controller
 *
 * @property \App\Model\Table\TransfertTable $Transfert
 * @method \App\Model\Entity\Transfert[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransfertController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $transfert = $this->paginate($this->Transfert);

        $this->set(compact('transfert'));
    }

    /**
     * View method
     *
     * @param string|null $id Transfert id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transfert = $this->Transfert->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('transfert'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $transfert = $this->Transfert->newEmptyEntity();
        if ($this->request->is('post')) {
            $userIdentity = $this->request->getAttribute('identity');
            $usersTable = TableRegistry::getTableLocator()->get('Users');

            $userDonneur = $usersTable->findById($userIdentity->id)->first();
            // Récupérer la valeur du champ "Numbre d'ecu à transferer"
            $ecuATransferer = $this->request->getData('Numbre_d_ecu_a_transferer');
        
            // Récupérer l'utilisateur receveur
            $userReceveurId = $this->request->getData('userReceveur');
            if($userReceveurId == null){
                $this->Flash->error(__('Choisisez une personne pour le trasnfert'));
                return $this->redirect(['controller'=>'users','action' => 'interface']);
            }
            $userReceveur = $usersTable->findById($userReceveurId)->first();
		  if (!filter_var($userDonneur->ecu, FILTER_VALIDATE_INT)) {
    $this->Flash->error(__('La valeur entrée n\'est pas un entier valide.'));
    return $this->redirect(['controller' => 'users', 'action' => 'interface']);
}

            if ((($userDonneur->ecu - $ecuATransferer) >= 0)&& ($ecuATransferer>0)) {
                $userReceveur->ecu += $ecuATransferer;
                $userDonneur->ecu -= $ecuATransferer;
        
                if ($usersTable->save($userReceveur) && $usersTable->save($userDonneur)) {
                    $historiqueTable = TableRegistry::getTableLocator()->get('Historique');
                    $historique = $historiqueTable->newEmptyEntity();
                    $historique->date = date("Y-m-d");
                    $historique->ref_users = $userDonneur->id;
                    $historique->description = '-' . $ecuATransferer . ' transferé à ' . $userReceveur->username;
                    $historiqueTable->save($historique);
        
                    $historique2 = $historiqueTable->newEmptyEntity();
                    $historique2->date = date("Y-m-d");
                    $historique2->ref_users = $userReceveur->id;
                    $historique2->description = '+' . $ecuATransferer . ' transfert de ' . $userDonneur->username;
                    $historiqueTable->save($historique2);
        
                    $this->Flash->success(__('transfert réussi'));
                    return $this->redirect(['controller'=>'users','action' => 'interface']);
                } else {
                    $this->Flash->error(__('Erreur lors du transfert'));
                    return $this->redirect(['controller'=>'users','action' => 'interface']);
                }
            } else {
                // Afficher une pop-up en JavaScript avec le message d'erreur
                $this->Flash->error(__('Tu n\'as pas assez d\'Ecus'));
                return $this->redirect(['controller'=>'users','action' => 'interface']);
            }
        }
        $this->set(compact('transfert'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transfert id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transfert = $this->Transfert->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transfert = $this->Transfert->patchEntity($transfert, $this->request->getData());
            if ($this->Transfert->save($transfert)) {
                $this->Flash->success(__('The transfert has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfert could not be saved. Please, try again.'));
        }
        $this->set(compact('transfert'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transfert id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transfert = $this->Transfert->get($id);
        if ($this->Transfert->delete($transfert)) {
            $this->Flash->success(__('The transfert has been deleted.'));
        } else {
            $this->Flash->error(__('The transfert could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
