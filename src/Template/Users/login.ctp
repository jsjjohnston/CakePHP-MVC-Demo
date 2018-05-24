
<div class="users form large-9 medium-8 columns content">
<h3><?= h('Login User') ?></h3>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?php  echo $this->Html->link(__('Sign up'), ['controller'=>'users', 'action'=>'add'])?>
<?= $this->Form->end() ?>
</div>