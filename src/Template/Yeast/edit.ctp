<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yeast $yeast
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $yeast->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $yeast->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Yeast'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Recipe'), ['controller' => 'Recipe', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipe', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="yeast form large-9 medium-8 columns content">
    <?= $this->Form->create($yeast) ?>
    <fieldset>
        <legend><?= __('Edit Yeast') ?></legend>
        <?php
            echo $this->Form->control('yeast_name');
            echo $this->Form->control('type');
            echo $this->Form->control('attenuation_min');
            echo $this->Form->control('attenuation_max');
            echo $this->Form->control('temperature_min');
            echo $this->Form->control('temperature_max');
            echo $this->Form->control('recipe._ids', ['options' => $recipe]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
