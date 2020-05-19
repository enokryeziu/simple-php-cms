# Simple PHP CMS

Simple website with custom made content management system.

## Getting Started

### Prerequisites

```
PHP 5.3 or greater
MySQL or other database (DB driver will need to be edited if not using MySQL)
Apache 
```

### Installing

1. Upload file to the directory of your choice.

```
git clone https://github.com/enokryeziu/simple-php-cms.git
```

2. Create a database and insert the SQL code

```
./muro.sql
```

3. Edit **functions/db_connect.php** base on your configuration

```
$servername = "localhost";  
$username = "root";
$password = "";
$dbname = "muso";

```
4. Login userwebsite.com/admin/login.php

```
email: admin@muro.com
pass: admin
```

## Version
```
Beta
```
