<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\FuncoesHabilidadesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\FuncoesHabilidadesController Test Case
 *
 * @uses \App\Controller\FuncoesHabilidadesController
 */
class FuncoesHabilidadesControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     * @uses \App\Controller\FuncoesHabilidadesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\FuncoesHabilidadesController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\FuncoesHabilidadesController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\FuncoesHabilidadesController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\FuncoesHabilidadesController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
