<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaltTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaltTable Test Case
 */
class MaltTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MaltTable
     */
    public $Malt;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.malt',
        'app.recipe',
        'app.recipe_malt'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Malt') ? [] : ['className' => MaltTable::class];
        $this->Malt = TableRegistry::get('Malt', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Malt);

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
