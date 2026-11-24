# Laboratorio de fallas

Rompí mi código a propósito cinco veces. Después de cada prueba restauré el archivo.
Los mensajes de la columna "Mensaje que apareció" los copié tal cual de mi navegador.

| # | Qué rompí | Qué esperaba | Mensaje que apareció | ¿Me orientó? (sí/no y por qué) |
|---|-----------|--------------|----------------------|-------------------------------|
| 1 | Escribí mal la ruta de `datos.json` en `crearRepositorio()` | Excepción de "no se pudo leer el archivo" | _(pega aquí el mensaje)_ | _(tu respuesta)_ |
| 2 | Quité una coma en `datos.json` para que no sea JSON válido | Excepción de "JSON no válido" | _(pega aquí el mensaje)_ | _(tu respuesta)_ |
| 3 | Borré el campo `precio` de un producto en `datos.json` | Excepción "El producto no tiene el campo precio" | _(pega aquí el mensaje)_ | _(tu respuesta)_ |
| 4 | Abrí `detalle_producto.php?id=99` | Página 404 clara con enlace al catálogo | _(describe lo que viste)_ | _(tu respuesta)_ |
| 5 | Escribí mal una ruta en un `require_once` | Error fatal de PHP por archivo no encontrado | _(pega aquí el mensaje)_ | _(tu respuesta)_ |

## Reflexión

- ¿Qué mensaje fue el más claro y por qué?
- ¿Cuál fue el más confuso y cómo podría mejorarlo?
- ¿Qué cambiaría en mis mensajes de excepción después de este laboratorio?
