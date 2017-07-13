<?php 
if ((isset($_SERVER['ENVIROMENT'])) && ($_SERVER['ENVIROMENT'] =='PhpUnit'))
{
	define('HOST','localhost'); 
	define('USER','PooPhpUnitUser');
	define('PASS','PooPhpUnitPass');
	define('DBNAME','PooPhpUnitDB');
} else
{
	define('HOST','localhost'); 
	define('USER','testPooUser');
	define('PASS','testPooPass');
	define('DBNAME','testPooDB');
}

