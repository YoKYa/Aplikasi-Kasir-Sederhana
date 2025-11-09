# 🧾 Aplikasi Kasir Sederhana (PHP Native + MySQL)

Aplikasi kasir sederhana berbasis **PHP Native** dan **MySQL** untuk mencatat pesanan, mengelola keranjang, serta menyimpan riwayat transaksi.  
Cocok untuk pembelajaran dan usaha kecil.

---

## ✨ Fitur Aplikasi

| Fitur | Keterangan |
|------|------------|
| 👤 Login & Register User | Sistem autentikasi pengguna (multi user) |
| 🛒 Keranjang | Tambah, hapus, dan pengelolaan pesanan |
| 📄 Riwayat Transaksi | Histori order disimpan pada database |
| ➕ Input Manual | Tambah pesanan secara manual tanpa barcode |

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Fungsi |
|----------|--------|
| **PHP Native** | Logika aplikasi |
| **MySQL** | Database |
| **Bootstrap** | Tampilan UI |
| **XAMPP** | Web Server (Apache + MySQL) |

---

## 📁 Struktur Folder (Ringkasan)
PV_Kasir/
├── assets/
│ ├── css/
│ └── js/
├── pages/
│ ├── index.php
│ ├── login.php
│ ├── register.php
│ ├── keranjang.php
│ ├── riwayat.php
└── database/
└── pv_kasir.sql


---

## 🚀 Cara Instalasi dan Menjalankan Aplikasi

### **1. Install XAMPP**
> Bisa menggunakan web server lain seperti Laragon / WAMP.

---

### **2. Import Database**

1. Buka **phpMyAdmin**
2. Klik **New Database**
3. Buat database baru dengan nama:
pv_kasir

4. Import file database:

---

### **3. Pindahkan Project ke Folder XAMPP**

Pindahkan folder aplikasi ke:
PV_Kasir/database/pv_kasir.sql

---

### **3. Pindahkan Project ke Folder XAMPP**

Pindahkan folder aplikasi ke:
xampp/htdocs/PV_Kasir

---

### **4. Jalankan Apache & MySQL**

Buka XAMPP → Start **Apache** dan **MySQL**

---

### **5. Akses Aplikasi**

Buka browser lalu ketik:
http://localhost/PV_Kasir

✅ Aplikasi siap digunakan!

---

## 🔑 Login Awal

Saat pertama kali menjalankan aplikasi, lakukan login atau register.

| Form | Keterangan |
|------|------------|
| Register | Untuk membuat akun baru |
| Login | Masuk ke aplikasi |

> Jika login gagal, lakukan **Register** terlebih dahulu.

---

## 📸 Screenshot
> *(Opsional — tambahkan gambar untuk mempercantik README)*

---

## 🎯 Tujuan Dibuatnya Aplikasi

- Belajar dasar CRUD PHP + MySQL
- Contoh implementasi sistem kasir sederhana
- Dokumentasi dan portofolio untuk GitHub

---

## 🤝 Kontribusi

Pull Request sangat terbuka.  
Silakan Fork dan kembangkan!

---

## 📄 License

MIT License.  
Boleh bebas digunakan / dikembangkan untuk keperluan apapun.

---

⭐ Jika aplikasi ini membantu, jangan lupa kasih **Star** di repository GitHub!