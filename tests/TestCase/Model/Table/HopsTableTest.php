<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HopsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HopsTable Test Case
 */
class HopsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HopsTable
     */
    public $Hops;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hops',
        'app.recipe',
        'app.users',
        'app.recipe_hops',
        'app.malt',
        'app.recipe_malt',
        'app.style',
        'app.recipe_style',
        'app.yeast',
        'app.recipe_yeast'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Hops') ? [] : ['className' => HopsTable::class];
        $this->Hops = TableRegistry::get('Hops', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hops);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
