<!--<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport"
	content="width=device-width, initial-scale=1, user-scalable=yes">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
 
	<div class="container-fluid" style="margin-top: 100px">
 
		@yield('content')
	</div>
	<style type="text/css">
	.table {
		border-top: 2px solid #ccc;
 
	}
</style>
</body>
</html>-->
<!DOCTYPE html>
<html>
<head>
	<title>Jquery</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var max_fields=20;
			var wrapper=$(".table-container");
			var add_button=$(".add_field_button");

			var x=1;
			$(add_button).click(function(e){
				e.preventDefault();

				if(x<max_fields){
					x++;
					$(wrapper).append('<form method="POST" action="{{ route('reservation.store') }}"  role="form" name="myform[]"><form>');
				}
			});
		});
	</script>
</head>
<body>

</body>
</html>