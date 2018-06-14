<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<button class="boutonImprimer btn btn-success" onclick="javascript:window.print()">Imprimer</button>

<div class="divmoyenne" id="impression">

            <div class="infoUser">
                
                <h3>Relevé de note de : <?php echo $user->nom." ".$user->prenom ?> </h3>
            </div>
            
            <?php 
            $moyenneGenerale = 0;
            $sommeMoyennes = 0;

            foreach ($group->modules as $module): ?>

            
 
            <div >
                <h3 class="nomModule"><?php echo $module->label ?></h3>
                <table cellpadding="0" cellspacing="0" class="table moyenne">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><?= __('Intitulé') ?></th>
                            <th scope="col"><?= __('Note') ?></th>
                        </tr>
                    </thead>
                <?php
                $nbModules = 0;
                $nbNotes = 0;
                $sommeNote = 0;
                $moyenne = 0;
                    foreach ($user->marks as $mark): 
                
                        $idmodule = $user->marks[$nbModules]->module_id;
                        if($idmodule == $module->id){
                            ?> 
                                <tr>
                                    <td><?= h($mark->label) ?></td>
                                    <td><?= h($mark->value) ?></td>
                                    
                                </tr>

        
                        <?php
                        $sommeNote = $sommeNote + $mark->value;
                        $nbNotes++;
                        }
                    
                    
                    $nbModules++;
                    endforeach;
                    if($nbNotes != 0){
                        $moyenne = $sommeNote / $nbNotes;
                    }else{
                        $moyenne = $sommeNote;
                    }
                    $sommeMoyennes = $sommeMoyennes + $moyenne;
                    
                    ?> <tr>
                        <td style="font-weight: bold">moyenne</td>
                        <td style="font-weight: bold"><?php echo $moyenne ?> </td>
                    </tr> 
             

            </div>
                </table>
            
            <?php 
            endforeach;
    
            $moyenneGenerale = $sommeMoyennes / ($nbModules +1);
            ?>
            
            <h3 class="nomModule"> Moyenne Generale : <?php echo $moyenneGenerale ?> </h3>

    </div>