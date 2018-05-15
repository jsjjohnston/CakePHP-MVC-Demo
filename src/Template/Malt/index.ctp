<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Malt[]|\Cake\Collection\CollectionInterface $malt
 */
?>
<div class="malt index large-9 medium-8 columns content">
    <h3><?= __('Malt') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Database id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('malt_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specific_gravity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($malt as $malt): ?>
            <tr>
                <td><?= $this->Number->format($malt->id) ?></td>
                <td><?= h($malt->malt_name) ?></td>
                <td><?= h($malt->type) ?></td>
                <td><?= $this->Number->format($malt->specific_gravity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $malt->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $malt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $malt->id)]) ?>
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
