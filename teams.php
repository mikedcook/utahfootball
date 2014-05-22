<?php
$opponentsArrays = array (

"utahstate" => array(
	"name" => "Utah State",
	"mascot" => "Aggies",
	"date" => "Aug 29, 2013",
	"time" => "6:00pm",
	"logo" => "images/utahstate.jpg",
	"location" => "here",
	"winloss" => "W",
	"score" => "30-26"
),

"weberstate" => array(
	"name" => "Weber State",
	"mascot" => "Wildcats",
	"date" => "Sept 7, 2013",
	"time" => "12:00pm",
	"logo" => "images/weberstate.jpg",
	"location" => "here",
	"winloss" => "W",
	"score" => "70-7"
),

"oregonstate" => array(
	"name" => "Oregon State",
	"mascot" => "Beavers",
	"date" => "Sept 14, 2013",
	"time" => "8:00pm",
	"logo" => "images/oregonstate.jpg",
	"location" => "here",
	"winloss" => "L",
	"score" => "48-51 OT"
),

"byu" => array(
	"name" => "TDS",
	"mascot" => "Cougars",
	"date" => "Sept 21, 2013",
	"time" => "8:15pm",
	"logo" => "images/byu.jpg",
	"location" => "there",
	"winloss" => "W",
	"score" => "20-13"
),

"ucla" => array(
	"name" => "UCLA",
	"mascot" => "Bruins",
	"date" => "Oct 3, 2013",
	"time" => "8:00pm",
	"logo" => "images/ucla.jpg",
	"location" => "here",
	"winloss" => "L",
	"score" => "24-27"
),

"stanford" => array(
	"name" => "Stanford",
	"mascot" => "Cardinal",
	"date" => "Oct 12, 2013",
	"time" => "4:00pm",
	"logo" => "images/stanford.jpg",
	"location" => "here",
	"winloss" => "W",
	"score" => "27-21"
),

"arizona" => array(
	"name" => "Arizona",
	"mascot" => "Wildcats",
	"date" => "Oct 19, 2013",
	"time" => "8:00 pm",
	"logo" => "images/arizona.jpg",
	"location" => "there",
	"winloss" => "L",
	"score" => "35-24"
),

"usc" => array(
	"name" => "USC",
	"mascot" => "Trojans",
	"date" => "Oct 26, 2013",
	"time" => "2:00 pm",
	"logo" => "images/usc.jpg",
	"location" => "there",
	"winloss" => "L",
	"score" => "19-3"
),

"arizonastate" => array(
	"name" => "Arizona State",
	"mascot" => "Wildcats",
	"date" => "Nov 9, 2013",
	"time" => "2:00pm",
	"logo" => "images/arizonastate.jpg",
	"location" => "here",
	"winloss" => "L",
	"score" => "20-19"
),

"oregon" => array(
	"name" => "Oregon",
	"mascot" => "Ducks",
	"date" => "Nov 16, 2013",
	"time" => "2:00pm",
	"logo" => "images/oregon.jpg",
	"location" => "there",
	"winloss" => "L",
	"score" => "44-21"
),

"washingtonstate" => array(
	"name" => "Washington State",
	"mascot" => "Cougars",
	"date" => "Nov 23, 2013",
	"time" => "12:30pm",
	"logo" => "images/washingtonstate.jpg",
	"location" => "there",
),

"colorado" => array(
	"name" => "Colorado",
	"mascot" => "Buffaloes",
	"date" => "Nov 30, 2013",
	"time" => "12:00pm",
	"logo" => "images/colorado.jpg",
	"location" => "here",
),

);

foreach ($opponentsArrays as $opponentArray) {
	$opponentArrayDate = $opponentArray[date] . " " . $opponentArray[time];
	if (date("U", strtotime($opponentArrayDate)) >= date("U") - 21600) {
		$opponentName = $opponentArray[name];
		$opponentDate = $opponentArray[date];
		$opponentTime = $opponentArray[time];
		$opponentLogo = $opponentArray[logo];
		$opponentLocation = $opponentArray[location];
		return 0;
	}
}

?>