<?php require('db.php');

	$message = "";
	
	if (isset($_POST['name']) && isset($_POST['name'])) {
		
		$name = $_POST['name'];
		$email = $_POST['email'];

		$sql = "INSERT INTO people(name, email) VALUES (:name,:email)";

		$statement = $connection->prepare($sql);

		if ($statement->execute([':name' => $name, ':email' => $email]) ) {
			$message = 'Data Inserted Successfully.';
		}
	}

?>


<?php require('inc/header.php'); ?>

<div class="container">
	<div class="card mt-5">
		<div class="card-header">
			<h2>Create a Person</h2>
		</div>
		<div class="card-body">
			<?php if(!empty($message)): ?>
				<div class="alert alert-success">
					<?php echo $message; ?>
				</div>
			<?php endif;  ?>
			<form method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" placeholder="Name Here" class="form-control">
				</div>
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="text" name="email" id="email" placeholder="E-mail Here" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info">Create a Person</button>
				</div>
			</form>
		</div>
	</div>

</div>


<?php require('inc/footer.php'); ?>