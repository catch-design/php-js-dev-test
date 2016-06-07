jQuery(document).ready(function(){

	jQuery.ajax({
		url: "loadprofiles",
		dataType: "json"
	}).done(function(data){
		var datalength = data.length;
		var tablebody = jQuery("#profile-table-body");
		for(var i = 0; i < datalength; i++){
			//Depending on future functionality develop a 'class' for profile client side
			var tablerow = '<tr>' + 
				'<td>' + data[i].externalid + '</td>' +
				'<td>' + data[i].firstname + '</td>' +
				'<td>' + data[i].lastname + '</td>' +
				'<td>' + data[i].email + '</td>' +
				'<td>' + data[i].gender + '</td>' +
				'<td>' + data[i].ip_address + '</td>' +
				'<td>' + data[i].company + '</td>' +
				'<td>' + data[i].city + '</td>' +
				'<td>' + data[i].title + '</td>' +
				'<td>' + data[i].website + '</td>' +
				'</tr>';
			tablebody.append(tablerow);
		}
	});

});
