<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Funco Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property int $quantidade
 * @property int $projetos_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Projeto $projeto
 * @property \App\Model\Entity\Habilidade[] $habilidades
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class Funco extends Entity
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
        'quantidade' => true,
        'projetos_id' => true,
        'created' => true,
        'modified' => true,
        'projeto' => true,
        'habilidades' => true,
        'usuarios' => true,
    ];
}
