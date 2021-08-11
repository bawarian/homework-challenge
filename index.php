<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

	<title>aCommerce - Homework challenge</title>
</head>
<body>

	<div class="container">
		<div class="row">

			<?php
			$str_contents = file_get_contents("list.json");
			$contents = json_decode($str_contents, true);
					
			foreach ($contents as $_content)
			{ ?>
				<div class="col-3">
					<div class="card mb-4 shadow-sm">
						<img src="<?php echo $_content['image_url']; ?>" class="img-thumbnail" />
						<div class="card-body">
							<h6 class="card-text"><?php echo $_content['title']; ?></h6>
							<p class="mb-0"><small class="text-muted"><?php date_diff_custom($_content['created_at']);; ?></small></p>
							<p>
								<?php for ($i=1; $i<=5; $i++) { ?>
									<?php if ($i <= $_content['vote']) { ?>
										<span class="text-danger"><i class="bi bi-star-fill"></i></span>
									<?php } else { ?>
										<span class="text-danger"><i class="bi bi-star"></i></span>
									<?php } ?>
								<?php } ?>
							</p>
							<p class="card-text"><?php echo '฿' . number_format($_content['price'], 2); ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>	
	</div>

</body>
</html>

<?php
function date_diff_custom($date)
{
	$diff = abs(strtotime(date('Y-m-d H:i:s')) - strtotime($date));

	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

	printf("%d years, %d months, %d days ago\n", $years, $months, $days);
}
?>