<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HabilidadesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HabilidadesTable Test Case
 */
class HabilidadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HabilidadesTable
     */
    protected $Habilidades;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Habilidades',
        'app.Funcoes',
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
        $config = $this->getTableLocator()->exists('Habilidades') ? [] : ['className' => HabilidadesTable::class];
        $this->Habilidades = $this->getTableLocator()->get('Habilidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Habilidades);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HabilidadesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
