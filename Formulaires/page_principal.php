<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Magasin · Riveranis</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<form method="post" action="../Formulaires/result.php">
<link href="../CSS/page_index.css" rel="stylesheet"/>
</head>
<body>
<div id="templatemo_container">
  <div class="templatemo_space"></div>
  <div id="templatemo_body">
    <div id="templatemo_header">
      <div id="templatemo_site_title">Magasin <span id="templatemo_site_title2">RIVERANIS</span></div>
      <div id="templatemo_slogan">Un site réalisé par des femmes, pour les femmes !</div>
      </div>
       <div class="templatemo_link"><ul>
		 <li><a href="#">Page principal</a></li>
		 <li><a href="#">Des offres</a></li>
         <li><a href="#">Maquillage</a></li>
         <li><a href="#">Crèmes</a></li>
         <li><a href="#">Accessoires</a></li>
         <li><a href="#">Login!</a></li>
        </ul> 
    </div>
   
   
  <div class="container">
    <div id="productCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">

        <div class="carousel-item active">
          <div class="row">
            <div class="col-md-6">
              <div class="product">
                <img src="../Images/Produits/labios_rebelde.jpeg" width="100" height="100" alt="Producto 1">
                <h2>Producto 1</h2>
                <p>Descripción del Producto 1.</p>
                <p>Precio: $XX.XX</p>
                <button type="submit"class="boton" name="add"> Add to Cart<i class="fas fa-shopping-cart"></i></button>
              </div>
            </div>
            <div class="col-md-6">
              <div class="product">
                <img src="../Images/Produits/Corrector.jpg" width="100" height="100"alt="Producto 2">
                <h2>Producto 2</h2>
                <p>Descripción del Producto 2.</p>
                <p>Precio: $YY.YY</p>
                <button type="submit"class="boton" name="add"> Add to Cart<i class="fas fa-shopping-cart"></i></button>
              </div>
            </div>
          </div>
        </div>

        <!-- Agrega más elementos carousel-item según sea necesario para más productos -->

      </div>
      <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</form>
</body>
</html>