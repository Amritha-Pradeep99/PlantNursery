<?php
include('../Assets/connection/connection.php');
include ("Head.php");
?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>#</td>
      <td>Name</td>
      <td>Description</td>
      <td>Price</td>
      <td>Photo</td>
      <td>Category</td>
     
    </tr>
     <?php
	$i=0;
		$selQry="select * from tbl_plant p inner join tbl_category c on p.category_id=c.category_id ";
	$row=$con->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['plant_name'] ?></td>
       <td><?php echo $data['plant_description'] ?></td>
      <td><?php echo $data['plant_price'] ?></td>
      <td><img src="../Assets/File/Plant/<?php echo 
      $data['plant_photo']?>" width="150px" height="150px"/></td>
      <td><?php echo $data['category_name']?></td>
    	
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>