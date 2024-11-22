<?php
include('Head.php');
include("../Assets/connection/connection.php");

if(isset($_POST['btn_submit']))
{
	$name=$_POST['txt_name'];
	$email=$_POST['txt_email'];
	$pass=$_POST['txt_password'];
	
	$insqry="insert into tbl_admin(admin_name,admin_email,admin_password) values('".$name."','".$email."','".$pass."')";
	if($con->query($insqry))
	{
		?>
        <script>
        alert("Inserted");
		window.location="admin.php";
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
</head>

<body>
<form action="" method="post">
<table width="200" border="1">
  <tr>
    <td>Name</td>
    <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
  </tr>
  <tr>
    <td>password</td>
    <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
    </div></td>
    </tr>
</table>

</form>
</body>
</html>
<?php
include('Foot.php');
?>