<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Transfert> $transfert
 */
?>
<div class="transfert index content">
    <?= $this->Html->link(__('New Transfert'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transfert') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_donneur') ?></th>
                    <th><?= $this->Paginator->sort('user_receveur') ?></th>
                    <th><?= $this->Paginator->sort('montant') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transfert as $transfert): ?>
                <tr>
                    <td><?= $this->Number->format($transfert->id) ?></td>
                    <td><?= $transfert->user_donneur === null ? '' : $this->Number->format($transfert->user_donneur) ?></td>
                    <td><?= $transfert->user_receveur === null ? '' : $this->Number->format($transfert->user_receveur) ?></td>
                    <td><?= $transfert->montant === null ? '' : $this->Number->format($transfert->montant) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transfert->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transfert->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transfert->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transfert->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
