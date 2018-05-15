<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Yeast[]|\Cake\Collection\CollectionInterface $yeast
 */
?>
<div class="yeast index large-9 medium-8 columns content">
    <h3><?= __('Yeast') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('yeast_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attenuation_min') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attenuation_max') ?></th>
                <th scope="col"><?= $this->Paginator->sort('temperature_min') ?></th>
                <th scope="col"><?= $this->Paginator->sort('temperature_max') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($yeast as $yeast): ?>
            <tr>
                <td><?= h($yeast->yeast_name) ?></td>
                <td><?= h($yeast->type) ?></td>
                <td><?= $this->Number->format($yeast->attenuation_min) ?></td>
                <td><?= $this->Number->format($yeast->attenuation_max) ?></td>
                <td><?= $this->Number->format($yeast->temperature_min) ?></td>
                <td><?= $this->Number->format($yeast->temperature_max) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $yeast->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $yeast->id], ['confirm' => __('Are you sure you want to delete {0}?', $yeast->yeast_name)]) ?>
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
