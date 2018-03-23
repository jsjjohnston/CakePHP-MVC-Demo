<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * YeastFixture
 *
 */
class YeastFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'yeast';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'yeast_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'type' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'attenuation_min' => ['type' => 'decimal', 'length' => 2, 'precision' => 1, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'attenuation_max' => ['type' => 'decimal', 'length' => 2, 'precision' => 1, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'temperature_min' => ['type' => 'decimal', 'length' => 2, 'precision' => 1, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'temperature_max' => ['type' => 'decimal', 'length' => 2, 'precision' => 1, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'yeast_name' => 'Lorem ipsum dolor sit amet',
            'type' => 'Lorem ipsum dolor sit amet',
            'attenuation_min' => 1.5,
            'attenuation_max' => 1.5,
            'temperature_min' => 1.5,
            'temperature_max' => 1.5
        ],
    ];
}
