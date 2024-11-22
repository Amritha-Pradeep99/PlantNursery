

<?php
include('Head.php');
include('../Assets/connection/connection.php');
$selQry="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$row=$con->query($selQry);
$data=$row->fetch_assoc();
$dbpwd=$data['user_password'];
if(isset($_POST["btn_changepassword"]))
{
	$oldpassword=$_POST["txt_oldpassword"];
	$newpassword=$_POST['txt_newpassword'];
	$confirmpassword=$_POST['txt_cpassword'];
	
	if($dbpwd==$oldpassword)
	{
		if($newpassword==$confirmpassword)
		{
			$upqry="update tbl_user set user_password='".$newpassword."' where user_id='".$_SESSION['uid']."'";
			if($con->query($upqry))
			 {
				 ?>
				 <script>
				 alert('password changed');
				 window.location="changepassword.php";
				 </script>
				 <?php
			 }
		}
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
<form id="form1" name="form1" method="post" action="">
  <table width="271" border="1">
    <tr>
      <td width="174">Old Password</td>
      <td width="81"><label for="txt_oldpassword"></label>
      <input type="text" name="txt_oldpassword" required id="txt_oldpassword" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="text" name="txt_newpassword"  required id="txt_newpassword" /></td>
    </tr>
    <tr>
      <td>Re-Type Password</td>
      <td><label for="txt_cpassword"></label>
      <input type="text" name="txt_cpassword" required id="txt_cpassword" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_changepassword" id="btn_changepassword" value="Change Password" />
        <input type="submit" name="txt_cancel" id="txt_cancel" value="cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include('Foot.php');
?>