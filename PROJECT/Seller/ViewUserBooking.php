<?php
include('../Assets/connection/connection.php');


include('Head.php');
if(isset($_GET['ppid']))
{
	$upqry1="update tbl_booking set booking_status='3' where booking_id=".$_GET['ppid'];
	if($con->query($upqry1))
	{
		?>
        <script>
		alert("Plant Packed")
		window.location="ViewUserBooking.php"
		</script>
        <?php
	}
}
if(isset($_GET['psid']))
{
	$upqry2="update tbl_booking set booking_status='4' where booking_id=".$_GET['psid'];
	if($con->query($upqry2))
	{
		?>
        <script>
		alert("Plant Shipped")
		window.location="ViewUserBooking.php"
		</script>
        <?php
	}
}
if(isset($_GET['pdid']))
{
	$upqry3="update tbl_booking set booking_status='5' where booking_id=".$_GET['pdid'];
	if($con->query($upqry3))
	{
		?>
        <script>
		alert("Delivered")
		window.location="ViewUserBooking.php"
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
      <td>User</td>
      <td>Plant</td>
      <td>Price</td>
      <td>Photos</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
		$selQry="select * from tbl_cart c inner join tbl_booking b on c.booking_id=b.booking_id  inner join tbl_user u on u.user_id=b.user_id inner join tbl_plant p on c.plant_id=p.plant_id  where p.seller_id='".$_SESSION['sid']."'";
	$row=$con->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['user_name'] ?></td>
      <td><?php echo $data['plant_name'] ?></td>
      <td><?php echo $data['plant_price'] ?></td>
      <td><img src="../Assets/File/Plant/<?php echo 
      $data['plant_photo']?>" width="150px" height="150px"/></td>
      <td><?php
	  if($data['booking_status']==1)
	  {
		  echo "Payment Incomplete";
	  }
	  else if($data['booking_status']==2)
	  {
		  echo "Payment Completed";
		  ?>
          <a href="ViewUserBooking.php?ppid=<?php echo $data['booking_id']?>">Plant Packed</a>
          <?php
	  }
      else if($data['booking_status']==3)
	  {
		  ?>
          <a href="ViewUserBooking.php?psid=<?php echo $data['booking_id']?>">Plant Shipped</a>
          <?php
	  }
	   else if($data['booking_status']==4)
	  {
		  ?>
          <a href="ViewUserBooking.php?pdid=<?php echo $data['booking_id']?>">Plant Delivered</a>
          <?php
	  }
	   else if($data['booking_status']==5)
	  {
		  echo "Order Completed.";
	  }
	  else
	  {
		  echo "Completed";
	  }
	  ?>
      </td>
    </tr>
    <?php } ?>
  </table>

 
</form>
</body>
</html>
<?php
include('Foot.php');
?>