<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Module Entity
 *
 * @property int $id
 * @property string $label
 * @property int $group_id
 *
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Mark[] $marks
 */
class Module extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'label' => true,
        'marks' => true,
        'group_id' => true,
    ];
}
