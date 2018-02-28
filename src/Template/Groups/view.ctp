<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="groups view large-9 medium-8 columns content">

    <?= $this->Text->autoParagraph(h($group->label)); ?>

    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($group->users)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Nom') ?></th>
                    <th scope="col"><?= __('Prenom') ?></th>
                </tr>
                <?php foreach ($group->users as $users): ?>
                <tr>
                    <td><?= h($users->nom) ?></td>
                    <td><?= h($users->prenom) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aucun élève dans cette classe.</p>
        <?php endif; ?>
    </div>
</div>
