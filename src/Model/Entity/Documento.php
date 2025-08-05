<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Documento Entity
 *
 * @property int $id
 * @property string $nome
 * @property int $projeto_id
 *
 * @property \App\Model\Entity\Projeto $projeto
 */
class Documento extends Entity
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
        'nome' => true,
        'projeto_id' => true,
        'projeto' => true,
    ];
}
