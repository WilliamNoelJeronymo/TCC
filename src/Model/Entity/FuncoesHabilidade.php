<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FuncoesHabilidade Entity
 *
 * @property int $id
 * @property int $funcoes_id
 * @property int $habilidade_id
 *
 * @property \App\Model\Entity\Funco $funco
 * @property \App\Model\Entity\Habilidade $habilidade
 */
class FuncoesHabilidade extends Entity
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
        'funcoes_id' => true,
        'habilidade_id' => true,
        'funco' => true,
        'habilidade' => true,
    ];
}
