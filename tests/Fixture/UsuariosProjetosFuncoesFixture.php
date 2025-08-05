<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosProjetosFuncoesFixture
 */
class UsuariosProjetosFuncoesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'usuario_id' => 1,
                'funcoes_id' => 1,
                'projeto_id' => 1,
            ],
        ];
        parent::init();
    }
}
