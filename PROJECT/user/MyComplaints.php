<?php

include('../Assets/connection/connection.php');
session_start();
include('Head.php');

if(isset($_GET['id']))
{
	$del="delete from tbl_complaint where complaint_id='".$_GET['id']."'";
	if($con->query($del))
	{
		?>
		<script>
		alert('deleted');
		window.location='MyComplaints.php';
		</script>
		<?php
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
<table  width="100%" border="0" cellspacing="0" cellpadding="10" align="center">
    <tr>
      <td>#</td>
      <td>Title</td>
      <td>Description</td>
      <td>Date</td>
      <td>Reply</td>
      <td>Action</td>
    </tr>
     <?php
	$i=0;
		$selQry="select * from tbl_complaint where user_id=".$_SESSION['uid'];
	$row=$con->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['complaint_title'] ?></td>
      <td><?php echo $data['complaint_description'] ?></td>
      <td><?php echo $data['complaint_date'] ?></td>
      <td><?php
      if($data['complaint_status']==1)
	  {
		  echo $data['complaint_reply'];
	  }
	  else
	  {
		  echo "Not Replyed";
	  }
	  ?></td>
      <td> <a href="MyComplaints.php?id=<?php echo $data['complaint_id'] ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
  </form>
</body>
</html>