<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($users) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo'<div class="input-group mb-3">';
                    echo $this->Form->control('username',['type'=>'text' ,'class'=>'form-control','aria-label'=>'Username','aria-describedby'=>'basic-addon1']);
                    echo'</div>';
                    echo $this->Form->control('password',['type'=>'password' ,'class'=>'form-control','aria-label'=>'Username','aria-describedby'=>'basic-addon1']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
