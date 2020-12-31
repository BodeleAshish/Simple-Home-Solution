<?php
 include('../templates/header.php');
?>
<?php
	include('../templates/db_connect.php');
    $sql = "SELECT * FROM plumbers";
    $result = mysqli_query($conn,$sql);
    $plumbers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
	mysqli_close($conn);
?>
<div class="container">
	<h3>Plumber Repairing Service</h3>
	<br>
	<p>
    When you have a plumbing issue that needs professional attention, we have a solution for you.
    You can search a wide range of Plumbers here according to your budget and convenience.
    No matter how skilled you might be at home maintenance, some jobs should only ever be tackled by a professional, and plumbing is one of them.
    You can contact cheap but reliable plumbing professional who will know just where to look to find the source of the problem
    and who will have all the right tools and expertise to fix it.
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
		</div>
		<br>
		<input type="submit" id="search"class="btn btn-outline-info" value="Search for Plumbers">
	</form>

	<br>
	<br>

	<div class="row" id="result" style="display:none;">
		<?php for ($i=0; $i < sizeof($plumbers); $i++) { 
		?>
		<div class="col-md-6 col-lg-3 mr-5 my-2">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title"><?php echo $plumbers[$i]['company_name']; ?></h5>
					<p class="card-text text-muted">
						Location:&nbsp;&nbsp;<?php echo $plumbers[$i]['location']; ?>
						<br>
						Average Ratings:&nbsp;&nbsp;<?php echo $plumbers[$i]['ratings']; ?> / 5.0
						<br>
						Pricing:
						<table class="table">
						<tbody>
							<tr>
							<td>Water Leakges through Faucets/Taps</td>
							<td>₹<?php echo $plumbers[$i]['leakage']; ?></td>
							</tr>
							<tr>
							<td>Fix Water heaters/ Geysers</td>
							<td>₹<?php echo $plumbers[$i]['heaters']; ?></td>
							</tr>
							<tr>
							<td>Sewer pipes/ Drainage pipe</td>
							<td>₹<?php echo $plumbers[$i]['drainage']; ?></td>
							</tr>
						</tbody>
						</table>
					</p>
					<a href="./Subpages/plumbers.php" class="btn btn-outline-success">Contact</a>
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