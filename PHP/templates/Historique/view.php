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
            <?= $this->Html->link(__('Edit Historique'), ['action' => 'edit', $historique->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Historique'), ['action' => 'delete', $historique->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historique->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Historique'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Historique'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="historique view content">
            <h3><?= h($historique->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($historique->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($historique->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Users') ?></th>
                    <td><?= $historique->ref_users === null ? '' : $this->Number->format($historique->ref_users) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
