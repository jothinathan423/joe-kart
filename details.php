<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET['proId'])) {
    $proId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proId']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $addCart = $ct->addToCart($quantity, $proId);
}
?>
<?php 
$cmrId = Session::get("cmrId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
    $productId = $_POST['productId'];
    $insertCom = $pd->insertCompareDara($productId, $cmrId);
}
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wlist'])) {
    $saveWlist = $pd->saveWishListData($proId, $cmrId);
}
?>
<style type="text/css">
	.mybutton{widows: 100px; float:left; margin-right: 30px;}
</style>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">
				<?php 
                $getPd = $pd->getSingleProduct($proId);
                if ($getPd) {
                    while ($result = $getPd->fetch_assoc()) {
                        ?>
				<div class="grid images_3_of_2">
					<img src="admin/<?php echo $result['image']; ?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName']; ?></h2>
					
					<div class="price">
						<p>Price: <span><?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
						<p>Brand:<span><?php echo $result['brandName']; ?></span></p>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quantity" value="1"/>
							<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						</form>
					</div>
					<?php if (isset($minProAlert)) {
                            echo $minProAlert;
                        } ?>
					<span style="color:red; font-size:18px;">
						<?php if (isset($addCart)) {
                            echo $addCart;
                        } ?>
					</span>
					<?php if (isset($insertCom)) {
                            echo $insertCom;
                        }
                        if (isset($saveWlist)) {
                            echo $saveWlist;
                        } ?>
                        <?php 
                        $login = Session::get("cuslogin");
                        if ($login == true) {
                            ?>

					<?php
                        } ?>					
				</div>
				<div class="product-desc">
					<h2>Product Details</h2>
					<p><?php echo $result['body']; ?></p>
					<p>Colour : <?php echo $result['colour']; ?></p>
					<p>Model Name : <?php echo $result['modelname']; ?></p>
					<p>Cellular Technology : <?php echo $result['cellulartechnology']; ?></p>
					<p>Screen Size : <?php echo $result['screensizes']; ?></p>
					<p>Connectivity Technology : <?php echo $result['conectivity']; ?></p>
					<p>Network Service Provider : <?php echo $result['network']; ?></p>
					<p>Operating System : <?php echo $result['os']; ?></p>
					<p>Sim Card Slot Count : <?php echo $result['sim']; ?></p>
					<p>Screen Size : <?php echo $result['screensize']; ?></p>
					<p>Battery Power(In mAH) : <?php echo $result['battery']; ?></p>
					<p>Screen Type : <?php echo $result['screentype']; ?></p>
					<p>RAM Size : <?php echo $result['ram']; ?></p>
					<p>Inbuilt Storage : <?php echo $result['storage']; ?></p>
					<p>Warrenty : <?php echo $result['warrenty']; ?></p>
					<p>Processor : <?php echo $result['processcor']; ?></p>
					<p>Rear Camera : <?php echo $result['rearcamera']; ?></p>
					<p>Front Camera : <?php echo $result['frontcamera']; ?></p>
					<p>Operation System : <?php echo $result['operationgs']; ?></p>
					<p>Extend memory : <?php echo $result['extend']; ?></p>

				</div>
				<?php
                    }
                } ?>
			</div>

		</div>
	</div>
<?php include 'inc/footer.php'; ?>
