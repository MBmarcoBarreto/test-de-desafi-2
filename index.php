<?php session_start();
      if (!isset($_SESSION['mi_variable'])) {
        $_SESSION['mi_variable'] = true; 
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DON ONOFRE </title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
     
    <header>
        <div class="acceso">  
            <a class="btn" href="">Acesso</a> 
        </div>
        <nav>
            <ul class="nav-links">
                <li> <a href="#">Inicio</a></li>
                <li> <a href="">Viajes </a></li>
                <li><a href="">Hoteles</a></li>
                <li><a href="">Sobre nosotros</a></li>
                <li> <a href="">Contacto</a></li>
                <li> <input type="search" value="buscar..."></li>
            </ul>
        </nav>
           <a href=""><img src="img/lupa.png" ></a>
    </header>
         
<main>
          
        <!-- banner 1 seccion -->
    <div class="banner banner1">
        <div class="fondo-texto">
            <h1>Recorre el Mundo</h1>
            <p>Todo lo que necesitas para tus proximas vacaciones lo encontras en Don onofre.com</p>
            <a href="#" class="btn">Viajes</a>
        </div>
    </div>
    
    <!-- contenedor de las dos columnas del banner 2 y banner 3 -->
    <div class="contenedor">
    
         <!-- banner 2 seccion -->
        <div class="banner banner2" >
           <div class="fondo-texto">
            <h2>Cancun</h2>
            <p>Oferta : -10% en viaje</p>

            <?php if ($_SESSION['mi_variable']){?> 
              <form action="pago.php" method="post">
                <input type="submit" class="btn" value="Comprar Ahora">
              </form>
            <?php }else { ?>
               <a href="<?php echo $_SESSION['payUrl']; ?>" class="btn">Ver la compra</a>
               <?php if ( !$_SESSION['debt_paid']){?> 
               <form action="borrar-deuda.php" method="post">
                <input type="submit" class="btn" value="cancelar compra">
               </form>
               <?php } ?>
            <?php } ?>
             
           </div>
         </div>

           <!-- banner 3 seccion -->
        <div class="banner banner3" >
           <div class="fondo-texto">
            <h2>Rio de Janeiro</h2>
            <p>Oferta especial: -25% en viaje + hotel</p>
            <a href="#" class="btn">Compra Ahora</a>
          </div>
         </div>
    </div>
   
      <!-- seccion de los 3 mas vendidos -->
 <section>
    <div class="section-titulo">
        <hr class="linea">
        <span class="seccion-titulo">Los más vendidos</span>
        <hr class="linea">
    </div>

    <div class="ofertas-contenedor">
        <div class="oferta-card">
            <img src="img/cuidad1.jpg" alt="Bogota">
            <div class="card-content">
                <h2>Bogota</h2>
                <p><strong>Solo ida</strong> 09/10/24</p>
                <div class="tags">
                    <span class="tag economy">Economy</span>
                    <span class="tag millas">✈️ Acumula millas</span>
                </div>
                <p class="precio-info">Precio desde <span class="anterior-precio">USD 248,00</span></p>
                <p class="nuevo-precio">USD 246,80 <span class="descuento">-41%</span></p>
                <p class="tasas">Tasas incluidas</p>
            </div>
        </div>

        <div class="oferta-card">
            <img src="img/cuidad2.jpg" alt="Sao Paulo">
            <div class="card-content">
                <h2>Sao Paulo</h2>
                <p><strong>Solo ida</strong> 21/10/24</p>
                <div class="tags">
                    <span class="tag economy">Economy</span>
                    <span class="tag millas">✈️ Acumula millas</span>
                </div>
                <p class="precio-info">Precio desde</p>
                <p class="nuevo-precio">USD 180,80</p>
                <p class="tasas">Tasas incluidas</p>
            </div>
        </div>

        <div class="oferta-card">
            <img src="img/cuidad3.jpg" alt="Santiago de Chile">
            <div class="card-content">
                <h2>Santiago de Chile</h2>
                <p><strong>Solo ida</strong> 17/10/24</p>
                <div class="tags">
                    <span class="tag economy">Economy</span>
                    <span class="tag millas">✈️ Acumula millas</span>
                </div>
                <p class="precio-info">Precio desde <span class="anterior-precio">USD 175,00</span></p>
                <p class="nuevo-precio">USD 26,80 <span class="descuento">-28%</span></p>
                <p class="tasas">Tasas incluidas</p>
            </div>
        </div>
    </div>
 </section>
    
         <!-- banner 4 seccion -->
    <div class="banner banner4" >
        <div class="fondo-texto">
            <h2>Planea tu próxima aventura</h2>
            <p>Reserva tus habitaciones en los mejores hoteles</p>
            <a href="#" class="btn">Hoteles</a>
        </div>
    </div>    

</main>

    <footer>
        <div class="footer-contenedor">
          <div class="footer-seccion">
            <img src="img/logo oficial.jfif" >
          </div>
      
          <div class="footer-seccion">
            <h4>Acerca de</h4>
            <ul>
              <li><a href="#">Sobre nosotros</a></li>
              <li><a href="#">Noticias</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
          </div>
      
          <div class="footer-seccion">
            <h4>Redes</h4>
            <div class="social-iconos">
            <ul>
                <li><a href="#">Instagram</a> </li>
                <li> <a href="#">Facebook</a></li>
                <li><a href="#">LinKedin</a></li>
            </ul>
            </div>
           </div>
      
          <div class="footer-seccion">
            <h4>Algún enlace para mas informacion:</h4>
            <ul>
              <li><a href="#">Aviso legal</a></li>
              <li><a href="#">Política de privacidad</a></li>
              <li><a href="#">Política de Cookies</a></li>
              <li><a href="#">Seguridad</a></li>
              <li><a href="#">Reenvolsos</a></li>
              <li><a href="#">¿Preguntas Frecuentes?</a></li>
            </ul>
          </div>
        </div>
      
        <div class="footer-copy">
          <p>&copy; 2024 Marco Barreto - Todos los derechos reservados</p>
        </div>
      </footer>
      
</body>
</html>