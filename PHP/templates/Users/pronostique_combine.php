<?php
use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

$userIdentity = $this->request->getAttribute('identity');
$usersTable = TableRegistry::getTableLocator()->get('Users');
$parisTable = TableRegistry::getTableLocator()->get('Paris');
$parisCombineTable = TableRegistry::getTableLocator()->get('Pariscombine');
$combineTable = TableRegistry::getTableLocator()->get('Combine');
$profsTable = TableRegistry::getTableLocator()->get('Profs');

$currentUrl = $_SERVER['REQUEST_URI'];
$path = parse_url($currentUrl, PHP_URL_PATH);
$lastPart = basename($path);
$chiffre = intval($lastPart);

$parisCombine = $parisCombineTable->findByRefcombine($chiffre)->all();
foreach ($parisCombine as $pariCombine) {
    $pari = $parisTable->findById($pariCombine->refParis)->first(); 
    $idProf = $pari->prof_id;
    echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
    echo '<div class="col">';
    echo '<div class="card text-center">';
    echo '<div class="card-header fs-4 p-4 bg-success bg-gradient text-white">' . $profsTable->findById($idProf)->first()->first_name . ' ' . $profsTable->findById($idProf)->first()->last_name . '</div>';
    echo '<div class="card-body m2">';
    echo '<p class="card-text fs-5">' . '×' . $profsTable->findById($idProf)->first()->multiplicateur . '</p>';
    echo '<p class="card-text fs-5">' . $pari->course_hour . '</p>';
    echo '<div class="d-grid gap-2">';
    echo '<div class="card-footer text-body-secondary">';
    echo '<p class:"fs-5">heure parié :'.$pariCombine->heureParie.'</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

?>
