<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recipe Entity
 *
 * @property int $id
 * @property string $recipe_name
 * @property float $batch_size
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Hop[] $hops
 * @property \App\Model\Entity\Malt[] $malt
 * @property \App\Model\Entity\Style[] $style
 * @property \App\Model\Entity\Yeast[] $yeast
 */
class Recipe extends Entity
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
        'recipe_name' => true,
        'batch_size' => true,
        'user_id' => true,
        'user' => true,
        'hops' => true,
        'malt' => true,
        'style' => true,
        'yeast' => true
    ];
}
