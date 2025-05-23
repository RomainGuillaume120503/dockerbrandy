<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Historique $historique
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $historique->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $historique->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Historique'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="historique form content">
            <?= $this->Form->create($historique) ?>
            <fieldset>
                <legend><?= __('Edit Historique') ?></legend>
                <?php
                    echo $this->Form->control('ref_users');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
