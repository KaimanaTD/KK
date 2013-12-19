jQuery(document).ready(function(){
	var $LV = ('.LV');
	// URL for LV women: https://www.leaguevine.com/tournaments/19435/kaimana-klassik-women/
	var ID_women = 19435;
	// URL for LV open: https://www.leaguevine.com/tournaments/19436/kaimana-klassik-open/
	var ID_open = 19436;
	var tournament_params = [ID_women, ID_open];
	/*
	* Display Teams
	*/
	$.getJSON(LV_api_url+
		'tournaments/?tournament_ids='+encodeURIComponent(JSON.stringify(tournament_params))+
		'&access_token='+LV_access_token,
		function(json){
			/* 
			* Should return JSON of the form:
			* json.meta ...
			* json.objects[0,1]
			* Each of these is a JSON tournament object.
			*/
			console.log(json.objects);
			var $target = $('#LV_list_teams'),
				add_us = $();
			for (var d=0; d<json.objects.length; d++) {
				var thisdiv = json.objects[d];
				var $d = $('<div/>',{'class':'grid-parent'});
				$d.append('<h2><a href="'+thisdiv.leaguevine_url+'">'+thisdiv.name+'</a></h2>');
				$.getJSON(LV_api_url+
					'tournament_teams/?tournament_ids='+encodeURIComponent(JSON.stringify([thisdiv.id]))+
					'&access_token='+LV_access_token,
					function(teams_json){
						for (var t=0; t<teams_json.objects.length; t++){
							var thisteam = teams_json.objects[t];
							var $t = $('<div/>',{'class':'team_row'});
							$t.append([
								$('<span/>',{
									'class':'grid-10',
									'text':thisteam.seed
								}),
								$('<span/>',{
									'class':'grid-90',
									'text':'<a href="'+thisteam.team.leaguevine_url+'">'+thisteam.team.name+'</a>'
								})
							]);
						}
					});
				
				//Write to document
				$target.append($d);
			}
			

		}
	)
});