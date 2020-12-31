<?php
 include('../templates/header.php');
?>
<?php
	include('../templates/db_connect.php');
    $sql = "SELECT * FROM massage";
    $result = mysqli_query($conn,$sql);
    $massage = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
	mysqli_close($conn);
?>
<div class="container">
	<h3>Massage at Home</h3>
	<br>
	<p>
		Choose from a wide range of masseurs of your choice.
		<br>
        We will offer services like standard body massage, aroma body massage
        and ayurvedic body massage. 
        <br>
        Following rates are charged hourly.
		Prices inclusive of any travelling charge.
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
					<option> Select Type </option>
					<option value="function">Functions</option>
					<option value="wedding">Weddings</option>
				</select>
			</div>
		</div>
		<br>
		<input type="submit" id="search"class="btn btn-outline-info" value="Search for Masseurs">
	</form>

	<br>
	<br>

	<div class="row" id="result" style="display:none;">
		<?php for ($i=0; $i < sizeof($massage); $i++) { 
		?>
		<div class="col-md-6 col-lg-3 mr-5 my-2">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title"><?php echo $massage[$i]['company_name']; ?></h5>
					<p class="card-text text-muted">
						Location:&nbsp;&nbsp;<?php echo $massage[$i]['location']; ?>
						<br>
						Average Ratings:&nbsp;&nbsp;<?php echo $massage[$i]['ratings']; ?> / 5.0
						<br>
						Pricing:
						<table class="table">
						<tbody>
							<tr>
							<td>Standard ody massage</td>
							<td>₹<?php echo $massage[$i]['standard']; ?></td>
							</tr>
							<tr>
							<td>Aroma Body Massage</td>
							<td>₹<?php echo $massage[$i]['aroma']; ?></td>
							</tr>
							<tr>
							<td>Ayurvedic body massage</td>
							<td>₹<?php echo $massage[$i]['ayurvedic']; ?></td>
							</tr>
						</tbody>
						</table>
					</p>
					<a href="../Subpages/massage.php" class="btn btn-outline-success">Contact</a>
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