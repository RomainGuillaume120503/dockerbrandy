<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paris $paris
 * @var string[]|\Cake\Collection\CollectionInterface $profs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paris->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paris->id), 'class' => 'side-nav-item']
            ) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="paris form content">
            <?= $this->Form->create($paris) ?>
            <fieldset>
                <legend><?= __('Edit Paris') ?></legend>
                <?php
                    echo $this->Form->control('prof_id', ['options' => $profs, 'empty' => true]);
                    echo $this->Form->control('course_hour', ['empty' => true]);
                    echo $this->Form->control('arrival_hour', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
