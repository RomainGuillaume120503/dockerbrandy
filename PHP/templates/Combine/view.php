<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Combine $combine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Combine'), ['action' => 'edit', $combine->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Combine'), ['action' => 'delete', $combine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $combine->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Combine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Combine'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="combine view content">
            <h3><?= h($combine->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($combine->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('RefUser') ?></th>
                    <td><?= $combine->refUser === null ? '' : $this->Number->format($combine->refUser) ?></td>
                </tr>
                <tr>
                    <th><?= __('NbEcuParier') ?></th>
                    <td><?= $combine->nbEcuParier === null ? '' : $this->Number->format($combine->nbEcuParier) ?></td>
                </tr>
                <tr>
                    <th><?= __('NbEcuGagner') ?></th>
                    <td><?= $combine->nbEcuGagner === null ? '' : $this->Number->format($combine->nbEcuGagner) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cloture') ?></th>
                    <td><?= $combine->cloture ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
