<?php 

	require('db.php');

	$id = $_GET['id'];

	$sql = "SELECT *FROM people WHERE id=:id";

	$statement = $connection->prepare($sql);

	$statement->execute([ ':id'=>$id ]);

	$person = $statement->fetch(PDO::FETCH_OBJ);

	
	
	if (isset($_POST['name']) && isset($_POST['name'])) {
		
		$name = $_POST['name'];
		$email = $_POST['email'];

		$sql = "UPDATE people SET name=:name, email=:email WHERE id=:id";

		$statement = $connection->prepare($sql);

		if ($statement->execute([':name' => $name, ':email' => $email, ':id'=> $id]) ) {
			header('Location:index.php');
		}
	}

?>


<?php require('inc/header.php'); ?>

<div class="container">
	<div class="card mt-5">
		<div class="card-header">
			<h2>Update Person</h2>
		</div>
		<div class="card-body">
			<form method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" placeholder="Name Here" value="<?php echo $person->name; ?>" class="form-control">
				</div>
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="text" value="<?php echo $person->email; ?>" name="email" id="email" placeholder="E-mail Here" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info">Update a Person</button>
				</div>
			</form>
		</div>
	</div>

</div>


<?php require('inc/footer.php'); ?>