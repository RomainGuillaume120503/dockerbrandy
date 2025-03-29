<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Combine> $combine
 */
?>
<div class="combine index content">
    <?= $this->Html->link(__('New Combine'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('Terminer'), ['action' => 'terminer'], ['class' => 'btn btn-success']) ?>
    <h3><?= __('Combine') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('refUser') ?></th>
                    <th><?= $this->Paginator->sort('nbEcuParier') ?></th>
                    <th><?= $this->Paginator->sort('nbEcuGagner') ?></th>
                    <th><?= $this->Paginator->sort('cloture') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($combine as $combine): ?>
                <tr>
                    <td><?= $this->Number->format($combine->id) ?></td>
                    <td><?= $combine->refUser === null ? '' : $this->Number->format($combine->refUser) ?></td>
                    <td><?= $combine->nbEcuParier === null ? '' : $this->Number->format($combine->nbEcuParier) ?></td>
                    <td><?= $combine->nbEcuGagner === null ? '' : $this->Number->format($combine->nbEcuGagner) ?></td>
                    <td><?= h($combine->cloture) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $combine->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $combine->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $combine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $combine->id)]) ?>
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
