var page = 1;
$('#more').click(function(){
	$('#more').prop('disabled', true);
	$('#more').text('Loading ...').button("refresh");
	page += 1;
	getList(page,$('#orderby').val());
	$('#more').prop('disabled', false);
	$('#more').text('Load More').button("refresh");
});
$('#orderby').change(function(){
	page = 1;
	$('#list').empty();
	getList(page,$(this).val());
});
function getList(page,order){
	$.ajax({
		    	url : 'getList',
		    	dataType: "json",
		    	type : 'POST',
		    	async: false,
		    	data:{
		    		p: page,
		    		o: order
		    	},
		    	error: function(XMLHttpRequest, textStatus, errorThrown){
		      		alert("Internal Error! Try again later!"+textStatus+errorThrown);
		    	},
		    	success: function(data){
		    		var html = "";
		    		console.log(data);
		    		if(data != null){
			    		$.each(data,function(index,array){
		    				html += "<tr><td>"+array['id']+"</td><td>"+array['first_name']+"</td><td>"+array['last_name']+"</td><td>"+array['email']+"</td><td>"+array['gender']+"</td><td>"+array['ip_address']+"</td><td>"+array['company']+"</td><td>"+array['city']+"</td><td>"+array['title']+"</td><td><a href=\""+array['website']+"\" target=\"_blank\">Link</a></td></tr>"
			    		});
			    		$('#list').append(html);
		    		}else{
			    		$('#alert').fadeIn( 100 ).delay( 3000 ).slideUp( 300 );
		    		}
		    	}
	});
}