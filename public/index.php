<?php
require_once __DIR__ . '/../src/vistas/funciones.php';

$productos = crearRepositorio()->todos();
$destacados = array_slice($productos, 0, 3);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi tienda | Tecnología para ti</title>
    <link rel="stylesheet" href="css/estilos.css?v=7">
  </head>
  <body>
    <aside class="site-header">
      <div class="sidebar-inner">
        <p class="brand"><a href="index.php">Mi tienda <span>Zeus</span></a></p>
        <nav class="site-nav" aria-label="Navegación principal">
          <ul>
            <li><a href="index.php" aria-current="page">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </nav>
      </div>
    </aside>
    <main class="container">
      <section class="hero">
        <p class="eyebrow">Tecnología para tu espacio</p>
        <h1>Mejora tu setup con Mi tienda Zeus</h1>
        <p>Encuentra periféricos y accesorios para trabajar, jugar y disfrutar cada día.</p>
        <a class="button button--primary" href="productos.php">Explorar productos</a>
      </section>
      <section aria-labelledby="destacados-titulo">
        <div class="section-heading">
          <h2 id="destacados-titulo">Productos destacados</h2>
          <a class="button button--outline" href="productos.php">Ver catálogo completo</a>
        </div>
        <div class="product-grid">
          <?php foreach ($destacados as $producto): ?>
            <?php echo tarjetaItem($producto, 3); ?>
          <?php endforeach; ?>
        </div>
      </section>
    </main>
    <footer class="site-footer">
      <div class="container">
        <p>&copy; 2024 Mi Tienda. Todos los derechos reservados.</p>
      </div>
    </footer>
  </body>
</html>
