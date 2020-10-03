<!--custom syles goes here-->
<link
	href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
	rel="stylesheet"
/>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url('assets/css/tailwind.output.css')?>" />
<script
	src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
	defer
></script>
<script src="<?=base_url('assets/js/init-alpine.js')?>"></script>
<?php
if($this->router->fetch_class() !== 'user'){?>
	<link
	rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
			/>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
	defer
	></script>

	<script src="<?=base_url('assets/js/charts-lines.js')?>" defer></script>
	<script src="<?=base_url('assets/js/charts-pie.js')?>" defer></script>
<?php }
?>

