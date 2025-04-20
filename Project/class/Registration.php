<?php
require_once './config/db.php';

class Registration {
    private $conn;

    public function __construct() {
        $this->conn = DB::connect();
    }

    public function getAll() {
        $sql = "SELECT r.*, e.nama_event, p.nama AS nama_peserta
                FROM registrations r
                JOIN events e ON r.id_event = e.id
                JOIN participants p ON r.id_participant = p.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($data) {
        $sql = "INSERT INTO registrations (id_event, id_participant, tanggal_daftar) 
                VALUES (:id_event, :id_participant, :tanggal_daftar)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM registrations WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
?>
