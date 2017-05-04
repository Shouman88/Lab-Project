<!DOCTYPE html>
<html>
  <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <!-- mobile meta -->
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <title>Blood</title>
		  <link rel='stylesheet' href="css/bootstrap.css"/>
		  <link rel='stylesheet' href="css/style.css">
        <!--[if lt IE 9]-->
        <script src="js/jquery-1.11.1.js"></script>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
      </head>
    <body>
	  <div class="container">
		  <h1 class="text-center">Blood Bank</h1>
	    <form class="form-horizontal"  action="<?php $_PHP_SELF ?>"  method="post">
			<!--City-->
			<div class="form-group form-group-lg">
				<label class="col-sm-2 control-label">City</label>
					<div class="col-sm-10 col-md-6">
					<select  class="form-control" name="city" required="required">
							<option value="">Choose Your City</option>
							<option value="Cairo">Cairo</option>
							<option value="Alex">Alex</option>
							<option value="Mansoura">Mansoura</option>
							<option value="Giza">Giza</option>
							<option value="Tanta">Tanta</option>
					</select>
						<span class="asterisk">*</span>
				</div>
			</div>
			<!--Blood Type-->
			<div class="form-group form-group-lg">
				<label class="col-sm-2 control-label">Blood Type</label>
				<div class="col-sm-10 col-md-6">
					<select  class="form-control" name="blood_type" required="required">
							<option value="">Choose Your Blood Type </option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
 							<option value="A+">A+</option>
							<option value="A-">A-</option>
 							<option value="AB+">AB+</option>
  							<option value="AB-">AB-</option>
					</select>
					<span class="asterisk">*</span>
				</div>
			</div>
			<!--submit-->
			<div class="form-group form-group-lg">
				<div class="col-sm-offset-2 col-sm-10">
					<input  name="search" type="submit" id="search" value="Search" class="btn btn-primary btn-lg">
					<a href="add.php"  class="btn btn-primary btn-lg">Add New Volunteer</a>
				</div>
			</div>	
		</form>
	</div>

<?php
	session_start();
	$dsn  = 'mysql:host=localhost;dbname=blood';
	$user = 'root';
	$pass = '';
	$conn = new PDO($dsn , $user , $pass);
	if(isset($_POST['search'])){
		$city= $_POST['city'];
		$blood_type= $_POST['blood_type'];
		$stmt = $conn->prepare("SELECT * FROM volunteer WHERE city= '$city' AND blood_type = '$blood_type'");
		$stmt->execute();
		$rows = $stmt->fetchAll();
		?>
		<div class="container">
			<div class="table-responsive">
			 <table class="main-table text-center table table-border">
				<tr>
					<td>NAME</td>
					<td>PHONE NUMBER</td>
					<td>CITY</td>
					<td>BLOOD TYPE</td>
				</tr>
<?php
		foreach($rows as $row){
			echo "<tr>";
				echo "<td>" . $row['username'] ."</td>";
				echo "<td>" . $row['tel'] ."</td>";
				echo "<td>" . $row['city'] ."</td>";
				echo "<td>" . $row['blood_type'] ."</td>";
			echo "</tr>";
}
	}
else{?>
				</table>
			</div>
		</div>
	<?php
		//exit();
}
?>
		</body>
</html>