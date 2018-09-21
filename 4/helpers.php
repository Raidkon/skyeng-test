<?php
/**
 * Created by PhpStorm.
 * User: Raidkon
 * E-mail: n@raidkon.com
 * Date: 21.09.2018
 * Time: 18:33
 */


function sum_big_int($a, $b) {
	
	if (!ctype_digit($a) || !ctype_digit($a)) {
		throw new \RuntimeException(sprintf('Function %s is only for positive decimal integers', __FUNCTION__));
	}
	
	
	$result = '';
	$maxLen = max(strlen($a), strlen($b));
	$aRev   = strrev($a);
	$bRev  = strrev($b);
	
	$remain = 0;
	
	for ($i = 0; $i <= $maxLen; $i++)
	{
		$aRes = isset($aRev[$i]) ? (int)$aRev[$i] : 0;
		$bRes = isset($bRev[$i]) ? (int)$bRev[$i] : 0;
		
		$sum = $aRes + $bRes + $remain;
		$value = $sum % 10;
		$remain = intdiv($sum, 10);
		
		$result .= $value;
	}
	
	return ltrim(strrev($result), '0');
}