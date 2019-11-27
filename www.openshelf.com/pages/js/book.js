$(document).ready(function (){
	function fetch_book(){
		$.ajax({
			url:"selbook.php",
			method:"POST",
			success: function(data){
				$('#book_div').html(data);
			}
		});
	}
	fetch_book();

	$(document).on('click', '#btn_delete', function(){
		var id = $(this).data("id3");
		var src = $(this).data("id5");
		if (confirm("Are you sure want to delete this Record?"))
		{
		$.ajax({
			url:"../book/deleteFile.inc.php",
			method:"POST",
			data:{id:id, src:src},
			dataType: "text",
			success: function(data){
				alert(data);
				fetch_book();
			}
		});
		}
	});
})
