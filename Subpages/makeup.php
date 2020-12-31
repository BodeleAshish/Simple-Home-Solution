<?php
 include('../templates/header.php');
?>
<?php
	include('../templates/db_connect.php');
    $sql = "SELECT * FROM makeup";
    $result = mysqli_query($conn,$sql);
    $salon = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
	mysqli_close($conn);
?>
<div class="container">
	<h3>Makeup at Home</h3>
	<br>
	<p>
		Choose from a wide range of salon stylists of your choice.
		Makeups for weddings, functions or other offered at
		convenient prices right in your home.
		<br>
        We will offer a wide range of services that include, For
        Hairs: colors, shampoo, conditioning, curling,
        reconstructing, weaving, waving. Nails: manicures, pedicures, polish, 
        sculptured nails. Skin Care: European facials, body waxing, massage.
        <br>
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
		<input type="submit" id="search"class="btn btn-outline-info" value="Search for Salon Stylists">
	</form>

	<br>
	<br>

	<div class="row" id="result" style="display:none;">
		<?php for ($i=0; $i < sizeof($salon); $i++) { 
		?>
		<div class="col-md-6 col-lg-3 mr-5 my-2">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title"><?php echo $salon[$i]['company_name']; ?></h5>
					<p class="card-text text-muted">
						Location:&nbsp;&nbsp;<?php echo $salon[$i]['location']; ?>
						<br>
						Average Ratings:&nbsp;&nbsp;<?php echo $salon[$i]['ratings']; ?> / 5.0
						<br>
						Pricing:
						<table class="table">
						<tbody>
							<tr>
							<td>Skin-care pack</td>
							<td>₹<?php echo $salon[$i]['skin']; ?></td>
							</tr>
							<tr>
							<td>Hair-care pack</td>
							<td>₹<?php echo $salon[$i]['hair']; ?></td>
							</tr>
							<tr>
							<td>Nails-care pack</td>
							<td>₹<?php echo $salon[$i]['nails']; ?></td>
							</tr>
                            <tr>
							<td>Function or Party</td>
							<td>₹<?php echo $salon[$i]['party']; ?></td>
							</tr>
                            <tr>
							<td>Wedding Makeup</td>
							<td>₹<?php echo $salon[$i]['wedding']; ?></td>
							</tr>
						</tbody>
						</table>
					</p>
					<a href="../Subpages/makeup.php" class="btn btn-outline-success">Contact</a>
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