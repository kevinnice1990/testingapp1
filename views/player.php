<script type="text/javascript">
	$(function(){
		loadtabs(2,2);
		loaddataresults(2);
	});

	function loaddataresults(ids=''){
		$.get( "https://www.zeald.com/developer-tests-api/x_endpoint/allblacks/id/"+ids+"?API_KEY=few823mv__570sdd0342", function( data ) {
		  	var obj = JSON.parse(data);
 			var lilist = "";
 			var fnames = obj[0].name;
 			var fnamesnew = fnames.split(" ");
            $("#tnumber").text(obj[0].number);
            $("#tfirstname").text(fnamesnew[0]);
            $("#tlastname").text(fnamesnew[1]);
            $("#timage").attr("src","static/images/players/allblacks/"+fnames.replace(' ','-').toLowerCase()+".png");
            $("#tposition").text(obj[0].position);
            $("#tweight").text(obj[0].weight);
            $("#theight").text(obj[0].height);
            $("#tage").text(obj[0].age);

            const features = ['points','games','tries']; 
            var feat = "";
            for (var i = 0; i < features. length; i++) {
            	if(features[i]=='points'){
            		feat = obj[0].points;
            	}else if(features[i]=='games'){
            		feat = obj[0].games;
            	}else if(features[i]=='tries'){
            		feat = obj[0].tries;
            	}
			    lilist += '<div class="feature">';
            		lilist += '<h3>'+features[i]+'</h3>'+ feat;
                lilist += '</div>';
			}
			$(".features").html(lilist);

		});
	}

	function loadtabs(datas,datanum){
		$.get( "https://www.zeald.com/developer-tests-api/x_endpoint/allblacks?API_KEY=few823mv__570sdd0342", function( data ) {
		  	var obj = JSON.parse(data);
 			var lilist = "";
 			var lastlist = "";
 			var ctr = 1;

            $.each(obj,function(key, value){ 
            	if(datas=='' || datas==1 || datas==2){
            		if(key>2) return false;
	                lilist += '<div class="tabheadeader" id="ul'+obj[key].id+'">';
	                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].name+'</span>';	
	                lilist += '</div>';
	                ctr++;
            	}else if(datas==3 || datas==4 || datas==5){
            		if((datas==3 && datanum==3 ) || (datas==4 && datanum==3)){
            			if(key>1){
	            			if(key>4) return false;
	            			lilist += '<div class="tabheadeader" id="ul'+obj[key].id+'">';
			                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].name+'</span>';	
			                lilist += '</div>';
			                ctr++;
	            		}
            		}
            		if(datas==3 && (datanum==2 || datanum==1   )){
            			if(key>0){
	            			if(key>3) return false;
	            			lilist += '<div class="tabheadeader" id="ul'+obj[key].id+'">';
			                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].name+'</span>';	
			                lilist += '</div>';
			                ctr++;
	            		}
            		}
            		if(datas==4 && (datanum==2 || datanum==1) ){
            			if(key>1){
	            			if(key>4) return false;
	            			lilist += '<div class="tabheadeader" id="ul'+obj[key].id+'">';
			                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].name+'</span>';	
			                lilist += '</div>';
			                ctr++;
	            		}
            		}
            		
            		if(datas==5 && (datanum==3 || datanum==2 ||  datanum==1) ){
            			if(key>2){
	            			if(key>5) return false;
	            			lilist += '<div class="tabheadeader" id="ul'+obj[key].id+'">';
			                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].name+'</span>';	
			                lilist += '</div>';
			                ctr++;
	            		}
            		}
            		
            	}else if(datas==6){
            		if(datas==6 && (datanum==3 || datanum==2 || datanum==1)){
            			if(key>3){
	            			if(key>6) return false;
	            			lilist += '<div class="tabheadeader" id="ul'+obj[key].id+'">';
			                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].name+'</span>';	
			                lilist += '</div>';
			                ctr++;
	            		}
            		}

            		
            		
            	}else if(datas==7 || datas == 8){
            		if((datanum==3 || datanum==2 || datanum==1)){
	            		if(key>4){
	            			if(key>8) return false;
	            			lilist += '<div class="tabheadeader" id="ul'+obj[key].id+'">';
			                	lilist += '<span class="tabhdata" data-num="'+ctr+'" id="li'+obj[key].id+'">'+obj[key].name+'</span>';	
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


	function cycletas(max,nums){

	}



</script>