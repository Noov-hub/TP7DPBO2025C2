<?php
require_once './class/Event.php';
$event = new Event();

$search = isset($_GET['search']) ? $_GET['search'] : '';
$eventList = $event->getAll($search);

// handle add / update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nama_event' => $_POST['nama_event'],
        'tanggal' => $_POST['tanggal'],
        'lokasi' => $_POST['lokasi'],
        'deskripsi' => $_POST['deskripsi']
    ];

    if (isset($_POST['id']) && $_POST['id'] != '') {
        $event->update($_POST['id'], $data);
    } else {
        $event->add($data);
    }
    header("Location: events.php");
    exit;
}

// handle delete
if (isset($_GET['delete'])) {
    $event->delete($_GET['delete']);
    header("Location: events.php");
    exit;
}

// edit data
$editData = null;
if (isset($_GET['edit'])) {
    $editData = $event->getById($_GET['edit']);
}
?>

<?php include 'header.php'; ?>

<h2>Manajemen Event</h2>

<form method="GET" action="events.php">
    <input type="text" name="search" placeholder="Cari event..." value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Cari</button>
</form>

<hr>

<form method="POST" action="events.php">
    <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">
    <input type="text" name="nama_event" placeholder="Nama Event" value="<?= $editData['nama_event'] ?? '' ?>" required><br>
    <input type="date" name="tanggal" value="<?= $editData['tanggal'] ?? '' ?>" required><br>
    <input type="text" name="lokasi" placeholder="Lokasi" value="<?= $editData['lokasi'] ?? '' ?>" required><br>
    <textarea name="deskripsi" placeholder="Deskripsi"><?= $editData['deskripsi'] ?? '' ?></textarea><br>
    <button type="submit"><?= isset($editData) ? 'Update' : 'Tambah' ?> Event</button>
</form>

<hr>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Nama Event</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($eventList as $e): ?>
    <tr>
        <td><?= htmlspecialchars($e['nama_event']) ?></td>
        <td><?= $e['tanggal'] ?></td>
        <td><?= htmlspecialchars($e['lokasi']) ?></td>
        <td><?= htmlspecialchars($e['deskripsi']) ?></td>
        <td>
            <a href="events.php?edit=<?= $e['id'] ?>">Edit</a> |
            <a href="events.php?delete=<?= $e['id'] ?>" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>
