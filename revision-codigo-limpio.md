# Revisión de código limpio

## Mejora 1: una sola tarjeta para todas las vistas

- **Antes:** `index.php` y `productos.php` repetían el HTML de cada tarjeta, escrito a mano producto por producto.
- **Después:** la función `tarjetaItem()` en `src/vistas/funciones.php` genera la tarjeta y las dos páginas solo la llaman dentro de un `foreach`.
- **Por qué mejora:** si cambia el diseño de la tarjeta, se edita en un solo lugar. Agregar un producto ya no requiere tocar HTML.

## Mejora 2: los datos vienen del repositorio, no del HTML

- **Antes:** `detalle_producto.php` mostraba siempre "Teclado $29.99", ignoraba el `id` y su precio ya no coincidía con `datos.json` (19.99).
- **Después:** la ficha busca el producto con `buscarPorId()` y muestra sus datos reales. Si el id no existe responde con 404.
- **Por qué mejora:** hay una sola fuente de verdad (`datos.json`). Cambiar un precio ahí se refleja en inicio, catálogo y ficha.

## Mejora 3: errores explícitos en lugar de `null`

- **Antes:** no había una forma central de buscar un producto, y una búsqueda fallida habría devuelto `null` o un resultado vacío sin explicar nada.
- **Después:** `buscarPorId()` lanza `ProductoNoEncontradoException` con un mensaje claro, y la ficha la atrapa para mostrar el 404.
- **Por qué mejora:** el error tiene nombre y mensaje, y la vista solo atrapa el caso "no existe", sin esconder otras fallas.

## Mejora 4: eliminar la clase duplicada `Item.php`

- **Antes:** `Item.php` y `Producto.php` tenían el mismo código, y `Item` no validaba los campos.
- **Después:** se eliminó `Item.php` y todo el proyecto usa `Producto`.
- **Por qué mejora:** no hay dos clases que mantener ni riesgo de usar la que no valida.
