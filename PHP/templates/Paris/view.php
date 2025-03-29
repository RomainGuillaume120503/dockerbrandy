<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paris $paris
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="paris view content">
            <h3><?= h($paris->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Profs') ?></th>
                    <td><?= $paris->has('profs') ? $this->Html->link($paris->profs->id, ['controller' => 'Profs', 'action' => 'view', $paris->profs->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($paris->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Course Hour') ?></th>
                    <td><?= h($paris->course_hour) ?></td>
                </tr>
                <tr>
                    <th><?= __('Arrival Hour') ?></th>
                    <td><?= h($paris->arrival_hour) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Parieurs') ?></h4>
                <?php if (!empty($paris->parieurs)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Paris Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('NbEcuParier') ?></th>
                            <th><?= __('NbEcu') ?></th>
                            <th><?= __('Gagner') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($paris->parieurs as $parieurs) : ?>
                        <tr>
                            <td><?= h($parieurs->id) ?></td>
                            <td><?= h($parieurs->paris_id) ?></td>
                            <td><?= h($parieurs->user_id) ?></td>
                            <td><?= h($parieurs->nbEcuParier) ?></td>
                            <td><?= h($parieurs->nbEcu) ?></td>
                            <td><?= h($parieurs->gagner) ?></td>
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
