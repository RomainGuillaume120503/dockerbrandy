<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parieurs $parieurs
 * @var string[]|\Cake\Collection\CollectionInterface $paris
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $parieurs->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $parieurs->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Parieurs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="parieurs form content">
            <?= $this->Form->create($parieurs) ?>
            <fieldset>
                <legend><?= __('Edit Parieurs') ?></legend>
                <?php
                    echo $this->Form->control('paris_id', ['options' => $paris, 'empty' => true]);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('nbEcuParier');
                    echo $this->Form->control('nbEcuGagne');
                    echo $this->Form->control('heure_estimee');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
