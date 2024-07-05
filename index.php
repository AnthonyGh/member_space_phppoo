<?php
	if(session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="resources/img/favicon.svg">
	<link rel="stylesheet" type="text/css" href="resources/styles.css">
	<link rel="stylesheet" type="text/css" href="resources/bootstrap5.min.css">
	<link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<title>My Beautiful Website</title>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script type="text/javascript" src="resources/bootstrap5.min.js"></script>
</head>
<body>
	<?php
		include("header.php");

		include("path.php");
	
		include("footer.php");
	?>
</body>
</html>