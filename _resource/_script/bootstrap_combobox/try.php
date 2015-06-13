<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="bootstrap/combobox/bootstrap-combobox.css">
<script src="jquery-2.0.2.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/combobox/bootstrap-combobox.js"></script>

</head>
<body>
	
	
	<select class="combobox">
	  <option></option>
	  <option value="PA">Pennsylvania</option>
	  <option value="CT">Connecticut</option>
	  <option value="NY">New York</option>
	  <option value="MD">Maryland</option>
	  <option value="VA">Virginia</option>
	</select>

	<script type="text/javascript">
	  $(document).ready(function(){
		$('.combobox').combobox();
	  });
	</script>
</body>
</html>