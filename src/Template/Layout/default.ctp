<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Univ\'info';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Univ'Info</title>
    <?= $this->Html->meta('icon') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name"><h1><?= $this->Html->link('Accueil', ['controller'=>'Pages', 'action'=>'display'])?></h1><li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">

            <!-- MENU ADMIN -->
            
            <?php
                if($this->request->session()->check('Auth.User')){
                    $role = $this->request->session()->read('Auth.User.role');
                    if($role == 'admin'){
            ?>
                        <li> <?= $this->Html->link('Classes', ['controller'=>'Groups', 'action'=>'index'])?> </li>
                        <li> <?= $this->Html->link('Elèves', ['controller' => 'Users', 'action'=>'indexEleve']) ?></li> 
                        <li> <?= $this->Html->link('Modules', ['controller'=>'Modules', 'action'=>'index']) ?> </li>
                        <li> <?= $this->Html->link('Ajouter un utilisateur', ['controller' => 'Users', 'action' => 'add']) ?> </li>

             <!-- FIN MENU ADMIN -->    
             
            <!-- Les liens des menus PROF et ELEVE sont uniquement à titre indicatif
                 Il faut les modifier
            -->

             <!-- MENU PROF -->

                    <?php }else if($role == 'professeur'){ ?>
                        <li> <?= $this->Html->link('Mes classes', ['controller'=>'Groups', 'action'=>'index'])?> </li>
            
            <!-- FIN MENU PROF -->

            <!-- MENU ELEVE -->

                    <?php }else if($role == 'eleve'){ ?>
                        <li> <?= $this->Html->link('Ma classe', ['controller'=>'Groups', 'action'=>'index'])?> </li>
                        <li> <?= $this->Html->link('Mes notes', ['controller'=>'Groups', 'action'=>'index'])?> </li>
                    <?php } ?>
            
            <!-- FIN MENU ELEVE -->


                <li><?= $this->Html->link($this->request->session()->read('Auth.User.nom'), ['controller'=>'Users', 'action'=>'view',$this->request->session()->read('Auth.User.id')])?></li>
                <li><?= $this->Html->link('Deconnexion', ['controller'=>'Users', 'action'=>'logout'])?></li>
                <?php } else{ ?>
                <li><?= $this->Html->link('Connexion', ['controller'=>'Users', 'action'=>'login'])?></li>
                    <?php } ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
