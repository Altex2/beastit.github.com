<?php

session_start();

include('db.php');

$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="msvalidate.01" content="0A57D47B91073D891DB668B23481B64F" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BeastIT</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/acf1821b4f.js" crossorigin="anonymous"></script>
	<link rel = "icon" href = "images/logo_favicon_2.ico" type = "image/x-icon">


	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="index.php">BeastIT</a></div>
				</div>
				<div class="col-md-6 col-xs-6 text-center menu-1">
					<ul>
						<li class="has-dropdown">
							<a href="product.php">Magazin</a>
						</li>
						<li><a href="about.php">Despre</a></li>
						<li class="has-dropdown">
							<a href="services.php">Servicii</a>
						</li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
					<ul>
						<li class="search">
							<div class="input-group">
						      <input type="text" placeholder="Search..">
						      <span class="input-group-btn">
						        <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
						      </span>
						    </div>
						</li>
						<li class="shopping-cart">
							<?php
        						$cart_count = !empty($_SESSION["shopping_cart"]) ? count(array_keys($_SESSION["shopping_cart"])) : 0;
   							?>
						<a href="cart.php" class="cart"><span><small><?php echo $cart_count; ?></small><i class="icon-shopping-cart"></i></span></a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>
	
	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/second-image-background.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<h2>Custom Builds</h2>
		   						<p>Our support team is always ready to create your fully customized PC!</p>
			   					<p><a href="single.php" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/third-image-background.jpg);">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<h2>Software</h2>
		   						<p>	We also have cheap software and accounts , just buy and try it yourself!</p>
			   					<p><a href="single.php" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
			   <li style="background-image: url(images/first-image-background.jpg);">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<h2>Software</h2>
		   						<p>	We also have cheap software and accounts , just buy and try it yourself!</p>
			   					<p><a href="single.php" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
			</ul>
		</div>
	</aside>


	


	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Beneficiile Tale</h2>
				</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-credit-card"></i>
						</span>
						<h3>Plata cu cardul</h3>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-brush"></i>
						</span>
						<h3>Creativitate</h3>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-paper-plane"></i>
						</span>
						<h3>Livrare Rapida</h3>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Chestii Tari</span>
					<h2>Produse</h2>
				</div>
			</div>
			
	
				<?php
					$result = mysqli_query($con,"SELECT * FROM `products`");
					while($row = mysqli_fetch_assoc($result)){
					echo "<div class='product_wrapper'>
					  <form method='post' action=''>
					  <input type='hidden' name='code' value=".$row['code']." />
					  <div class='image'><img src='".$row['image']."' /></div>
					  <div class='name'>".$row['name']."</div>
				   	  <div class='price'>$".$row['price']."</div>
					  <button type='submit' class='btn btn-primary btn-outline btn-lg'>Buy Now</button>
					  </form>
				   	  </div>";
      	 			 }
				?>
				<div style="clear:both;"></div>
					<div class="message_box" style="margin:10px 0px;">
					<?php echo $status; ?>
					</div>
				</div>
			
	
			</div>
		</div>
	</div>
	
	<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
		<span>Calculatoarele Noastre Deja Construite</span>
		<h2>Aici Sunt Preferatele Noastre</h2>
	</div>

<!--- Cards -->
<div class = "container-fluid padding" id = "_services">
	<div class = "row padding">
		<div class = "col-md-4">
			<div class = "card">
				<img class = "card-imd-top img-fluid" src = "images/first-build.png" style = "max-height: 500px;">
				<div class = "card-body">
					<h4 class = "card-title">Starter Build</h4>
					<p class = "card-text"><bold>1000 RON</bold><br>Ofera performana cu ajutorul unui procesor ryzen si al unei placi nvidia.</p>
					<a href = "#" class = "btn btn-outline-secundary">Cumpara Acum</a>	
				</div>
			</div>
		</div>
		<div class = "col-md-4">
			<div class = "card">
				<img class = "card-imd-top img-fluid" src = "images/second-build.png">
				<div class = "card-body">
					<h4 class = "card-title">Advanced Build</h4>
					<p class = "card-text"><bold>2000 RON</bold><br>Ofera un procesor amd ryzen 7 5600X, 32GB si o placa video RTX 2080.</p>
					<a href = "building.html" class = "btn btn-outline-secundary">Cumpara Acum</a>	
				</div>
			</div>
		</div>
		<div class = "col-md-4">
			<div class = "card">
				<img class = "card-imd-top img-fluid" src = "images/third-build.png">
				<div class = "card-body">
					<h4 class = "card-title">Vrei ceva unic?</h4>
					<p class = "card-text"><bold>>2000 RON</bold><br>Ofera posibiliatea de a iti selecta componentele tale preferate si racire pe apa personalizata.</p>
					<a href = "building.html" class = "btn btn-outline-secundary">Cumpara Acum</a>
				</div>
			</div>
		</div> 
	</div>
</div>
<br>
<br>
<br>
<br>
<br>
	
	<div id="fh5co-testimonial" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Recenzii</span>
					<h2>Clienti Multumiti</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row animate-box">
						<div class="owl-carousel owl-carousel-fullwidth">
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/person1.jpg" alt="user">
									</figure>
									<span>Ailoae Alexei, pe <a href="https://instagram.com/" class="instagram">Instagram</a></span>
									<blockquote>
										<p>&ldquo;"Livrarea a fost rapida, iar calculatorul arata minunat! Merita 5 stele! ⭐⭐⭐⭐⭐!&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/person2.jpg" alt="user">
									</figure>
									<span>Serban Timotei, pe <a href="https://www.facebook.com/" class="facebook">Facebook</a></span>
									<blockquote>
										<p>&ldquo;Am avut o problema cu livrarea, dar suportul a fost excelent si m-au ajutat in timp util!&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/person3.jpg" alt="user">
									</figure>
									<span>Ionescu Raul, pe <a href="https://instagram.com/" class="instagram">Instagram</a></span>
									<blockquote>
										<p>&ldquo;Am avut nevoie de un calculator pentru a putea produce muzica, sunt foarte multumit si arata excelent!&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/person3.jpg" alt="user">
									</figure>
									<span>Oprea Gabriel, pe <a href="https://facebook.com/" class="facebook">Facebook</a></span>
									<blockquote>
										<p>&ldquo;Am cumparat un calculator, iubesc design-ul! Ma ajuta sa imi implinesc visul de a intra in industria muzicala.&rdquo;</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	

	<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/img_bg_5.jpg);">
		<div class="container">
			<div class="row">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-eye"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Urmaritori</span>

							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-shopping-cart"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="-1" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Clienti Multumiti</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-shop"></i>
								</span>
								<span class="counter js-counter" data-from="0" data-to="700" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Produse Oferite</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-clock"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="5605" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Ore De Munca</span>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-started">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Newsletter</h2>
					<p>Fii la curent cu ultimele noastre produse si oferte. Acum te poti abona!</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Aboneaza-te</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>BeastIT</h3>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="about.php">Despre</a></li>
						<li><a href="about.php#team-id">Echipa</a></li>
						<li><a href="#">Evenimente</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="product.php">Magazin</a></li>
						<li><a href="services.php">Servicii</a></li>
						<li><a href="partners.php">Parteneri</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="contact.php">Contact</a></li>
						<li><a href="tos.php">Termeni Si Conditii</a></li>
						<li><a href="#">Ajutor</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2024 All Rights Reserved.</small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="https://www.instagram.com/beastit2024/"><i class="icon-instagram"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="mailto:beastitsrl@gmail.com"><i class="icon-email"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	
	</body>
</html>

<?php
mysqli_close($con);
?>