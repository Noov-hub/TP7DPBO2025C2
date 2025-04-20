<?php
require_once './class/Participant.php';
$participant = new Participant();

$list = $participant->getAll();

// handle add / update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'telepon' => $_POST['telepon']
    ];

    if (isset($_POST['id']) && $_POST['id'] != '') {
        $participant->update($_POST['id'], $data);
    } else {
        $participant->add($data);
    }
    header("Location: participants.php");
    exit;
}

// handle delete
if (isset($_GET['delete'])) {
    $participant->delete($_GET['delete']);
    header("Location: participants.php");
    exit;
}

// edit data
$editData = null;
if (isset($_GET['edit'])) {
    $editData = $participant->getById($_GET['edit']);
}
?>

<?php include 'header.php'; ?>

<h2>Manajemen Peserta</h2>

<form method="POST" action="participants.php">
    <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">
    <input type="text" name="nama" placeholder="Nama" value="<?= $editData['nama'] ?? '' ?>" required><br>
    <input type="email" name="email" placeholder="Email" value="<?= $editData['email'] ?? '' ?>" required><br>
    <input type="text" name="telepon" placeholder="Telepon" value="<?= $editData['telepon'] ?? '' ?>" required><br>
    <button type="submit"><?= isset($editData) ? 'Update' : 'Tambah' ?> Peserta</button>
</form>

<hr>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($list as $p): ?>
    <tr>
        <td><?= htmlspecialchars($p['nama']) ?></td>
        <td><?= htmlspecialchars($p['email']) ?></td>
        <td><?= htmlspecialchars($p['telepon']) ?></td>
        <td>
            <a href="participants.php?edit=<?= $p['id'] ?>">Edit</a> |
            <a href="participants.php?delete=<?= $p['id'] ?>" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>
