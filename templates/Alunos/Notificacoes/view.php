<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notificaco $notificaco
 */
?>
<th><?= __('Funco') ?></th>
<td><?= $notificaco->hasValue('funco') ? $this->Html->link($notificaco->funco->nome, ['controller' => 'Funcoes', 'action' => 'view', $notificaco->funco->id]) : '' ?></td>
<th><?= __('Usuario Id Emissor') ?></th>
<td><?= $this->Number->format($notificaco->usuario_id_emissor) ?></td>
</tr>
<tr>
    <th><?= __('Usuario Id Remetente') ?></th>
    <td><?= $this->Number->format($notificaco->usuario_id_remetente) ?></td>
</tr>

