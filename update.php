<?php
include ("global.php");
include ("layout.php");
include ("functions.php");

if($_GET['updatetype'] == 'updateitem')
{
	$query = "Update Items SET Description ='".$_GET['Description']."',Serial_number='".$_GET['Serial_number']."',Item_Type_ID=".$_GET['Item_Type_ID']." where Barcode ='".$_GET['Barcode']."'";
	$result = mysql_query($query);
	
}
else if($_GET['updatetype'] == 'additem')
{
	$query = "Insert into Items (Description,Serial_number,Barcode,Item_Type_ID) values ('".$_GET['Description']."','".$_GET['Serial_number']."','".$_GET['Barcode']."',".$_GET['Item_Type_ID'].")";
	echo $query;
	$result = mysql_query($query);

}
elseif ($_GET['updatetype']=='delitem')
{
	$query ="Delete from items where Barcode ='".$_GET['Barcode']."'";
	$result = mysql_query($query);
}



?>