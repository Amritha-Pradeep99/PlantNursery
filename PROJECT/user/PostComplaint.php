<?php
include('../Assets/connection/connection.php');
session_start();
if(isset($_POST["btn_submit"]))
{
	$title=$_POST["txt_title"];
	$description=$_POST["txt_des"];
	$insqry="insert into tbl_complaint(complaint_title,complaint_description,complaint_date,user_id,plant_id)values('".$title."','".$description."',curdate(),'".$_SESSION['uid']."','".$_GET['Pid']."')";
	if($con->query($insqry))
	{
		?>
		<script>
		alert('inserted');
		window.location='MyComplaints.php';
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
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Title</td>
      <td><label for="txt_title"></label>
       <input type="text"required name="txt_title" id="txt_title" /></td> 
    </tr>
    <tr>
      <td>Description</td>
      <td><label for="txt_des"></label>
      <input type="text" required name="txt_des" id="txt_des" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  
  <p>&nbsp;</p>
</form>
</body>
</html> 
<?php
      include('Foot.php') ;
       ?>