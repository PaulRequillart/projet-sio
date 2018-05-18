<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="container no-border">

<h3 class="centerh">Formation : <?= h($user->group->label); ?></h3>
<div>
    <h4>Liste des élèves : </h4>

    <?php 
    if(!empty($group->users)): ?>
        <table cellpadding="0" cellspacing="0" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"><?= __('Nom') ?></th>
                    <th scope="col"><?= __('Prenom') ?></th>
                    <th scope="col"><?= __('Email') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($group->users as $usergroup): ?>
                <tr>
                    <td><?= h($usergroup->nom) ?></td>
                    <td><?= h($usergroup->prenom) ?></td>
                    <td><?= $this->Text->autoLinkEmails(h($usergroup->email)) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun élève dans cette classe.</p>
    <?php endif; ?>

