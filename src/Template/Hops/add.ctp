<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hop $hop
 */
?>
<div class="hops form large-9 medium-8 columns content">
    <h3><?= h('Add Hop') ?></h3>
    <?= $this->Form->create($hop) ?>
    <fieldset>
        <legend><?= __('New Hop') ?></legend>
        <?php
            echo $this->Form->control('hop_name');
            echo $this->Form->control('type', ['options'=>['Pellet'=>'Pellet', 'Leaf'=>'Leaf']]);
            echo $this->Form->control('alpha_acid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
