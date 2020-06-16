<?php
$conexion= mysqli_connect("localhost","root", "", "contable");

$select=mysqli_query($conexion, "select * from mayor");
while ($dat=mysqli_fetch_assoc($select)){
	$arr[]=$dat;
}
echo json_encode($arr);
?>