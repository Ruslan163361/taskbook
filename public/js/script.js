$(document).ready(function() {
	$('select').on('change', function() {
	  $('#taskbook_filter').submit();
	});
	
	$(".btn-del").on('click', function() {
		var id = $(this).attr("data");
		$.fancybox.open('<h2>Вы уверены что хотите удалить эту задачу</h2><button id="f_send" onclick="deltask('+id+');">Удалить</button>');
	});
});

function deltask(id){
	$.ajax({
		type: 'GET',
		url: '/deltask/'+id,
		success: function(data){
			$.fancybox.close();
		  	window.location.replace("/");
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
		   	console.log(XMLHttpRequest.responseText); 
		} 
	});
}