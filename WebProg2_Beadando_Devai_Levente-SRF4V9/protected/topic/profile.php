<?php 
if(!array_key_exists('w', $_GET) || empty($_GET['w'])) : 
	header('Location: index.php');
else: 
	$query = "SELECT id, points, name, user, category, timeposted, content FROM topics WHERE id = :id";
	$params = [':id' => $_GET['w']];
	require_once DATABASE_CONTROLLER;
	$topic = getRecord($query, $params);
	if(empty($topic)) :
		header('Location: index.php');
	else : ?>
		<h1><?=$topic['name'] ?></h2>
		<h4><?=$topic['user'] ?></h4>		
		<p><?=$topic['content'] ?></p>
		<p><?=$topic['timeposted'] ?></p>
		<h3>Comments:</h3>
		
<?php endif;
endif; ?>