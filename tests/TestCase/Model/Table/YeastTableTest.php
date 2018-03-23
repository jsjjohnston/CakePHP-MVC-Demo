<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\YeastTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\YeastTable Test Case
 */
class YeastTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\YeastTable
     */
    public $Yeast;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.yeast',
        'app.recipe',
        'app.users',
        'app.hops',
        'app.recipe_hops',
        'app.malt',
        'app.recipe_malt',
        'app.style',
        'app.recipe_style',
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
        $config = TableRegistry::exists('Yeast') ? [] : ['className' => YeastTable::class];
        $this->Yeast = TableRegistry::get('Yeast', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Yeast);

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
