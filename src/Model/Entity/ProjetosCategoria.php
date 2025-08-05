<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjetosCategoria Entity
 *
 * @property int $id
 * @property int $projeto_id
 * @property int $categoria_id
 *
 * @property \App\Model\Entity\Projeto $projeto
 * @property \App\Model\Entity\Categoria $categoria
 */
class ProjetosCategoria extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'projeto_id' => true,
        'categoria_id' => true,
        'projeto' => true,
        'categoria' => true,
    ];
}
