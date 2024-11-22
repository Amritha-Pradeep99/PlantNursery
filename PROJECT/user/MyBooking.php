<?php
include('../Assets/connection/connection.php');
// session_start();
include('Head.php');
if(isset($_GET['cid']))
{
  $upQry="update tbl_cart set cart_status='0' where booking_id='".$_GET['cid']."'";
  $upQry="update tbl_booking set bookinh_status='6' where booking_id='".$_GET['cid']."'";
  if($con->query($upQry))
  {
      ?>
      <script>
          alert("Booking Cancelled");
          window.location="Mybooking.php";
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
      <td>Seller</td>
      <td>Plant</td>
      <td>Price</td>
      <td>Photo</td>
      <td>Action</td>
    </tr>
     <?php
	$i=0;
		$selQry="select * from tbl_cart c inner join tbl_booking b on c.booking_id=b.booking_id   inner join tbl_plant p on c.plant_id=p.plant_id inner join tbl_seller s on s.seller_id=p.seller_id where user_id='".$_SESSION['uid']."'";
	$row=$con->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['seller_name'] ?></td>
       <td><?php echo $data['plant_name'] ?></td>
      <td><?php echo $data['plant_price'] ?></td>
       <!--<td><?php echo $data['booking_status'] ?></td>-->
      <td><img src="../Assets/File/Plant/<?php echo 
      $data['plant_photo']?>" width="150px" height="150px"/></td>
     
    <td><?php
	if($data['booking_status']==1)
	{
		echo "Payment Pending";
	}
	else if($data['booking_status']==2)
	{
		echo "Payment Completed";
    ?>
    <a href="MyBooking.php?cid=<?php echo $data['booking_id']?>" onclick="return confirmCancellation();" >Cancel</a>
    <?php
	}
	else if($data['booking_status']==3)
	{
		echo "Plant Packed";
	}
	else if($data['booking_status']==4)
	{
		echo "Plant Shipped";
	}
	else if($data['booking_status']==5)
	{
		echo "Plant Delivered";
		?>
        <a href="Rating.php?cid=<?php echo $data['plant_id']?>">Rating</a>
        <a href="PostComplaint.php?Pid=<?php echo $data['plant_id']?>">PostComplaint</a>
        <?php
	}
  else if($data['booking_status']==6)
  {
    echo "Your Booking  has been canceled.The Amount You Have Payed Will credited with in 2 working days";
  }
  
    ?>
    </td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>
<script>
function confirmCancellation() {
    return confirm("Are you sure you want to cancel this booking? Please note that 5% of the booking amount will be taken as a service charge.");
}
</script>
<?php
include('Foot.php');
?>