<?php
require_once './config/db.php';

class Participant {
    private $conn;

    public function __construct() {
        $this->conn = DB::connect();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM participants");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM participants WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($data) {
        $sql = "INSERT INTO participants (nama, email, telepon) VALUES (:nama, :email, :telepon)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update($id, $data) {
        $sql = "UPDATE participants SET nama = :nama, email = :email, telepon = :telepon WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM participants WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
?>
