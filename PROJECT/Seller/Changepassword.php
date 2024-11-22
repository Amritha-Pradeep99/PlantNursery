

<?php
include('../Assets/connection/connection.php');
session_start();
include('Head.php');
$selQry="select * from tbl_seller where seller_id='".$_SESSION["sid"]."'";
$row=$con->query($selQry);
$data=$row->fetch_assoc();
$dbpwd=$data['seller_password'];
if(isset($_POST["btn_changepassword"]))
{
	$oldpassword=$_POST["txt_oldpassword"];
	$newpassword=$_POST['txt_newpassword'];
	$confirmpassword=$_POST['txt_cpassword'];
	
	if($dbpwd==$oldpassword)
	{
		if($newpassword==$confirmpassword)
		{
			$upqry="update tbl_seller set seller_password='".$newpassword."' where seller_id='".$_SESSION['sid']."'";
			if($con->query($upqry))
			 {
				 ?>
				 <script>
				 alert('password changed');
				 window.location="Changepassword.php";
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
  <table width="271" border="1" align="center">
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
      <td colspan="2" ><div align="center" class="buttons">
        <input type="submit" name="btn_changepassword" id="btn_changepassword" value="Change Password" style="color:Green"/>
        <input type="submit" name="txt_cancel" id="txt_cancel" value="Cancel" style="color:Green"/>
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include('Foot.php');
?>
 <div class="container-fluid py-5 mb-5 hero-header">
 <div class="container py-5">