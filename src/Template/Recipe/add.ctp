<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<div class="recipe form large-9 medium-8 columns content">
    <?= $this->Form->create($recipe) ?>
    <fieldset>
        <legend><?= __('Add Recipe') ?></legend>
        <?php
            echo $this->Form->control('recipe_name');
            echo $this->Form->control('batch_size');
            echo $this->Form->control('hops._ids', ['options' => $hops]);
            echo $this->Form->control('malt._ids', ['options' => $malt]);
            echo $this->Form->control('style._ids', ['options' => $style]);
            echo $this->Form->control('yeast._ids', ['options' => $yeast]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
