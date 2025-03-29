<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parieurs $parieurs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Parieurs'), ['action' => 'edit', $parieurs->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Parieurs'), ['action' => 'delete', $parieurs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parieurs->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Parieurs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Parieurs'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="parieurs view content">
            <h3><?= h($parieurs->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Paris') ?></th>
                    <td><?= $parieurs->has('paris') ? $this->Html->link($parieurs->paris->id, ['controller' => 'Paris', 'action' => 'view', $parieurs->paris->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Users') ?></th>
                    <td><?= $parieurs->has('users') ? $this->Html->link($parieurs->users->id, ['controller' => 'Users', 'action' => 'view', $parieurs->users->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($parieurs->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('NbEcuParier') ?></th>
                    <td><?= $this->Number->format($parieurs->nbEcuParier) ?></td>
                </tr>
                <tr>
                    <th><?= __('NbEcuGagne') ?></th>
                    <td><?= $parieurs->nbEcuGagne === null ? '' : $this->Number->format($parieurs->nbEcuGagne) ?></td>
                </tr>
                <tr>
                    <th><?= __('Heure Estimee') ?></th>
                    <td><?= h($parieurs->heure_estimee) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
