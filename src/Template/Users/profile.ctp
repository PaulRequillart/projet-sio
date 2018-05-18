<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
    <h4 class="centerh">Informations personnelles</h3>
    <p>Bienvenue <span><?= h($user->prenom).' '.h($user->nom); ?></span></p>


    <div class="infos">
    
        <p>Nom d'utilisateur : <span><?= h($user->username) ?></span></p>
        <p>Adresse email : <span><?= h($user->email) ?></span></p>
        <p>Formation : <span><?= $user->has('group') ? $this->Html->link($user->group->label, ['controller' => 'Users', 'action' => 'groupe']) : '' ?></span></p>
        <p>Création du compte le : <span><?= date_format($user->created, 'd/m/Y') ?> à <?=date_format($user->created, 'H:i:s')?></span></p>
        
    </div>
</div>

<div class="container no-border center">
    <div class="title">
        <?= $this->Html->link(__('Changer l\'adresse mail'), ['action' => 'editEmail'], ['class'=>'bouton-profil']) ?>
        <?= $this->Html->link(__('Changer votre mot de passe'), ['action' => 'edit', $user->id], ['class'=>'bouton-profil']) ?>
        <?= $this->Html->link(__('Signaler un problème'), ['action' => 'edit', $user->id], ['class'=>'bouton-profil']) ?>
    </div>
</div>
    
    
   

