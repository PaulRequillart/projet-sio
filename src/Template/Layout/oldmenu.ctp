<ul class="right">
                <li> <?= $this->Html->link('Classes', ['controller'=>'Groups', 'action'=>'index'])?> </li>
                <li> <?= $this->Html->link('Elèves', ['controller' => 'Users', 'action'=>'indexEleve']) //modifier index par une fonction 'listeEleves'?></li> 
                <li> <?= $this->Html->link('Modules', ['controller'=>'Modules', 'action'=>'index']) ?> </li>
                
                 <?php 
                    if($this->request->session()->check('Auth.User')){ ?>
                        <li><?= $this->Html->link($this->request->session()->read('Auth.User.nom'), ['controller'=>'Users', 'action'=>'view',$this->request->session()->read('Auth.User.id')])?></li>
                        <?php if($this->request->session()->read('Auth.User.role') == "admin"){ ?>
                            <li> <?= $this->Html->link('Ajouter un utilisateur', ['controller' => 'Users', 'action' => 'add']);} ?> </li>
                        <li><?= $this->Html->link('Deconnexion', ['controller'=>'Users', 'action'=>'logout'])?></li>
                    <?php }else{ ?>
                <li><?= $this->Html->link('Connexion', ['controller'=>'Users', 'action'=>'login'])?></li>
                    <?php } ?>
            </ul>