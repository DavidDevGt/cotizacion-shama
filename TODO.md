Para agregar nuevos módulos:

1. Agrega una nueva carpeta para tu módulo en modulos/. Por ejemplo: modulos/nuevoModulo/.
2. Crea un index.php dentro de esa carpeta.
3. Agrega 'nuevoModulo' a la lista $modulosPermitidos en autenticacion_plantilla.php.
4. Agrega un enlace en la barra de navegación dentro de header.php (explicaré esto más adelante).