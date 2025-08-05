<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\UsuariosProjetosFuncoesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UsuariosProjetosFuncoesController Test Case
 *
 * @uses \App\Controller\UsuariosProjetosFuncoesController
 */
class UsuariosProjetosFuncoesControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     * @uses \App\Controller\UsuariosProjetosFuncoesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\UsuariosProjetosFuncoesController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\UsuariosProjetosFuncoesController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\UsuariosProjetosFuncoesController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\UsuariosProjetosFuncoesController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
