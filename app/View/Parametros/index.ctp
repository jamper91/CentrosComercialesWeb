<div class="parametros index">
	<h2><?php echo __('Parametros'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('informacion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($parametros as $parametro): ?>
	<tr>
		<td><?php echo h($parametro['Parametro']['id']); ?>&nbsp;</td>
		<td><?php echo h($parametro['Parametro']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($parametro['Parametro']['informacion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $parametro['Parametro']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $parametro['Parametro']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $parametro['Parametro']['id']), array(), __('Are you sure you want to delete # %s?', $parametro['Parametro']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Parametro'), array('action' => 'add')); ?></li>
	</ul>
</div>
