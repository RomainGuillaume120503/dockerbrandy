<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paris $paris
 * @var \Cake\Collection\CollectionInterface|string[] $profs
 */
use Cake\ORM\TableRegistry;
$profsTable = TableRegistry::getTableLocator()->get('Profs');
$allprof = $profsTable->find('list', [
    'keyField' => 'id',
    'valueField' => 'first_name'
]);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Paris'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="paris form content">
            <?= $this->Form->create($paris) ?>
            <fieldset>
                <legend><?= __('Add Paris') ?></legend>
                <?php
                    echo $this->Form->select('prof_id', $allprof, ['empty' => 'Sélectionner un utilisateur','class'=>'']);
                    echo $this->Form->control('course_hour', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
</style>