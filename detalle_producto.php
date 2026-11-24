<?php
require_once __DIR__ . '/../src/vistas/funciones.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$producto = null;

if ($id !== null && $id !== false) {
    try {
        $producto = crearRepositorio()->buscarPorId($id);
    } catch (ProductoNoEncontradoException $e) {
        $producto = null;
    }
}

if ($producto === null) {
    http_response_code(404);
}

$titulo = $producto !== null
    ? ucfirst($producto->getNombre()) . ' | Mi tienda Zeus'
    : 'Producto no encontrado | Mi tienda Zeus';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo escapar($titulo); ?></title>
    <link rel="stylesheet" href="css/estilos.css?v=7">
  </head>
  <body>
    <aside class="site-header">
      <div class="sidebar-inner">
        <p class="brand"><a href="index.php">Mi tienda <span>Zeus</span></a></p>
        <nav class="site-nav" aria-label="Navegación principal">
          <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="productos.php" aria-current="page">Productos</a></li>
            <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </nav>
      </div>
    </aside>
    <main class="container">
      <?php if ($producto === null): ?>
        <article class="content-card product-detail">
          <p class="eyebrow">Error 404</p>
          <h1>Producto no encontrado</h1>
          <p>El producto que buscas no existe o ya no está disponible.</p>
          <a class="button button--primary" href="productos.php">Volver al catálogo</a>
        </article>
      <?php else: ?>
        <article class="content-card product-detail">
          <p class="eyebrow"><?php echo escapar(nombreCategoria($producto->getCategoria())); ?></p>
          <h1><?php echo escapar(ucfirst($producto->getNombre())); ?></h1>
          <p><?php echo escapar(ucfirst($producto->getDescripcion())); ?></p>
          <p class="product-price">$<?php echo escapar(number_format($producto->getPrecio(), 2)); ?></p>
          <?php if ($producto->getStock() <= 0): ?>
            <p class="stock-aviso">Agotado</p>
          <?php else: ?>
            <p>Disponibles: <?php echo escapar($producto->getStock()); ?> unidades</p>
          <?php endif; ?>
          <a class="button button--primary" href="productos.php">Volver al catálogo</a>
        </article>
      <?php endif; ?>
    </main>
    <footer class="site-footer">
      <div class="container">
        <p>&copy; 2024 Mi Tienda. Todos los derechos reservados.</p>
      </div>
    </footer>
  </body>
</html>
