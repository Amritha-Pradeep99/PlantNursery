<?php

include('../Assets/connection/connection.php');

include('Head.php');
$selQry="select * from tbl_user n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on
d.district_id=p.district_id where user_id='".$_SESSION["uid"]."'";
$row=$con->query($selQry);
$data=$row->fetch_assoc();

?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>User Profile</title>
  
  <!-- Inline CSS Styling -->
  <style>
    

    table {
      width: 100%;
      max-width: 600px;
      border-collapse: collapse;
      margin: 20px auto;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table, td {
      border: 1px solid #ccc;
    }

    td {
      padding: 15px;
      text-align: left;
    }

    td img {
      border-radius: 50%;
    }

    td:first-child {
      font-weight: bold;
      width: 30%;
      background-color: #f9f9f9;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    

    .profile-actions {
      text-align: center;
    }

  </style>
</head>

<body>
  <form id="form1" name="form1" method="post" action="">
    <table>
      <tr>
        <td colspan="2" style="text-align: center;">
          <img src="../Assets/File/User/<?php echo $data['user_photo'] ?>" width="100px" height="100px" />
        </td>
      </tr>
      <tr>
        <td>Name</td>
        <td><?php echo $data['user_name'] ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $data['user_email'] ?></td>
      </tr>
      <tr>
        <td>Contact</td>
        <td><?php echo $data['user_email'] ?></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><?php echo $data['user_address'] ?></td>
      </tr>
      <tr>
        <td>District</td>
        <td><?php echo $data['district_name'] ?></td>
      </tr>
      <tr>
        <td>Place</td>
        <td><?php echo $data['place_name'] ?></td>
      </tr>
      <tr class="profile-actions">
        <td colspan="2">
          <a href="Editprofile.php">Edit Profile</a>
          <a href="changepassword.php">Change Password</a>
        </td>
      </tr>
    </table>
  </form>
</body>
</html>

<?php
include('Foot.php');
?>