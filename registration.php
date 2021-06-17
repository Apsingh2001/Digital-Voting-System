<?php
     $servername="localhost";
     $username="root";
     $password="";
     $database_name="digital_locker";

     $conn=mysqli_connect($servername,$username,$password,$database_name);

     //now check the connection

     if(!$conn)
     {
     	die("connection falied:" . mysqli_connect_error());

     }
      if(isset($_POST['b1']))
      {
	$t1=$_POST['aadhar'];
      	$t2=$_POST['email_id'];
      	$t4=$_POST['phone_number'];
	$t3=$_POST['password'];

      	$sql_query = "INSERT INTO registration (aadhar,email_id,phone_number,password)
      	Values ('$t1','$t2','$t4','$t3')";

      	if (mysqli_query($conn,$sql_query))
      	{
      		echo '<script type="text/javascript"> alert("Registration Done Successfully...!"); window.open("login.html","_self"); </script>';
      	}
      	else
      	{
            echo "Error:" . $sql . "" . mysqli_error($conn);

      	}
      	mysqli_close($conn);
      }
?>
