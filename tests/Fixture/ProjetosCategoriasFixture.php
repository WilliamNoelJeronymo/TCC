<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjetosCategoriasFixture
 */
class ProjetosCategoriasFixture extends TestFixture
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
                'projeto_id' => 1,
                'categoria_id' => 1,
            ],
        ];
        parent::init();
    }
}
