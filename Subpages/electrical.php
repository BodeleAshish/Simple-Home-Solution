<?php
 include('../templates/header.php');
?>
<?php
	include('../templates/db_connect.php');
    $sql = "SELECT * FROM electrical";
    $result = mysqli_query($conn,$sql);
    $electrical = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
	mysqli_close($conn);
?>
<div class="container">
	<h3>Electrical Appliances Repairing Service</h3>
	<br>
	<p>
    When you have a electrical appliance issue that needs professional attention, we have a solution for you.
    You can get help for Fridge, TV and Washing Machine right at your home.
    Get fast and reliable electrical repair service at your home.
    <br>
    For TV:<br>
    Types of TV covered: CRT, LCD, LED, Plasma<br>
    Issues covered: Display Problem, Not Powering On, Audio Problem<br>
    Brands covered: LG, Micromax, Onida, Panasonic, Philips, Samsung, Sansui, Sony, Videocon, VU, Other
    <br>
    For Fridge:<br>
    30 Day service guarantee. Genuine parts & fixed pricing
    Brands covered: LG, Samsung, Other
    <br>
    For Washing Machine:<br>
    Types of TV covered: Top Load - Fully Automatic, Top Load - Semi Automatic, Front Load<br>
    Issues covered: Installation, Removal, Repair<br>
    Brands covered: Bosch, Electrolux, Godrej, Haier, Hitachi, IFB, Kelvinator, LG, Onida, Panasonic, Samsung, Siemens, Videocon, Whirlpool, Other
    <br>
    Prices inclusive of any travelling charge.<br>
    Note: Below Rates does not include cost of parts replaced, they are standard visit and repair charges.
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
		<input type="submit" id="search"class="btn btn-outline-info" value="Search for Electrical Professional">
	</form>

	<br>
	<br>

	<div class="row" id="result" style="display:none;">
		<?php for ($i=0; $i < sizeof($electrical); $i++) { 
		?>
		<div class="col-md-6 col-lg-3 mr-5 my-2">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title"><?php echo $electrical[$i]['company_name']; ?></h5>
					<p class="card-text text-muted">
						Location:&nbsp;&nbsp;<?php echo $electrical[$i]['location']; ?>
						<br>
						Average Ratings:&nbsp;&nbsp;<?php echo $electrical[$i]['ratings']; ?> / 5.0
						<br>
						Pricing:
						<table class="table">
						<tbody>
							<tr>
							<td>TV Repair</td>
							<td>₹<?php echo $electrical[$i]['tv']; ?></td>
							</tr>
							<tr>
							<td>Fridge Repair</td>
							<td>₹<?php echo $electrical[$i]['fridge']; ?></td>
							</tr>
							<tr>
							<td>Washing Machine Repair</td>
							<td>₹<?php echo $electrical[$i]['washing']; ?></td>
							</tr>
						</tbody>
						</table>
					</p>
					<a href="./Subpages/electrical$electrical.php" class="btn btn-outline-success">Contact</a>
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