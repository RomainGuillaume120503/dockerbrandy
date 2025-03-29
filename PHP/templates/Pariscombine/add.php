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
$profsTable = TableRegistry::getTableLocator()->get('Profs'); 
$userIdentity = $this->request->getAttribute('identity'); 
$parisTable = TableRegistry::getTableLocator()->get('Pariscombine');
$infoParisEnCoursTable= TableRegistry::getTableLocator()->get('Paris');
$currentUrl = $_SERVER['REQUEST_URI'];
$path = parse_url($currentUrl, PHP_URL_PATH);
$lastPart = basename($path);
$chiffre = intval($lastPart);
$infoParisEnCours= $parisTable->find()->all();
?>
<?= $this->Form->create($pariscombine) ?>
<fieldset>
    <legend><?= __('Add Pariscombine') ?></legend>
    <div class="input">
        <?php
        echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
        foreach ($paris as $paris) {
            $idProf= $paris->prof_id;
            echo '<div class="col">';
            echo'<div class="card text-center">';
            echo  '<div class="card-header fs-4 p-4 bg-success bg-gradient text-white">'.$profsTable->findById($idProf)->first()->first_name . ' ' . $profsTable->findById($idProf)->first()->last_name.'</div>';
            echo  '<div class="card-body m2">';
            echo '<p class="card-text fs-5">'.'×'.$profsTable->findById($idProf)->first()->multiplicateur.'</p>';
            echo '<p class="card-text fs-5">'.$paris->course_hour.'</p>';
            echo '<div class="d-grid gap-2">';
            // Utilisez le champ de formulaire "time" pour entrer une heure
            echo $this->Form->hidden('pariscombine['.$paris->id.'][refCombine]', ['value' => $chiffre]);
            echo $this->Form->hidden('pariscombine['.$paris->id.'][refParis]', ['value' => $paris->id]);
            echo $this->Form->time('pariscombine['.$paris->id.'][heureParie]', ['empty' => true]);
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>'
        ?>
    </div>
</fieldset>
<br>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>
<?= $this->Form->end() ?>



