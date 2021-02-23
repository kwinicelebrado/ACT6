<?php
include($_SERVER['DOCUMENT_ROOT'].'/json/loginConnect.php');

$conn = mysqli_connect(db_host, db_username, db_password, db_name, db_port);

$query = "SELECT username, password FROM logins";
$result = mysqli_query($conn, $query);
// echo 
// 	"<table>
// 		<th>Username</th>
//         <th>Password</th>";
// if ($result->num_rows > 0){
$users = array();
while ($row = mysqli_fetch_assoc($result)) 
{
	$users[] = $row;
}
	echo 
	"<table>
		<th>Username</th>
        <th>Password</th>";
	foreach ($users as $dataTable) {
		echo "<style>
      		body{
      			position: relative;
            top: 100px;
            left: 35%;
            width: 500px;
            height: 300px;
      			}
      		table{
      			margin: 0;
            border: 2px solid black;
            border-collapse: collapse;
            width: 500px;
            }
          th, td {
            padding: 15px;
            text-align: left;
            text-align: center;
          }
            th{
                border: 2px solid black;
                background-color: #0B4044;
                color: white;
                }
            td{
                border: 1px solid black;
                background-color: #93C2C5;
                }
      		</style>";
      	echo "<tr>";
      	echo "<td>" . $dataTable['username'] . "</td>";
      	echo "<td>" . $dataTable['password'] . "</td>";
      	echo "</tr><br>";
	}
// }
// }
echo "</table>";

// echo "<pre>";
// print_r($arrJson);
// echo "</pre>";

?>