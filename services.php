<?php 
	$currentPage = 'services';
	include('parts/header.php'); 
	require ('functions/db_connect.php');
	$query = "SELECT * FROM `services` ORDER BY `created_date` DESC";
    $result = $conn->query($query);
    $count =0;
?>
<section class="pagestitle">
		<h1>Services</h1>
</section>
<section id="futures">
	<div class="container servicesBox">
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
		<?php } if($count === 2) $count=0; else $count++; } ?>
	</div>
</section>
<?php include('parts/footer.php'); ?>