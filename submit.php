<?php
include 'config.php';
include "vendor/vrana/notorm/NotORM.php";
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASS);
$db = new NotORM($pdo);
$teams = $db->teams();

$cv = 0;
foreach ($_POST as $column => $value) {
	$cv ++;
	$columnNames .= "'$column'";
	$valueNames .= "'$value'";
	if ($cv < count($_POST)) {
		$columnNames .= ', ';
		$valueNames .= ', ';
	}
}
	
$string = "INSERT INTO 'utahfootball'.'teams' (" . $columnNames . ") VALUES (" . $valueNames . ");";

print_r($_POST);
$result = $teams->insert($_POST);

echo '<br />' . $result;

/* 'team_name', 'mascot', 'logo', 'game_date', 'game_time', 'is_home', 'is_win', 'year' */
/* $teamName, $teamMascot, $teamLogo, $gameDate, $gameTime, $isHome, $gameYear */

?>