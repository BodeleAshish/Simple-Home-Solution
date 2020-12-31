<?php
 include('../templates/header.php');
?>
<?php
	include('../templates/db_connect.php');
    $sql = "SELECT * FROM pest";
    $result = mysqli_query($conn,$sql);
    $pest = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
	mysqli_close($conn);
?>
<div class="container">
	<h3>Pest Control</h3>
	<br>
	<p>
        Simple pest Solutions connect you to a network of qualified and trained Pest Control providers.
		<br>
        Pest Control is used to eliminate the pests festering in a household.
		Pest Control is available for various species like cockroaches, bed bugs, ants, termites, mosquitoes, rats, and rodents.
		Based on the nature of the pest, different control techniques are used.
		Exclusion, repulsion, physical removal, or chemical means are the methods used to treat pests.
		Alternatively, various methods of biological control can be used, including sterilisation programmes.
		<br>
        Rates are charged according to Size of pest and various pests.
		Prices inclusive of any travelling charge, tools and materials.
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
					<option> &nbsp;Number of pests </option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
			</div>
		</div>
		<br>
		<input type="submit" id="search" class="btn btn-outline-info" value="Search for pest Cleaners">
	</form>

	<br>
	<br>

	<div class="row" id="result" style="display:none;">
		<?php for ($i=0; $i < sizeof($pest); $i++) { 
		?>
		<div class="col-md-6 col-lg-5 mr-5 my-2">
			<div class="card" style="width: 30rem;">
				<div class="card-body">
					<h5 class="card-title"><?php echo $pest[$i]['company_name']; ?></h5>
					<p class="card-text text-muted">
						Location:&nbsp;&nbsp;<?php echo $pest[$i]['location']; ?>
						<br>
						Average Ratings:&nbsp;&nbsp;<?php echo $pest[$i]['ratings']; ?> / 5.0
						<br>
						Pricing:
						<table class="table">
						<thead>
								<tr>
									<td> </td>
									<td>Basic Treatment</td>
									<td>Cockroaches & Rodents</td>
									<td>Mosquitoes & Flies</td>
								</tr>
						</thead>
						<tbody>
							<tr>
							<td>1 BHK</td>
							<td>₹<?php echo $pest[$i]['basic1']; ?></td>
							<td>₹<?php echo $pest[$i]['rodents1']; ?></td>
							<td>₹<?php echo $pest[$i]['flies1']; ?></td>
							</tr>
							<tr>
							<td>2 BHK</td>
							<td>₹<?php echo $pest[$i]['basic2']; ?></td>
							<td>₹<?php echo $pest[$i]['rodents2']; ?></td>
							<td>₹<?php echo $pest[$i]['flies2']; ?></td>
							</tr>
							<tr>
							<td>3 BHK+</td>
							<td>₹<?php echo $pest[$i]['basic3']; ?></td>
							<td>₹<?php echo $pest[$i]['rodents3']; ?></td>
							<td>₹<?php echo $pest[$i]['flies3']; ?></td>
							</tr>
						</tbody>
						</table>
					</p>
					<a href="../Subpages/pest.php" class="btn btn-outline-success">Contact</a>
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