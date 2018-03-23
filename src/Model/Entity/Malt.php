<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Malt Entity
 *
 * @property int $id
 * @property string $malt_name
 * @property string $type
 * @property float $specific_gravity
 *
 * @property \App\Model\Entity\Recipe[] $recipe
 */
class Malt extends Entity
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
        'malt_name' => true,
        'type' => true,
        'specific_gravity' => true,
        'recipe' => true
    ];
}
