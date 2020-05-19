<?php 
	$currentPage = 'about';
	include('parts/header.php');
	require ('functions/db_connect.php');
	$query = "SELECT * FROM `testimonial` ORDER BY `id` DESC LIMIT 3";
    $result = $conn->query($query);
    $count =0; 


    $query2 = "SELECT * FROM `about`";
	$result2 = $conn->query($query2);
	$row2 = $result2->fetch_assoc();
?>
		<section class="pagestitle">
			<h1>about me</h1>
		</section>
		<section class="abouttext">
			<h3><?php echo $row2['title']; ?></h3>
			<p><?php echo $row2['info']; ?><br><br>
				<a href="https://twitter.com/<?php echo $row2['twitter']; ?>" class="twitter-follow-button" data-show-count="false">Follow @twitter</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</p>
			<img src="img/man.png">
		</section>
		<section id="testimonial">
			<h1>Testimonial</h1>
			<?php while($row = $result->fetch_assoc()) {  ?>
			<div class="block">
				<span class="quote ">“</span> 
				<p><?php echo $row['text']; ?></p>
				<span class="testWho"><?php echo $row['name']; ?><br><?php echo $row['title']; ?> at <?php echo $row['company']; ?></span>
			</div>
			<?php }?>
		</section>
<?php include('parts/footer.php'); ?>