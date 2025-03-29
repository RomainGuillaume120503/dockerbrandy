<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parieurtextuelle $parieurtextuelle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $parieurtextuelle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $parieurtextuelle->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Parieurtextuelle'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="parieurtextuelle form content">
            <?= $this->Form->create($parieurtextuelle) ?>
            <fieldset>
                <legend><?= __('Edit Parieurtextuelle') ?></legend>
                <?php
                    echo $this->Form->control('refParisText');
                    echo $this->Form->control('refUsers');
                    echo $this->Form->control('choix');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
