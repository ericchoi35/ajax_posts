<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ajax Posts</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('form').on('submit', function(){
				$.post(
					$(this).attr('action'), 
					$(this).serialize(),
					function(data){
						$('#main').append("<div class='note'><p>" + data.description + '</p></div>');
					}, 
					'json'
				);
				$('textarea').val('');
				return false;
			});

		});
	</script>
</head>
<body>
<div class="container">
	<h1>Ajax Posts</h1>
	<div id='main' class='row'>
<?php 	foreach($posts as $post)
		{	?>
		<div class='note'>
			<p><?= $post['description'] ?></p>
		</div>
<?php 	}	?>
	</div>
	<div class='row'>
		<form class='col-sm-4' role="form" action='/posts/create' method='post'>
		  <div class="form-group">
		  	<h3>Add a note:</h3>
		    <textarea class='form-control' name='description' rows='5'></textarea>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</div>
</body>
</html>