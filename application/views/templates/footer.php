</main><!-- /.container -->

<footer>
	<div class="container text-center text-white">
		<img src="<?php echo(base_url()) ?>assets/imgs/grocery.svg" alt="Foodshala logo" style="width:40px;">
		<br>
		One destination for all the foodies!
	</div>
	<div class="container text-center mt-4">
		<ul class="social-ul">
			<li class="facebook"><a href="#"><i class="fab fa-facebook-square"></i></a></li>
			<li class="google"><a href="#"><i class="fab fa-google-plus-square"></i></a></li>
			<li class="youtube"><a href="#"><i class="fab fa-youtube-square"></i></a></li>
			<li class="insta"><a href="#"><i class="fab fa-instagram"></i></a></li>
		</ul>
	</div>
	<div class="container text-center text-white mt-4" style="font-size:12px;">
		&copy; 2019. All rights reserved &mdash; Designed with <span class="text-danger"><i class="fas fa-heart"></i></span> by Debarun Mukherjee.
	</div>
</footer>


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>

</body>

<!-- Script for heading effects on the home page -->
<script>
	$(".main-heading").animate({"opacity": "1", "padding": "0"}, 2500);
	$(".sub-heading").animate({"opacity": "1", "padding": "0"}, 2500);
</script>

<!-- Script for dismissal of bootstrap alerts -->
<script>
$('.alert').alert();
</script>

<!-- Scrippt for cart functionlities -->
<script src="<?php echo(base_url()) ?>assets/js/cart.js"></script>

<!-- Script for AJAX search -->
<script>
	$('.search-input').on("change  paste keyup", function () {
		//Get the current search term from the input
		var term = $(this).val();

		$.ajax({
			url: '<?php echo(base_url()); ?>menu_items/search',
			data: {
				'term': term
			},
			type: "post",
			success: function (data) {
				$('.search-result').html(data);
			}
		});
	});
</script>
</html>