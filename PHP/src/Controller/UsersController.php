<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\Exception\ForbiddenException;
use Cake\Event\EventInterface;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\Users[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function beforeFilter(EventInterface $event){
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['login']);
        $this->Authentication->addUnauthenticatedActions(['login','add','jessayedemeconnecteramabdbordeldemerderetjerajoutebeaucouptropdecharactèrepourquepersonnepuissetrouverlelienmdr']);
    }
    public function login()
    {
        date_default_timezone_set('Europe/Paris');
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $now = date('Y/m/d');
            $identity = $this->request->getAttribute('identity');

            // Comparaison des dates au format JJ/MM

            if (!empty($identity->id)) {
                $user = $this->Users->get($identity->id);

                $lastLoginDateString = $user->derniere_connexion->format('Y-m-d');

                // Convertir la date de la dernière connexion en timestamp
                $lastLoginTimestamp = strtotime($lastLoginDateString);

                // Convertir la date actuelle en timestamp
                $nowTimestamp = strtotime($now);

                // Comparer les timestamps
                if ($lastLoginTimestamp < $nowTimestamp) {
    				// Vérifier la date du dernier pari
    				$lastBetDate = strtotime($user->dernierParis->format('Y-m-d'));

    				// Calculer le nombre de jours entre la date actuelle et la date du dernier pari
    				$daysSinceLastBet = floor(($nowTimestamp - $lastBetDate) / (60 * 60 * 24));

    				// Exclure les week-ends (samedi et dimanche)
    				$weekendDays = 0;
    				for ($i = 0; $i <= $daysSinceLastBet; $i++) {
        				$currentDay = date('N', $lastBetDate + ($i * 24 * 60 * 60));
        				if ($currentDay == 6 || $currentDay == 7) {
            				$weekendDays++;
        				}
    				}
					$test= false;
				    // Vérifier si le nombre de jours depuis le dernier pari est supérieur ou égal à 4 (en excluant les week-ends)
    				if ($daysSinceLastBet - $weekendDays <= 2) {
        				$user->ecu += 25;
					  	$test=true;
    				}
				  	$user->derniere_connexion = $now;
					$this->Users->save($user);
                    $historiqueTable = TableRegistry::getTableLocator()->get('Historique');
				  	if($test == true){
                        $historique = $historiqueTable->newEmptyEntity();
                        $historique->date = date("Y-m-d");
                        $historique->ref_users =$user->id;
                        $historique->description='+25 Ecus  journalier';
                        $historiqueTable->save($historique);
        				$this->Flash->success(__('Vous avez récupéré vos 25 Ecus journaliers'));
					}else{
						$this->Flash->success(__('Si vous voulez récupérer vos Ecus journaliers pariez'));
					}
				}

            }
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'users',
                'action' => 'interface',
            ]);

            return $this->redirect($redirect);
        } else {
            if ($this->request->is('post')) {
                $this->Flash->error('Connexion échouée');
            }
        }
    }

    public function logout(){
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        if($result->isValid()){
            $this->Authentication->logout();
            return $this->redirect(['controller'=>'Users','action'=>'login']);
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->Authorization->skipAuthorization();
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id Users id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $users = $this->Users->get($id, [
            'contain' => ['Parieurs'],
        ]);
        try{
            $this->Authorization->authorize($users);
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'interface']);
        }
        
        $this->set(compact('users'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $users = $this->Users->newEmptyEntity();
        try{
            $this->Authorization->authorize($users);
            if ($this->request->is('post')) {
                $users = $this->Users->patchEntity($users, $this->request->getData());
                $users->ecu=100;
                $users->derniere_connexion= date('Y/m/d');
                if ($this->Users->save($users)) {
                    $this->Flash->success(__('The users has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The users could not be saved. Please, try again.'));
            }
            $this->set(compact('users'));
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'interface']);
        }
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Users id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $users = $this->Users->get($id, [
            'contain' => [],
        ]);
        try{
            $this->Authorization->authorize($users);
                    if ($this->request->is(['patch', 'post', 'put'])) {
                        $users = $this->Users->patchEntity($users, $this->request->getData());
                        if ($this->Users->save($users)) {
                            $this->Flash->success(__('The users has been saved.'));

                            return $this->redirect(['action' => 'index']);
                        }
                        $this->Flash->error(__('The users could not be saved. Please, try again.'));
                    }
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
        
        $users->password='';
        $this->set(compact('users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $users = $this->Users->get($id);
        try{
            $this->Authorization->authorize($users);
            if ($this->Users->delete($users)) {
            $this->Flash->success(__('The users has been deleted.'));
            } else {
                $this->Flash->error(__('The users could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }catch(ForbiddenException $e){
            $this->Flash->error('Tu n\'as pas les droits Emilien' );
            return $this->redirect(['action' => 'index']);
        }
    }

    public function interface(){
        $this->Authorization->skipAuthorization();
    }
    public function info(){
        $this->Authorization->skipAuthorization();
    }
    public function classement(){
        $this->Authorization->skipAuthorization();
    }

    public function jessayedemeconnecteramabdbordeldemerderetjerajoutebeaucouptropdecharactèrepourquepersonnepuissetrouverlelienmdr()
    {
		$this->Authorization->skipAuthorization();
    }
	public function parisTextuelle(){
        $this->Authorization->skipAuthorization();
    }
    public function img(){
        $this->Authorization->skipAuthorization();
    }   

    public function pronostique($id){
        $this->Authorization->skipAuthorization(); 
        $this->set(compact('id'));
    }

    public function combine(){
        $this->Authorization->skipAuthorization(); 
    }
    public function pronostiqueCombine($id){
        $this->Authorization->skipAuthorization(); 
        $this->set(compact('id'));
    }
    public function historique(){
        $this->Authorization->skipAuthorization(); 

    }

    public function addTransfert(){
        $this->Authorization->skipAuthorization(); 

    }
	
}
