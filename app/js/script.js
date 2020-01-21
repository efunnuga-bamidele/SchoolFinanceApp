$(document).ready(function(){
	$('#bank1').on('change', function(){
		if($("#bank1").val() == ""){
			$('#acount_no1').empty();
		}else{
			var search = $("#bank1").val();
			$.ajax({
				url: 'search.php',
				type: 'POST',
				data: {search: search},
				dataType: 'text',
				success: function(data){
					$("#acount_no1").val(data);
					// alert(data);
				}
			});
		}
	});
});