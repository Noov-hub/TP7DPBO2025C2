# TP7DPBO2025C2
isinya TP7 DPBO Sem 4

# Janji
Saya Ibnu Fadhilah dengan NIM 2300613 mengerjakan Tugas Praktikum 7 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.


# 📘 Sistem Manajemen Event – Web App Sederhana (PHP + PDO)

## ✅ Fitur Utama

- CRUD untuk Event, Peserta, dan Registrasi
- Relasi antara Event dan Peserta (melalui Registrasi)
- Pendaftaran peserta ke event
- Fitur pencarian event berdasarkan nama
- Menggunakan **PDO + prepared statements** untuk keamanan
- Struktur proyek **modular dan terpisah**

---

## 🏗️ Struktur Tabel (Database)

### 1. `events`
| Kolom       | Tipe Data     | Keterangan         |
|-------------|---------------|--------------------|
| id          | INT (PK)      | Auto Increment     |
| nama_event  | VARCHAR(255)  | Nama dari event    |
| tanggal     | DATE          | Tanggal acara      |
| lokasi      | VARCHAR(255)  | Tempat diselenggara|
| deskripsi   | TEXT          | Deskripsi event    |

### 2. `participants`
| Kolom    | Tipe Data     | Keterangan         |
|----------|---------------|--------------------|
| id       | INT (PK)      | Auto Increment     |
| nama     | VARCHAR(100)  | Nama peserta       |
| email    | VARCHAR(100)  | Email peserta      |
| telepon  | VARCHAR(20)   | No. Telepon peserta|

### 3. `registrations`
| Kolom          | Tipe Data     | Keterangan                           |
|----------------|---------------|--------------------------------------|
| id             | INT (PK)      | Auto Increment                       |
| id_event       | INT (FK)      | Relasi ke `events.id`               |
| id_participant | INT (FK)      | Relasi ke `participants.id`         |
| tanggal_daftar | DATE          | Tanggal peserta mendaftar ke event  |

---

## 🔄 Alur Program

1. Pengguna membuka `index.php` sebagai halaman utama.
2. Navigasi dilakukan melalui menu:
   - `events.php` → CRUD Event + Cari Event
   - `participants.php` → CRUD Peserta
   - `registrations.php` → Pendaftaran peserta ke event
3. Admin menambahkan data event dan peserta terlebih dahulu.
4. Di halaman registrasi, admin memilih peserta dan event dari dropdown lalu memasukkan tanggal daftar.
5. Semua aksi data dilakukan melalui class masing-masing di folder `class/` menggunakan **PDO dan prepared statement** untuk keamanan.

---

## 🧩 Struktur Folder/Modul

```
project/
│
├── class/
│   ├── Event.php
│   ├── Participant.php
│   └── Registration.php
│
├── config/
│   └── db.php
│
├── view/
│   ├── index.php
│   ├── events.php
│   ├── participants.php
│   ├── registrations.php
│   ├── header.php
│   └── footer.php
│
├── style.css
└── readme.md
```

---

## ⚙️ Teknologi yang Digunakan

- PHP (native)
- PDO (database access)
- MySQL/MariaDB
- HTML/CSS (sederhana)

---

## 💡 Catatan

- Pastikan koneksi database di `config/db.php` sudah sesuai.
- Program ini tidak menggunakan login/admin, jadi bebas diakses.
- Data registrasi tidak bisa diedit, hanya bisa ditambah dan dihapus.

---

## 📝 Contoh Query Pembuatan Tabel

```sql
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_event VARCHAR(255),
    tanggal DATE,
    lokasi VARCHAR(255),
    deskripsi TEXT
);

CREATE TABLE participants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100),
    telepon VARCHAR(20)
);

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_event INT,
    id_participant INT,
    tanggal_daftar DATE,
    FOREIGN KEY (id_event) REFERENCES events(id),
    FOREIGN KEY (id_participant) REFERENCES participants(id)
);
```

---
# dokumentasi
![image](https://github.com/user-attachments/assets/8d21bd09-c171-4953-9376-ffa8315a172f)
kemaren udh jalan, tpi ga di SS, sekarang udh dibagusin, eh XAMPP nya malah anomali bjir, ports Apachenya berubah jdi ga jelas, udah di cek ke folder conf file2 httpd nya ga ada yg salah, mysqlnya jga stuck di connecting T_T
---
![image](https://github.com/user-attachments/assets/6f75e34a-5ad1-44c9-8575-622338abbd84)

