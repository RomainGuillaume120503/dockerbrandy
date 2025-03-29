<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Parieurtextuelle> $parieurtextuelle
 */
?>
<div class="parieurtextuelle index content">
    <?= $this->Html->link(__('New Parieurtextuelle'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Parieurtextuelle') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('refParisText') ?></th>
                    <th><?= $this->Paginator->sort('refUsers') ?></th>
                    <th><?= $this->Paginator->sort('choix') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parieurtextuelle as $parieurtextuelle): ?>
                <tr>
                    <td><?= $this->Number->format($parieurtextuelle->id) ?></td>
                    <td><?= $parieurtextuelle->refParisText === null ? '' : $this->Number->format($parieurtextuelle->refParisText) ?></td>
                    <td><?= $parieurtextuelle->refUsers === null ? '' : $this->Number->format($parieurtextuelle->refUsers) ?></td>
                    <td><?= h($parieurtextuelle->choix) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $parieurtextuelle->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parieurtextuelle->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parieurtextuelle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parieurtextuelle->id)]) ?>
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
