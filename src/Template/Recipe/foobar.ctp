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

            $usersOptions = array();
            foreach ($users as $user)
            array_push($usersOptions, ['text' => $user->user_name, 'value' => $user->id]);

            echo $this->Form->select('user_id', $usersOptions);

            $options = array();
            foreach ($hops as $hop)
            array_push($options, ['text' => $hop->hop_name, 'value' => $hop->id]);
            
            echo $this->Form->select('field', $options);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
