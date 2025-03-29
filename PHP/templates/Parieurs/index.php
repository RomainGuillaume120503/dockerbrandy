<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Parieurs> $parieurs
 */
?>
<div class="parieurs index content">
    <?= $this->Html->link(__('New Parieurs'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Parieurs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('paris_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('nbEcuParier') ?></th>
                    <th><?= $this->Paginator->sort('nbEcuGagne') ?></th>
                    <th><?= $this->Paginator->sort('heure_estimee') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parieurs as $parieurs): ?>
                <tr>
                    <td><?= $this->Number->format($parieurs->id) ?></td>
                    <td><?= $parieurs->has('paris') ? $this->Html->link($parieurs->paris->id, ['controller' => 'Paris', 'action' => 'view', $parieurs->paris->id]) : '' ?></td>
                    <td><?= $parieurs->has('users') ? $this->Html->link($parieurs->users->id, ['controller' => 'Users', 'action' => 'view', $parieurs->users->id]) : '' ?></td>
                    <td><?= $this->Number->format($parieurs->nbEcuParier) ?></td>
                    <td><?= $parieurs->nbEcuGagne === null ? '' : $this->Number->format($parieurs->nbEcuGagne) ?></td>
                    <td><?= h($parieurs->heure_estimee) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $parieurs->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parieurs->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parieurs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parieurs->id)]) ?>
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
