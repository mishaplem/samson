<?php 

function findSimple( int $a, int $b)
{
	$result = [];
	if ($a <= 0 || $b <= 0 || $b <= $a) {
		echo 'Ne vernie usloviya!';
		exit;
	} else {
		for ($i = $a+1; $i < $b; $i++) {
			$k = 0;
			for ($j = 1; $j <= $i; $j++) {
				if ($i % $j == 0){
					$k += 1;
				}
			}
			if ($k == 2) {
				$result[] = $i;
			}
		}
	}
	return $result;
}

function createTrapeze($a)
{
	$flag_otricaniya = 0;
	foreach ($a as $res) {
		if ($res < 0) {
			$flag_otricaniya = 1;
			break;
		}
	}
	if ((count($a) % 3 != 0) || ($flag_otricaniya == 1)){
		echo 'Ne vernie usloviya!';
		exit;
	} else {
		$arr_comb = ['a','b','c'];
		$result = [];
		$arr_res = array_chunk($a, 3);
		for ($i = 0; $i < count($arr_res); $i++) {
			$result[] = array_combine($arr_comb, $arr_res[$i]);
		}
		return $result;
	}
}

function squareTrapeze($a)
{
	$arr = createTrapeze($a);
	for ($i = 0; $i < count($arr); $i++) {
		$s_trap = (($arr[$i]['a'] + $arr[$i]['b']) * $arr[$i]['c']) / 2;
		$arr[$i]['s'] = $s_trap;
	}
	return $arr;
}

function getSizeForLimit($a, $b)
{
	$arr = squareTrapeze($a);
	$max_s = 1;
	$result = [];
	for ($i = 0; $i < count($arr); $i++) {
		if ($arr[$i]['s'] > $max_s) {
			$max_s = $arr[$i]['s'];
			if ($max_s <= $b) {
				$result[0] = $arr[$i]['a'];
				$result[1] = $arr[$i]['b'];
				$result[2] = $arr[$i]['c'];
			}
		}
	}
	return $result;
}

function getMin($a)
{
	$min = 2147483647;
	foreach ($a as $res) {
		if (!is_int($res)){
			echo "Massive ne chislovoi";
			exit;
		}
		if ($res < $min) {
			$min = $res;
		}
	}
	return $min;
}

function printTrapeze($a)
{
	$arr = squareTrapeze($a);
	echo '<table>';
	for ($i = 0; $i < count($arr); $i++) {
		echo '<tr>';
		echo '<td>'.$arr[$i]['a'].'</td><td>'.$arr[$i]['b'].'</td><td>'.$arr[$i]['c'].'</td><td>'.$arr[$i]['s'].'</td>';
		if ($arr[$i]['s'] % 2 != 0) {
		echo '<td>Нечетная площадь</td>';
		} else {
			echo '<td> </td>';
		}
		echo '</tr>';
	}
	echo '</table>';
}

abstract class BaseMath
{
	public $a;
	public $b;
	public $c;

	public function exp1($a, $b, $c)
	{
		return $a * ($b ^ $c);
	}

	public function exp2($a, $b, $c)
	{
		return ($a / $b) ^ $c;
	}

	public abstract function getValue();
}

class F1 extends BaseMath
{
	public function __construct($a, $b, $c)
	{
		$this->a = $a;
		$this->b = $b;
		$this->c = $c;
	}

	public function getValue()
	{
		return parent::exp1($this->a, $this->b, $this->c) + ((($this->a / $this->c) ^ $this->b) % 3) ^ min($this->a, $this->b, $this->c);
	}
}

?>