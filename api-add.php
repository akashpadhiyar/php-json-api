<?php
$connection = mysqli_connect("localhost", "root", "", "db_aptutorials") or die(mysqli_connect_error());

$response = array();
if (isset($_POST['st_name']) && isset($_POST['st_email']) && isset($_POST['st_mobileno'])) {

    $st_name = mysqli_real_escape_string($connection,$_POST['st_name']);
    $st_email = mysqli_real_escape_string($connection,$_POST['st_email']);
    $st_mobileno = mysqli_real_escape_string($connection,$_POST['st_mobileno']);
	 
    $query = mysqli_query($connection,"insert into tbl_student(`st_name`, `st_email`, `st_mobileno`)
           values('{$st_name}','{$st_email}','{$st_mobileno}')") or die(mysqli_error($connection));
    if ($query) {
        $response['flag'] = '1';
        $response["message"] = "Record Inserted ";
    } else {
        $response['flag'] = '0';
        $response["message"] = "Error in Query";
    }
    
} else {
     $response['flag'] = '0';
     $response["message"] = "Parameter Missing";
}
echo json_encode($response);
?>