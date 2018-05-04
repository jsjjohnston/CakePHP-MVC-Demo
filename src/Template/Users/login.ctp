<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?php  echo $this->Html->link(
    '<br>Sign up',
    array('controller'=>'users', 'action'=>'add'),
    array('escape' => FALSE)
); ?>
<?= $this->Form->end() ?>