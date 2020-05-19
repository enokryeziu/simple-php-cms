<?php 
	$currentPage = 'home';
	include('parts/header.php');
	require ('functions/db_connect.php');
	$query = "SELECT * FROM `services` ORDER BY `created_date` DESC LIMIT 3";
    $result = $conn->query($query);
    $count =0;
?>
		<section id="slideshow">
			<div class="container">
				<div class="slideout">
					<div id="slideActive" class="slide">
						<a href="#"><img src="img/slide1.png"></a>
					</div>
					<div class="slide">
						<a href="#"><img src="img/slide2.png"></a>
					</div>
					<div class="slide">
						<a href="#"><img src="img/slide3.png"></a>
					</div>
					<div id="slideButton">
						<button id="activeB" onclick="slideShow(0)"></button>
						<button onclick="slideShow(1)"></button>
						<button onclick="slideShow(2)"></button>
					</div>
				</div>
			</div>
		</section>
		<section id="headline">
			<div class="container">
				<h1>MURO IS AN ELEGANT AND MODERM THEME</h1>
			</div>
		</section>
		<section id="futures">
			<div class="container">
				<?php 
					while($row = $result->fetch_assoc()) { 
						if($count === 0) {
				?>
				<div class="block">
					<h3><?php echo $row['title']; ?></h3>
					<img src="<?php echo str_replace("../../", "", $row['photo']); ?>">
					<p><?php echo $row['description']; ?></p>
				</div>
				<?php  }else if($count === 1) {?>
				<div class="blockMid">
					<h3><?php echo $row['title']; ?></h3>
					<img src="<?php echo str_replace("../../", "", $row['photo']); ?>">
					<p><?php echo $row['description']; ?></p>
				</div>
				<?php  } elseif ($count === 2) { ?>
				<div class="block">
					<h3><?php echo $row['title']; ?></h3>
					<img src="<?php echo str_replace("../../", "", $row['photo']); ?>">
					<p><?php echo $row['description']; ?></p>
				</div>
				<?php } $count++; } ?>
			</div>
		</section>
<?php include('parts/footer.php'); ?>