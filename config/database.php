<?php
class Database
{
    public static function conectar()
    {
        return new MongoDB\Driver\Manager("mongodb://localhost:27017");
    }
}
