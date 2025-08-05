<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosProjetosFuncoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosProjetosFuncoesTable Test Case
 */
class UsuariosProjetosFuncoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosProjetosFuncoesTable
     */
    protected $UsuariosProjetosFuncoes;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.UsuariosProjetosFuncoes',
        'app.Usuarios',
        'app.Funcoes',
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
        $config = $this->getTableLocator()->exists('UsuariosProjetosFuncoes') ? [] : ['className' => UsuariosProjetosFuncoesTable::class];
        $this->UsuariosProjetosFuncoes = $this->getTableLocator()->get('UsuariosProjetosFuncoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UsuariosProjetosFuncoes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsuariosProjetosFuncoesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsuariosProjetosFuncoesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
