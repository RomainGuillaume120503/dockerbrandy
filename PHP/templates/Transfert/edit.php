<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transfert $transfert
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transfert->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transfert->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Transfert'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transfert form content">
            <?= $this->Form->create($transfert) ?>
            <fieldset>
                <legend><?= __('Edit Transfert') ?></legend>
                <?php
                    echo $this->Form->control('user_donneur');
                    echo $this->Form->control('user_receveur');
                    echo $this->Form->control('montant');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
