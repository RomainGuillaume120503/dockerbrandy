<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pariscombine $pariscombine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pariscombine->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pariscombine->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pariscombine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pariscombine form content">
            <?= $this->Form->create($pariscombine) ?>
            <fieldset>
                <legend><?= __('Edit Pariscombine') ?></legend>
                <?php
                    echo $this->Form->control('refCombine');
                    echo $this->Form->control('refParis');
                    echo $this->Form->control('heureParie', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
