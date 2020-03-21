<?php

//fetch_data.php

$connect = new PDO("mysql:host=localhost;dbname=hal", "root", "");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
 $data = array(
  ':name'   => "%" . $_GET['NAME'] . "%",
  ':name'   => "%" . $_GET['NAME'] . "%",
  ':pb_no'     => "%" . $_GET['PB_NO'] . "%",
  ':agent'    => "%" . $_GET['AGENT'] . "%"
            );

echo "gettt";
 $query = "SELECT * FROM candidates WHERE 
 name LIKE :name AND name LIKE :name AND pb_no LIKE :pb_no AND agent LIKE :agent ORDER BY id DESC LIMIT 100";

 $statement = $connect->prepare($query);
 $statement->execute($data);
 $result = $statement->fetchAll();

 //print_r($result);
 foreach($result as $row)
 {
  $output[] = array(
   'id'    => $row['id'],   
   'name'  => $row['name'],
   'name'   => $row['name'],
   'pb_no'    => $row['pb_no'],
   'agent'   => $row['agent']
  );
 }
 header("Content-Type: application/json");
 echo json_encode($output);
}

if($method == "POST")
{
 $data = array(
  ':name'  => $_POST['name'],
  ':name'  => $_POST["name"],
  ':phone'    => $_POST["phone"],
  ':address'   => $_POST["address"]
 );

 $query = "INSERT INTO candidates (name, name, phone, address) VALUES (:name, :name, :phone, :address)";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == 'PUT')
{
 parse_str(file_get_contents("php://input"), $_PUT);
 
 echo "PUTTTTTT";
 $data = array(
  ':id'   => $_PUT['id'],
  ':name' => $_PUT['name'],
  ':name' => $_PUT['name'],
  ':phone'   => $_PUT['phone'],
  ':address'  => $_PUT['address']
 );
 $query = "
 UPDATE candidates 
 SET name = $_PUT[name], 
 phone =  $_PUT[phone], 
 address =  $_PUT[address] 
 WHERE id =  $_PUT[id]
 ";
echo $query;
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 $query = "DELETE FROM candidates WHERE id = '".$_DELETE["id"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
}
