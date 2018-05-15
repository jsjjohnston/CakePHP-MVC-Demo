<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hop[]|\Cake\Collection\CollectionInterface $hops
 */
?>
<div class="hops index large-9 medium-8 columns content">
    <h3><?= __('Hops') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Database id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hop_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alpha_acid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hops as $hop): ?>
            <tr>
                <td><?= $this->Number->format($hop->id) ?></td>
                <td><?= h($hop->hop_name) ?></td>
                <td><?= h($hop->type) ?></td>
                <td><?= $this->Number->format($hop->alpha_acid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hop->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hop->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hop->id)]) ?>
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
