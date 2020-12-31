<?php
 include('../templates/header.php');
?>
<?php
	include('../templates/db_connect.php');
    $sql = "SELECT * FROM home";
    $result = mysqli_query($conn,$sql);
    $home = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
	mysqli_close($conn);
?>
<div class="container">
	<h3>Home Cleaning</h3>
	<br>
	<p>
        Simple Home Solutions connect you to a network of qualified and trained Home Cleaning providers.
		<br>
        A huge selection of top Basic Home Cleaning service providers in Pune.
        Connect instantly with Basic Home Cleaning service providers.
        Service quotes from various Home Cleaning providers before choosing one that suits your requirements the best.
        Avail the best deals within your budget. 
        <br>
        Rates are charged according to Size of Home and service cost for Full Home Cleaning.
		Prices inclusive of any travelling charge, Cleaning tools and materials.
	</p>
	<br>
	<form action="#">
		<div class="row">
			<div class = "form-group col-xs-3 ml-3">
				<input list="location" placeholder="&nbsp;Choose Location">
				<datalist id="location">
					<option value="Nanded">
					<option value="Vishnupuri">
				</datalist>
			</div>
			<div class = "form-group col-xs-3 ml-5">
				<select>
					<option> &nbsp;Options </option>
					<option value="full">Full Home</option>
					<option value="some">Some Rooms</option>
				</select>
			</div>
            <div class = "form-group col-xs-3 ml-5">
				<select>
					<option> &nbsp;Size of Home </option>
					<option value="1">1 BHK</option>
                    <option value="2">2 BHK</option>
                    <option value="3">3 BHK</option>
                    <option value="4+">4 BHK+ / Bungalow</option>
				</select>
			</div>
		</div>
		<br>
		<input type="submit" id="search" class="btn btn-outline-info" value="Search for Home Cleaners">
	</form>

	<br>
	<br>

	<div class="row" id="result" style="display:none;">
		<?php for ($i=0; $i < sizeof($home); $i++) { 
		?>
		<div class="col-md-6 col-lg-3 mr-5 my-2">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title"><?php echo $home[$i]['company_name']; ?></h5>
					<p class="card-text text-muted">
						Location:&nbsp;&nbsp;<?php echo $home[$i]['location']; ?>
						<br>
						Average Ratings:&nbsp;&nbsp;<?php echo $home[$i]['ratings']; ?> / 5.0
						<br>
						Pricing:
						<table class="table">
						<tbody>
							<tr>
							<td>1 BHK</td>
							<td>₹<?php echo $home[$i]['1bhk']; ?></td>
							</tr>
							<tr>
							<td>2 BHK</td>
							<td>₹<?php echo $home[$i]['2bhk']; ?></td>
							</tr>
							<tr>
							<td>3 BHK</td>
							<td>₹<?php echo $home[$i]['3bhk']; ?></td>
							</tr>
                            <tr>
							<td>4 BHK+ / Bungalow</td>
							<td>₹<?php echo $home[$i]['4bhk']; ?></td>
							</tr>
						</tbody>
						</table>
					</p>
					<a href="../Subpages/home_cleaning.php" class="btn btn-outline-success">Contact</a>
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