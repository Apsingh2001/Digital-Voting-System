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
      if(isset($_POST['save']))
      {
	$t1=$_POST['choose'];


      	$sql_query = "INSERT INTO result (choose)
      	Values ('$t1')";

      	if (mysqli_query($conn,$sql_query))
      	{
      		echo '<script type="text/javascript"> alert("Vote Submitted Successfully"); window.open("input.html","_self"); </script>';

      	}
      	else
      	{
            echo "Error:" . $sql . "" . mysqli_error($conn);

      	}
      	mysqli_close($conn);
      }
?>
