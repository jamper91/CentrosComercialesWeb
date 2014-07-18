<div class="parametros view">
<h2><?php echo __('Parametro'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($parametro['Parametro']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($parametro['Parametro']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Informacion'); ?></dt>
		<dd>
			<?php echo h($parametro['Parametro']['informacion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Parametro'), array('action' => 'edit', $parametro['Parametro']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Parametro'), array('action' => 'delete', $parametro['Parametro']['id']), array(), __('Are you sure you want to delete # %s?', $parametro['Parametro']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Parametros'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parametro'), array('action' => 'add')); ?> </li>
	</ul>
</div>
