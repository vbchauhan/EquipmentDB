<?php
function top()
	{
	$CurrentRequestURL=$_SERVER['REQUEST_URI'];
	//$CurrentRequestURLarr=explode("/",$CurrentRequestURL);
	// ======================= TOP HTML CODE STARTS HERE =====================
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 "http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="/<?php echo "equipmentdb";?>/css/main.css" rel="stylesheet" media="screen">
<title>Priddy Loan System</title>
<link rel="shortcut icon" href="/<?php echo "equipmentdb";?>/favicon.ico" type="image/x-icon">
</head>

<body>

<div id="banner">EQUIPMENT LOAN SYSTEM</div>

	<div id="container">
		<div id="topnavi">
    		<?php 
    			if (@$_SESSION["AUTH_USER"]==true) {
						print '<a href="/equipmentdb/logout.php">LOGOFF</a>';
						print '<a href="/equipmentdb/view_request_home.php">View Requests</a>';
						print '<a href="/equipmentdb/">Loan System</a>';
						print '<a href="/equipmentdb/generate_report.php">Reports</a>';
						print '<a href="/equipmentdb/admin.php">Admin</a>';
						}
					else
						{
						$LoginSelectStr='';
						if ($CurrentRequestURLarr[2]=="login") $LoginSelectStr=' class="selected"';
						print '<a href="/equipmentdb/login.php"'.$LoginSelectStr.'>LOGIN</a>';
						
						}
						?>
			<!-- <a href="/<?php //echo "equipmentdb";?>"<?php //if ($CurrentRequestURLarr[2]=="") print ' class="selected"'?>>Loan System</a>
			<a href="/equipmentdb/generate_report.php">Reports</a>;
			<a href="/<?php //echo "equipmentdb/admin.php";?>"<?php ?>>Admin</a> -->

            
            <?php 
			
            if (canupdate())
				{?>
	            <a href="/<?php echo "equipmentdb";?>/webadmin"<?php if ($CurrentRequestURLarr[2]=="webadmin") print ' class="selected"'?>>Admin</a>
				
                <?php } //END if (canupdate()?>
            
		</div>
<div id="content"><?php
	// ======================= TOP HTML CODE ENDS HERE =======================
	} // END function top()


function bottom()
	{
  	// ======================= BOTTOM HTML CODE STARTS HERE ==================== 
	?></div>
<div id="footer"><?php
	if (@$_SESSION["AUTH_USER"]==true)
		{
		$UserStr='[Logged in as '.ucwords(strtolower(@$_SESSION["AUTH_USER_NAME"])).' <EM>('.strtoupper(@$_SESSION["AUTH_USER_LOGINID"]).')</EM> with '.ucwords(strtolower(@$_SESSION["AUTH_USER_TYPE"])).' access]';
		print $UserStr;
		} //END if (@$_SESSION["AUTH_USER"]==true)
		
		if (strlen(@$_SESSION["LOANSYSTEM_GROUP"])>=1)
			{
			$LoanGroupStr='['.$_SESSION["LOANSYSTEM_GROUP"].' loan group selected]';
			print '&nbsp;&nbsp;&nbsp;&nbsp;'.$LoanGroupStr;		
			}
	?></div></body></html><?php
  	// ======================= BOTTOM HTML CODE END HERE ======================= 
	} // END bottom()
	
	
	
// end of file layout.php	
?>