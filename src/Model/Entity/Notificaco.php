<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notificaco Entity
 *
 * @property int $id
 * @property int $usuario_id_emissor
 * @property int $usuario_id_remetente
 * @property int $funcoes_id
 * @property int $aceite
 * @property string $mensagem
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Funco $funco
 */
class Notificaco extends Entity
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
        'usuario_id_emissor' => true,
        'usuario_id_remetente' => true,
        'funcoes_id' => true,
        'aceite' => true,
        'mensagem' => true,
        'created' => true,
        'modified' => true,
        'funco' => true,
    ];
}
