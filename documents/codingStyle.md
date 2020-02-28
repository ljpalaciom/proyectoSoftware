* Los controladores deben ser nombrados en singular y finalizando con "Controller", usará notación PascalCase.
* Los modelos deben ser nombrados en singular, usará notación PascalCase.
* Las rutas deberán ser nombradas en singular. Ejemplo /producto/show.
* Los parámetros de las rutas deben usar camelCase.
* Las rutas de url deben empezar con /
* Las rutas de url deben no deben terminar con /
* Las vistas se nombrarán teniendo en cuenta el siguiente estilo:
product.orderById
* Las direcciones URL públicas deben usar kebab-case. Ejemplo:
/post/how-to-program
* Las tablas de la base de datos serán nombradas en plural, en minúscula y deben usar snake_case.
* Las propiedades de los modelos serán nombradas en singular, en minúscula y con snake_case.
* Las claves foráneas tendrán el nombre en singular del modelo con el sufijo _id. Ejemplo product_id.
* Las claves primarias se llamarán id.
* Las migraciones deben seguir un formato como el siguiente: 
2017_01_01_000000_create_articles_table
* Los archivos de blade deben ser en minúscula y con camelCase.
* Las clases deberán ser nombrados en PascalCase.
* Los metodos y las variables deben ser nombrados en camelCase.
* Las constantes deben ser completamente en mayúsculas y con snake_case.
* Las claves de configuración deben usar snake_case.
* No use comentarios de bloque con métodos que pueden ser insinuados, es decir a menos de que requieran una descripción. Solo agregue descripciones cuando agrega más información que la declaración del método en sí.
* Cuando use comentarios de bloque use sentencias completas que tengan punto al final.
* Para cualquier if y cualquier ciclo use siempre llaves: {}
