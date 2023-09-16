<?php 

require(APP_ROOT . "src/libraries/dotenv.php");

return[
    "connections"=>[
        "mysql"=>[
            "dbname"=>$_ENV["DB_NAME"],
            'user' => $_ENV["DB_USER"],
            'password' => $_ENV["DB_PASS"],
            'host' => $_ENV["DB_HOST"],
            'driver' => $_ENV["DB_DRIVER"] ?? 'pdo_mysql',
            "unix_socket"=>null,#Optional
            "charset"=>$_ENV["DB_CHARSET"] ?? "utf8",
        ],
        "pgsql"=>[
            "dbname"=>$_ENV["DB_NAME"],
            'user' => $_ENV["DB_USER"],
            'password' => $_ENV["DB_PASS"],
            'host' => $_ENV["DB_HOST"],
            'driver' => $_ENV["DB_DRIVER"] ?? 'pdo_pgsql',
            "charset"=>$_ENV["DB_CHARSET"] ?? "utf8",
            "sslmode"=>null,#Optional
            "sslrootcert"=>null,#Optional
            "sslcert"=>null,#Optional
            "sslkey"=>null,#Optional
            "sslcrl"=>null,#Optional
            "application_name"=>null#Optional
        ]
    ]
];  