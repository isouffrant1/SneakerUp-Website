<?php

define( 'DB_NAME' , 'isouffrant1');
define( 'DB_USER' , 'isouffrant1');
define( 'DB_PASSWORD' , 'isouffrant1');
define( 'DB_HOST' , 'localhost');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 // Check connection
 if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
 }

function InsertInfo($email, $phone, $shoe, $size) {
    global $conn;

    $insert = "INSERT INTO shoeorder SET email = '$email', phone = '$phone', shoe = '$shoe', size = '$size' ";
    $result = $conn->query($insert);
} 

function DeleteInfo($id) {
    global $conn;

    $del = "DELETE FROM shoeorder WHERE id = '$id' ";
    $result = $conn->query($del);
}

function ShowInfo() {
    global $conn;

    $sql = "SELECT id, email, phone, shoe, size FROM shoeorder";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $delurl = "[<a href='' onclick= return(deletelist('$id'))>delete</a>]";
        echo "id: " . $row["id"]. " - Name: " . $row["email"]. " - Phone: " . $row["phone"]. " - Shoe: " . $row["shoe"]. " - Size: " . $row["size"]. " $delurl<br>";
    }
    } else {
    echo "0 results";
    }

}

$cmd = $_GET['cmd'];
 
if($cmd == 'create') {
    InsertInfo($_GET['email'], $_GET['phone'], $_GET['shoe'], $_GET['size']);
} else if($cmd == 'delete') {
    $id = $_GET['id'];
    DeleteInfo($id);
}

ShowInfo();
mysqli_close($conn);

?>