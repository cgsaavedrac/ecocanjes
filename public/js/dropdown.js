$("#region").change(function(event){
	if (event.target.value == ''){
		var url = '/admin/machine/cities/0';
		$("#city").empty();
		$("#city").append("<option value='"+0+"'>"+"Seleccione Comuna"+"</option>");
	}
	else {
		var url = '/admin/machine/cities/'+event.target.value;
		$.get(url,function(response, region){
			$("#city").empty();
			for(i=0;i<response.length;i++){
				$("#city").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
			}
		});
	}	
});

$("#region2").change(function(event){
	if (event.target.value == ''){
		var url = '/userapp/perfil/cities/0';
		$("#city2").empty();
		$("#city2").append("<option value='"+0+"'>"+"Seleccione Comuna"+"</option>");
	}
	else {
		var url = '/userapp/perfil/cities/'+event.target.value;
		$.get(url,function(response, region){
			$("#city2").empty();
			for(i=0;i<response.length;i++){
				$("#city2").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
			}
		});
	}	
});