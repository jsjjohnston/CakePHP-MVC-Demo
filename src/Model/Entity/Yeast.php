<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Yeast Entity
 *
 * @property int $id
 * @property string $yeast_name
 * @property string $type
 * @property float $attenuation_min
 * @property float $attenuation_max
 * @property float $temperature_min
 * @property float $temperature_max
 *
 * @property \App\Model\Entity\Recipe[] $recipe
 */
class Yeast extends Entity
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
        'attenuation_min' => true,
        'attenuation_max' => true,
        'temperature_min' => true,
        'temperature_max' => true,
        'recipe' => true
    ];
}
