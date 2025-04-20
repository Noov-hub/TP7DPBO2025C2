<?php
require_once './class/Registration.php';
require_once './class/Event.php';
require_once './class/Participant.php';

$registration = new Registration();
$event = new Event();
$participant = new Participant();

$allRegistrations = $registration->getAll();
$events = $event->getAll();
$participants = $participant->getAll();

// Handle form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id_event' => $_POST['id_event'],
        'id_participant' => $_POST['id_participant'],
        'tanggal_daftar' => $_POST['tanggal_daftar']
    ];
    $registration->add($data);
    header("Location: registrations.php");
    exit;
}

// Handle delete
if (isset($_GET['delete'])) {
    $registration->delete($_GET['delete']);
    header("Location: registrations.php");
    exit;
}
?>

<?php include 'header.php'; ?>

<h2>Registrasi Peserta ke Event</h2>

<form method="POST" action="registrations.php">
    <label for="id_event">Event:</label><br>
    <select name="id_event" required>
        <option value="">-- Pilih Event --</option>
        <?php foreach ($events as $e): ?>
            <option value="<?= $e['id'] ?>"><?= htmlspecialchars($e['nama_event']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="id_participant">Peserta:</label><br>
    <select name="id_participant" required>
        <option value="">-- Pilih Peserta --</option>
        <?php foreach ($participants as $p): ?>
            <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nama']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="tanggal_daftar">Tanggal Daftar:</label><br>
    <input type="date" name="tanggal_daftar" required><br>

    <button type="submit">Daftarkan</button>
</form>

<hr>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Nama Event</th>
        <th>Peserta</th>
        <th>Tanggal Daftar</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($allRegistrations as $r): ?>
    <tr>
        <td><?= htmlspecialchars($r['nama_event']) ?></td>
        <td><?= htmlspecialchars($r['nama_peserta']) ?></td>
        <td><?= $r['tanggal_daftar'] ?></td>
        <td>
            <a href="registrations.php?delete=<?= $r['id'] ?>" onclick="return confirm('Yakin mau hapus registrasi ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>
