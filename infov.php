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
      if(isset($_POST['submit']))
      {
      	$t1=$_POST['ADDHARCARD_NUMBER'];
      	$t2=$_POST['PANCARD_NUMBER'];
      	$t4=$_POST['VOTING_CARD_NUMBER'];
	

      	$sql_query = "INSERT INTO verification_details (ADDHARCARD_NUMBER,PANCARD_NUMBER,VOTING_CARD_NUMBER)
      	Values ('$t1','$t2','$t4')";

      	if (mysqli_query($conn,$sql_query))
      	{
      		echo '<script type="text/javascript"> alert("Data Submitted Successfully"); window.open("vote.html","_self"); </script>';
      	}
      	else
      	{
            echo "Error:" . $sql . "" . mysqli_error($conn);

      	}
      	mysqli_close($conn);
      }
?>
