# web1
Ejemplo sencillo al estilo Web 1.
## Depuración
El código se puede depurar con algún IDE que soporte XDebug; por ejemplo:
  - Visual Studio Code
  - Netbeans
  - Sublime
1. Hay que correr el phpinfo de tu sitio. Si XDebug está activado,
  observarás una sección con el nombre XDebug con las configuraciones y el
  valor de IDE Key. Asegura que las siguientes configuraciones del archivo
  php.info
    - xdebug.remote_enable = On
    - xdebug.profiler_enable = On
    - xdebug.profiler_enable_trigger = On
  Asegúrate de reiniciar el servidor después de realizar los cambios.
  Si utilizas WAMP server, estor cambios se pueder hacer mediante el menú
  de configuración de opciones para PHP.
2. Si XDebug no funciona, copia todo el HTML que genera phpinfo y pégalo
  en el cuadro de texto **Tailored Installation Instructions** de la URL
  https://xdebug.org/wizard.php y cliquea el botón
  **Analyse my phpinfo() output**. Sigue las instrucciones y vuelve a
  revisar la salida de phpinfo.
3. Con XDebug configurado, lanza la depuración en tu IDE y pon un
  breakpoint a partir de la línea que quieres observar paso a paso. Tienes
  que cliquear el número de línea en Netbeans y en Visual Studio Code hay
  que cliquear un poco antes del número que quieres observar. Aparecerá
  un círculo c un cuadrito antes del número y en el caso de Netbeans
  aparece una línea de color.
4. En el navegador introduce la url de tu página, pero añade sin espacios
  la terminación ?XDEBUG_SESSION_START=name donde name es el valor de la
  IDE Key del paso 1.
5. El navegador se detiene en la línea con el breakpoint y a partir de ahí
  puedes observar:
    - el valor de las variables,
    - la pila de llamadas (stack trace)
    - avanzar la ejecución del programa con los botones
      - Step Over
      - Step Into
      - Step Out
      - Restart
      - Continue o Resume
      - Stop