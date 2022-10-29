<?php 

if(isset($_POST['fname']) && 
   isset($_POST['lname']) &&
   isset($_POST['uname']) && 
   isset($_POST['email']) &&
   isset($_POST['pass'])){

    include "../db_conn.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    

    $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($fname)) {
    	$em = "First name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($lname)){
    	$em = "Last name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($uname)){
    	$em = "User name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($email)){
    	$em = "Email name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "INSERT INTO user(fname, lname, username, email, password) 
    	        VALUES(?,?,?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$fname, $lname, $uname, $email, $pass]);

    	header("Location: ../login.php");
	    exit;
    }


}else {
	header("Location: ../index.php?error=error");
	exit;
}