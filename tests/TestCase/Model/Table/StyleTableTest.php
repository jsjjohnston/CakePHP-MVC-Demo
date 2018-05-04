<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StyleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StyleTable Test Case
 */
class StyleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StyleTable
     */
    public $Style;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.style',
        'app.recipe',
        'app.recipe_style'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Style') ? [] : ['className' => StyleTable::class];
        $this->Style = TableRegistry::get('Style', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Style);

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
