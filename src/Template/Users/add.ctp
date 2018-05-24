<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <h3><?= h('Create User') ?></h3>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('New User') ?></legend>
        <?php
            echo $this->Form->control('user_name');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            $session = $this->request->session();
            $user = $session->read('Auth.User');
            if(!empty($user) && $user['role'] == 'Admin') {
                echo $this->Form->control('role', [
                    'options' => ['Admin' => 'Admin', 'Author' => 'Author']
                    ]);
                }

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
