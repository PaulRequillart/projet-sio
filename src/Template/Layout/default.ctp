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

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>

    <?= $this->Html->script('login.js') ?>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    
    
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script('fonctions') ?>
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php echo $this->Html->css(['print'],['media' => 'print']); ?>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" data-topbar role="navigation">
        
            <?= $this->Html->link('Accueil', ['controller'=>'Pages', 'action'=>'display'], ["class"=>"navbar-brand"])?>
        
        
            <ul class="navbar-nav mr-auto">

            <!-- MENU ADMIN -->

            <?php
                if($this->request->session()->check('Auth.User')){
                    $role = $this->request->session()->read('Auth.User.role');
                    if($role == 'admin'){
            ?>
                        <li class="nav-item"> <?= $this->Html->link('Classes', ['controller'=>'Groups', 'action'=>'index'], ["class"=>"nav-link"])?> </li>
                        <li class="nav-item"> <?= $this->Html->link('Elèves', ['controller' => 'Users', 'action'=>'indexEleve'], ["class"=>"nav-link"]) ?></li>
                        <li class="nav-item"> <?= $this->Html->link('Profs', ['controller' => 'Users', 'action'=>'indexProf'], ["class"=>"nav-link"]) ?></li> 
                        <li class="nav-item"> <?= $this->Html->link('Modules', ['controller'=>'Modules', 'action'=>'index'], ["class"=>"nav-link"]) ?> </li>
                        <li class="nav-item"> <?= $this->Html->link('Ajouter un utilisateur', ['controller' => 'Users', 'action' => 'add'], ["class"=>"nav-link"]) ?> </li>

             <!-- FIN MENU ADMIN -->    
             
            <!-- Les liens des menus PROF et ELEVE sont uniquement à titre indicatif
                 Il faut les modifier
            -->

             <!-- MENU PROF -->
    

                    <?php }else if($role == 'professeur'){ ?>
                        <li class="nav-item"> <?= $this->Html->link('Mes classes', ['controller'=>'Groups', 'action'=>'index'], ["class"=>"nav-link"])?> </li>
            
            <!-- FIN MENU PROF -->

            <!-- MENU ELEVE -->

                    <?php }else if($role == 'eleve'){ ?>
                        <li class="nav-item"> <?= $this->Html->link('Ma classe', ['controller'=>'Users', 'action'=>'groupe'], ["class"=>"nav-link"])?> </li>
                        <li class="nav-item"> <?= $this->Html->link('Mes notes', ['controller'=>'Users', 'action'=>'marks'], ["class"=>"nav-link"])?> </li>
                        <li class="nav-item"> <?= $this->Html->link('Ma moyenne', ['controller'=>'Users', 'action'=>'moyenne'], ["class"=>"nav-link"])?> </li>
                        <?php } ?>
            </ul>
        
            <!-- FIN MENU ELEVE -->
    
            <ul class="navbar-nav ml-auto">        
                <li class="nav-item dropdown">
                <?= $this->Html->link($this->Html->image('user-logo.png', array('width' => '30', 'height' => '30')). ' ' .ucfirst($this->request->session()->read('Auth.User.nom')), '#', array('class'=>'nav-link dropdown-toggle', 'data-toggle'=>'dropdown',  'escape' => false));?>
                
                    <div class="dropdown-menu">
                        <?= $this->Html->link('Mon compte', ['controller'=>'Users', 'action'=>'profile'], ["class"=>"dropdown-item"])?>
                        <?= $this->Html->link('Deconnexion', ['controller'=>'Users', 'action'=>'logout'], ["class"=>"dropdown-item"])?>
                    </div>
                </li>
            </ul>
                <?php } else{ ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><?= $this->Html->link('Connexion', ['controller'=>'Users', 'action'=>'login'], ["class"=>"nav-link"])?></li>
                    <?php } ?>
            </ul>
        
    </nav>
    <?= $this->Flash->render() ?>
    <div class="">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
