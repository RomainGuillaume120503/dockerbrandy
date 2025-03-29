<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paristextuelle $paristextuelle
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="paristextuelle view content">
            <h3><?= h($paristextuelle->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Texte') ?></th>
                    <td><?= h($paristextuelle->texte) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($paristextuelle->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('IdCreateur') ?></th>
                    <td><?= $paristextuelle->idCreateur === null ? '' : $this->Number->format($paristextuelle->idCreateur) ?></td>
                </tr>
                <tr>
                    <th><?= __('EstValide') ?></th>
                    <td><?= $paristextuelle->estValide ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
