<?php
include('../Assets/connection/connection.php');

include('Head.php');  
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$description=$_POST["txt_des"];
	$price=$_POST["txt_price"];
	
	$photo=$_FILES['txt_photo']['name'];
	$temp=$_FILES['txt_photo']['tmp_name'];
	move_uploaded_file($temp,"../Assets/File/Plant/".$photo);
	
	$category=$_POST['sel_category'];
	$insqry="insert into tbl_plant(plant_name,plant_description,plant_price,plant_photo,category_id,seller_id)values('".$name."','".$description."','".$price."','".$photo."','".$category."','".$_SESSION['sid']."')";
    if($con->query($insqry))
	{
		?>
		<script>
		alert('inserted');
		window.loction="Plant.php";
		</script>
		<?php
	}
	
}
if(isset($_GET['did']))
{
	$del="delete from tbl_plant where plant_id='".$_GET['did']."'";
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
<title>Seller Form</title>
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table align="center">
    <tr>
      <td>Name</td>
      <td><input type="text" name="txt_name" required  id="txt_name" 
      title=/></td>
    </tr>
    <tr>
      <td>Description</td>
      <td><textarea name="txt_des" id="txt_des" required cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><input type="text" name="txt_price" required id="txt_price" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="txt_photo"  required id="txt_photo" /></td>
    </tr>
    <tr>
      <td>Category</td>
      <td>
        <select name="sel_category" id="sel_category" required>
          <option value="">--select--</option>
          <?php
            $sel="select * from tbl_category";
            $row=$con->query($sel);
            while($data=$row->fetch_assoc()) {
              ?>
              <option value="<?php echo $data['category_id']?>"><?php echo $data['category_name']?></option>
              <?php
            }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="buttons">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" style="color:Green"/>
      </td>
    </tr>
  </table>
<p>&nbsp;</p>
  <table width="100%" border="0" cellspacing="0" cellpadding="10" align="center">
    <tr>
      <td >#</td>
      <td>Name</td>
      <td>Description</td>
      <td>Price</td>
      <td>Photo</td>
      <td>Category</td>
      <td>Action</td>
    </tr>
    <?php
      $i=0;
      $selQry="select * from tbl_plant p inner join tbl_category c on p.category_id=c.category_id where seller_id='".$_SESSION['sid']."'";
      $row=$con->query($selQry);
      while($data=$row->fetch_assoc()) {
        $i++;
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['plant_name'] ?></td>
      <td><?php echo $data['plant_description'] ?></td>
      <td><?php echo $data['plant_price'] ?></td>
      <td><img src="../Assets/File/Plant/<?php echo $data['plant_photo']?>" width="150px" height="150px" /></td>
      <td><?php echo $data['category_name'] ?></td>
      <td class="action-buttons">
        <a href="Stock.php?pid=<?php echo $data['plant_id'] ?>">Add Stock</a>
        <a href="Plant.php?did=<?php echo $data['plant_id'] ?>">Delete</a>
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