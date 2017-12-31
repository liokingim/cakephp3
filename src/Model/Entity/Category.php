<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property int $lft
 * @property int $rght
 *
 * @property \App\Model\Entity\Category $parent_category
 * @property \App\Model\Entity\Category[] $child_categories
 */
class Category extends Entity
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
        'parent_id' => true,
        'name' => true,
        'lft' => true,
        'rght' => true,
        'parent_category' => true,
        'child_categories' => true
    ];
}
