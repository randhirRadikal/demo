<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="portlet">
			<div class="portlet-body flip-scroll">
				<table class="table table-bordered table-striped table-condensed flip-content">
					<thead class="flip-content">
						<tr>
							<th width="20%"> <?= $this->Paginator->sort('id') ?> </th>
							<th> <?= $this->Paginator->sort('email') ?> </th>
							<th class="numeric"> <?= $this->Paginator->sort('name') ?> </th>
							<th class="numeric"> <?= $this->Paginator->sort('profile_pic') ?> </th>
							<th class="numeric"> <?= $this->Paginator->sort('created') ?> </th>
							<th class="numeric"> <?= $this->Paginator->sort('modified') ?> </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($users as $user): ?>
						<tr>
							<td> <?= $this->Number->format($user->id) ?> </td>
							<td> <?= h($user->email) ?> </td>
							<td class="numeric"><?= h($user->name) ?> </td>
							<td class="numeric"><?= h($user->profile_pic) ?> </td>
							<td class="numeric"> <?= h($user->created) ?> </td>
							<td class="numeric"> <?= h($user->modified) ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="paginator">
	        <ul class="pagination">
	            <?= $this->Paginator->prev('< ' . __('previous')) ?>
	            <?= $this->Paginator->numbers() ?>
	            <?= $this->Paginator->next(__('next') . ' >') ?>
	        </ul>
	        <p><?= $this->Paginator->counter() ?></p>
	    </div>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>
