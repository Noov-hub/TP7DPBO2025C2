<?php
require_once './config/db.php';

class Event {
    private $conn;

    public function __construct() {
        $this->conn = DB::connect();
    }

    public function getAll($search = '') {
        $sql = "SELECT * FROM events WHERE nama_event LIKE :search ORDER BY tanggal DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':search' => "%$search%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM events WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($data) {
        $sql = "INSERT INTO events (nama_event, tanggal, lokasi, deskripsi) VALUES (:nama_event, :tanggal, :lokasi, :deskripsi)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update($id, $data) {
        $sql = "UPDATE events SET nama_event = :nama_event, tanggal = :tanggal, lokasi = :lokasi, deskripsi = :deskripsi WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM events WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
?>
