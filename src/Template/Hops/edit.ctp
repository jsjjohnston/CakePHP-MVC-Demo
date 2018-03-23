<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hop $hop
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $hop->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $hop->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Hops'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Recipe'), ['controller' => 'Recipe', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipe', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hops form large-9 medium-8 columns content">
    <?= $this->Form->create($hop) ?>
    <fieldset>
        <legend><?= __('Edit Hop') ?></legend>
        <?php
            echo $this->Form->control('hop_name');
            echo $this->Form->control('type');
            echo $this->Form->control('alpha_acid');
            echo $this->Form->control('recipe._ids', ['options' => $recipe]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
