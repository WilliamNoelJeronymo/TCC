<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Projeto Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property string $objetvo
 * @property string|null $texto
 * @property string|null $banner
 * @property int $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Documento[] $documentos
 * @property \App\Model\Entity\Imagen[] $imagens
 * @property \App\Model\Entity\Categoria[] $categorias
 */
class Projeto extends Entity
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
        'objetvo' => true,
        'texto' => true,
        'banner' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'documentos' => true,
        'imagens' => true,
        'categorias' => true,
    ];
}
