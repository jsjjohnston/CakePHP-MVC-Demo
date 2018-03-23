<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Style[]|\Cake\Collection\CollectionInterface $style
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Style'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recipe'), ['controller' => 'Recipe', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipe', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="style index large-9 medium-8 columns content">
    <h3><?= __('Style') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('yeast_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($style as $style): ?>
            <tr>
                <td><?= $this->Number->format($style->id) ?></td>
                <td><?= h($style->yeast_name) ?></td>
                <td><?= h($style->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $style->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $style->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $style->id], ['confirm' => __('Are you sure you want to delete # {0}?', $style->id)]) ?>
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
