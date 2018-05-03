<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Style Entity
 *
 * @property int $id
 * @property string $yeast_name
 * @property string $type
 *
 * @property \App\Model\Entity\Recipe[] $recipe
 */
class Style extends Entity
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
        'yeast_name' => true,
        'type' => true,
        'recipe' => true
    ];
}