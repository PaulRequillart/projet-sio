<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<div class="">
    <div class="title">
        <h3 style="margin-left:15px"><?= __('Professeurs') ?></h3>
        <?= $this->Html->link(__('Ajouter un prof'), ['action' => 'add'], ['style' => 'margin-left:15px']) ?>

        <hr>
        
    </div>
    <table class="" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Prenom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profil') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <?php if($user->role == 'professeur' && $user->group != 'admin'){ ?>
            <tr>
                <td><?= h($user->nom) ?></td>
                <td><?= h($user->prenom) ?></td>
                <td><?= $user->has('group') ? $this->Html->link($user->group->label, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
                <td><?= h($user->modified) ?></td>
                <td><?= $this->Html->link('voir', ['controller' => 'Users', 'action' => 'view', $user->id]) ?>
            </tr>
            <?php } ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
