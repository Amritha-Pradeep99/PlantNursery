<?php
include('../Assets/connection/connection.php');
include('Head.php');
if (isset($_POST['btn_submit'])) {
    $Name = $_POST['txt_name'];
    $Address = $_POST['txt_address'];
    $contact = $_POST['txt_contact'];
    $Email = $_POST['txt_email'];
    $DOB = $_POST['txt_dob'];
    $Gender = $_POST['txt_gender'];
    $Password = $_POST['txt_password'];
    $cpassword = $_POST['txt_confirm_password'];
    $place = $_POST['sel_place'];

    // File upload
    $photo = $_FILES['txt_photo']['name'];
    $temp = $_FILES['txt_photo']['tmp_name'];
    move_uploaded_file($temp, '../Assets/File/User/' . $photo);

    $insqry = "insert into tbl_user(user_name,user_address,user_contact,user_email,user_dob,user_gender,user_password,user_photo,place_id) values('".$Name."','".$Address."','".$contact."','".$Email."','".$DOB."','".$Gender."','".$Password."','".$photo."','".$place."')";
    if ($con->query($insqry)) {
        echo "inserted";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
<link rel="stylesheet" href="../Assets/CSS/style.css">
<style>
    .main {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        background-color: #f0f0f0;
    }

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

    input[type="radio"] {
        width: auto;
    }

    input[type="submit"], input[type="reset"] {
        width: 48%;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="reset"] {
        background-color: #4CAF50;
    }

    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #218838;
    }

    input[type="reset"]:hover {
        background-color: #c82333;
    }
   
</style>
</head>

<body>
<div class="main">
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="txt_name" id="txt_name" required /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="txt_address" id="txt_address" cols="45" rows="5" required></textarea></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" name="txt_contact" id="txt_contact" pattern="[0-9]{10}" title="Enter a valid 10-digit phone number" required /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="txt_email" id="txt_email" required /></td>
            </tr>
            <tr>
                <td>District</td>
                <td>
                    <select name="sel_district" id="sel_district" onchange="getPlace(this.value)" required>
                        <option value="">--select--</option>
                        <?php
                        $sel = "select * from tbl_district";
                        $row = $con->query($sel);
                        while ($data = $row->fetch_assoc()) {
                            echo "<option value='" . $data['district_id'] . "'>" . $data['district_name'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Place</td>
                <td><select name="sel_place" id="sel_place" required></select></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><input type="file" name="txt_photo" id="txt_photo" accept="image/*" required /></td>
            </tr>
            <tr>
                <td>DOB</td>
                <td><input name="txt_dob" type="date" required /></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="txt_gender" id="rbl_male" value="male" required />Male
                    <input type="radio" name="txt_gender" id="rbl_female" value="female" />Female
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="txt_password" id="txt_password" minlength="8" required /></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="txt_confirm_password" id="txt_confirm_password" minlength="8" required /></td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="color">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Sign Up" />
                    <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
                </td>
            </tr>
        </table>
    </form>
</div>

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
