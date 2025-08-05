<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequisitosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequisitosTable Test Case
 */
class RequisitosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RequisitosTable
     */
    protected $Requisitos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Requisitos',
        'app.FuncoesRequisitosUsuarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Requisitos') ? [] : ['className' => RequisitosTable::class];
        $this->Requisitos = $this->getTableLocator()->get('Requisitos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Requisitos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RequisitosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
