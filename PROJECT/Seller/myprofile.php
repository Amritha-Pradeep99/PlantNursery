<?php


include('../Assets/connection/connection.php');

include('Head.php');
$selQry="select * from tbl_seller n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on
d.district_id=p.district_id where seller_id='".$_SESSION['sid']."'";
$row=$con->query($selQry);
$data=$row->fetch_assoc();

?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Profile</title>
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
  <div class="main">
  <table>
    <tr>
      <td colspan="2" style="text-align: center;">
        <img src="../Assets/File/SellerFiles/<?php echo $data['seller_photo'] ?>" width="150px" height="150px"/>
      </td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data['seller_name']; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data['seller_email']; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['seller_contact']; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data['seller_address']; ?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $data['district_name']; ?></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php echo $data['place_name']; ?></td>
    </tr>
    <tr>
      <td colspan="2" class="buttons" >
        <a href="Editprofile.php" style="color:Green">Edit Profile</a>
        <a href="changepassword.php" style="color:Green">Change Password</a>
      </td>
    </tr>
  </table>
  </div>
</body>
</html>

<?php
include('Foot.php');
?>
