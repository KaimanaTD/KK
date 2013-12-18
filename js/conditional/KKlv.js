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
			console.log(json);
		}
	)
});