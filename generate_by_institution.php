<?php    
    //Set content-type header
    header("Content-type: image/png");

    //Include phpMyGraph5.0.php
include ("global.php");
include ("layout.php");
include ("functions.php");
    include_once('phpMyGraph.php');
    
    //Set config directives
    $cfg['title'] = 'Results by Institution';
    $cfg['width'] = 700;
    $cfg['height'] = 500;
    $cfg['average-line-visible'] = false;
    
	$date1 =$_GET['date1'];
	
	$date2 = $_GET['date2'];
	
    $data = array();
    $dateQuery = "Select count(a.Name)as total, a.Name from Institutions as a ,Users as b ,Loans as c where c.Users_ID = b.Users_ID and b.Institutions_ID = a.Institutions_ID and c.Loan_Date between '".$date1."' and '".$date2."' group by a.Institutions_ID ";
    //echo $dateQuery;
    $result = mysql_query($dateQuery); // Run the query.
    //echo print_r($result);
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
    	$data[$row['Name']] = $row['total'];

    	//array_push($data,$temp);

    }
    //Set data

    //echo print_r($data);

    //Create phpMyGraph instance
    $graph = new phpMyGraph();
	
    //Parse
    if($_GET['type'] == 'line')
   		$graph->parseVerticalLineGraph($data, $cfg);
   	else
   		$graph->parseVerticalColumnGraph($data, $cfg);
?>