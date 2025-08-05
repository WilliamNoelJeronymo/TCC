<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $matricula
 * @property string $senha
 * @property string|null $foto
 * @property int $grupo_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Grupo $grupo
 * @property \App\Model\Entity\UsuariosProjetosFunco[] $usuarios_projetos_funcoes
 */
class Usuario extends Entity
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
        'email' => true,
        'matricula' => true,
        'senha' => true,
        'foto' => true,
        'grupo_id' => true,
        'created' => true,
        'modified' => true,
        'grupo' => true,
        'usuarios_projetos_funcoes' => true,
        'habilidades' => true, // ✅ Adicione esta linha!
    ];
    protected function _setSenha(string $senha) : ?string
    {
        if (strlen($senha) > 0) {
            return (new DefaultPasswordHasher())->hash($senha);
        }
        return null;
    }
}
