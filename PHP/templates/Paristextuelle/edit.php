<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paristextuelle $paristextuelle
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="paristextuelle form content">
            <?= $this->Form->create($paristextuelle) ?>
            <fieldset>
                <legend><?= __('Edit Paristextuelle') ?></legend>
                <?php
                    echo $this->Form->control('texte',['type'=>'text', 'class'=>'form-control' ,'aria-label'=>'Sizing example input' ,'aria-describedby'=>'inputGroup-sizing-default']);
                    echo $this->Form->control('estValide',['class'=>'form-check-input','type'=>'checkbox', 'role'=>'switch','id'=>'flexSwitchCheckDefault']);
                    echo $this->Form->control('idCreateur',);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
