<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Style[]|\Cake\Collection\CollectionInterface $style
 */
?>
<div class="style index large-9 medium-8 columns content">
    <h3><?= __('Style') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($style as $style): ?>
            <tr>
                <td><?= h($style->name) ?></td>
                <td><?= h($style->type) ?></td>
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
