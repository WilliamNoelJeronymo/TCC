<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImagensTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImagensTable Test Case
 */
class ImagensTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImagensTable
     */
    protected $Imagens;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Imagens',
        'app.Projetos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Imagens') ? [] : ['className' => ImagensTable::class];
        $this->Imagens = $this->getTableLocator()->get('Imagens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Imagens);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ImagensTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ImagensTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
