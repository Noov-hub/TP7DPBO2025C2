CREATE DATABASE IF NOT EXISTS db_event;
USE db_event;

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_event VARCHAR(100),
    tanggal DATE,
    lokasi VARCHAR(100),
    deskripsi TEXT
);

CREATE TABLE participants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100),
    telepon VARCHAR(15)
);

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_event INT,
    id_participant INT,
    tanggal_daftar DATE,
    FOREIGN KEY (id_event) REFERENCES events(id) ON DELETE CASCADE,
    FOREIGN KEY (id_participant) REFERENCES participants(id) ON DELETE CASCADE
);
