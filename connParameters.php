<?php
    foreach ($_SERVER as $key => $value) {
        if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
            continue;
        }

        $host = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
        $dbName = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
        $userName = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
        $password = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
    }
?>