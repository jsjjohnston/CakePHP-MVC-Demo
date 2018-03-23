<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RecipeController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RecipeController Test Case
 */
class RecipeControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
