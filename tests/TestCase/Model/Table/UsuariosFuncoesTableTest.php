<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosFuncoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosFuncoesTable Test Case
 */
class UsuariosFuncoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosFuncoesTable
     */
    protected $UsuariosFuncoes;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.UsuariosFuncoes',
        'app.Usuarios',
        'app.Funcoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UsuariosFuncoes') ? [] : ['className' => UsuariosFuncoesTable::class];
        $this->UsuariosFuncoes = $this->getTableLocator()->get('UsuariosFuncoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UsuariosFuncoes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsuariosFuncoesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsuariosFuncoesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
