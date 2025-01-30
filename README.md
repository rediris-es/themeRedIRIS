## Instalación del módulo de la skin de RedIRIS para simpleSAMLphp

Este módulo se recomienda instalar para versiones de simpleSAMLphp 2.2.0 o superiores.

1. Crear un directorio llamado **themeRedIRIS** dentro de la carpeta de **modules** de simpleSAMLphp y copiar todo este espacio de GitHub.
2. Editar el fichero **config.php** para añadir dos cosas:
   - Activar el módulo del **themeRedIRIS** (dentro de este array hay mas módulos activos, simplemente tenéis que añadirlo):
     ~~~
       'module.enable' => [
          'themeRedIRIS' => true,
        ],
     ~~~
   - Cambiar los valores en la parte de **APPERANCE** para que aparezca el **themeRedIRIS**:
     ~~~
      'theme.use' => 'themeRedIRIS:RedIRIS',
      'theme.controller' => '\SimpleSAML\Module\themeRedIRIS\RedIRISController',
      'usenewui' => true,
     ~~~
3. Dentro de la ruta **public/assets** del módulo, hay que crear un direcorio que se llame **images** y, a su vez, dentro de este, crearemos otros dos directorios llamados: **fondos** y **logo**. Dentro del directorio de **fondos** copiaremos todas las imágenes que queramos que aparezcan de fondo en el **Single Sign On** y dentro del directorio de **logo** copiaremos el logo institucional para que aparezca en el la zona del **login**.

4. Como comprobación adicional, hay que mirar dentro del fichero RedIRISController.php, que las rutas a los logos y a las images es correcta en cada caso (linea 32 y 43 del fichero).

NOTA: Si obténeis un error de "Security Policies" es por algún fichero que se está llamando remotamente y simpleSAMLphp lo bloquea. Para ello, todos los ficheros deberán estar locales en la máquina. 

Os adjunto una foto del tipo del error:

![Captura de pantalla 2025-01-30 a las 11 49 19](https://github.com/user-attachments/assets/3e4e0fe2-19c9-4cec-a133-4ebd9378cf56)
