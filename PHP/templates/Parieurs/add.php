<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parieurs $parieurs
 * @var \Cake\Collection\CollectionInterface|string[] $paris
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

$userIdentity = $this->request->getAttribute('identity');
$parisTable = TableRegistry::getTableLocator()->get('Paris');
$usersTable = TableRegistry::getTableLocator()->get('users');
$currentUrl = $_SERVER['REQUEST_URI'];
$path = parse_url($currentUrl, PHP_URL_PATH);
$lastPart = basename($path);
$chiffre = intval($lastPart);
// Vérifier si la requête renvoie un résultat
$paris = $parisTable->findById($chiffre)->first();
$profsTable = TableRegistry::getTableLocator()->get('Profs');
$prof= $profsTable->findById($paris->prof_id)->first();
$multiplicateur =$prof->multiplicateur;

?>
<H1>Bonjour <?= $userIdentity->username ?></H1>

<h2>Solde : <?= $usersTable->findById($userIdentity->id)->first()->ecu ?> Ecus</h2>

<br>
<div class="row">
    <div class="column-responsive column-80">
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
        <div class="parieurs form ">
            <?= $this->Form->create($parieurs) ?>
            <fieldset>
				<h3 class="fs-3"><?= 'Heure du cours: '.$paris->course_hour?></h3>
                <?php
                    echo $this->Form->control('nbEcuParier', ['onchange' => 'visualisationGain(this.value)']);
					echo 'minimum a parier 20 Ecus';
					echo '<span id="gain" class="fs-5"></span>';
					echo '<br>';
					echo '<br>';
                    echo $this->Form->control('heure_estimee');
                ?>
            </fieldset>
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>
                <?= $this->Form->end() ?>
        </div>

	<script>
    	function visualisationGain(valeur) {
		  var mypspan = document.getElementById('gain');
		  let resultat =(valeur * <?= $multiplicateur ?>)
		  mypspan.innerHTML = 'Gain potentiel:' +  Math.trunc(resultat);
   		}
        
	</script>
    </div>
</div>

<style>
    *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
.header,ul {
    background: rgba(255,255,255,0.13);
}

form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *,h2,h1{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
</style>
