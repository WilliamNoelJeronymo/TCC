<div class="form-group">
    <?= $this->Html->link(__('Adicionar Habilidade'), ['controller' => 'Usuarios', 'action' => 'habilidadesAdd'], ['class' => 'btn btn-primary']) ?>
</div>
<div class="card">
    <div class="card-body">
        <?php foreach ($habilidades as $habilidade): ?>
            <div class="text-concluido-bg-grey d-inline-block ">
                <p class="d-inline-block mb-0 pb-0"><?= h($habilidade->nome) ?></p>
                <?= $this->Form->postLink(('X'), ['action' => 'habilidadesDelete', $habilidade->id], ['escape' => false,
                    'class' => ' toolTipOpen mb-0 pb-0',
                    'title' => 'Deletar',
                    'confirm' => __('Tem certeza que deseja deletar a habilidade {0}?', $habilidade->nome)]) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->Html->link(__('voltar'), ['controller' => 'Usuarios', 'action' => 'view'], ['class' => 'btn btn-primary']) ?>
