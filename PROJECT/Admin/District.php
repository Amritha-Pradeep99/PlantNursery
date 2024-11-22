<?php

include("../Assets/connection/connection.php");
include('Head.php');
$eid=0;
$ename="";
if(isset($_POST["btn_submit"]))
{
	$district=$_POST["txt_name"];
	$eid=$_POST['txthidden'];
	
	if($eid!=0)
{
	$upqry="update tbl_district set district_name='".$district."' where district_id='".$eid."'";
	if($con->query($upqry))
	 {
		 ?>
         <script>
		 alert('updated');
		 window.location="District.php";
		 </script>
         <?php
	 }
}

else
{
	
	$insqry="insert into tbl_district(district_name)values('".$district."')";
	if($con->query($insqry))
	{
		?>
		<script>
		alert('inserted');
		window.location='District.php';
		</script>
		<?php
	}
}
}
if(isset($_GET['id']))
{
	$del="delete from tbl_district where district_id='".$_GET['id']."'";
	if($con->query($del))
	{
		?>
		<script>
		alert('deleted');
		window.location='District.php';
		</script>
		<?php
	}
}
	if(isset($_GET['editid']))
	{
		$selqry="select * from tbl_district where district_id='".$_GET['editid']."'";
		$r=$con->query($selqry);
		if($d=$r->fetch_assoc())
		{
			$eid=$d['district_id'];
			$ename=$d['district_name'];
		}
	}
	?>
	
	









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
  

  table {
    width: 100%;
    max-width: 600px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    border-collapse: collapse;
  }

  table, td {
    padding: 12px;
    border: none;
    text-align: left;
  }

  td {
    border-bottom: 1px solid #ddd;
  }

  td:first-child {
    font-weight: bold;
    color: #4caf50; /* Darker green for labels */
    width: 30%;
  }

  input[type="text"], textarea, select {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
  }

  input[type="file"] {
    border: none;
    background-color: #fff;
  }

  .buttons {
    text-align: center;
  }

  .buttons input[type="submit"] {
    background-color: #a8e6a3; /* Pastel green button */
    color: #333;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .buttons input[type="submit"]:hover {
    background-color: #81c784; /* Darker pastel green on hover */
  }

  img {
    border-radius: 5px;
    border: 2px solid #4caf50;
  }

  .action-buttons a {
    margin-right: 10px;
    color: #4caf50;
    text-decoration: none;
  }

  .action-buttons a:hover {
    text-decoration: underline;
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  
<table border="0" cellspacing="0" cellpadding="10" align="center">
          <tr>
            <td width="101">District Name</td>
            <td width="83">
              <input name="txthidden" type="hidden" value="<?php echo $eid ?>" />
              <input 
                type="text" 
                name="txt_name" 
                id="txt_name" 
                required 
                pattern="^[A-Z][a-zA-Z ]*$" 
                title="District name should start with a capital letter and contain only alphabetic characters and spaces." 
                value="<?php echo $ename ?>" 
              />
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div align="center">
                <input type="submit" name="btn_submit" id="btn_submit2" value="Submit" />
                <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
              </div>
            </td>
          </tr>
        </table>
      </form>
    </div>

    <!-- District List Table -->
    <div align="center">
      <h2>District List</h2>
      <table border="1" cellspacing="0" cellpadding="10" align="center">
        <tr>
          <th>#</th>
          <th>District Name</th>
          <th>Action</th>
        </tr>
        <!-- PHP Code to Fetch and Display District Data -->
        <?php
          $i = 0;
          $sel = "SELECT * FROM tbl_district";
          $row = $con->query($sel);
          while ($data = $row->fetch_assoc()) {
              $i++;
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo htmlspecialchars($data['district_name']); ?></td>
          <td>
            <a href="District.php?editid=<?php echo $data['district_id']; ?>">Edit</a>
            <a href="District.php?id=<?php echo $data['district_id']; ?>">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </table>
</form>
</body>
</html><?php
include('Foot.php');
?>