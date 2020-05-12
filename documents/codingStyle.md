# Coding style
* Controllers must be named in singular and ending with "Controller", will use PascalCase notation.
* Models must be named in the singular, it will use PascalCase notation.
* The routes must be named in the singular. Example / product / show.
* Route parameters must use camelCase.
* Url paths must start with /
* Url paths must not end with /
* The views will be named taking into account the following style:
product.orderById
* Public URLs must use kebab-case. Example:
/ post / how-to-program
* Database tables will be named in plural, lowercase and must use snake_case.
* The properties of the models will be named in the singular, in lowercase and with snake_case.
* Foreign keys will have the singular name of the model with the suffix _id. Example product_id.
* The primary keys will be called id.
* Migrations must follow a format like the following:
2017_01_01_000000_create_articles_table
* Blade files must be lowercase and camelCase.
* Classes must be named in PascalCase.
* Methods and variables must be named in camelCase.
* Constants must be completely capitalized and with snake_case.
* Configuration keys must use snake_case.
* Do not use block comments with methods that can be hinted, that is, unless they require a description. Only add descriptions when you add more information than the method declaration itself.
* When using block comments use full statements that have a period at the end.
* For any if and any cycle always use braces: {}
