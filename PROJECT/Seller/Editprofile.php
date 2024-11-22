<?php
include('../Assets/connection/connection.php');

session_start();
include('Head.php');
$selQry="select * from tbl_seller where seller_id='".$_SESSION['sid']."'";
$row=$con->query($selQry);
$data=$row->fetch_assoc();
if(isset($_POST["btn_edit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST['txt_email'];
	$contact=$_POST['txt_condact'];
	$address=$_POST['txt_address'];
	

	$upqry="update tbl_seller set seller_name='".$name."',seller_email='".$email."',seller_contact='".$contact."',seller_address='".$address."' where seller_id='".$_SESSION['sid']."'";
	if($con->query($upqry))
	 {
		 ?>
         <script>
		 alert('updated');
		 window.location="Editprofile.php";
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
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $data['seller_name']
	?> "/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" required id="txt_email" value="<?php echo $data['seller_email']?>" /></td>
    </tr>
    <tr>
      <td>Condact</td>
      <td><label for="txt_condact"></label>
      <input type="text" name="txt_condact"  required id="txt_condact" value= "<?php echo $data['seller_contact']?> "/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
  <textarea name="txt_address" id="txt_address" required cols="45" rows="5"><?php echo $data['seller_address']?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" class="buttons">
        <div align="center">
          <input type="submit" name="btn_edit" id="btn_edit" value="Edit" style="color:Green"/>
        </div>
      </div></td>
    </tr>
   
  </table>
</form>
</body>
</html>
<?php
include('Foot.php');
?>