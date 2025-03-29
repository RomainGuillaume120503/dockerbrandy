<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pariscombine> $pariscombine
 */
?>
<div class="pariscombine index content">
    <?= $this->Html->link(__('New Pariscombine'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    <h3><?= __('Pariscombine') ?></h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('refCombine') ?></th>
                    <th><?= $this->Paginator->sort('refParis') ?></th>
                    <th><?= $this->Paginator->sort('heureParie') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pariscombine as $pariscombine): ?>
                <tr>
                    <td><?= $this->Number->format($pariscombine->id) ?></td>
                    <td><?= $pariscombine->refCombine === null ? '' : $this->Number->format($pariscombine->refCombine) ?></td>
                    <td><?= $pariscombine->refParis === null ? '' : $this->Number->format($pariscombine->refParis) ?></td>
                    <td><?= h($pariscombine->heureParie) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pariscombine->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pariscombine->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pariscombine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pariscombine->id)]) ?>
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

