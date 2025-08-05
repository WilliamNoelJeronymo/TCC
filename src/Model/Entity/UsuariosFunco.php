<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsuariosFunco Entity
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $funcoes_id
 * @property bool $editor
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Funco $funco
 */
class UsuariosFunco extends Entity
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
        'usuario_id' => true,
        'funcoes_id' => true,
        'editor' => true,
        'usuario' => true,
        'funco' => true,
    ];
}
