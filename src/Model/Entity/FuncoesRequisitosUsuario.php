<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FuncoesRequisitosUsuario Entity
 *
 * @property int $id
 * @property int|null $funcoe_id
 * @property int $requisito_id
 * @property int|null $usuarios_id
 *
 * @property \App\Model\Entity\Funco $funco
 * @property \App\Model\Entity\Requisito $requisito
 * @property \App\Model\Entity\Usuario $usuario
 */
class FuncoesRequisitosUsuario extends Entity
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
        'funcoe_id' => true,
        'requisito_id' => true,
        'usuarios_id' => true,
        'funco' => true,
        'requisito' => true,
        'usuario' => true,
    ];
}
