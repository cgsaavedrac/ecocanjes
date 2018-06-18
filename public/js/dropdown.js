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