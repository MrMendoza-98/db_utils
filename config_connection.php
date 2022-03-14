<?php 
define('DB_NAME','');
define('DB_USER','');
define('DB_PASS','');
define('DB_HOST','');
define('DB_CHARSET','');

try {
    #Create a global PDO object
    $pdo = new PDO(
        #Use MySQL database Driver
        "mysql:host=DB_HOST;dbname=DB_NAME",DB_USER,DB_PASS,
        array(
            //Return rows found, not changed, during inserts/updates
            PDO::MYSQL_ATTR_FOUND_ROWS => true,
            //Let the database driver handle prepared statements
            PDO::ATTR_EMULATE_PREPARES => false,
            //Have errors get reported as exceptions, easier to catch
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            //Return associative arrays, good for JSON encoding
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        )
    );
} catch (PDOException $th) {
    //If we can't connect the app probably is useless, so just die()
    die("Database Connection Failed: ".$th->getMessage());
}
?>