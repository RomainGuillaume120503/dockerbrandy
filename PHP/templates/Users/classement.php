<?php
use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

$userIdentity = $this->request->getAttribute('identity');
$usersTable =TableRegistry::getTableLocator()->get('Users');
$parisTable = TableRegistry::getTableLocator()->get('Paris');
$parieursTable = TableRegistry::getTableLocator()->get('Parieurs');
$profsTable = TableRegistry::getTableLocator()->get('Profs');

?>
<?php

$users = $usersTable->find()
    ->where(['NOT' => ['id IN' => [1, 41]]])
    ->order(['ecu' => 'DESC']);

$i=1;
echo '<div class="box">
<h3>Classement Utilisateurs</h3>';
foreach ($users as $user) {
    echo '<div class="list">
        <div class="cnt">
            <h2 class="rank"><small></small>'.$user->ecu.'</h2>
            <h4>'.$i.'</h4>
            <p>'.htmlentities($user->username).'</p>
        </div>
    </div>';
    $i=$i+1;
}
echo '</div>';
?>
<img src="<?= $this->Url->image('edna.png', ['fullBase' => true]) ?>" class="edna">

<style>
  .edna{
	width:8em;
	position:absolute;
	top:40%;
	transform:translate(-350px,-220px);
  }
    *{
        margin:0;
        padding: 0;
        box-sizing: border-box;
    }
  BODY{
background: #161623;
  }
    main{
        position:  relative;
        background: #161623;
        min-height: 100vh;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    main::before{
        content: '';
        position: absolute;
        width: 30em;
        height: 30em;
        background: linear-gradient(#ffc107,#e91e63);
        border-radius: 50%;
        transform:translate(-350px,-220px);
    }
  .header,ul { background: rgba(255,255,255,0.13); }
    main::after{
        content: '';
        position: absolute;
        width: 30em;
        height: 30em;
        background: linear-gradient(#2196f3,#31ff38);
        border-radius: 50%;
        transform:translate(250px,120px);
    }
    .box{
        position: relative;
        min-width: 350px;
        min-height: 400px;
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 25px 45px rgba(0,0,0,0.1);
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-right: 1px solidrgba(255, 255, 255, 0.2);
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        z-index: 10;
        padding: 20px;
        backdrop-filter: blur(25px);
    }
    .box h3{
        color: #fff;
        margin-bottom: 20px;
        font-size: 2em;

    }
    .box .list{
        position: relative;
        display: flex;
        padding: 10px 0;
        background: rgba(0,0,0,0.1);
        border-radius: 10px;
        margin: 10px 0;
        cursor: pointer;
        transition: 0.5s;
        overflow: hidden;
    }
    .box .list:hover{
        background-color:#fff;
        box-shadow: -15px 30px 50px rgba(0,0,0,0.5) ;
        transform: scale(1.05) translateX(15px) translateY(-15px);
        z-index: 1000;
    }
    .box .list .cnt{
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;

    }
    .box .list .cnt .rank{
        position: absolute;
        right: -93px;
        color: #2196f3;
        transition: 0.5s;
        font-size: 2em;
    }
    .box .list .cnt .rank small{
        font-weight: 500;
        opacity: 0.25;
    }
    .box .list:hover .cnt .rank{
        right: 20px;
    }
    .box .list .cnt h4 {
    padding-left: 0.5em;
    line-height: 1.2em;
    color:#fff;
    font-weight:  600;
    font-size: 1.5rem;
    transition: 0.5s;       
    }
    .box .list .cnt p {
    padding-left:0.5em;
    font-size: 1.05em;
    transition: 0.5s;       
    }
    .box .list:hover .cnt h4,
    .box .list:hover .cnt p {
        color: #333;
    }
  @media (max-width: 350px) {
	.box .list:hover .cnt .rank{
        right: 40px;
    }
  	.box .list{
        position: relative;
        display: flex;
        padding: 10px 0;
        background: rgba(0,0,0,0.1);
        border-radius: 10px;
        margin: 5px;
        cursor: pointer;
        transition: 0.5s;
        overflow: hidden;
    }
  }
</style>