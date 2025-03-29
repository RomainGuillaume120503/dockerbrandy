<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profs $profs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Profs'), ['action' => 'edit', $profs->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Profs'), ['action' => 'delete', $profs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profs->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Profs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Profs'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="profs view content">
            <h3><?= h($profs->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($profs->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($profs->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($profs->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Multiplicateur') ?></th>
                    <td><?= $this->Number->format($profs->multiplicateur) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
