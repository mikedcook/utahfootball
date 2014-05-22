<!DOCTYPE html>
<!--test -->
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<link href='http://fonts.googleapis.com/css?family=Graduate' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>
<body>
<?php include 'teams.php'; ?>
<?php 
date_default_timezone_set('America/Denver');


if ($opponentTime == "TBA") {
$kickoff = $opponentDate;
}else{
$kickoff = $opponentDate . $opponentTime;
};
$kickoffX = date("U", strtotime($kickoff));

$todayDay = date("M j, Y");
$todayTime = date("g:ia");
$today = $todayDay . " at " . $todayTime . " MDT";
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
<script type="text/javascript" src="js/timer.js"></script>
<div class="countdown">
	<div class="logos">
	
	<?php if ($opponentLocation == "here") { ?>
		<div class="logo opponent"><img src="<?php echo $opponentLogo; ?>" /></div>
		<div class="location"> AT </div>
		<div class="logo utah"><img src="images/utah.png" /></div>
	<? }else{ ?>
		<div class="logo utah"><img src="images/utah.png" /></div>
		<div class="location"> AT </div>
		<div class="logo opponent"><img src="<?php echo $opponentLogo; ?>" /></div>
	<?}; ?>
		
	</div>
	<div class="clear"></div>
	<div class="kickoff">
		<span class="block"><?php echo ($opponent) ?></span><br />
		<span class="kickoffDate">Kickoff: <?php echo ($opponentDate . " at " . $opponentTime . " MDT") ?></span>
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
	<table>
	<?php
		foreach ($opponentsArrays as $opponentArray) {
		?>
		<tr class="smalltimer">
			<td class="logo opponent tiny">
				<img src="<?php echo $opponentArray[logo]; ?>" />
			</td>
			<?
			echo ("<td>");
			if ($opponentArray[location] == "there"){echo "@ ";};
			echo ($opponentArray[name] . "</td>");
			echo ("<td>" . $opponentArray[date] . " at " . $opponentArray[time] . " MDT</td>");
			if ($opponentArray[winloss] != "") {
				echo "<td class=\"";
				if ($opponentArray[winloss] == "W") {
					echo "green\"> ";
				};
				if ($opponentArray[winloss] == "L") {
					echo "red\"> ";
				};
				echo ($opponentArray[winloss]);
				echo "</td>";
			};
			if ($opponentArray[score] != "") {
				echo "<td>";
				echo ($opponentArray[score]);
				echo "</td>";
			};
		};
		?>
		</tr>
	</table>
	
	</div>
	
</div>
	
	
</body>