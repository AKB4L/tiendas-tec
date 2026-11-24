<?php

require_once __DIR__ . '/../repositorio/RepositorioProductos.php';

function escapar($texto)
{
    return htmlspecialchars((string) $texto, ENT_QUOTES, 'UTF-8');
}

function crearRepositorio()
{
    return new RepositorioProductos(__DIR__ . '/../../datos/datos.json');
}

function nombreCategoria($categoria)
{
    $nombres = array('periferico' => 'Periférico', 'accesorio' => 'Accesorio');

    return isset($nombres[$categoria]) ? $nombres[$categoria] : ucfirst($categoria);
}

function iconoProducto($producto)
{
    $iconos = array(
        'mouse' => '⌖',
        'teclado' => '⌨',
        'monitor' => '▣',
        'bocinas' => '♫',
        'audífonos' => '♫'
    );
    $nombre = strtolower($producto->getNombre());

    return isset($iconos[$nombre]) ? $iconos[$nombre] : '◆';
}

function categoriasDisponibles($productos)
{
    $categorias = array();

    foreach ($productos as $producto) {
        $categorias[$producto->getCategoria()] = true;
    }

    return array_keys($categorias);
}

function filtrarPorCategoria($productos, $categoria)
{
    if ($categoria === '') {
        return $productos;
    }

    $filtrados = array();

    foreach ($productos as $producto) {
        if ($producto->getCategoria() === $categoria) {
            $filtrados[] = $producto;
        }
    }

    return $filtrados;
}

function tarjetaItem($producto, $nivelTitulo = 2)
{
    $nivel = $nivelTitulo === 3 ? 3 : 2;
    $id = (int) $producto->getId();

    $html  = '<article class="product-card">';
    $html .= '<span class="product-icon" aria-hidden="true">' . escapar(iconoProducto($producto)) . '</span>';
    $html .= '<h' . $nivel . '>' . escapar(ucfirst($producto->getNombre())) . '</h' . $nivel . '>';
    $html .= '<p>' . escapar(ucfirst($producto->getDescripcion())) . ' · '
        . escapar(nombreCategoria($producto->getCategoria())) . '</p>';
    $html .= '<p class="product-price">$' . escapar(number_format($producto->getPrecio(), 2)) . '</p>';

    if ($producto->getStock() <= 0) {
        $html .= '<p class="stock-aviso">Agotado</p>';
    }

    $html .= '<a class="button button--primary" href="detalle_producto.php?id=' . $id . '">Ver detalles</a>';
    $html .= '</article>';

    return $html;
}
