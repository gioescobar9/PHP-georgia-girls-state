<?php
function genStudentPass($auxID){
	$toReturn = "Stu".$auxID;
	$toReturn .= getSuffix();
	return $toReturn;

}

function genSchoolPass($auxID){
	$toReturn = "Sch".$auxID;
	$toReturn .= getSuffix();
	return $toReturn;	
}

function getSuffix(){
	$suffix = "";
	$time = $_SERVER["REQUEST_TIME"];

	$length = 4;
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$part1 = substr(str_shuffle($chars),0, $length);


	$chars = '123456789';

	$num1 = (int)substr(str_shuffle($chars),0,5);
	$finalNum = (int)($num1 / ((int)$time));

	$suffix = $part1.$finalNum;
	return $suffix;
}
?>