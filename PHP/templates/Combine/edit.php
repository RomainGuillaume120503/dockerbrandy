<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Combine $combine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $combine->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $combine->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Combine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="combine form content">
            <?= $this->Form->create($combine) ?>
            <fieldset>
                <legend><?= __('Edit Combine') ?></legend>
                <?php
                    echo $this->Form->control('refUser');
                    echo $this->Form->control('nbEcuParier');
                    echo $this->Form->control('nbEcuGagner');
                    echo $this->Form->control('cloture');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
