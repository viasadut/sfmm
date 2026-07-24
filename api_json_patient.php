<?php 
$servername = "localhost";
$username = "root";
$password = "Godiloveu16";
$dbname = "sfmmkpjnew";
$pphone=$_REQUEST['phone'];
$eid=$_REQUEST['eid'];
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from patient where pphone='$pphone'";
$result = $conn->query($sql);
$results_array =array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //$results_array[$row['ID']] = array(
            $results_array[] = array(
                'mrn'=>$row['pmrn'],        
                'name'=>$row['pname'],
                        'age'=>$row['page'],
						'phone'=>$row['pphone'],
						'gender'=>$row['psex'],
						'dob'=>$row['bdate'],
                                );
    }
} else {
    echo "0 results";
}

$json_array = json_encode($results_array);
echo $json_array;