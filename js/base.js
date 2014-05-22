$(document).ready(function($){
	$('.addNew button').click(function(){
		$('tr.inputForm').toggle();
		$('.addNew button').toggle();
/* 		$('.addNew button').show(); */
	});
	
	var editTemplate = "<tr class='inputForm'>"+
			"<form form class='form-inline' role='form' method='post' action='submit.php'>"+
			  "<td class='form-group'>"+
			    "<input type='file' id='teamLogo' name='logo'>"+
			 "</td>"+
			 " <td class='form-group'>"+
			    "<input type='text' class='form-control' id='teamName' name='team_name' placeholder='Team'>"+
			 " </td>"+
			  "<td class='form-group'>"+
			   " <input type='text' class='form-control' id='teamMascot' name='mascot' placeholder='Mascot'>"+
			  "</td>"+
			  "<td class='form-group'>"+
			    "<input type='date' class='form-control' id='gameDate' name='game_date' placeholder='Date'>"+
			  "</td>"+
			  "<td class='form-group'>"+
			    "<input type='text' class='form-control' id='gameTime' name='game_time' placeholder='Time'>"+
			  "</td>"+
			  "<td class='form-group'>"+
					"<input type='checkbox' id='isHome' name='is_home'>Home"+
				"</td>"+
				"<td class='form-group' colspan='2'>"+
				  "<select class='form-control' id='gameYear' name='year'>"+
						"<option>2014</option>"+
						"<option>2015</option>"+
						"<option>2016</option>"+
						"<option>2017</option>"+
						"<option>2018</option>"+
					"</select>"+
				"</td>"+
			  "<td>"+
			  	"<button type='submit' class='btn btn-default'>Submit</button>"+
			  "<td>"+
			"</form>"+
		"</tr>"
	
	$('.editBtn').click(function(){
		var row = $(this).parent().parent();
		var info = row.children('.teamInfo');
		var form = row.children('.editTeamInfo');
/* 		row.replaceWith(editTemplate); */
		info.hide();
		form.show();
		
		var teamId = row.attr('id');
		
/* 		row.children('td.logo').hide(); */
	});
	
	
});