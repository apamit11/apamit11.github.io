<html lang="en">
<head>
  <title>Campus e-Store</title>
  <link rel="icon" href="images/favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
include "connection.php";
if(!isset($_SESSION["username"]))
{
	?>
  <script type="text/javascript">
    window.location="login1.php";
  </script>
  <?php
}
else
{
$result1=mysqli_query($conn,"select * from cart where username='$_SESSION[username]'");
$count=mysqli_num_rows($result1);
if($count==1)
{
	echo '<div class="container"><center><div style="margin-top:25px;" class="alert alert-danger"><center>An item is already added in your cart</center></div></center></div>';
					?>
						<script type="text/javascript">
							setTimeout(function(){window.location.href='index.php'},1500);
						</script>
					<?php
}
else
{
$query1="insert into cart value('','$_SESSION[img]','$_SESSION[stream]','$_SESSION[sem]','$_SESSION[username]')";
$results=mysqli_query($conn,$query1);
if($results)
{
	?>
	<script type="text/javascript">
		alert("Item added to cart successfully");
		window.location="index.php";
	</script>
	<?php
}
else
{
	?>
	<script type="text/javascript">
		alert("Item has not added");
		window.location="single1.php";
	</script>
	<?php
}}}
?>
</body>
</html>