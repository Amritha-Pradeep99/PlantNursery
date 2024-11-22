<?php
include("../connection/connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "SELECT * from tbl_plant p  inner join tbl_category c on c.category_id=p.category_id  where true ";
       
        if ($_GET["category"]!=null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
        }
       
		
		if ($_GET["name"]!=null) {

            $name = $_GET["name"];

            $sqlQry = $sqlQry." AND plant_name LIKE '".$name."%'";
        }
        $resultS = $con->query($sqlQry);
        
       

        if ($resultS->num_rows > 0) {
            while ($rowS = $resultS->fetch_assoc()) {
?>

<div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/File/Plant/<?php echo $rowS["plant_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $rowS["plant_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $rowS["plant_price"]; ?>/-
                                        </h4>
                                        <p align="center">
                                            <?php echo $rowS["category_name"]; ?><br>
                                           
                                        </p>
                                        <?php
										
												
                                        $average_rating = 0;
                                        $total_review = 0;
                                        $five_star_review = 0;
                                        $four_star_review = 0;
                                        $three_star_review = 0;
                                        $two_star_review = 0;
                                        $one_star_review = 0;
                                        $total_user_rating = 0;
                                        $review_content = array();
                                    
                                        $query = "SELECT * FROM tbl_review where plant_id = '".$rowS["plant_id"]."' ORDER BY review_id DESC";
                                    
                                        $result = $con->query($query);
                                    
                                        while($row = $result->fetch_assoc())
                                        {
                                            
                                    
                                            if($row["user_rating"] == '5')
                                            {
                                                $five_star_review++;
                                            }
                                    
                                            if($row["user_rating"] == '4')
                                            {
                                                $four_star_review++;
                                            }
                                    
                                            if($row["user_rating"] == '3')
                                            {
                                                $three_star_review++;
                                            }
                                    
                                            if($row["user_rating"] == '2')
                                            {
                                                $two_star_review++;
                                            }
                                    
                                            if($row["user_rating"] == '1')
                                            {
                                                $one_star_review++;
                                            }
                                    
                                            $total_review++;
                                    
                                            $total_user_rating = $total_user_rating + $row["user_rating"];
                                    
                                        }
                                        
                                        
                                        if($total_review==0 || $total_user_rating==0 )
                                        {
                                            $average_rating = 0 ; 			
                                        }
                                        else
                                        {
                                            $average_rating = $total_user_rating / $total_review;
                                        }
                                        
                                        ?>
                                        <p align="center" style="color:#F96;font-size:20px">
                                       <?php
                                       if($average_rating==5 || $average_rating==4.5)
                                       {
                                           ?>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                           <?php
                                       }
                                       if($average_rating==4 || $average_rating==3.5)
                                       {
                                           ?>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                           <?php
                                       }
                                       if($average_rating==3 || $average_rating==2.5)
                                       {
                                           ?>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                           <?php
                                       }
                                       if($average_rating==2 || $average_rating==1.5)
                                       {
                                           ?>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                           <?php
                                       }
                                       if($average_rating==1)
                                       {
                                           ?>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                           <?php
                                       }
                                       if($average_rating==0)
                                       {
                                           ?>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                           <?php
                                       }
                                       ?>
                                       
                                    </p>
                                        <?php
                                    
                                        $output = array(
                                            'average_rating'	=>	number_format($average_rating, 1),
                                            'total_review'		=>	$total_review,
                                            'five_star_review'	=>	$five_star_review,
                                            'four_star_review'	=>	$four_star_review,
                                            'three_star_review'	=>	$three_star_review,
                                            'two_star_review'	=>	$two_star_review,
                                            'one_star_review'	=>	$one_star_review,
                                            'review_data'		=>	$review_content
                                        );
                                    
									
                                            $stock = "select sum(stock_quantity) as stock from tbl_stock where plant_id = '" . $rowS["plant_id"] . "'";
											$result2 = $con->query($stock);
                            				$row2=$result2->fetch_assoc();
											
											$stocka = "select sum(cart_quantity) as stock from tbl_cart where plant_id = '" . $rowS["plant_id"] . "'";
											$result2a = $con->query($stocka);
                            				$row2a=$result2a->fetch_assoc();
											
											$stock = $row2["stock"] - $row2a["stock"];
											?>
                                            <p align="center" style="color:#F96;font-size:20px">Qty <?php echo $stock; ?>-Left</p>
                                            <?php
											
                                                if ($stock > 0) {
                                        ?>
                                        <a href="javascript:void(0)" onclick="addCart('<?php echo $rowS["plant_id"]; ?>')" class="btn btn-success btn-block">Add to Cart</a>
                                        <?php
                                        } else if ($stock == 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                        <?php
                                            }
                                         else {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                        <?php
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
            }
        } else {
             echo "<h4 align='center'>Products Not Found!!!!</h4>";
        }
    }

?>