DOMINIO

laravel.manuelflo.com


FICHEROS EMPLEADOS

    Controladores

    - AlumnosController
    - NotasController

    Modelos

    - Alumno
    - Nota

    Routes

    - web.php

    Vistas

    - Alumno
        - dashboard.blade.php (listado de los alumnos)
        - add.blade.php (formulario para añadir alumnos)
        - edit.blade.php (formulario para editar alumnos)

    - Nota
        - notas.blade.php (listado de notas del alumno seleccionado)
        - addnota.blade.php (añadir nota para el alumno seleccionado)
        - editnota.blade.php (editar nota para el alumno seleccionado)
    
    Migrations

    - 2024_05_25_173059_create_alumnos_table.php
    - 2024_05_25_193332_create_notas_table.php

*NOTA: el listado de alumnos lo he realizado en la vista por defecto dashboard (entiendo que lo correcto es asignarle un nombre específico para la vista principal, dejando esta vista para lo que es), al igual que me hubiera gustado organizar mejor los directorios para las vistas de los alumnos y las notas, que las he dejado en el directorio views directamente. Comencé a realizar la aplicación organizando en carpetas estas vistas, pero el proceso de aprendizaje sumado al tiempo que me ha dejado mi trabajo me ha llevado a dejarlas en la carpeta raíz. Una vez que ya tenía el proyecto realizado, se acercaba la hora de entrega y he decidido dejarlo así para que funcione correctamente. Para la tarea final organizaré mejor las vistas y las nombraré de forma más explícita, espero que quede bien claro qué vistas he usado para cada uso.


INSTRUCCIONES

Para la realización del ejercicio me he basado en la tarea de la aplicación de tareas del blog. Tengo una serie de dudas acerca de los estilos aplicados, ya que he copiado los estilos de esta aplicación y algunos ajustes no se ven exactamente como la aplicación de tareas, supongo que será algún estilo que he aplicado mal, pero la vista de la aplicación a mi parecer es bastante cómoda.

Durante el proceso de creación de la base de datos y de los modelos he ido añadiendo características. Comencé añadiendo pocos campos simples como el nombre y los apellidos para la tabla alumnos para hacer las migraciones y, posteriormente y de forma manual he añadido las columnas que faltaban para cada tabla. Quizás quede reflejado en algún registro de la base de datos o las migraciones esta forma de crear y añadir campos a las tablas de la base de datos.

La creación de los modelos, los controladores y las migraciones de la base de datos lo he realizado mediante la consola de comandos.


SCRIPT BASE DE DATOS

CREATE DATABASE gestion_alumnos;

CREATE TABLE alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    fechaNacimiento DATE NOT NULL
);

CREATE TABLE notas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_alumno INT NOT NULL,
    asignatura VARCHAR(255) NOT NULL,
    nota DECIMAL(5,2) NOT NULL,
    fecha DATE NOT NULL,
    observaciones VARCHAR(255)

    FOERIGN KEY (id_alumno) REFERENCES alumno(id)
);

*NOTA: realmente este script no lo he ejecutado en la consola de comandos, ya que con las migraciones se crean automáticamente las tablas en la base de datos. Como he comentado antes, he comenzado con pocos campos y posteriormente cuando ya me manejaba con el código he añadido más campos a las tablas. A continuación voy a poner las órdenes que he usado para modificar las tablas y añadir los campos necesarios.

ALTER TABLE alumnos ADD email VARCHAR(255);
ALTER TABLE alumnos ADD telefono VARCHAR(255);
ALTER TABLE alumnos ADD fechaNacimiento DATE;
ALTER TABLE alumnos MODIFY COLUMN created_at AFTER fechaNacimiento;
ALTER TABLE alumnos MODIFY COLUMN updated_at AFTER fechaNacimiento;

ALTER TABLE notas ADD nota DECIMAL(5,2);
ALTER TABLE notas MODIFY COLUMN notas AFTER asignatura;
ALTER TABLE notas MODIFY COLUMN created_at AFTER fechaNacimiento;
ALTER TABLE notas MODIFY COLUMN updated_at AFTER fechaNacimiento;


DATOS ARCHIVO .ENV

DB_DATABASE=gestion_alumnos
DB_USERNAME=manuelDB
DB_PASSWORD=Estep@n4*


DESCRIPCIÓN DE LA INTERFAZ Y FUNCIONAMIENTO

Al introducir el dominio en el navegador, nos lleva a la vista welcome.blade.php, la cual muestra el título del ejercicio y un correo inventado a modo de información. Podemos ver en la parte superior derecha los enlaces para hacer log in y el registro para acceder. Existen unas credenciales creadas que son las que he utilizado para acceder:

    - Usuario: prueba@email.com
    - Contraseña: 123456789

Al ingresar el usuario y la contraseña accedemos a la vista principal de la aplicación, dashboard.blade.php, en la cual podemos ver el listado de alumnos con todos sus datos. Tenemos un botón para añadir un nuevo alumno en la parte superior de la tabla y, en cada alumno, una columna con tres botones desde los cuales podemos realizar diferentes acciones. Comienzo por el botón 'Añadir nuevo alumno': este botón nos dirige a la vista add.blade.php, en la que vemos un formulario con los campos que tenemos que rellenar para añadir un alumno. Estos campos son todos obligatorios y algunos tienen ciertas particularidades para evitar errores a la hora de introducir datos. En el caso del teléfono, tenemos la validación mediante la clase AlumnoController que solo permite añadir números con una cantidad de caracteres entre 9 y 15. Para el campo email, he creado también en la clase AlumnoController una validación mediante expresiones regulares para que se introduzca un email con formato válido ('email@email.com'). El campo para introducir la fecha de nacimiento es de tipo 'date', mediante el cual podremos introducir la fecha de forma manual con el teclado o mediante un calendario que se despliega pulsando el icono de este campo.

Por último, tenemos dos botones al final del formulario, 'Añadir alumno' o 'Cancelar'. El botón 'Cancelar' nos redirige a la vista dashboard.blade.php para ver el listado de alumnos y el botón 'Añadir alumno' llama a la función store() de la clase AlumnoController para proceder a la validación de los campos y guardar el registro. En caso de que haya errores en los campos, estos serán marcados indicando el error. Finalmente, si todos los datos son correctos, nos redirige al listado de alumnos en el que podemos ver el alumno actualizado.

En la vista del listado de alumnos tenemos también un botón 'Editar', el cual nos redirige a la vista edit.blade.php, que contiene un formulario igual que la vista para añadir alumnos. En esta vista, los campos están rellenados con los datos del alumno seleccionado. La validación del formulario es igual que para añadir alumnos. El botón 'Actualizar alumno' utiliza la función update() de la clase AlumnoController.

En la vista del listado de alumnos vemos también el botón 'Borrar', que utiliza el método update() para borrar el alumno de la base de datos y, por tanto, del listado de alumnos.

El botón que queda, 'Ver notas', nos dirige a la vista notas.blade.php. Aquí, podemos ver un listado con todas las notas correspondientes al alumno seleccionado. En este listado, podemos ver todas las notas del alumno ordenadas por fecha. La vista tiene el mismo funcionamiento que la de los alumnos. Tenemos un botón 'Añadir nota' que nos llevará a la vista addnota.blade.php. En esta vista tenemos un formulario para introducir los datos de la nota. Una vez se rellenan los campos y se pulsa el botón 'Añadir nota' del formulario, se procede a la validación de los datos introducidos en el método store() de la clase NotaController y, si son correctos, se procede a guardar en la base de datos y a volver al listado de notas con la nota actualizada en la tabla.

En cada nota, tenemos unos botones asociados, 'Editar' y 'Borrar'. El botón 'Editar' nos dirige a la vista editnota.blade.php, cuyo funcionamiento es igual que el de la vista para añadir notas pero con los campos rellenos con los datos de la nota en cuestión. Mediante el método update() se procede a la validación de los datos y a guardarlos en la base de datos. El botón 'Borrar' usa la función update() para borrar el registro de la base de datos.
