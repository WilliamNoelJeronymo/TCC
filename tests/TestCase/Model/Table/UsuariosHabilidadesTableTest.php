<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosHabilidadesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosHabilidadesTable Test Case
 */
class UsuariosHabilidadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosHabilidadesTable
     */
    protected $UsuariosHabilidades;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.UsuariosHabilidades',
        'app.Usuarios',
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
        $config = $this->getTableLocator()->exists('UsuariosHabilidades') ? [] : ['className' => UsuariosHabilidadesTable::class];
        $this->UsuariosHabilidades = $this->getTableLocator()->get('UsuariosHabilidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UsuariosHabilidades);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsuariosHabilidadesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsuariosHabilidadesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
