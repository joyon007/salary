<html>
<head>
  <title>Salary Check</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
  <body>
	<div class="container">
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
	<?php
	$openSalaryInfo=fopen("salaryinfo.txt","r");
	$fullData=fread($openSalaryInfo,filesize("salaryinfo.txt"));
	fclose($openSalaryInfo);
		/*echo "<pre>";
		print_r($fullData);
		die();*/
	$singleInfoToArray=explode("\n",$fullData);
		/*echo "<pre>";
		print_r($singleInfoToArray);
		die();*/
	foreach($singleInfoToArray as $checkEachArray){
		/*echo "<pre>";
		print_r($checkEachArray);
		die();*/
		$singleDataToArray = explode(" ",$checkEachArray);
		/*echo "<pre>";
		print_r($singleDataToArray);
		die();*/
		$salaryAgainastId[$singleDataToArray[0]] = $singleDataToArray[1];
		/*echo "<pre>";
		print_r($salaryAgainastId);
		die();*/
	}
	$avg=array_sum($salaryAgainastId)/sizeof($salaryAgainastId);
	?>
	<h3>Maximum Salary Amount : <?php echo max($salaryAgainastId);?></h3>
	<h2>Minimum Salary Amount : <?php echo min($salaryAgainastId);?></h2>
	<h1>Average Salary Amount : <?php echo $avg; ?></h1>
	<form class="form-inline" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="form-group">
		<label for="enployee">Enter Employee ID</label>
		<input type="text" class="form-control" name="employeeID" id="enployee" placeholder="e.g.E-2598">
		<button type="submit" name="submit" class="btn btn-info form-control">Show Here</button>
		</div>
	</form>

<?php
if(isset($_POST['submit'])){
	if(array_key_exists($_POST['employeeID'],$salaryAgainastId)){
		echo "<h3>Salary Amount of ".$_POST['employeeID']." is : ".$salaryAgainastId[$_POST['employeeID']]."</h3>";
	}
	else{
		echo "<h3>Employee not Found</h3>";
	}
}
?>
	</div>
	</div>
	</div>
  </body>
</html>