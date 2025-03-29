<?php
use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

$userIdentity = $this->request->getAttribute('identity');
$usersTable =TableRegistry::getTableLocator()->get('Users');
$parisTable = TableRegistry::getTableLocator()->get('Paris');
$parieursTable = TableRegistry::getTableLocator()->get('Parieurs');
$profsTable = TableRegistry::getTableLocator()->get('Profs'); 

// Date actuelle
$dateActuelle = time(); // Timestamp de la date actuelle

// Date cible (1er mars 2024)
$dateCible = strtotime('2024-03-01'); // Timestamp du 1er mars 2024

// Calcul de la différence en secondes
$differenceSecondes = $dateCible - $dateActuelle;

// Conversion en jours
$differenceJours = ceil($differenceSecondes / (60 * 60 * 24));

?>

<h1 class="titre">Bonjour <?= $userIdentity->username ?><br>Solde : <?= $usersTable->findById($userIdentity->id)->first()->ecu ?> Ecus <br> Jour - <?= $differenceJours ?></h1>
<?php

// Affichage des paris
$paris = $parisTable->find()->order(['id' => 'DESC']);

if($paris->count()>0){
echo '<div class="container">';
foreach ($paris as $pari) {
    if(!($profsTable->findById($pari->prof_id)->first()->first_name =="Robin"&& $userIdentity->id ==12)){
        $idProf = $pari->prof_id;
		$prof=$profsTable->findById($idProf)->first();
        $heure='';
        if($pari->arrival_hour===null){
            $heure='pas encore arrivé';
        }else{
            $heure=$pari->arrival_hour;
        }
        // echo'<div class="container ">';
        // echo'    <div class="card">';
        // echo'        <div class="cont">';
        // echo'            <h2>'.$prof->first_name . ' ' . $prof->last_name.'</h2>';
        // echo'            <h3>'.'×'.$prof->multiplicateur.'</h3>';
        // echo'            <h3>'.$pari->course_hour.'</h3>
        //                 <h3>'.$heure.'</h3>';
        // echo'            <p>'.$this->Html->link('Parier', ['controller' => 'Parieurs', 'action' => 'add', $pari->id],).'</p>';
        // echo'            <p>'.$this->Html->link('Voir les pronostiques', ['controller' => 'Users', 'action' => 'pronostique', $pari->id]) .'</p>';
        // echo'        </div>';
        // echo'    </div>';
        // echo'</div>';
        echo'
  <div class="box">
    <span></span>
    <div class="content">
      <h2>'.$prof->first_name . ' ' . $prof->last_name.'</h2>
      <h3>'.'×'.$prof->multiplicateur.'</h3>
	  <h3>'.$pari->course_hour.'</h3>
		<h3>'.$heure.'</h3>
      <p>'.$this->Html->link('Parier', ['controller' => 'Parieurs', 'action' => 'add', $pari->id],).'</p>
      <p>'.$this->Html->link('Voir les pronostiques', ['controller' => 'Users', 'action' => 'pronostique', $pari->id]) .'</p>
    </div>
  </div>';
    }
    
}
echo '</div>';
}else{
   echo '<div style="text-align:center">';
  echo '<h1>Pas de paris pour le moment...</h1>';
  echo '<h2> Profites-en pour relire les cours de la semaine,non?</h2>';
	echo'</div>';
}


echo '</table>';
include 'addTransfert.php';
?>

<style>
.header,ul {
    background: rgba(255,255,255,0.13);
}
 
*{
    margin:0;
    padding:0;
    box-sizing: border-box; 
}
  .titre{
	margin-top: 7rem;
	width:100%;
  }
body
{
  display: flex;
  justify-content: center;
  align-items: start;
  min-height: 100vh;
  background: #1d061a
}

.container
{
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  padding: 40px 0;
}

.container .box
{
  position: relative;
  width: 320px;
  height: 400px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 40px 30px;
  transition: 0.5s;
}

.container .box::before
{
  content:' ';
  position: absolute;
  top: 0;
  left: 50px;
  width: 50%;
  height: 100%;
  text-decoration: none;
  background: #fff;
  border-radius: 8px;
  transform: skewX(15deg);
  transition: 0.5s;
}

.container .box::after
{
  content:'';
  position: absolute;
  top: 0;
  left: 50;
  width: 50%;
  height: 100%;
  background: #fff;
  border-radius: 8px;
  transform: skewX(15deg);
  transition: 0.5s;
  filter: blur(30px);
}

.container .box:hover:before,
.container .box:hover:after
{
  transform: skewX(0deg);
  left: 20px;
  width: calc(100% - 90px);
  
}

.container .box:nth-child(1):before,
.container .box:nth-child(1):after
{
  background: linear-gradient(315deg, #ffbc00, #ff0058)
}

.container .box:nth-child(2):before,
.container .box:nth-child(2):after
{
  background: linear-gradient(315deg, #03a9f4, #ff0058)
}

.container .box:nth-child(3):before,
.container .box:nth-child(3):after
{
  background: linear-gradient(315deg, #4dff03, #00d0ff)
}

.container .box:nth-child(4):before,
.container .box:nth-child(4):after
{
  background: linear-gradient(315deg, #EB1017, #0300EB)
}

.container .box span
{
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 5;
  pointer-events: none;
}

h1,h3,h2{
    color:white;
}

.container .box span::before
{
  content:'';
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 0;
  border-radius: 8px;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  opacity: 0;
  transition: 0.1s;  
  animation: animate 2s ease-in-out infinite;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08)
}

.container .box:hover span::before
{
  top: -50px;
  left: 50px;
  width: 100px;
  height: 100px;
  opacity: 1;
}

.container .box span::after
{
  content:'';
  position: absolute;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  border-radius: 8px;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  opacity: 0;
  transition: 0.5s;
  animation: animate 2s ease-in-out infinite;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
  animation-delay: -1s;
}

.container .box:hover span:after
{
  bottom: -50px;
  right: 50px;
  width: 100px;
  height: 100px;
  opacity: 1;
}

@keyframes animate
{
  0%, 100%
  {
    transform: translateY(10px);
  }
  
  50%
  {
    transform: translate(-10px);
  }
}

.container .box .content
{
  position: relative;
  left: 0;
  padding: 20px 40px;
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(10px);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  z-index: 1;
  transform: 0.5s;
  color: #fff;
}

.container .box:hover .content
{
  left: -25px;
  padding: 60px 40px;
}

.container .box .content h2
{
  font-size: 2em;
  color: #fff;
  margin-bottom: 10px;
}

.container .box .content p
{
  font-size: 1.1em;
  margin-bottom: 10px;
  line-height: 1.4em;
}

.container .box .content a
{
  display: inline-block;
  font-size: 1.1em;
  color: #111;
  background: #fff;
  padding: 10px;
  border-radius: 4px;
  text-decoration: none;
  font-weight: 700;
  margin-top: 5px;
}

.container .box .content a:hover
{
  background: #37A542;
  border: 1px solid rgba(255, 0, 88, 0.4);
  box-shadow: 0 1px 15px rgba(1, 1, 1, 0.2);
}
</style>