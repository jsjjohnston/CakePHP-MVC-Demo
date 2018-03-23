<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecipeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecipeTable Test Case
 */
class RecipeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecipeTable
     */
    public $Recipe;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recipe',
        'app.users',
        'app.hops',
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
        $config = TableRegistry::exists('Recipe') ? [] : ['className' => RecipeTable::class];
        $this->Recipe = TableRegistry::get('Recipe', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Recipe);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
