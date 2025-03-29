<?php
use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

$userIdentity = $this->request->getAttribute('identity');
$usersTable =TableRegistry::getTableLocator()->get('Users');
$parisTable = TableRegistry::getTableLocator()->get('Paris');
$parieursTable = TableRegistry::getTableLocator()->get('Parieurs');
$profsTable = TableRegistry::getTableLocator()->get('Profs');


/*echo '<td colspan="2">'; // Utilisation de colspan pour occuper toutes les colonnes
    echo '<table class="center-table" style="width: 100%;">'; // Ajout du style et de la classe pour définir la largeur du sous-tableau
    echo '<tr>';
    echo '<th>Pseudo</th>';
    echo '<th>Heure parié</th>';
    echo '<th>nEcu parié</th>';
    echo '<th>Moyenne(nbEcuGagné-nbEcuParié)</th>';   
    echo '</tr>';
    $parieurs = $parieursTable->findByParis_id($id)->all();
    foreach($parieurs as $parieur){
        echo '<tr>';
        echo '<td>'.htmlentities($usersTable->findById($parieur->user_id)->first()->username).'</td>';
        echo '<td>'.$parieur->heure_estimee.'</td>';
        echo '<td>'.$parieur->nbEcuParier.'</td>';
        echo '<td>' . ($parieur->nbEcuGagne !== null ? $parieur->nbEcuGagne - $parieur->nbEcuParier : '') . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</td>';
    echo '</tr>';
    echo'<br><br>';*/
    $parieurs = $parieursTable->findByParis_id($id)->all();
    echo '<table class="table  table-responsive  table-striped"> <thead>
    <tr>
      <th class="fs-4" scope="col">Pseudo</th>
      <th class="fs-4 "scope="col">Heure parié</th>
      <th class="fs-4 "scope="col">Ecu parié</th>
      <th class="fs-4 "scope="col">Moyenne</th>
    </tr>
    </thead><tbody>';
    $i=1;
    foreach ($parieurs as $parieur) {
        /*echo '<tr>';
        echo '<td>' .$i. '</td>';
        echo '<td>' .htmlentities($user->username). '</td>';
        echo '<td>' .$user->ecu. '</td>';
        echo '</tr>';*/
        echo'<tr>';
        echo '<td class="fs-5">'.htmlentities($usersTable->findById($parieur->user_id)->first()->username).'</td>';
        echo '<td class="fs-5">'.$parieur->heure_estimee.'</td>';
        echo '<td class="fs-5">'.$parieur->nbEcuParier.'</td>';
        echo '<td class="fs-5">'.($parieur->nbEcuGagne !== null ? $parieur->nbEcuGagne - $parieur->nbEcuParier : '') .'</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
    //echo '</table>';

    
?>
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box; 
}
        main {
            padding: 2em;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            min-width: 100%;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        th {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 2;
        }   
        tr:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        th, td {
            color: #fff;
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
    z-index: -1;
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
h1,p{
    color: #fff;
}
    </style>
