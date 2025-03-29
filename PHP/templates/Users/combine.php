<?php
use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

$userIdentity = $this->request->getAttribute('identity');
$usersTable =TableRegistry::getTableLocator()->get('Users');
$parisTable = TableRegistry::getTableLocator()->get('Combine'); 
$paris = $parisTable->find()->order(['id' => 'DESC']);
echo $this->Html->link(__('KonBiNez'), ['controller'=>'Combine','action' => 'add'], ['class' => 'btn btn-success']) ;
echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
foreach($paris as $pari){
    $ecu='';
    if($pari->cloture==null){
        $ecu = 'Combiné pas encore cloture';
    }else{
        $ecu = 'Ecu gagner: '.$pari->nbEcuGagner;
    }
    $idProf= $pari->refUser;
    echo '<div class="col">';
    echo'<div class="card text-center">';
    echo  '<div class="card-header fs-4 p-4 bg-success bg-gradient text-white">'.$usersTable->findById($idProf)->first()->username.'</div>';
    echo  '<div class="card-body m2">';
    echo '<p class="card-text fs-5">'.'Ecu parié : '.$pari->nbEcuParier.'</p>';
    echo '<p class="card-text fs-5">'.$ecu.'</p>';
    echo '<div class="d-grid gap-2">';
    echo '<p class="card-text">' . $this->Html->link('Voir les pronostiques', ['controller' => 'Users', 'action' => 'pronostiqueCombine', $pari->id], ['class' => 'btn btn-success  ps-5 ']) . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
echo '</div>';
?>

