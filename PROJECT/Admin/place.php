<?php

include('../Assets/connection/connection.php');
include('Head.php');
if(isset($_POST["btn_submit"]))
{
	$District=$_POST["sel_district"];
	$Place=$_POST["txt_place"];
	$Pincode=$_POST["txt_pincode"];
	$insqry="insert into tbl_place(place_name,place_pincode,district_id)values('".$Place."','".$Pincode."','".$District."')";
    if($con->query($insqry))
	{
	?>
    <script>
	alert('inserted');
	window.loction="place.php";
	</script>
    <?php
	}
}

if(isset($_GET['did']))
{
	$delqry="delete from tbl_place where place_id='".$_GET['did']."'";
	if($con->query($delqry))
	{
		?>
    <script>
	alert('deleted');
	window.loction="place.php";
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
            <td>District</td>
            <td>
              <select name="sel_district" id="sel_district" required>
                <option value="">--Select--</option>
                <?php
                  $sel = "SELECT * FROM tbl_district";
                  $row = $con->query($sel);
                  while ($data = $row->fetch_assoc()) {
                ?>
                <option value="<?php echo $data['district_id']; ?>"><?php echo $data['district_name']; ?></option>
                <?php
                  }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Place</td>
            <td>
              <input 
                type="text" 
                name="txt_place" 
                id="txt_place" 
                required 
                pattern="^[A-Z][a-zA-Z ]*$" 
                title="Place name must start with a capital letter and only contain alphabetic characters and spaces." 
              />
            </td>
          </tr>
          <tr>
            <td>Pincode</td>
            <td>
              <input 
                type="text" 
                name="txt_pincode" 
                id="txt_pincode" 
                required 
                pattern="[1-9][0-9]{5}" 
                title="Pincode must be a 6-digit number starting with a digit from 1-9." 
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

    <!-- Place List Table -->
    <div align="center">
      <h2>Place List</h2>
      <table border="1" cellspacing="0" cellpadding="10" align="center">
        <tr>
          <th>SNo</th>
          <th>District</th>
          <th>Place</th>
          <th>Pincode</th>
          <th>Action</th>
        </tr>
        <!-- PHP Code to Fetch and Display Place Data -->
        <?php
          $i = 0;
          $sel = "SELECT * FROM tbl_place p INNER JOIN tbl_district d ON p.district_id = d.district_id";
          $row = $con->query($sel);
          while ($data = $row->fetch_assoc()) {
            $i++;
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo htmlspecialchars($data['district_name']); ?></td>
          <td><?php echo htmlspecialchars($data['place_name']); ?></td>
          <td><?php echo htmlspecialchars($data['place_pincode']); ?></td>
          <td><a href="place.php?did=<?php echo $data['place_id']; ?>">Delete</a></td>
        </tr>
        <?php } ?>
      </table>
</form>
</body>
</html>
<?php
include('Foot.php');
?> 