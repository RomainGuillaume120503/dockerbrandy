<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Profs> $profs
 */
?>
<div class="profs index content">
    <?= $this->Html->link(__('New Profs'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Profs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('multiplicateur') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profs as $profs): ?>
                <tr>
                    <td><?= $this->Number->format($profs->id) ?></td>
                    <td><?= h($profs->first_name) ?></td>
                    <td><?= h($profs->last_name) ?></td>
                    <td><?= $this->Number->format($profs->multiplicateur) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $profs->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $profs->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profs->id)]) ?>
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
