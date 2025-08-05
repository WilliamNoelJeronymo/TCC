<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FuncoesHabilidadesFixture
 */
class FuncoesHabilidadesFixture extends TestFixture
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
                'funcoes_id' => 1,
                'habilidade_id' => 1,
            ],
        ];
        parent::init();
    }
}
