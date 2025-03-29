<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Historique> $historique
 */
?>
<div class="historique index content">
    <?= $this->Html->link(__('New Historique'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Historique') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ref_users') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historique as $historique): ?>
                <tr>
                    <td><?= $this->Number->format($historique->id) ?></td>
                    <td><?= $historique->ref_users === null ? '' : $this->Number->format($historique->ref_users) ?></td>
                    <td><?= h($historique->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $historique->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $historique->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $historique->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historique->id)]) ?>
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
