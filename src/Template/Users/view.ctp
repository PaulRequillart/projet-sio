<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('New Mark'), ['controller' => 'Marks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <div class="row">
        <h4>Profil de <?= h($user->prenom).' '.h($user->nom); ?></h4>
    </div>

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= h($user->id); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Classe') ?></th>
            <td><?= $user->has('group') ? $this->Html->link($user->group->label, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
    </table>
    
    <div class="related">
        
        <?php if (!empty($user->marks) && $user->group->label != 'admin' ): ?>
        <h4><?= __('Related Marks') ?></h4>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Label')?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('Module') ?></th>
            </tr>
            <?php foreach ($user->marks as $mark): ?>
            <tr>
                <td><?= h($mark->label) ?></td>
                <td><?= h($mark->value) ?></td>
                <td><?= h($mark->module_id) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
