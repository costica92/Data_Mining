<?php
class Cell
{
	public $value;
	public $xx;
	public $yy;
	public $yx;

	public function __construct($val)
	{
		$this->value = $val;
		$this->xx = 0;
		$this->yy = 0;
		$this->yx = 0;
	}

	public function minValue()
	{
		return min($this->xx, $this->yy, $this->yx);
	}
}


class DynamicAlgorithm
{
	public $matrix;

	public function __construct()
	{
	 $this->matrix = array(
		// row 1
			array( 
				new Cell(2),
				new Cell(2),
				new Cell(4),
				new Cell(1)
			),

		// row 2
			array( 
				new Cell(1),
				new Cell(4),
				new Cell(1),
				new Cell(5)
			),
		

	 	// row 3
	 		array( 
				new Cell(4),
				new Cell(3),
				new Cell(3),
				new Cell(4)
			),

	 	// row 4
			array( 
				new Cell(5),
				new Cell(1),
				new Cell(1),
				new Cell(3)
			),

		// row 5
	    	array( 
				new Cell(3),
				new Cell(7),
				new Cell(2),
				new Cell(2)
			),

	    // row 6
	    	array( 
				new Cell(4),
				new Cell(6),
				new Cell(3),
				new Cell(1)
			),

		);


	 	// $this->calcXX();
	 	// $this->calcYY();

	 	$this->calcValues();
	}

	$start_y = 0;
	$start_x = 0;

	function calcValues()
	{
		if $start_x == 3 && $start_y == 5
		{
			return;
		}
	}

	public function calcCell($x_index, $y_index)
	{
		for ($i=$x_index; $i > 0; $i--) { 
			for ($j=$y_index; $j > 0; $j--) { 
				echo "<br />";
				echo count($this->matrix[$i][$j]);	
			}
		}
	}


	function calcXX()
	{
		foreach ($this->matrix as $key => $value)
		{
			foreach ($this->matrix[$key] as $ckey => $cvalue) {
				if ($ckey > 0)
				{
					$currentCell = $this->matrix[$key][$ckey];
					$prevCell = $this->matrix[$key][$ckey-1];

					if ($ckey > 1)
					{
						$currentCell->xx = $currentCell->value + $prevCell->xx;
					} else {
						$currentCell->xx = $currentCell->value + $prevCell->value;	
					}
					
				}
				
			}
		}
	}



	public function calcYY()
	{
		foreach ($this->matrix as $key => $value)
		{
			if ($key > 0) {
				foreach ($this->matrix[$key] as $ckey => $cvalue) {

					$currentCell = $this->matrix[$key][$ckey];
					$prevCell = $this->matrix[$key-1][$ckey];

					if ($ckey > 1) {
						$currentCell->yy = $currentCell->value + $prevCell->yy;
					} else {
						$currentCell->yy = $currentCell->value + $prevCell->value;	
					}		
				
				}
			}
			
		}
	}
}


?>