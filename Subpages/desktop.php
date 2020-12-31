<?php
 include('../templates/header.php');
?>
<?php
	include('../templates/db_connect.php');
    $sql = "SELECT * FROM desktop";
    $result = mysqli_query($conn,$sql);
    $desktop = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
	mysqli_close($conn);
?>
<div class="container">
	<h3>Desktop Repair at your Home</h3>
	<br>
	<p>
    Desktops and PCs can malfunction due to issues such as hardware failure or internal software issues
    such as operating system crash, viruses, spyware, malicious infections etc.
    Choose from a wide range of desktop repair providers.
    Get fast and reliable desktop and PC repair service at your home.
		<br>
		Prices inclusive of Diagnosis, Installing drivers, softwares and any travelling charge.<br>
        Note: Below Rates does not include cost of parts replaced.
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
		<input type="submit" id="search"class="btn btn-outline-info" value="Search for PC Repairs">
	</form>

	<br>
	<br>

	<div class="row" id="result" style="display:none;">
		<?php for ($i=0; $i < sizeof($desktop); $i++) { 
		?>
		<div class="col-md-6 col-lg-3 mr-5 my-2">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title"><?php echo $desktop[$i]['company_name']; ?></h5>
					<p class="card-text text-muted">
						Location:&nbsp;&nbsp;<?php echo $desktop[$i]['location']; ?>
						<br>
						Average Ratings:&nbsp;&nbsp;<?php echo $desktop[$i]['ratings']; ?> / 5.0
						<br>
						Pricing:
						<table class="table">
						<tbody>
							<tr>
							<td> General Computer Repair</td>
							<td>₹<?php echo $desktop[$i]['general']; ?></td>
							</tr>
							<tr>
							<td>Hardware issue/ Excessive Heating</td>
							<td>₹<?php echo $desktop[$i]['hardware']; ?></td>
							</tr>
							<tr>
							<td>Data backup and restore</td>
							<td>₹<?php echo $desktop[$i]['backup']; ?></td>
							</tr>
						</tbody>
						</table>
					</p>
					<a href="./Subpages/desktop.php" class="btn btn-outline-success">Contact</a>
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