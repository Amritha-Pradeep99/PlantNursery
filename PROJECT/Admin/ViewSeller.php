<?php
include('Head.php');
include('../Assets/connection/connection.php');
if(isset($_GET['Aid']))
{
	$upQry1="update tbl_seller set seller_status='1' where seller_id='".$_GET['Aid']."'";
	if($con->query($upQry1))
	{
				?>
			<script>
			alert('Accepted');
			window.loction="ViewSeller.php";
			</script>
			<?php
	}
}
if(isset($_GET['Rid']))
{
	$upQry1="update tbl_seller set seller_status='2' where seller_id='".$_GET['Rid']."'";
	if($con->query($upQry1))
	{
				?>
			<script>
			alert('Rejected');
			window.loction="ViewSeller.php";
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
  <table width="100%" border="0" cellspacing="0" cellpadding="10" align="center">>
    <tr>
      <td>#</td>
      <td>Name</td>
      <td>Emai</td>
      <td>Contact</td>
      <td>Address</td>
      <td>District</td>
      <td>Place</td>
      <td>Photo</td>
      <td>Proof</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
		$selQry="select * from tbl_seller n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on
	d.district_id=p.district_id ";
	$row=$con->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['seller_name'] ?></td>
      <td><?php echo $data['seller_email'] ?></td>
      <td><?php echo $data['seller_contact'] ?></td>
      <td><?php echo $data['seller_address'] ?></td>
      <td><?php echo $data['district_name'] ?></td>
      <td><?php echo $data['place_name'] ?></td>
      <td><img src="../Assets/File/SellerFiles/<?php echo 
      $data['seller_photo']?>" width="150px" height="150px"/></td>
      <td><img src="../Assets/File/SellerFiles/<?php echo 
      $data['seller_proof']?>" width="150px" height="150px"/></td>
      <td><a href="ViewSeller.php?Aid=<?php echo $data['seller_id'] ?>">Accept</a>
      <a href="ViewSeller.php?Rid=<?php echo $data['seller_id'] ?>">Reject</a></td>
    </tr>
    <?php } ?>
  </table>
  <p>&nbsp;</p>
  <p><b >Accept List</b></p>
  <table width="100%" border="0" cellspacing="0" cellpadding="10" align="center">>
    <tr>
      <td>#</td>
      <td>Name</td>
      <td>Emai</td>
      <td>Contact</td>
      <td>Address</td>
      <td>District</td>
      <td>Place</td>
      <td>Photo</td>
      <td>Proof</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
		$selQry="select * from tbl_seller n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on
	d.district_id=p.district_id where seller_status='1'";
	$row=$con->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['seller_name'] ?></td>
      <td><?php echo $data['seller_email'] ?></td>
      <td><?php echo $data['seller_contact'] ?></td>
      <td><?php echo $data['seller_address'] ?></td>
      <td><?php echo $data['district_name'] ?></td>
      <td><?php echo $data['place_name'] ?></td>
      <td><img src="../Assets/File/SellerFiles/<?php echo 
      $data['seller_photo']?>" width="150px" height="150px"/></td>
      <td><img src="../Assets/File/SellerFiles/<?php echo 
      $data['seller_proof']?>" width="150px" height="150px"/></td>
       <td>
      <a href="ViewSeller.php?Rid=<?php echo $data['seller_id'] ?>">Reject</a></td>
    </tr>    </tr>
    <?php } ?>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><b>Reject List</b></p>
  <table width="100%" border="0" cellspacing="0" cellpadding="10" align="center">>
    <tr>
      <td>#</td>
      <td>Name</td>
      <td>Emai</td>
      <td>Contact</td>
      <td>Address</td>
      <td>District</td>
      <td>Place</td>
      <td>Photo</td>
      <td>Proof</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
		$selQry="select * from tbl_seller n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on
	d.district_id=p.district_id where seller_status='2'";
	$row=$con->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['seller_name'] ?></td>
      <td><?php echo $data['seller_email'] ?></td>
      <td><?php echo $data['seller_contact'] ?></td>
      <td><?php echo $data['seller_address'] ?></td>
      <td><?php echo $data['district_name'] ?></td>
      <td><?php echo $data['place_name'] ?></td>
      <td><img src="../Assets/File/SellerFiles/<?php echo 
      $data['seller_photo']?>" width="150px" height="150px"/></td>
      <td><img src="../Assets/File/SellerFiles/<?php echo 
      $data['seller_proof']?>" width="150px" height="150px"/></td>
      <td><a href="ViewSeller.php?Aid=<?php echo $data['seller_id'] ?>">Accept</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>
<?php
include('Foot.php');
?>