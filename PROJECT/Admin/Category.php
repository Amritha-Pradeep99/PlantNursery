<?php

include('../Assets/connection/connection.php');
include('Head.php');
if(isset($_POST["btn_submit"]))
{
	$category=$_POST["txt_category"];
	
	       
	$ins="insert into tbl_category(category_name)values('".$category."')";
     if($con->query($ins))
	{
	?>
    <script>
	alert('Inserted');
	window.loction="Category.php";
	</script>
    <?php
	}

}
if(isset($_GET['id']))
{
	$del="delete from tbl_category where category_id='".$_GET['id']."'";
	if($con->query($del))
	{
		?>
		<script>
		alert('deleted');
		window.location='Category.php';
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
<table border="0" cellspacing="0" cellpadding="10" align="center">
          <tr>
            <td>Category</td>
            <td>
              <input
                type="text"
                name="txt_category"
                id="txt_category"
                required
                pattern="^[A-Z][a-zA-Z ]*$"
                title="Category name should start with a capital letter and only contain alphabetic characters and spaces."
              />
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
            </td>
          </tr>
        </table>
      </form>
    </div>

    <div align="center">
      <h2>Category List</h2>
      <table border="1" cellspacing="0" cellpadding="10" align="center">
        <tr>
          <th>#</th>
          <th>Category</th>
          <th>Action</th>
        </tr>
        <!-- PHP Code to Fetch and Display Category Data -->
        <?php
          // Assume $con is the connection variable
          $i = 0;
          $sel = "SELECT * FROM tbl_category";
          $row = $con->query($sel);
          while($data = $row->fetch_assoc()) {
            $i++;
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo htmlspecialchars($data['category_name']); ?></td>
          <td><a href="Category.php?id=<?php echo $data['category_id']; ?>">Delete</a></td>
        </tr>
        <?php } ?>
      </table>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
include('Foot.php');
?>