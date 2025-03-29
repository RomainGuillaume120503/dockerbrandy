<?php
use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Combine $combine
 */
$userIdentity = $this->request->getAttribute('identity');
$usersTable = TableRegistry::getTableLocator()->get('Users');
?>
<H1><?= $userIdentity->username ?></H1>

<h2>Solde : <?= $usersTable->findById($userIdentity->id)->first()->ecu ?> Ecus</h2>
<div class="row">
    <div class="column-responsive column-80">
        <div class="combine form content">
            <?= $this->Form->create($combine) ?>
            <fieldset>
                <legend><?= __('Add Combine') ?></legend>
                <?php
                    echo $this->Form->control('nbEcuParier');
                ?>
            </fieldset>
            <p class="fs-5">Pour sélectionner les paris du combiné appuyez sur submit:</p>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
