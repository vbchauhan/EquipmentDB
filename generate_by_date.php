<?php    
    //Set content-type header
    header("Content-type: image/png");

    //Include phpMyGraph5.0.php
include ("global.php");
include ("layout.php");
include ("functions.php");
    include_once('phpMyGraph.php');
    
    //Set config directives
    $cfg['title'] = 'Results by Date';
    $cfg['width'] = 700;
    $cfg['height'] = 500;
    $cfg['average-line-visible'] = false;
    
	$date1 =$_GET['date1'];
	
	$date2 = $_GET['date2'];
	
    $data = array();
    $dateQuery = "select count(Loan_Date) as total,loan_date from loans where Loan_Date between '".$date1."' and '".$date2."' group by Loan_Date ";
    //echo $dateQuery;
    $result = mysql_query($dateQuery); // Run the query.
    //echo print_r($result);
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
    	$data[$row['loan_date']] = $row['total'];

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