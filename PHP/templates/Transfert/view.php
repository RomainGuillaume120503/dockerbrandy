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
            <?= $this->Html->link(__('Edit Transfert'), ['action' => 'edit', $transfert->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transfert'), ['action' => 'delete', $transfert->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transfert->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transfert'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transfert'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transfert view content">
            <h3><?= h($transfert->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transfert->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Donneur') ?></th>
                    <td><?= $transfert->user_donneur === null ? '' : $this->Number->format($transfert->user_donneur) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Receveur') ?></th>
                    <td><?= $transfert->user_receveur === null ? '' : $this->Number->format($transfert->user_receveur) ?></td>
                </tr>
                <tr>
                    <th><?= __('Montant') ?></th>
                    <td><?= $transfert->montant === null ? '' : $this->Number->format($transfert->montant) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
