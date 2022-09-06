<script type="text/javascript">
	$(function(){
		loadtabs(2,2);
		loaddataresults(2);
		loaddataresults_stat(2);
	});

	function loaddataresults(ids=''){
		$.get( "https://www.zeald.com/developer-tests-api/x_endpoint/nba.players/id/"+ids+"?API_KEY=few823mv__570sdd0342", function( data ) {
		  	var obj = JSON.parse(data);
 			var lilist = "";
 			var fnames = obj[0].name;
 			var fnamesnew = obj[0].first_name+'-'+obj[0].last_name;
            $("#tnumber").text(obj[0].number);
            $("#tfirstname").text(obj[0].first_name);
            $("#tlastname").text(obj[0].last_name);
            $("#timage").attr("src","static/images/players/nba/"+fnamesnew.toLowerCase()+".png");
            $("#tposition").text(obj[0].position);
            $("#tweight").text(obj[0].weight);
            $("#theight").text(Math.round(testConversion(obj[0].feet,obj[0].inches)));
            $("#tage").text(getAge(obj[0].birthday));

		});
	}

		function loaddataresults_stat(ids=''){
		$.get( "https://www.zeald.com/developer-tests-api/x_endpoint/nba.stats/player_id/"+ids+"?API_KEY=few823mv__570sdd0342", function( data ) {
		  	var obj = JSON.parse(data);
 			var lilist = "";
            const features = ['assists per game','points per game','rebounds per game']; 
            var feat = "";
            for (var i = 0; i < features. length; i++) {
            	if(features[i]=='assists per game'){
            		feat = obj[0].assists;
            	}else if(features[i]=='points per game'){
            		feat = obj[0].points;
            	}else if(features[i]=='rebounds per game'){
            		feat = obj[0].rebounds;
            	}
			    lilist += '<div class="feature">';
            		lilist += '<h3>'+features[i]+'</h3>'+ feat;
                lilist += '</div>';
			}
			$(".features").html(lilist);

		});
	}



	function loadtabs(datas,datanum){
		$.get( "https://www.zeald.com/developer-tests-api/x_endpoint/nba.players?API_KEY=few823mv__570sdd0342", function( data ) {
		  	var obj = JSON.parse(data);
 			var lilist = "";
 			var lastlist = "";
 			var ctr = 1;

            $.each(obj,function(key, value){ 
            	if(datas=='' || datas==1 || datas==2){
            		if(key>2) return false;
	                lilist += '<div class="tabheadeader fornbabg" id="ul'+obj[key].id+'">';
	                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].first_name+" "+obj[key].last_name+'</span>';	
	                lilist += '</div>';
	                ctr++;
            	}else if(datas==3 || datas==4 || datas==5){
            		if((datas==3 && datanum==3 ) || (datas==4 && datanum==3)){
            			if(key>1){
	            			if(key>4) return false;
	            			lilist += '<div class="tabheadeader fornbabg" id="ul'+obj[key].id+'">';
			                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].first_name+" "+obj[key].last_name+'</span>';	
			                lilist += '</div>';
			                ctr++;
	            		}
            		}
            		if(datas==3 && (datanum==2 || datanum==1   )){
            			if(key>0){
	            			if(key>3) return false;
	            			lilist += '<div class="tabheadeader fornbabg" id="ul'+obj[key].id+'">';
			                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].first_name+" "+obj[key].last_name+'</span>';	
			                lilist += '</div>';
			                ctr++;
	            		}
            		}
            		if(datas==4 && (datanum==2 || datanum==1) ){
            			if(key>1){
	            			if(key>4) return false;
	            			lilist += '<div class="tabheadeader fornbabg" id="ul'+obj[key].id+'">';
			                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].first_name+" "+obj[key].last_name+'</span>';	
			                lilist += '</div>';
			                ctr++;
	            		}
            		}
            		
            		if(datas==5 && (datanum==3 || datanum==2 ||  datanum==1) ){
            			if(key>2){
	            			if(key>5) return false;
	            			lilist += '<div class="tabheadeader fornbabg" id="ul'+obj[key].id+'">';
			                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].first_name+" "+obj[key].last_name+'</span>';	
			                lilist += '</div>';
			                ctr++;
	            		}
            		}
            		
            	}else if(datas==6){
            		if(datas==6 && (datanum==3 || datanum==2 || datanum==1)){
            			if(key>3){
	            			if(key>6) return false;
	            			lilist += '<div class="tabheadeader fornbabg" id="ul'+obj[key].id+'">';
			                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].first_name+" "+obj[key].last_name+'</span>';	
			                lilist += '</div>';
			                ctr++;
	            		}
            		}

            		
            		
            	}else if(datas==7 || datas == 8){
            		if((datanum==3 || datanum==2 || datanum==1)){
	            		if(key>3){
	            			if(key>7) return false;
	            			lilist += '<div class="tabheadeader fornbabg" id="ul'+obj[key].id+'">';
			                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].first_name+" "+obj[key].last_name+'</span>';	
			                lilist += '</div>';
			                ctr++;
	            		}
            		}
            		
            		
            	}
            	
            });
            $(".results").html(lilist);
            $(".result").html(data);
            $("#li"+datas).addClass('activetab_data');
            $("#ul"+datas).addClass('activetab');
            $(".tabhdata").click(function(){
            	var thisid = this.id.split('li');
            	var datanum = $("#"+this.id).data('num');
				loadtabs(thisid[1],datanum);
				loaddataresults(thisid[1]);
				
			});

		});
	}

	const getAge = birthDate => Math.floor((new Date() - new Date(birthDate).getTime()) / 3.15576e+10)

	const testConversion = (feet, inches) => {
	  const cmTotal = feet * 30.48 + inches * 2.54;
	  return cmTotal;
	};




</script>