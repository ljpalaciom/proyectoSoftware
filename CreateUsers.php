 \App\User::create(["name" => "admin", "last_name" => "palacio",
 "email" => "admin@hotmail.com", "age" => "45", "password" => bcrypt("123456789"),
"role" => 3]);

\App\User::create(["name" => "trainer", "last_name" => "palacio",
"email" => "trainer@hotmail.com", "age" => "45", "password" => bcrypt("123456789"),
"role" => 3]);

\App\User::create(["name" => "user", "last_name" => "palacio",
"email" => "users@hotmail.com", "age" => "45", "password" => bcrypt("123456789"),
"role" => 3]);
