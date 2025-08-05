<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Requisito Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 *
 * @property \App\Model\Entity\FuncoesRequisitosUsuario[] $funcoes_requisitos_usuarios
 */
class Requisito extends Entity
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
        'descricao' => true,
        'funcoes_requisitos_usuarios' => true,
    ];
}
