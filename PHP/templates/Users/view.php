<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ecu') ?></th>
                    <td><?= $this->Number->format($user->ecu) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Parieurs') ?></h4>
                <?php if (!empty($user->parieurs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Paris Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->parieurs as $parieurs) : ?>
                        <tr>
                            <td><?= h($parieurs->id) ?></td>
                            <td><?= h($parieurs->paris_id) ?></td>
                            <td><?= h($parieurs->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Parieurs', 'action' => 'view', $parieurs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Parieurs', 'action' => 'edit', $parieurs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parieurs', 'action' => 'delete', $parieurs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parieurs->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
