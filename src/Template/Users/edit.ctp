<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <h3><?= __('Edit User') ?></h3>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Modify Existing User: ') ?><?= $user->user_name ?></legend>
        <?php
            echo $this->Form->control('user_name');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
