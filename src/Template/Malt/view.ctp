<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Malt $malt
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Malt'), ['action' => 'edit', $malt->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Malt'), ['action' => 'delete', $malt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $malt->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Malt'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Malt'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recipe'), ['controller' => 'Recipe', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipe', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="malt view large-9 medium-8 columns content">
    <h3><?= h($malt->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Malt Name') ?></th>
            <td><?= h($malt->malt_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($malt->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($malt->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specific Gravity') ?></th>
            <td><?= $this->Number->format($malt->specific_gravity) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Recipe') ?></h4>
        <?php if (!empty($malt->recipe)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Recipe Name') ?></th>
                <th scope="col"><?= __('Batch Size') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($malt->recipe as $recipe): ?>
            <tr>
                <td><?= h($recipe->id) ?></td>
                <td><?= h($recipe->recipe_name) ?></td>
                <td><?= h($recipe->batch_size) ?></td>
                <td><?= h($recipe->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recipe', 'action' => 'view', $recipe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recipe', 'action' => 'edit', $recipe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recipe', 'action' => 'delete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
