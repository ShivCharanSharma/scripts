<?php
if(!(isset($_POST['login']) && isset($_POST['password'])))
{
	header("location:index.php");

}
$login=rtrim($_POST['login']);
$password=rtrim($_POST['password']);
$crn=rtrim($_POST['crn']);
$servername = "localhost";
$username = "";
$passwordDB = "";
$db="ims";

// Create connection
$conn = mysqli_connect($servername, $username, $passwordDB,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="select login from users where `login`= '$login' and `password`='$password'";
$result=$conn->query($sql);

if ( $result->num_rows > 0) {
	$row=$row = $result->fetch_assoc();
	if($login==$row['login']){
		$sql ='select * from students where 	uniRollNumber='.$crn;
		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			
			// output data of each row
			
			$row = $result->fetch_assoc();
			DrawTable($row);
    
} else {
    echo "0 results";
}
	}
    
} else {
    
	echo "Invalid User Name or Password";
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

function DrawTable($data)
{?>
<html><head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script></head><body><div class "container">

<table class='table'>
		<tr>
			<td colspan='2'>
			<img src=<?php echo $data['image'] ;?>>
			</td>
		</tr>
		<tr>
		<td>Name</td> <td><?php echo $data['fname']. " ".$data['lname'];?></td>
		</tr>
		<tr>
			<td>University Roll No.</td>
			<td><?php echo $data['uniRollNumber'];?></td>
		<tr>
			<td>College Roll No.</td>
			<td><?php echo $data['collegeRollNumber'] ;?></td>
		</tr>
			<tr>
			<td>Branch</td>
			<td><?php echo $data['branch'];?></td>
		</tr>
			<tr>
			<td>Day Scholer/Hostler</td>
			<td>
<?php
if($data['dayScholer']){ echo 'Day Scholer';}else{ echo 'Hostler';}
?>
	 </td>	
		<tr>
			<td>Mobile Number</td>
			<td><?php echo $data['mobileNo'];?></td>
		</tr>
		
		</tr>
			<tr>
			<td>Email Id</td>
			<td><?php $data['email']; ?></td>
		<tr>
			<td>Address</td>
			<td><?php echo $data['address']; ?></td>
		</tr>
		
		</tr>
			<tr>
			<td>Admission Date</td>
			<td><?php echo $data['admissionDate'];?></td>
		</tr>
			<tr>
			<td> Purposed Leaving</td>
			<td><?php echo $data['leavingDate'];?></td>
		</tr>
			<tr>
			<td>URL </td>
			<td><?php echo $data['qrUrl'];?></td>
		</tr></table></div></body></html>

<?php }?>

