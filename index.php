<?php
include "Clusters.php";
include "Dynamic.php";
// require('bower_components/bootstrap');

$cluster = new Clusters();
$result = $cluster->getClusters();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Mining - Breahna Constantin</title>
	<script type="text/javascript" src></script>
	<link rel="stylesheet" type="text/css" href="bower_components\bootstrap\dist\css\bootstrap.min.css">
</head>
<body>

<div class="container theme-showcase" role="main">
<table class="table table-striped">

<?php
	# Table Head
	echo "<thead><tr>";
	echo "<th>#</th>";
	foreach ($cluster->matrix[0] as $key => $value) {
		$rID = $key + 1;
		echo "<th>".$rID."</th>";
	}
	echo "<th>Cluster</th>";
	echo "</tr></thead>";

	# Table Body
	echo "<tbody>";
		foreach ($result as $key => $value) {
			$rID = $key + 1;
			echo "<tr>";
			echo "<th>".$rID."</th>";
			foreach ($cluster->matrix[$key] as $mkey => $mvalue) {
				echo "<td>".$mvalue."</td>";
			}
			echo "<td>".$value."</td>";
			echo "</tr>";			
		}
	echo "</tbody>";

?>
</table>


</div>


<pre>
<?php

$dynamic = new DynamicAlgorithm;
// var_dump($dynamic->matrix);

?>
</pre>

<div class="container theme-showcase" role="main">
<h1> Algoritm dinamic </h1>

<table class="table table-striped" style="width: 100%" >

<?php

	# Table Head
	echo "<thead><tr>";
	echo "<th>#</th>";
	foreach ($dynamic->matrix[0] as $key => $value) {
		$rID = $key + 1;
		echo "<th> x".$rID."</th>";
	}
	echo "</tr></thead>";

	# Table Body
	echo "<tbody>";
		// foreach ($dynamic->matrix as $key => $value)

		$matrix = $dynamic->matrix;

		for ($key = count($matrix)-1; $key>=0; $key--) {
			$rID = $key + 1;
			
			echo "<tr>";
			echo "<th> y".$rID."</th>";

			foreach ($dynamic->matrix[$key] as $cell) {
				// echo "<td>".$cell->value."</td>";

				echo "<td style='border: 1px solid black;' align='center'>";
					echo "<table style='width: 90%; height: 90%'>";
					
					echo "<tr>";
						echo "<td>".$cell->xx."</td><td></td><td></td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td></td><td><h2>".$cell->value."</h2></td><td></td>";
					echo "</tr>";

					echo "<tr>";
						echo "<td>".$cell->yx."</td><td></td><td>".$cell->yy."</td>";
					echo "</tr>";

					echo "</table>";

				echo "</td>";
			}
			// echo "<td>".$value."</td>";
			echo "</tr>";			
		}
	echo "</tbody>";

?>


</table></div>



</body>
</html>