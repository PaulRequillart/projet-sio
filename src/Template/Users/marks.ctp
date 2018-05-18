<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div>
        
        <?php if (!empty($user->marks) && $user->group->label != 'admin' ): ?>
        <h3>Mes notes </h3>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= "Nom du module" ?></th>
                <th scope="col"><?= __('Intitulé') ?></th>
                <th scope="col"><?= __('Note') ?></th>
            </tr>
            <?php $cpt=0; ?>
            <?php foreach ($user->marks as $mark): 
                
                $idmodule = $user->marks[$cpt]->module_id;
                $module = $modules->get($idmodule);
                ?>
            <tr>
                
                <td><?= h($module->label) ?></td>
                <td><?= h($mark->label) ?></td>
                <td><?= h($mark->value)." /20" ?></td>
                
            </tr>
            <?php 
            $cpt++;
            endforeach; ?>
        </table>
        <?php endif; ?>
    </div>