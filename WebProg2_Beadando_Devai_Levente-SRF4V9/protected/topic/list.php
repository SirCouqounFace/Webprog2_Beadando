
<?php 
	$query = "SELECT id, name, user, category, timeposted FROM topics";
	require_once DATABASE_CONTROLLER;
	$topics = getList($query);
?>
	<?php if(count($topics) <= 0) : ?>
		<h1>No topics found in the database</h1>
	<?php else : ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Topic Name</th>
					<th scope="col">Post User</th>
					<th scope="col">Category</th>
					<th scope="col">Date Posted</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($topics as $t) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><a href="?P=topic&w=<?=$t['id'] ?>"><?=$t['name'] ?></a></td>
						<td><?=$t['user'] ?></td>
						<td><?=$t['category'] == 0 ? 'Building' : ($t['category'] == 1 ? 'Games' : 'Other') ?></td>
						<td><?=$t['timeposted'] ?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>

