<?php
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';
?>
<div class="col-md-6 well">
	<h3 class="text-primary">Greenwich Student Forum</h3>
	<hr style="border-top:1px dotted #ccc;"/>
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<h3>Welcome!</h3>
		<br />
		<?php
		if ($fetch) {
			echo "<center><h4>" . $fetch['username'] . "</h4></center>";
		} else {
			echo "<center><h4>User not found</h4></center>";
		}
		?>
		<div class="text-center">
			<p>Total <span class="text-primary"><?= totalQuestions($pdo) ?></span> questions has been submitted to forum</p>
		</div>
	</div>
</div>