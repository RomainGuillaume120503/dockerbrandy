<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parieurtextuelle $parieurtextuelle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Parieurtextuelle'), ['action' => 'edit', $parieurtextuelle->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Parieurtextuelle'), ['action' => 'delete', $parieurtextuelle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parieurtextuelle->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Parieurtextuelle'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Parieurtextuelle'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="parieurtextuelle view content">
            <h3><?= h($parieurtextuelle->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($parieurtextuelle->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('RefParisText') ?></th>
                    <td><?= $parieurtextuelle->refParisText === null ? '' : $this->Number->format($parieurtextuelle->refParisText) ?></td>
                </tr>
                <tr>
                    <th><?= __('RefUsers') ?></th>
                    <td><?= $parieurtextuelle->refUsers === null ? '' : $this->Number->format($parieurtextuelle->refUsers) ?></td>
                </tr>
                <tr>
                    <th><?= __('Choix') ?></th>
                    <td><?= $parieurtextuelle->choix ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
