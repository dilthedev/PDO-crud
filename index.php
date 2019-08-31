<?php 

require('db.php'); 

$sql = "SELECT * FROM People";

$statement = $connection->prepare($sql);

$statement->execute();


$people = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<?php require('inc/header.php'); ?>

	<div class="container">
		<div class="card mt-5">
			<div class="card-header">
				<h2>All People</h2>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<th>E-mail</th>
						<th>Action</th>
					</tr>
				<?php foreach($people as $person): ?>
					<tr>
						<td><?php echo $person->name; ?></td>
						<td><?php echo $person->email; ?></td>
						<td>
							<a class="btn btn-info" href="edit.php?id=<?php echo $person->id; ?>">Edit</a>
							<a onclick="return confirm('Are you want to delete this entry?')" class="btn btn-danger" href="delete.php?id=<?php echo $person->id; ?>">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>				
				</table>
			</div>
		</div>
	</div>


   
<?php require('inc/footer.php'); ?>
