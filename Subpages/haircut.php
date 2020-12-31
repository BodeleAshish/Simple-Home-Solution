<?php
 include('../templates/header.php');
?>
<?php
	include('../templates/db_connect.php');
    $sql = "SELECT * FROM barbers";
    $result = mysqli_query($conn,$sql);
    $barbers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
	mysqli_close($conn);
?>
<div class="container">
	<h3>Haircut at Home</h3>
	<br>
	<p>
		Choose from a wide range of barbers of your choice.
		<br>
		Professional to Casual Barbers offered at
		best prices right at your home.
		<br>
		Prices inclusive of any travelling charge.
	</p>
	<br>
	<form action="#">
		<div class="row">
			<div class = "col-3">
				<input list="location" placeholder="&nbsp;Choose Location">
				<datalist id="location">
					<option value="Nanded">
					<option value="Vishnupuri">
				</datalist>
			</div>
			<div class = "col-3">
				<select>
					<option class="	"> Select Type </option>
					<option value="casual">Economy</option>
					<option value="professional">Professional</option>
				</select>
			</div>
		</div>
		<br>
		<input type="submit" id="search"class="btn btn-outline-info" value="Search for Barbers">
	</form>

	<br>
	<br>

	<div class="row" id="result" style="display:none;">
		<?php for ($i=0; $i < sizeof($barbers); $i++) { 
		?>
		<div class="col-md-6 col-lg-3 mr-5 my-2">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title"><?php echo $barbers[$i]['company_name']; ?></h5>
					<p class="card-text text-muted">
						Location:&nbsp;&nbsp;<?php echo $barbers[$i]['location']; ?>
						<br>
						Average Ratings:&nbsp;&nbsp;<?php echo $barbers[$i]['ratings']; ?> / 5.0
						<br>
						Pricing:
						<table class="table">
						<tbody>
							<tr>
							<td> Regular Haircut</td>
							<td>₹<?php echo $barbers[$i]['regular']; ?></td>
							</tr>
							<tr>
							<td>High Fade</td>
							<td>₹<?php echo $barbers[$i]['fade']; ?></td>
							</tr>
							<tr>
							<td>Full Beard</td>
							<td>₹<?php echo $barbers[$i]['beard']; ?></td>
							</tr>
						</tbody>
						</table>
					</p>
					<a href="Subpages/haircut.php" class="btn btn-outline-success">Contact</a>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	
</div>

<script>
	$(document).ready(function(){
		$('#search').click(function(){
			$('#result').show();
		});
	});
</script>

<?php
 include('../templates/footer.php');
?>