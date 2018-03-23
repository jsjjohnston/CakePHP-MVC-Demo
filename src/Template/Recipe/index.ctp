<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe[]|\Cake\Collection\CollectionInterface $recipe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['action' => 'add']) ?></li>
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
<div class="recipe index large-9 medium-8 columns content">
    <h3><?= __('Recipe') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recipe_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('batch_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recipe as $recipe): ?>
            <tr>
                <td><?= $this->Number->format($recipe->id) ?></td>
                <td><?= h($recipe->recipe_name) ?></td>
                <td><?= $this->Number->format($recipe->batch_size) ?></td>
                <td><?= $recipe->has('user') ? $this->Html->link($recipe->user->id, ['controller' => 'Users', 'action' => 'view', $recipe->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recipe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recipe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
