<?php
include('../Assets/connection/connection.php');
include('Head.php');
if(isset($_POST["btn_submit"]))
{
	$qty=$_POST["txt_qty"];
	$ins="insert into tbl_stock (stock_quantity	,stock_date,plant_id)values('".$qty."',curdate(),'".$_GET['pid']."')";
	if($con->query($ins))
	{
	?>
		<script>
        alert('inserted');
        window.loction="Plant.php";
        </script>
        <?php
	}
}
if(isset($_GET['id']))
{
	$del="delete from tbl_stock where stock_id='".$_GET['id']."'";
	if($con->query($del))
	{
		?>
		<script>
		alert('deleted');
		window.location='Plant.php';
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
      max-width: 400px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    table, td {
      border-collapse: collapse;
      border: none;
      padding: 12px;
      text-align: left;
    }

    td {
      border-bottom: 1px solid #ddd;
    }

    td:first-child {
      font-weight: bold;
      color: #4caf50; /* Darker green for labels */
    }

    td[colspan="2"] {
      text-align: center;
    }

    .buttons {
      text-align: center;
    }

    .buttons a {
      background-color: #a8e6a3; /* Pastel green buttons */
      color: #333;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      margin: 0 5px;
      transition: background-color 0.3s ease;
    }

    .buttons a:hover {
      background-color: #81c784; /* Darker pastel green on hover */
    }

    img {
      border-radius: 50%;
      border: 2px solid #4caf50;
    }

    tr:last-child td {
      border-bottom: none;
    }
    .main{
      display:flex;
      justify-content:center;
      align-items:center;
    }
  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Quantity</td>
      <td><label for="txt_qty"></label>
      <input type="text" name="txt_qty" required id="txt_qty" /></td>
    </tr>
    <tr>
      <td colspan="2" class="buttons"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1" align="center">
    <tr>
      <td>#</td>
      <td>Quantity</td>
      <td>Date</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
		$selQry="select * from tbl_stock where plant_id='".$_GET['pid']."'";
	$row=$con->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['stock_quantity'] ?></td>
      <td><?php echo $data['stock_date'] ?></td>
      <td><a href="Stock.php?id=<?php echo $data['stock_id'] ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
include('Foot.php');
?>
