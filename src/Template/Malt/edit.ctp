<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Malt $malt
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $malt->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $malt->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Malt'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Recipe'), ['controller' => 'Recipe', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipe', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="malt form large-9 medium-8 columns content">
    <?= $this->Form->create($malt) ?>
    <fieldset>
        <legend><?= __('Edit Malt') ?></legend>
        <?php
            echo $this->Form->control('malt_name');
            echo $this->Form->control('type');
            echo $this->Form->control('specific_gravity');
            echo $this->Form->control('recipe._ids', ['options' => $recipe]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
