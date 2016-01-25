<?php

// Clusters::startOperation();


class Clusters
{	
	public $pr = 12;

	public $matrix = array(
		array(7, 9, 3, 2, 4, 5),
		array(2, 1, 4, 8, 5, 3),
		array(9, 4, 7, 8, 3, 2),
		array(4, 5, 1, 2, 3, 7),
		array(5, 7, 2, 3, 8, 1),
		array(9, 6, 5, 3, 7, 4),
		array(2, 4, 6, 9, 7, 3),
		array(4, 5, 7, 3, 2, 8),
		array(9, 3, 1, 8, 6, 5),
		array(8, 4, 3, 7, 2, 9),
		);

	
	private $maxClust;


	public function __construct()
	{
		$this->maxClust = 1;
	}

	public function getClusters()
	{
		$clusters = $this->startCalcClusters($this->matrix);

		return $clusters;
		
	}

	public function startCalcClusters($matrix) 
	{
		$Cluster = array();

		foreach ($matrix as $key => $value) {
			$res = 0;
			if ($key > 0) {
				$res = $this->calcArray($value, $matrix[0]);		
				// echo "Result ". $key . " = " . $res . "<br />";
			} 

			$cl = $this->decideCluster($key , $res);

			// echo strcmp($cl, $Cluster[$key-1]).'<br />';

			if (count($Cluster) > 1 && strcmp($cl, $Cluster[$key-1]) == 0)
			{
				echo "in if \n";
				$res2 = $this->calcArray($value, $matrix[$key-1]);
				if ($res2 <= $res)
				{
					$Cluster[$key] = $Cluster[$key-1];					
				}
			} else {
				$Cluster[$key] = $cl;	
			}			
		}
		return $Cluster;
	}


	public function calcArray($row1, $row2)
	{
		$result = 0;
		foreach ($row1 as $index => $value) {
			$result += abs($row1[$index] - $row2[$index]);
		}
		return $result;
	}


	public function decideCluster($index, $value)
	{
		$clast = "";

		if ($index = 0) {
			$clast = "C_1";
		} else {
			if ($value > $this->pr) {
				$clast = "C_".$this->maxClust++;
			} else {
				$clast = "C_1";
			}
		}

		return $clast;
	}
}
?>