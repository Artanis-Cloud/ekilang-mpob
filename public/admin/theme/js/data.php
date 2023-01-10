<?php


//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ekilang_mpob_original');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT date_format(e.e101_sdate,'%d-%m-%Y'), count(p.e_nl),
FROM pelesen p, e101_init e, reg_pelesen r
WHERE p.e_nl = e.e101_nl and p.e_nl = r.e_nl and r.e_kat = 'PL91'
and e.e101_sdate is not null
group by e.e101_sdate
order by e.e101_sdate");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
