<?php
class DB {
    private static $conn = null;

    public static function connect() {
        if (self::$conn === null) {
            $host = 'localhost';
            $dbname = 'db_event';
            $username = 'root';
            $password = ''; // ganti kalau pakai password

            try {
                self::$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Koneksi gagal: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
?>
