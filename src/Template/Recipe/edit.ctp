<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recipe->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Recipe'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hops'), ['controller' => 'Hops', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hop'), ['controller' => 'Hops', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Malt'), ['controller' => 'Malt', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Malt'), ['controller' => 'Malt', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Style'), ['controller' => 'Style', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Style'), ['controller' => 'Style', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Yeast'), ['controller' => 'Yeast', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Yeast'), ['controller' => 'Yeast', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recipe form large-9 medium-8 columns content">
    <?= $this->Form->create($recipe) ?>
    <fieldset>
        <legend><?= __('Edit Recipe') ?></legend>
        <?php
            echo $this->Form->control('recipe_name');
            echo $this->Form->control('batch_size');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('hops._ids', ['options' => $hops]);
            echo $this->Form->control('malt._ids', ['options' => $malt]);
            echo $this->Form->control('style._ids', ['options' => $style]);
            echo $this->Form->control('yeast._ids', ['options' => $yeast]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
