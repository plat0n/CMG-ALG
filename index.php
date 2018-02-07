<?php

class Analysis
{
	public $start;
	public $end;
	public $diff;
	public $result;
	public $iterations;

	function __construct($start, $end, $iterations, $result)
	{
		$this->diff = $start->diff($end)->s;
		$this->start = $start;
		$this->end = $end;
		$this->result = $result;
		$this->iterations = $iterations;
	}
}

function generate($nbr) 
{
	$array = [];
	for ($i=0; $i < $nbr; $i++) { 
		array_push($array, rand(1, 1000));
	}
	return $array;
}
$array = generate(500);

function switchNum($array, $index, $index2)
{
	$value = $array[$index];
	$array[$index] = $array[$index2];
	$array[$index2] = $value;
	return $array;
}

function bubbleSort($array)
{
	$t = count($array);
	$it = 1;
	$swapped = true;
	while ($swapped) {
		$swapped = false;
		for ($i = 1; $i <= $t - 1; $i++) {
			if ($array[$i-1] > $array[$i]) {
				$array = switchNum($array, $i - 1, $i);
				$swapped = true;
			}
		}
		$it++;
	}
	return ["iterations" => $it, "array" => $array];
}

function selectionSort($array)
{
	$it = 1;
	$n = count($array);
	for ($i=0; $i < $n - 1; $i++) { 
		$jMin = $i;
		for ($j=$i + 1; $j < $n; $j++) { 
			if ($array[$j] < $array[$jMin]) {
				$jMin = $j;
			}
		}

		if ($jMin != $j)
			$array = switchNum($array, $i, $jMin);
		$it++;
	}
	return ["iterations" => $it, "array" => $array];
}

function insertionSort($array)
{
	$i = 1;
	$it = 0;
	while ($i < count($array) - 1)
	{
		$j = $i;
		while($j > 0 && $array[$j-1] > $array[$j])
		{
			$array = switchNum($array, $j, $j-1);
			$j--;
		}
		$i++;
		$it++;
	}
	return ["iterations" => $it, "array" => $array];
}

function shellSort($array) 
{
	$cou = count($array)
    $int = round($cou/2);
    while($int > 0)
    {
	    for ($i = $int; $i < $cou; $i++) 
	    {
	    	$tmp = $array[$i];
	    	$j = $i;
	    	while($j >= $int && $array[$j-$int] > $tmp)
	    	{
	    		$array[$j] = $array[$j - $int];
	    		$j -= $int;
	    	}
	    	$array[$j] = $tmp;
        }
        $int = round($int/2.3);
    }
}


if (isset($_POST["sort"])) {
	$input = preg_split("/\s+/", $_POST["values"]);
	$input = preg_replace('/,/', '.', $input);
	$start = new DateTime();
	switch ($_POST["sort"]) {
		case 'selection':
			$sort = selectionSort($input);
			break;
		case 'bubble':
			$sort = bubbleSort($input);
			break;
		case 'insertion':
			$sort = insertionSort($input);
			break;
		case 'shell':
			$sort = shellSort($input);
			break;
	}

	$end = new DateTime();

	$result = new Analysis($start, $end, $sort["iterations"], $sort["array"]);
}

include "template.php";