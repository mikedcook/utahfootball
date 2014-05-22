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

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<div class="container sub">
<form role="form" method="post">
  <div class="form-group">
    <input type="text" class="form-control" id="teamName" placeholder="School Name">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="teamMascot" placeholder="Mascot">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="gameDate" placeholder="Game Date">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="gameTime" placeholder="Game Time">
  </div>
  <div class="radio">
		<input type="radio" name="locationSelection" id="locationSelection" value="1">
		Home
	</div>
	<div class="radio">
		<input type="radio" name="locationSelection" id="optionsRadios2" value="0">
		Away
	</div>
	<label for="gameYear">Game Year</label>
  <select class="form-control" id="gameYear">
		<option>2014</option>
		<option>2015</option>
		<option>2016</option>
		<option>2017</option>
		<option>2018</option>
	</select>
  <div class="form-group">
    <label for="teamLogo">Team Logo</label>
    <input type="file" id="teamLogo">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

</body>
</html>