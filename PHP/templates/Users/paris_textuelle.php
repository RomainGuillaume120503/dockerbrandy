<?php
use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

$userIdentity = $this->request->getAttribute('identity');
$usersTable =TableRegistry::getTableLocator()->get('Users');
$parisTable = TableRegistry::getTableLocator()->get('Paris');
$parieursTable = TableRegistry::getTableLocator()->get('Parieurs');
$profsTable = TableRegistry::getTableLocator()->get('Profs');
$parisTextuelleTable = TableRegistry::getTableLocator()->get('Paristextuelle');
?>

<?php
echo $this->Html->link('Nouveau Paris',['controller'=>'Paristextuelle', 'action'=>'add',$userIdentity->id,0],['class'=>'newParis']);
// Affichage des paris
$paris = $parisTextuelleTable
    ->find()
    ->where(['estValide' => (int)1])
    ->order(['id' => 'DESC']);


if($paris->count()>0){
echo '<div class="container">';
foreach ($paris as $pari) {
    $idProf = $pari->idCreateur;
    /*echo '<div class="col">';
      echo'<div class="card text-center">';
      echo  '<div class="card-header  fs-4 p-2 bg-success bg-gradient text-white">'.$usersTable->findById($idProf)->first()->username.'</div>';
      echo  '<div class="card-main m2">';
      echo '<p class="card-text fs-5">'.$pari->texte.'</p>';
        echo '<p class="card-text">'.$this->Html->link('Oui',['controller'=>'Parieurtextuelle', 'action'=>'add',$pari->id,$userIdentity->id,true],['class'=>'btn btn-success fs-4 btn-lg m-4 ps-5']).$this->Html->link('Non',['controller'=>'Parieurtextuelle', 'action'=>'add',$pari->id,$userIdentity->id,0],['class'=>'btn btn-success fs-4 btn-lg m-4 ps-5']).'</p>';
        echo '</div>';
      echo  '</div>';
 echo '</div>';*/
 echo'<div class="card">
   <div class="box">
     <div class="contenu">
       <h2>'.$pari->id.'</h2>
       <h3>'.$usersTable->findById($idProf)->first()->username.'</h3>
       <p>'.$pari->texte.'</p>
       <p class="card-text">'.$this->Html->link('Oui',['controller'=>'Parieurtextuelle', 'action'=>'add',$pari->id,$userIdentity->id,true],['class'=>'btn btn-success fs-4 btn-lg m-4 ps-5']).$this->Html->link('Non',['controller'=>'Parieurtextuelle', 'action'=>'add',$pari->id,$userIdentity->id,0],['class'=>'btn btn-success fs-4 btn-lg m-4 ps-5']).'</p>
     </div>
   </div>
 </div>';
}
echo ' </div>';
}else{
   echo '<div style="text-align:center">';
  echo '<h1>Pas de paris pour le moment...</h1>';
  echo '<h2> Profites-en pour relire les cours de la semaine,non?</h2>';
	echo'</div>';
}

?>

<style>
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
  .header,ul {
    background: rgba(255,255,255,0.13);
}
.newParis{
  position: fixed;
  top: 15%;
  left: 2%;
  padding: 8px 20px;
  text-decoration: none;
  color: white;
  background: #3B3C40;
  box-shadow: inset 5px 5px 5px rgba(0, 0, 0, 0.2),
    inset -5px -5px 15px rgba(255, 255, 255, 0.1),
    5px 5px 15px rgba(0, 0, 0, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.1);
  border-radius: 15px;
}
body{
  background: #232427;
}
main {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  min-height: 100vh;
  background: #232427;
}

main .container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  max-width: 100%;
  margin: 40px 0;
}

main .container .card {
  position: relative;
  width: calc(33.33% - 20px);
  min-width: 320px;
  height: 440px;
  box-shadow: inset 5px 5px 5px rgba(0, 0, 0, 0.2),
    inset -5px -5px 15px rgba(255, 255, 255, 0.1),
    5px 5px 15px rgba(0, 0, 0, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.1);
  border-radius: 15px;
  margin: 30px;
  transition: 0.5s;
}

main .container .card:nth-child(1) .box .contenu a {
  background: #2196f3;
}

main .container .card:nth-child(2) .box .contenu a {
  background: #e91e63;
}

main .container .card:nth-child(3) .box .contenu a {
  background: #23c186;
}
main .container .card:nth-child(4) .box .contenu a {
  background: #4CAF50;
}

main .container .card:nth-child(5) .box .contenu a {
  background: #FFC107;
}

main .container .card:nth-child(6) .box .contenu a {
  background: #673AB7;
}

main .container .card:nth-child(7) .box .contenu a {
  background: #FF5722;
}

main .container .card:nth-child(8) .box .contenu a {
  background: #009688;
}


main .container .card .box {
  position: absolute;
  top: 20px;
  left: 20px;
  right: 20px;
  bottom: 20px;
  background: #2a2b2f;
  border-radius: 15px;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  transition: 0.5s;
}

main .container .card .box:hover {
  transform: translateY(-50px);
}

main .container .card .box:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 50%;
  height: 100%;
  background: rgba(255, 255, 255, 0.03);
}

main .container .card .box .contenu {
  padding: 20px;
  text-align: center;
}

main .container .card .box .contenu h2 {
  position: absolute;
  top: -10px;
  right: 30px;
  font-size: 8rem;
  color: rgba(255, 255, 255, 0.1);
}

main .container .card .box .contenu h3 {
  font-size: 1.8rem;
  color: #fff;
  z-index: 1;
  transition: 0.5s;
  margin-bottom: 15px;
}

main .container .card .box .contenu p {
  font-size: 1rem;
  font-weight: 300;
  color: rgba(255, 255, 255, 0.9);
  z-index: 1;
  transition: 0.5s;
}

main .container .card .box .contenu a {
  position: relative;
  display: inline-block;
  margin: 0.5em;
  padding: 8px 20px;
  background: black;
  border-radius: 5px;
  text-decoration: none;
  color: white;
  margin-top: 20px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  transition: 0.5s;
}
main .container .card .box .contenu a:hover {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
  background: #fff;
  color: #000;
}
  
@media screen and (max-width: 671px) {
	.newParis{
	position: absolute;
  top: 15%;
  left: 2%;
  padding: 8px 20px;
  text-decoration: none;
  background: #3B3C40;
  box-shadow: inset 5px 5px 5px rgba(0, 0, 0, 0.2),
    inset -5px -5px 15px rgba(255, 255, 255, 0.1),
    5px 5px 15px rgba(0, 0, 0, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.1);
  border-radius: 15px;
}
  
}

</style>