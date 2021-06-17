<?php
/* define('BASEPATH') OR exit ('no direct script access allowed');
class login extends MY_Controller
{
	public function Index()
	{
		$this->load->view('login');
	}
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email_id'))
			return redirect('input/index');
	}
}
*/

    $email_id = $_POST['email_id'];
    $password = $_POST['password'];

     $con = new mysqli("localhost","root","","digital_locker");

     if($con->connect_error)
     {
     	die("Failed To Connect : ".$con->connect_error);

     }
     else
      {

	$stmt = $con->prepare("select * from registration where email_id = ?");
	$stmt->bind_param('s',$email_id);
	$stmt->execute();
	$stmt_result = $stmt->get_result();

      	if($stmt_result->num_rows > 0)
      	{
      		$data = $stmt_result->fetch_assoc();
		if($data['password'] === $password)
		{
			echo '<script type="text/javascript"> alert("Login Done Successfully...!"); window.open("infov.html","_self"); </script>';

if(isset($_POST['s']))
      {
	$t1=$_POST['email_id'];
      	$t2=$_POST['password'];

      	$sql_query = "INSERT INTO login (email_id,password)
      	Values ('$t1','$t2')";

      	if (mysqli_query($con,$sql_query))
      	{
      		/* echo "Registration Sucessfull..!"; */
      	}
      	else
      	{
            echo "Error:" . $sql . "" . mysqli_error($con);

      	}
      	mysqli_close($con);
      }

		}
		else
		{
			echo "<h2>Invalid Email or Password</h2>";
		}
      	}
      	else
      	{
            echo "<h2>Invalid Email or Password</h2>";

      	}
      }
?>
