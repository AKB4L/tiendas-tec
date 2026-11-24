<?php

require_once __DIR__ . '/../modelos/Producto.php';
require_once __DIR__ . '/ProductoNoEncontradoException.php';

class RepositorioProductos
{
    private $rutaDatos;

    public function __construct($rutaDatos)
    {
        $this->rutaDatos = $rutaDatos;
    }

    // Lee el archivo JSON y devuelve los registros como arreglos.
    public function leer()
    {
        if (!is_readable($this->rutaDatos)) {
            throw new RuntimeException('No se pudo leer el archivo de productos: ' . $this->rutaDatos);
        }

        $contenido = file_get_contents($this->rutaDatos);
        $registros = json_decode($contenido, true);

        if (!is_array($registros)) {
            throw new RuntimeException('El archivo de productos no contiene JSON válido.');
        }

        return $registros;
    }

    // Convierte los registros (arreglos) en objetos Producto.
    public function convertir($registros)
    {
        $productos = array();

        foreach ($registros as $registro) {
            $productos[] = Producto::desdeArreglo($registro);
        }

        return $productos;
    }

    // Devuelve todos los productos como objetos Producto.
    public function todos()
    {
        return $this->convertir($this->leer());
    }

    // Busca un producto por id. Si no existe, lanza una excepción (no devuelve null).
    public function buscarPorId($id)
    {
        foreach ($this->todos() as $producto) {
            if ((int) $producto->getId() === (int) $id) {
                return $producto;
            }
        }

        throw new ProductoNoEncontradoException('No existe un producto con el id ' . $id);
    }
}
