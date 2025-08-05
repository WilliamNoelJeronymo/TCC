<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FuncoesHabilidadesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FuncoesHabilidadesTable Test Case
 */
class FuncoesHabilidadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FuncoesHabilidadesTable
     */
    protected $FuncoesHabilidades;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.FuncoesHabilidades',
        'app.Funcoes',
        'app.Habilidades',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FuncoesHabilidades') ? [] : ['className' => FuncoesHabilidadesTable::class];
        $this->FuncoesHabilidades = $this->getTableLocator()->get('FuncoesHabilidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FuncoesHabilidades);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FuncoesHabilidadesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FuncoesHabilidadesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
