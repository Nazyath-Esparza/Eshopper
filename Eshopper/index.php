<!DOCTYPE html>
<?php
 session_start();
  $usuario = $_SESSION["usuario"];
  $email = $_SESSION["email"];

 //Este segmento es el encargado de el almacenaje de los productos existentes en nuestro punto de venta, guarda sus datos en un documento .txt como lo son el ID, producto, precio y categoría
 $BDProductos = array(0,"CERO",0,"");
 $i=0; $iProductos=1; 
 $filas=file('archivo.txt'); 
 
 foreach($filas as $value){
    list($id, $producto, $precio, $categoria) = explode(",", $value);
    array_push($BDProductos, $id);
    array_push($BDProductos, $producto);
    array_push($BDProductos, $precio);
    array_push($BDProductos, $categoria);
    $iProductos++;
  }

//Este segmento usa la base de datos para almacenar las existencias de cada producto en nuestro punto de venta
  $BDAlmacen = array( 
    array(1, 2, 3, 4, 5, 6, 7), //El IDProducto
    array(0,10, 5,15, 3,8, 13)); //Las Existencias

//Por ultimo, este segmento muestra las ventas realizadas en nuestro punto de venta, agregando el ID del producto, la cantidad vendida, el monto pagado y por ultimo las ventas hasta el momento
  $iAlmacen = 2; //El No. de existencias
  $BDVentas = array(
    array(2,3), //El IDProducto
    array(2,1), //La Cantidad
    array(700, 200)); //El Monto
  $iVentas = 2; //El No. de ventas al momento
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Software Punto de Venta" content="">
    <meta name="Nazyath Esparza" content="">
    <title>Inicio | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +52 618 242 6667</a></li>
								<font color="green">
        <li> Usuario: <?php echo $usuario; ?></li>
         <li> Correo <i class="fa fa-envelope"></i>:<?php echo $email; ?></li>
          </font>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="agregarproductos.php" target="_blank"><i class="fa fa-plus"></i>Agregar</a></li>
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Pagar</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Carrito</a></li>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Inicio</a></li>
								<li class="dropdown"><a href="#">Comprar<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Productos</a></li>				
										<li><a href="checkout.php">Pagar</a></li> 
										<li><a href="cart.php">Carrito</a></li> 
										<li><a href="login.php">Login</a></li> 
                                    </ul>
                                </li> 
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>	
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Proyecto</h2>
									<p>Software Punto de Venta de Ropa </p>								
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Categoría</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Damas</a></h4>
         <h4 class="panel-title"><a href="#">Caballeros</a></h4>
         <h4 class="panel-title"><a href="#">Niños</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
												
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Catálogo de Productos</h2>
						<?php 
						//En este pequeño segmento se crea un ciclo for con el cuál se van a agregar a la interfaz gráfica los productos de nuestro punto de venta
						 $n=4;
       for ($i=1; $i < $iProductos ; $i++) { 
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<?php
											//En este segmento, desde una carpeta ya existente en nuestro proyecto que contiene todas las imágenes necesarias y el ciclo for anterior, se vann a seleccionar y agregar a nuestro interfaz
											$img = $BDProductos[$n];
											$productoB = $BDProductos[$n+1];
											$precioB = $BDProductos[$n+2];
											?>
											<img src="images/home2/<?php echo $img;?>.jpg" alt="" width="210" height="180" alt=""/>
											<h2>
											<?php echo $productoB; ?>
											</h2>
											<p> <?php echo $precioB;?> 
										    </p>
											<a href="cart.php?producto=<?php echo $productoB;?>&precio=<?php echo $precioB;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al Carrito</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo $precioB; ?></h2>
												<p><?php echo $productoB;?></p>
												<a href="cart.php?producto=<?php echo $productoB;?>&precio=<?php echo $precioB;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al Carrito</a>
											</div>
										</div>
								</div>								
							</div>
						</div>
						<?php
						//por ultimo, aquí se cierra nuestro ciclo for, solamente repitiendose la cantidad de veces necesaria para agregar todos nuestros productos registrados
						$n+=4;
						 }
						 ?>
					</div><!--features_items-->
					
					
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Productos Recomendados</h2>
						<?php // En todo este segmento, se agregan productos extra a los de la página inicial, se repite dependiendo de cuantos productos especiales tengamos?>
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home2/recommend1.jpg" alt="" />
													<h2>$50</h2>
													<p>Producto Esp 1</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al Carrito</a>
												</div>
												
											</div>
										</div>
									</div>
         <div class="col-sm-4">
          <div class="product-image-wrapper">
           <div class="single-products">
            <div class="productinfo text-center">
             <img src="images/home2/recommend2.jpg" alt="" />
             <h2>$430</h2>
             <p>Producto Esp 2</p>
             <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al Carrito</a>
            </div>
            
           </div>
          </div>
         </div>
         <div class="col-sm-4">
          <div class="product-image-wrapper">
           <div class="single-products">
            <div class="productinfo text-center">
             <img src="images/home2/recommend3.jpg" alt="" />
             <h2>$70</h2>
             <p>Producto Esp 3</p>
             <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al Carrito</a>
            </div>
           
           </div>
          </div>
         </div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Proyecto Software Punto de Venta</p>
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>Durango, Dgo. México</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2024 E-SHOPPER Inc. Todos los Derechos</p>					
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>