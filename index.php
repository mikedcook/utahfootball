<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Utah Football Schedule and Scores</title>
	<link rel="icon" type="image/png" href="images/utah.png">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link href='http://fonts.googleapis.com/css?family=Graduate' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/base.js"></script>
	<script type="text/javascript" src="js/timer.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<?php 
date_default_timezone_set('America/Denver');

//Connect to database
include 'config.php';
include "vendor/vrana/notorm/NotORM.php";
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASS);
$db = new NotORM($pdo);

$teams = $db->teams();
$n = 0;
foreach ($teams as $team) {
	while ( $n < 1 ) :
		$opponentArrayDate = $team['game_date'] . $team['game_time'];
		if (date("U", strtotime($opponentArrayDate)) >= date("U") - 21600) {
			$n ++;
			$opponentName = $team['team_name'];
			$opponentDate = date("M j, Y", strtotime($team['game_date']));
			if ($team['game_time']) {
				$opponentTime = date("g:i A", strtotime($team['game_time']));
			} else {
				$opponentTime = "TBD";
			};
			$opponentLogo = $team['logo'];
			$opponentMascot = $team['mascot'];
			$opponentLocation = $team['is_home'];
		}
	endwhile;
}

if ($opponentTime == "TBD") {
$kickoff = $opponentDate;
}else{
$kickoff = $opponentArrayDate;
};
$kickoffX = date("U", strtotime($kickoff));

$todayDay = date("M j, Y");
$todayTime = date("g:ia");
$today = $todayDay . ", " . $todayTime . " MT";
$todayX = date("U");
//$today = "Sept 3, 2013 8:59pm";
//$todayX = date("U", strtotime("$today"));

if ($kickoffX >= $todayX - 21600) {
$opponent = $opponentName;
}else{
$opponent = "UNKNOWN";
};

$difference = $kickoffX - $todayX;
$countDown = ($difference / 60 / 60 / 24);
$cdDays = floor($countDown);
$cdHoursX = ($countDown - $cdDays) * 24;
$cdHours = floor($cdHoursX);
$cdMinutesX = ($cdHoursX - $cdHours) * 60;
$cdMinutes = floor($cdMinutesX);
$cdSecondsX = ($cdMinutesX - $cdMinutes) * 60;
$cdSeconds = floor($cdSecondsX);

if ($cdDays == 1){$days = "day";}else{$days = "days";};
if ($cdHours == 1){$hours = "hour";}else{$hours = "hours";};
if ($cdMinutes == 1){$minutes = "minute";}else{$minutes = "minutes";};
if ($cdSeconds == 1){$seconds = "second";}else{$seconds = "seconds";};
?>
<div class="container">
	<!-- <div class="jumbotron">
		<h1>Mike's Utah Football App</h1>
		<p>...</p>
		<p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
	</div> -->
	
	<div class="countdown">
		<div class="logos">
		
		<?php if ($opponentLocation == "1") { ?>
			<div class="logo opponent"><img src="<?php echo "images/" . $opponentLogo; ?>" /></div>
			<div class="location"> AT </div>
			<div class="logo utah"><img src="images/utah.png" /></div>
		<? }else{ ?>
			<div class="logo utah"><img src="images/utah.png" /></div>
			<div class="location"> AT </div>
			<div class="logo opponent"><img src="<?php echo "images/" . $opponentLogo; ?>" /></div>
		<?}; ?>
			
		</div>
		<div class="clear"></div>
		<div class="kickoff">
			<span class="block"><?php echo ($opponentName) ?></span><br />
			<span class="kickoffDate">Kickoff: <?php echo ($opponentDate . " at " . $opponentTime) ?></span>
		</div>
		<div class="currentDate">
			Current Date: <?php echo ($today) ?>
		</div>
		<br />
		<div class="timer">
			<span class="block dayCounter"><? echo ($cdDays); ?></span><?php echo ($days . ", ");?>
			<span class="block hourCounter"><? echo ($cdHours); ?></span><?php echo ($hours.", ");?>
			<span class="block minuteCounter"><? echo ($cdMinutes); ?></span><?php echo ($minutes.", and");?>
			<span class="block secondCounter"><?php echo ($cdSeconds) ?></span> <?php echo ($seconds) ?> until kickoff!
		</div>
		
		<div class="schedule">
		<table class="table">
			<tr>
				<th></th>
				<th>Team</th>
				<th>Mascot</th>
				<th>Date</th>
				<th>Time</th>
				<th>Win/Loss</th>
				<th>Score</th>
			</tr>
			
		<?php
		
		// begin schedule table
		
			foreach ($teams as $team) : 
				$gameDateRaw = strtotime($team["game_date"]);
				$gameDate = date("M j, Y", $gameDateRaw);
				$gameTime = date("g:i A", $gameDateRaw);
				?>
				
					<tr class="smalltimer" id="<?php echo $team["id"]; ?>">
						<td class="logo opponent tiny">
							<?php
								if ( $team['team_name'] != 'Open Date' ) {
									echo "<img src='images/" . $team['logo'] . "' />";
								}; 
							?>
						</td>
						<?php
						echo "<td>";
						if (!$team["is_home"]){echo "@ ";};
						echo ($team["team_name"] . "</td>");
						?>
						<td>
							<?php echo $team['mascot']; ?>
						</td>
						<td>
							<?php echo $gameDate; ?>
						</td>
						<td>
							<?php
								if ($gameTime != '12:00 AM') {
									echo $gameTime . " MT";
								} else {
									echo "TBD";
								};
							?>
						</td>
						<?php
							$uScore = $team["utah_score"];
							$oScore = $team["opp_score"];
							if ($uScore != "" && $oScore != "") {
								if ($uScore > $oScore) {
									echo "<td class='green'>W</td>";
								} else {
									echo "<td>L</td>";
								}
								echo ("<td>" . $uScore . "-" . $oScore . "</td>");
							} else {
								echo "<td>n/a</td>";
								echo "<td>n/a</td>";
							};
						?>
						<td><a class="glyphicon glyphicon-pencil editBtn"></a></td>
					</tr>
					<!-- edit team -->
					<tr class="editTeamInfo smalltimer" id="<?php echo $team['id']; ?>" style="display:none;">
						<form class="form-inline" role="form" method="post" action="submit.php">
						  <td class="form-group logo opponent tiny">
								<?php
									if ( $team['team_name'] != 'Open Date' ) {
										echo "<img src='images/" . $team['logo'] . "' />";
									}; 
								?>
						    <input type="file" id="teamLogo" name="logo">
						  </td>
						  <td class="form-group">
						    <input type="text" class="form-control" id="teamName" name="team_name" placeholder="Team">
						  </td>
						  <td class="form-group">
						    <input type="text" class="form-control" id="teamMascot" name="mascot" placeholder="Mascot">
						  </td>
						  <td class="form-group">
						    <input type="date" class="form-control" id="gameDate" name="game_date" placeholder="Date">
						  </td>
						  <td class="form-group">
						    <input type="text" class="form-control" id="gameTime" name="game_time" placeholder="Time">
						  </td>
						  <td class="form-group">
								<input type="checkbox" id="isHome" name="is_home">
								Home
							</td>
							<td class="form-group" colspan="2">
							  <select class="form-control" id="gameYear" name="year">
									<option>2014</option>
									<option>2015</option>
									<option>2016</option>
									<option>2017</option>
									<option>2018</option>
								</select>
							</td>
						  <td>
						  	<button type="submit" class="btn btn-default">Submit</button>
						  </td>
						</form>
					</tr>
					<!-- END edit team -->
		<?php
			endforeach;
		?>
		
		
		
		<!-- form to add a new team -->
		<tr class="inputForm" style="display:none;">
			<form form class="form-inline" role="form" method="post" action="submit.php">
			  <td class="form-group">
			    <input type="file" id="teamLogo" name="logo">
			  </td>
			  <td class="form-group">
			    <input type="text" class="form-control" id="teamName" name="team_name" placeholder="Team">
			  </td>
			  <td class="form-group">
			    <input type="text" class="form-control" id="teamMascot" name="mascot" placeholder="Mascot">
			  </td>
			  <td class="form-group">
			    <input type="date" class="form-control" id="gameDate" name="game_date" placeholder="Date">
			  </td>
			  <td class="form-group">
			    <input type="text" class="form-control" id="gameTime" name="game_time" placeholder="Time">
			  </td>
			  <td class="form-group">
					<input type="checkbox" id="isHome" name="is_home">
					Home
				</td>
				<td class="form-group" colspan="2">
				  <select class="form-control" id="gameYear" name="year">
						<option>2014</option>
						<option>2015</option>
						<option>2016</option>
						<option>2017</option>
						<option>2018</option>
					</select>
				</td>
			  <td>
			  	<button type="submit" class="btn btn-default">Submit</button>
			  </td>
			</form>
		</tr>
		<!-- END form to add a new team -->
		</table>
		<div class="addNew">
			<button type="button" class="btn btn-default addNewBtn">Add New Game</button>
			<button type="button" class="btn btn-default cancelBtn" style="display:none;">Cancel</button>
		</div>
		
	</div>

</div>


	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>