<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FuncoesRequisitosUsuariosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FuncoesRequisitosUsuariosTable Test Case
 */
class FuncoesRequisitosUsuariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FuncoesRequisitosUsuariosTable
     */
    protected $FuncoesRequisitosUsuarios;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.FuncoesRequisitosUsuarios',
        'app.Funcoes',
        'app.Requisitos',
        'app.Usuarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FuncoesRequisitosUsuarios') ? [] : ['className' => FuncoesRequisitosUsuariosTable::class];
        $this->FuncoesRequisitosUsuarios = $this->getTableLocator()->get('FuncoesRequisitosUsuarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FuncoesRequisitosUsuarios);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FuncoesRequisitosUsuariosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FuncoesRequisitosUsuariosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
