
<!-- For connection -->
<?php
$mysqli= new mysqli("localhost","root","","fileup");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}
?>