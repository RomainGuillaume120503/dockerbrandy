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

<H1>Explication du système de remise de gain</H1>
<h2>Table prof/cote</h2>
<?php

// Affichage des paris
$profs = $profsTable->find()->all();
    echo '<table style="width: 100%;">'; // Ajout du style pour définir la largeur du tableau principal
    echo '<tr>';
    echo '<th>Prenom</th>';
    echo '<th>Nom</th>';
    echo '<th>Multiplicateur</th>';
    echo '</tr>';
foreach ($profs as $prof) {
    echo '<tr>';
    echo '<td>' . $prof->first_name . '</td>';
    echo '<td>' . $prof->last_name . '</td>';
    echo '<td>' . $prof->multiplicateur . '</td>';
    echo '</tr>';
}

echo '</table>';

?>
<br><br>
<h2>Remise des gains</h2>

<p>Chaque prof a un multiplicateur le gain est dans le cas le plus basique nbEcuParié * multiplicateur du prof.</p>
<br>

<h3>Explication de la logique de la remise du gain du Site</h3>
<p>Entre heureJuste et heureJuste+1min59 : gain =multiplicateur*nbEcuParié</p>
<br><br>
<strong >Si votre pari dépasse 1min59 vous ne récuperer rien de votre mise.</strong>


