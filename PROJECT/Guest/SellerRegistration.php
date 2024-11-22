<?php
include('../Assets/connection/connection.php');
include('Head.php');
if(isset($_POST['btn_submit']))
{
	$Name=$_POST['txt_name'];
	$Email=$_POST['txt_email'];
	$contact=$_POST['txt_contact'];
	$Address=$_POST['txt_address'];
	$Place=$_POST['sel_place'];
	$Password=$_POST['txt_pass'];
	
	$photo=$_FILES['txt_photo']['name'];
	$temp=$_FILES['txt_photo']['tmp_name'];
	move_uploaded_file($temp,"../Assets/File/SellerFiles/".$photo);
	
	$proof=$_FILES['txt_proof']['name'];
	$temp1=$_FILES['txt_proof']['tmp_name'];
	move_uploaded_file($temp1,"../Assets/File/SellerFiles/".$proof);
	
	$insqry="insert into tbl_seller(seller_name,seller_address,seller_contact,seller_email,seller_password,seller_photo,seller_proof,place_id) values('".$Name."','".$Address."','".$contact."','".$Email."','".$Password."','".$photo."','".$proof."','".$Place."')";
	if($con->query($insqry))
	{
		?>
		<script>
			alert("Inserted");
			window.location="SellerRegistration.php";
		</script>
		<?php
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Seller Registration</title>
<link rel="stylesheet" href="../Assets/CSS/style.css"> <!-- Link to your CSS file -->
<style>
    
    form {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        width: 400px;
    }

    table {
        width: 100%;
    }

    td {
        padding: 10px;
    }

    input, textarea, select {
        width: 100%;
        padding: 8px;
        margin: 6px 0;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    input[type="file"] {
        border: none;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #218838;
    }
</style>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="txt_name" id="txt_name" required /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="txt_email" id="txt_email" required /></td>
        </tr>
        <tr>
            <td>Contact</td>
            <td><input type="text" name="txt_contact" id="txt_contact" pattern="[0-9]{10}" title="Enter a valid 10-digit phone number" required /></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="txt_address" id="txt_address" required /></td>
        </tr>
        <tr>
            <td>District</td>
            <td>
                <select name="sel_district" id="sel_district" onchange="getPlace(this.value)" required>
                    <option value="">--Select--</option>
                    <?php
                    $sel="select * from tbl_district";
                    $row=$con->query($sel);
                    while($data=$row->fetch_assoc()) {
                        echo "<option value='".$data['district_id']."'>".$data['district_name']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Place</td>
            <td><select name="sel_place" id="sel_place" required><option value="">--Select--</option></select></td>
        </tr>
        <tr>
            <td>Photo</td>
            <td><input type="file" name="txt_photo" id="txt_photo" accept="image/*" required /></td>
        </tr>
        <tr>
            <td>Proof</td>
            <td><input type="file" name="txt_proof" id="txt_proof" accept="image/*,application/pdf" required /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="txt_pass" id="txt_pass" minlength="8" required /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
            </td>
        </tr>
    </table>
</form>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/Ajaxpages/AjaxPlace.php?did=" + did,
      success: function (result) {
        $("#sel_place").html(result);
      }
    });
  }
</script>

</body>
</html>
<?php
include('Foot.php');
?>