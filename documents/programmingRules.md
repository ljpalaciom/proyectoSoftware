# Programming rules
1. Reglas para controladores
    * Nunca haga un echo dentro de un controlador
    * La responsabilidad de los controladores debe ser únicamente gestionar las peticiones HTTP y retornar una respuesta adecuada. No se deben incluir, por ejemplo, reglas de validación dentro de un controlador.
    * Siempre se debe extender de la clase Controller que es de Laravel.
    * Los textos que vayan hacia la vista no podrán ser escritos explícitamente, por el contrario deberán usar los archivos lang e importar el texto que requiere.

2. Reglas para modelos
    * Se deberán especificar los getters y setters de los atributos que serán accedidos dentro de la aplicación. No se deben ingresar directamente a estos atributos si no es por via de getters y setters.
    *  Los atributos que podrá ingresar el usuario deberán ser especificados en la variable protegida fillable.
    * Siempre se debe extender de la clase Model de Eloquent.

3. Reglas para vistas
    * Toda vista debe extender del layout master.
    * Todas las vistas deben usar blade.
    * Nunca abra y cierre php en las vistas.
    * Nunca agregue un javascript o css dentro de las vistas, estos deberán ir en archivos aparte y ser importados.
    * Los textos no podrán ser escritos explícitamente, por el contrario deberán usar los archivos lang e importar el texto que requiere.

4. Reglas para las rutas
    * Toda ruta debe estar asociada a un controlador. 
    * Ninguna url debe especificar en su nombre el tipo de método. Por ejemplo es incorrecto usar rutas como:
        * /productPost
        * /product/post
