<?php

require_once __DIR__ . "/db.php";
trait traitDB
{
    public static function connectDB()
    {
        try {
            $dsn = "mysql:host=127.0.0.1;port=33006;dbname=INCIDENCIAS;charset=utf8";
            $conn = new PDO($dsn, "root", "dbrootpass", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
         } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
        //devuelve la conexion creada
        return $conn;
    }

    public function execDB($sql)
    {
        $conn = self::connectDB();
        return $conn->exec($sql);
    }

    public static function queryPreparadaDB($sql, $parametros)
    {
        $conn = self::connectDB();
        $stmt = $conn->prepare($sql);
        $stmt->execute($parametros);
        return $stmt->fetchAll();
    }

}