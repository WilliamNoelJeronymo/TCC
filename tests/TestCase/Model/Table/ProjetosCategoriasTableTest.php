<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjetosCategoriasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjetosCategoriasTable Test Case
 */
class ProjetosCategoriasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjetosCategoriasTable
     */
    protected $ProjetosCategorias;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ProjetosCategorias',
        'app.Projetos',
        'app.Categorias',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProjetosCategorias') ? [] : ['className' => ProjetosCategoriasTable::class];
        $this->ProjetosCategorias = $this->getTableLocator()->get('ProjetosCategorias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProjetosCategorias);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProjetosCategoriasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProjetosCategoriasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
