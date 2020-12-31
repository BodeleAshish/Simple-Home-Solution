<?php
 include('../templates/header.php');
?>
<?php
	include('../templates/db_connect.php');
    $sql = "SELECT * FROM bathroom";
    $result = mysqli_query($conn,$sql);
    $bathroom = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
	mysqli_close($conn);
?>
<div class="container">
	<h3>Bathroom Cleaning</h3>
	<br>
	<p>
        Simple Home Solutions connect you to a network of qualified and trained Bathroom Cleaning providers.
		<br>
        Cleaning bathrooms can be mundane and tiring, especially after a busy day.
        There is a simple solution to this. You can now book Bathroom Cleaning online for your home.
		You can book the service for weekdays or weekends, whichever seems more comfortable to you.
		<br>
        The professionals will come to your house at your requested time slot to clean the bathrooms. 
        <br>
        The tasks included in bathroom cleaning service are:
		<br>
		&nbsp;&nbsp;&nbsp;Scrubbing and acid wash of floor
		<br>
		&nbsp;&nbsp;&nbsp;Stain removal of tiles and fittings
		<br>
		&nbsp;&nbsp;&nbsp;Basin cleaning
		<br>
		&nbsp;&nbsp;&nbsp;Mirror cleaning
		<br>
        &nbsp;&nbsp;&nbsp;Cleaning of shower cabinets, sink, and wall stains (Tiles/Washable Paint)
        <br>
        Rates are charged according to Number of bathrooms.
		Prices inclusive of any travelling charge, Cleaning tools and materials.
	</p>
	<br>
	<form action="#">
		<div class="row">
			<div class = "form-group col-xs-6 ml-3">
				<input list="location" placeholder="&nbsp;Choose Location">
				<datalist id="location">
					<option value="Nanded">
					<option value="Vishnupuri">
				</datalist>
			</div>
			<div class = "form-group col-xs-6 ml-5">
				<select>
					<option> &nbsp;Number of Bathrooms </option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
			</div>
		</div>
		<br>
		<input type="submit" id="search" class="btn btn-outline-info" value="Search for Bathroom Cleaners">
	</form>

	<br>
	<br>

	<div class="row" id="result" style="display:none;">
		<?php for ($i=0; $i < sizeof($bathroom); $i++) { 
		?>
		<div class="col-md-6 col-lg-3 mr-5 my-2">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title"><?php echo $bathroom[$i]['company_name']; ?></h5>
					<p class="card-text text-muted">
						Location:&nbsp;&nbsp;<?php echo $bathroom[$i]['location']; ?>
						<br>
						Average Ratings:&nbsp;&nbsp;<?php echo $bathroom[$i]['ratings']; ?> / 5.0
						<br>
						Pricing:
						<table class="table">
						<tbody>
							<tr>
							<td>1 Bathroom</td>
							<td>₹<?php echo $bathroom[$i]['1']; ?></td>
							</tr>
							<tr>
							<td>2 Bathroom</td>
							<td>₹<?php echo $bathroom[$i]['2']; ?></td>
							</tr>
							<tr>
							<td>3 Bathroom</td>
							<td>₹<?php echo $bathroom[$i]['3']; ?></td>
							</tr>
						</tbody>
						</table>
					</p>
					<a href="../Subpages/bathroom.php" class="btn btn-outline-success">Contact</a>
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