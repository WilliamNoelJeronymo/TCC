<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NotificacoesFixture
 */
class NotificacoesFixture extends TestFixture
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
                'usuario_id_emissor' => 1,
                'usuario_id_remetente' => 1,
                'funcoes_id' => 1,
                'aceite' => 1,
                'created' => '2025-03-08 00:52:52',
                'modified' => '2025-03-08 00:52:52',
            ],
        ];
        parent::init();
    }
}
