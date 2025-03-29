<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pariscombine $pariscombine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pariscombine'), ['action' => 'edit', $pariscombine->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pariscombine'), ['action' => 'delete', $pariscombine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pariscombine->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pariscombine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pariscombine'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pariscombine view content">
            <h3><?= h($pariscombine->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pariscombine->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('RefCombine') ?></th>
                    <td><?= $pariscombine->refCombine === null ? '' : $this->Number->format($pariscombine->refCombine) ?></td>
                </tr>
                <tr>
                    <th><?= __('RefParis') ?></th>
                    <td><?= $pariscombine->refParis === null ? '' : $this->Number->format($pariscombine->refParis) ?></td>
                </tr>
                <tr>
                    <th><?= __('HeureParie') ?></th>
                    <td><?= h($pariscombine->heureParie) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
