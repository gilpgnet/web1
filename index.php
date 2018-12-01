<!DOCTYPE html>
<!-- Todos los archivos HTML 5 empiezan con la línea de arriba. -->
<?php // <?php inicia código php que se ejecuta en el servidor.

/* Este código se ejecuta en un servidor web y contruye una página que
 * será recibida por un navegador web. */

/* mb_internal_encoding("UTF-8");
 * Establece la codificación de caracteres interna a UTF-8 */
mb_internal_encoding("UTF-8");
/* $respuesta = "";
 * Asigna una cadena de texto vacía a la variable $respuesta. Todas los
 * identificadores de variables inicial con $. */
$respuesta = "";
/* La cláusula "try" contiene código que puede fallar, y al hacerlo,
 * lanza una excepción; se aborta la ejecución de las instrucciones
 * posteriores al punto donde ocurre el fallo y continúa en la
 * cláusula catch, la cual recibe la excepción lanzada. */
try {
  /* filter_input(INPUT_GET, "nombre1")
   * Lee el parámetro "nombre1" que recibe del navegador web. En este
   * caso, al usar el método GET para leer parámetros, lo busca en la
   * URL con que se invoca este script. Hay un "?" que separa el nombre
   * de la página y los parámetros; algo del estilo
   *     ?nombre1=valor1&nombre2=valor2
   * A esta cadena se le llama "query". Son asignaciones separadas por el
   * signo "&". Ahí, nombre1 y nombre2 son los parámetros, pero pueden
   * tener cualquier nombre, por ejemplo fecha, color, etcétera, Los
   * valores que en este caso son valor1 y valor2 no tienen restricciones.
   * Hay algunos caracteres que no se permiten en la URL. Si quieres
   * enviar estos, tienes que codificarlos, pero eso normalmente lo hace
   * el formulario. En este ejemplo prueba introduciendo nombres con
   * caracteres extraños para que veas como se codifica la URL. Los
   * caracteres codificados por el formulario son decodificados por PHP
   * para procesarlos correctamente.
   * 
   * trim
   * Quita los espacios al inicio y al final del texto que recibe como
   * parámetro. Prueba que pasa cuando no usas trim y envías valores con
   * espacios al inicio o al final. */
  $nombre1 = trim(filter_input(INPUT_GET, "nombre1"));
  $nombre2 = trim(filter_input(INPUT_GET, "nombre2"));
  // Valida los datos.
  if (!$nombre1) {
    /* Cuando $nombre1 es null, 0, "" o [], su valor booleano es falso y
     * por lo mismo !$nombre1 es true y entra a esta parte del código. Al
     * lanzarse la excepción, el código se aborta y pasa directamente a la
     * cláusula catch. */
    throw new Exception("Falta nombre1.");
  } elseif (!$nombre2) {
    throw new Exception("Falta nombre2.");
  }
  /* Se toman los valores de $nombre1 y $nombre2 para sustituirlos dentro
   * de la cadena de texto. El resultado se asigna a la variable
   * $respuesta. EL TEXTO DE LA CADENA EMPIEZA Y TERMINA CON EL COMILLAS.
   */
  $respuesta = "Saludos a $nombre1 y a $nombre2.";
} catch (Exception $e) {
  /* El contenido de catch solo se ejecuta cuando se lanza una Excepción.

   * $e
   * Es la excepción lanzada en algún punto dentro de try.
   * 
   * $e->getMessage()
   * Devuelve el mensaje de la excepción. En este ejemplo, puede ser
   * "Falta nombre1" cuando se ejecuta la línea 49 o "Falta nombre2" para
   * el error de la línea 51. */
  $respuesta = $e->getMessage();
}
/* Los valores de $nombre1, $nombre2 y $respuesta se usan para constuir la
 * página; pero como contienen información introducida por el usuario,
 * este podría tratar de atacar el sitio introduciendo texto que
 * corresponda a etiquetas html en los campos de captura. Por ejemplo:
 *   <script>alert("hola")</script>
 * Prueba el código que aquí se muestra con ese tipo de cadenas y
 * observarás que el código no es afectado. Después observa que sucede
 * cuando en vez de mostrar el valor de $respuestaEsc, muestras
 * $respuesta.
 * 
 * $nombre1Esc = htmlentities($nombre1, ENT_QUOTES | ENT_HTML5, 'UTF-8');
 * Codifica el texto de tal forma que los caracteres especiales de HTML5
 * (<, >, /), los apóstrofos (') y las comillas (") que contiene, se
 * sustituyan por entidades de HTML (&lt; por ejemplo) y de esta manera el
 * navegador no forme etiquetas de HTML con el contenido de la variable.
 * El texto usa la codificación UTF-8. */
$nombre1Esc = htmlentities($nombre1, ENT_QUOTES | ENT_HTML5, 'UTF-8');
$nombre2Esc = htmlentities($nombre2, ENT_QUOTES | ENT_HTML5, 'UTF-8');
$respuestaEsc = htmlentities($respuesta, ENT_QUOTES | ENT_HTML5, 'UTF-8');

?> <!-- Fin del código PHP. Lo que sigue, se pasa tal cual al cliente. -->
<html>
  <head>
    <!-- Se indica que la codificación es UTF-8. Ver http://unicode.org/
    -->
    <meta charset="UTF-8">
    <!-- Texto que se muestra en el título de la ventana o en la pestaña
    del navegador.-->
    <title>Saludo Web 1.0</title>
    <!-- Para mostrar la página en dispositivos móviles.

    name="viewport"
    Define las características de la pantalla de un dispositivo móvil.
    
    width=device-width
    El tamaño del viewport es el equivalente al ancho de la pantalla en
    píxeles CSS en una escala de 100%.
    
    initial-scale=1
    Inicia sin hacer zoom. -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Hoja de estilo, que permite cambiar la apariencia de la página.
    -->
    <style>
      /* body {font-famly: sans-serif}
       * body es un "selector" que indica a que element de HTML se aplican
       * las definiciones entre { y }, que en este caso es a casi a todo
       * el contenido del element body.
       *
       * font-family: sans-serif
       * Se un font predefinido por el navegador web que tenga la
       * característica sans-serifa (sin serifas o remates).
       * Las serifas o remates son pequeños adornos que se ponen en los
       * extremos de las líneas de los caracteres.
       * Ejemplos de fonts con serifa son: Times New Roman, Times,
       * Garamond y Courier.
       * Ejemplos de fonts sin serifa son: Arial y Helvética. */
      body {font-family: sans-serif}
    </style>
  </head>
  <body>
    <!-- Encabezado principal de la página. -->
    <h1>Saludo Web 1.0</h1>
    <!-- Forma de procesamiento. -->
    <form>
      <p>
        <!-- Campo de captura de texto. Atributos:
        
        type="text"
        Indica que el campo input sirve para capturar texto en general.
        
        name="nombre1" 
        Nombre del campo de texto dentro de la forma. Se utiliza para
        procesar su valor.
 
        placeholder="Nombre 1"
        Texto conocido como sello de agua. Cuando el elemento no tiene
        valor, se muestra el valor de placeholder. Cuando sí tiene valor,
        el sello de agua se quita y se pone el valor del elemento.
 
        accesskey="1"
        Tecla de acceso rápido. En Windows y Linux se activa en
        combinación con la tecla ALT.
      
        value="< ?= $nombre1Esc?>"
        Muestra el valor de una expresión de PHP. En este caso, es el
        valor de la variable $nombre1Esc, que está codificada para evitar
        inyección de código.
        -->
        <input type="text" name="nombre1" placeholder="Nombre 1"
                accesskey="1" value="<?= $nombre1Esc?>">
      </p>
      <p>
        <input type="text" name="nombre2" placeholder="Nombre 2"
                accesskey="2" value="<?= $nombre2Esc?>">
      </p>
      <p>
        <!-- La etiqueta output se usa para mostrar los resultados
        generados por la página. -->
        <output><?= $respuestaEsc ?></output>
      </p>
      <p>
        <!-- botón para activar la forma.

        type="submit"
        Indica que la activación del botón, activa la forma. -->
        <button type="submit">Saludar</button>
      </p>
    </form>
  </body>
</html>