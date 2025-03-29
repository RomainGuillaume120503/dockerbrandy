<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\Exception\ForbiddenException;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
$historiqueTable =TableRegistry::getTableLocator()->get('Historique');

/**
 * Combine Controller
 *
 * @property \App\Model\Table\CombineTable $Combine
 * @method \App\Model\Entity\Combine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CombineController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $combine = $this->paginate($this->Combine);

        $this->set(compact('combine'));
    }

    /**
     * View method
     *
     * @param string|null $id Combine id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $combine = $this->Combine->get($id, [
            'contain' => [],
        ]);
        try{
            $this->Authorization->Authorize($combine);
            $this->set(compact('combine'));
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
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $parisTable = TableRegistry::getTableLocator()->get('Paris');
        $paris = $parisTable->find()->where(['arrival_hour IS' => null])->order(['id' => 'DESC']);
        $recordCount = $paris->count();
        if($recordCount==0){
            $this->Flash->error(__('il n\'y a pas de paris ouvert pour faire un combiné'));
            return $this->redirect(['controller'=>'users','action' => 'interface']);
        }

		$usersTable = TableRegistry::getTableLocator()->get('Users');
        $this->Authorization->skipAuthorization();

        $userIdentity = $this->request->getAttribute('identity');

        $user = $usersTable->get($userIdentity->id);
        $argentUtilisateur = $user->ecu;
        $combine = $this->Combine->newEmptyEntity();
        if ($this->request->is('post')) {
            $combine = $this->Combine->patchEntity($combine, $this->request->getData());
            if($combine->nbEcuParier==null)
                $combine->nbEcuParier=0;
            $combine->refUser=$userIdentity->id;
            $combine->nbEcuParier= abs($combine->nbEcuParier);
            if (($argentUtilisateur >= $combine->nbEcuParier) &&($combine->nbEcuParier>3)){
                $combine->nbEcuGagner=null;
                $combine->cloture=null;
                $user->ecu=$user->ecu-$combine->nbEcuParier;
                $historiqueTable = TableRegistry::getTableLocator()->get('Historique');
                $historique = $historiqueTable->newEmptyEntity();
                $historique->date = date("Y-m-d");
                $historique->ref_users =$user->id;
                if ($this->Combine->save($combine)&& $usersTable->save($user)) {
                    $this->Flash->success(__('The combine has been saved.'));
                    $historique->description= '-'.$combine->nbEcuParier.' Ecus Paris combine';
                    $historiqueTable->save($historique);
                    return $this->redirect(['controller'=>'Pariscombine','action' => 'add',$combine->id]);
                }
                $this->Flash->error(__('The combine could not be saved. Please, try again.'));
            }else{
                $this->Flash->error(__('Vous n\'avez la somme indiqué ou nb ecus < 3'));
            }
            
        }
        $this->set(compact('combine'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Combine id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $combine = $this->Combine->get($id, [
            'contain' => [],
        ]);
        try{
            $this->Authorization->Authorize($combine);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $combine = $this->Combine->patchEntity($combine, $this->request->getData());
                if ($this->Combine->save($combine)) {
                    $this->Flash->success(__('The combine has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The combine could not be saved. Please, try again.'));
            }
            $this->set(compact('combine'));
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }

        
    }
    
    function terminer()
    {
        $combine = $this->Combine->find('all')->first();
        try{
            $this->Authorization->Authorize($combine);
            $usersTable = TableRegistry::getTableLocator()->get('Users');
            $parisTable = TableRegistry::getTableLocator()->get('Paris');
            $combinesTable = TableRegistry::getTableLocator()->get('Combine');
            $parisCombinesTable = TableRegistry::getTableLocator()->get('Pariscombine');
            $profsTable = TableRegistry::getTableLocator()->get('Profs');

            $combines = $combinesTable->find()->where(['cloture IS' => null])->all();
            foreach($combines as $combine){
                $parisCombines = $parisCombinesTable->findByRefcombine($combine->id)->all();
                $multiplicateur= 1;
                foreach($parisCombines as $parisCombine){
                    $pariRef = $parisTable->findById($parisCombine->refParis)->first();
                    $differenceInMinutes = abs(strtotime($pariRef->arrival_hour) - strtotime($parisCombine->heureParie)) / 60;
                    if(($differenceInMinutes <=1 || $differenceInMinutes >=1)&& $differenceInMinutes < 2){
                        $multiplicateur=$multiplicateur * $profsTable->findById($pariRef->prof_id)->first()->multiplicateur;;
                    }else{
                        $multiplicateur=0;
                        break;
                    }
                }
                if($multiplicateur!=0){
                    $user=$usersTable->findById($combine->refUser)->first();
                    $user->ecu+= $multiplicateur*$combine->nbEcuParier;
                    $combine->nbEcuGagner=$multiplicateur*$combine->nbEcuParier;
                    $combine->cloture=true;
                    $combinesTable->save($combine);
                    $usersTable->save($user);
                    $historiqueTable = TableRegistry::getTableLocator()->get('Historique');
                    $historique = $historiqueTable->newEmptyEntity();
                    $historique->date = date("Y-m-d");
                    $historique->ref_users =$user->id;
                    $historique->description='+'.$combine->nbEcuGagner.' Ecus Paris Combine';
                    $historiqueTable->save($historique);
                        
                }else{
                    $combine->nbEcuGagner=0;
                    $combine->cloture=true;
                    $combinesTable->save($combine);                  
                }
            }
            return $this->redirect(['action' => 'index']);
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
    }
    /**
     * Delete method
     *
     * @param string|null $id Combine id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $combine = $this->Combine->get($id);
        try{
            $this->Authorization->Authorize($combine);
            if ($this->Combine->delete($combine)) {
                $this->Flash->success(__('The combine has been deleted.'));
            } else {
                $this->Flash->error(__('The combine could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }

        
    }
}
