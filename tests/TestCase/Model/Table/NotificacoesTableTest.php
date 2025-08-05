<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotificacoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotificacoesTable Test Case
 */
class NotificacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NotificacoesTable
     */
    protected $Notificacoes;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Notificacoes',
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
        $config = $this->getTableLocator()->exists('Notificacoes') ? [] : ['className' => NotificacoesTable::class];
        $this->Notificacoes = $this->getTableLocator()->get('Notificacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Notificacoes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NotificacoesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\NotificacoesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
