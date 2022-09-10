<?php include 'inc/header.php'; ?>

 <div class="main">
    <div class="content">

	      <div class="section group">
				<?php 
                $getBrandProToys = $pd->getBrandProductToys();
                if ($getBrandProToys) {
                    while ($result = $getBrandProToys->fetch_assoc()) {
                        ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId'] ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><?php echo $fm->textShorten($result['body'], 40); ?></p>
					 <p><span class="price"><?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php
                    }
                } ?>				
			</div>
		
			
	
			
    </div>
 </div>
<?php include 'inc/footer.php'; ?>

