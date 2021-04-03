
function actualiza()
{
	$(document).ready(function () {
		$("#texto1").keyup(function () {
			var value = $(this).val();
			$("#texto2").val(value);
		});
	});
	
}
