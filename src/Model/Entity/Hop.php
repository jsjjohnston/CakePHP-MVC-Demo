<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hop Entity
 *
 * @property int $id
 * @property string $hop_name
 * @property string $type
 * @property float $alpha_acid
 *
 * @property \App\Model\Entity\Recipe[] $recipe
 */
class Hop extends Entity
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
        'hop_name' => true,
        'type' => true,
        'alpha_acid' => true,
        'recipe' => true
    ];
}
