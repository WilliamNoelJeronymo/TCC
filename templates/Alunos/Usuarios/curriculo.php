<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Currículo - <?= h($usuario->nome) ?></title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .header img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
            color: #007BFF;
        }
        .section {
            margin-bottom: 25px;
        }
        .section h2 {
            font-size: 16px;
            color: #007BFF;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
        .skills span {
            display: inline-block;
            background: #f0f0f0;
            border-radius: 4px;
            padding: 5px 10px;
            margin: 3px;
            font-size: 11px;
        }
        .project-card {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 10px 15px;
            margin-bottom: 15px;
        }
        .project-title {
            font-weight: bold;
            font-size: 14px;
            color: #333;
        }
        .project-desc {
            font-size: 12px;
            margin: 5px 0 10px;
            color: #555;
        }
        .function-card {
            background: #f9f9f9;
            border-left: 3px solid #007BFF;
            padding: 8px 10px;
            margin-bottom: 8px;
        }
        .function-card strong {
            display: block;
            font-size: 12px;
            margin-bottom: 3px;
            color: #007BFF;
        }
    </style>
</head>
<body>

<!-- Cabeçalho com foto e nome -->
<div class="header">
    <?php if($usuario->foto): ?>
        <img src="<?= h('/uploads/alunos/' . $usuario->matricula . '/imagem_perfil/' . $usuario->foto) ?>" alt="Foto de <?= h($usuario->nome) ?>">
    <?php else: ?>
        <img src="/img/default-user.jpg" alt="Foto de <?= h($usuario->nome) ?>">
    <?php endif; ?>

    <div>
        <h1><?= h($usuario->nome) ?></h1>
        <p><strong>Matrícula:</strong> <?= h($usuario->matricula) ?></p>
    </div>
</div>

<!-- Habilidades -->
<div class="section">
    <h2>Habilidades</h2>
    <div class="skills">
        <?php if (!empty($usuario->habilidades)): ?>
            <?php foreach ($usuario->habilidades as $habilidade): ?>
                <span><?= h($habilidade->nome) ?></span>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhuma habilidade cadastrada.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Projetos -->
<div class="section">
    <h2>Projetos</h2>
    <?php
    // Agrupar funções por projeto
    $projetos = [];
    foreach ($usuario->funcoes as $funcao) {
        if ($funcao->projeto) {
            $projetos[$funcao->projeto->id]['projeto'] = $funcao->projeto;
            $projetos[$funcao->projeto->id]['funcoes'][] = $funcao;
        }
    }
    ?>

    <?php if (!empty($projetos)): ?>
        <?php foreach ($projetos as $p): ?>
            <div class="project-card">
                <div class="project-title"><?= h($p['projeto']->nome) ?></div>
                <div class="project-desc">
                    <strong>Objetivo:</strong> <?= h($p['projeto']->objetivo) ?><br>
                    <?= h($p['projeto']->descricao) ?>
                </div>

                <!-- Funções do usuário nesse projeto -->
                <?php foreach ($p['funcoes'] as $funcao): ?>
                    <div class="function-card">
                        <strong><?= h($funcao->nome) ?></strong>
                        <?= h($funcao->descricao) ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum projeto vinculado.</p>
    <?php endif; ?>
</div>

</body>
</html>
