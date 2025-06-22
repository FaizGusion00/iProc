# iProc - Sistem Pengurusan 

<div align="center">
  <img src="assets/img/item/logo3.png" alt="iProc Logo" width="200">
  
  [![PHP Version](https://img.shields.io/badge/PHP-%3E%3D7.4-blue)](https://php.net)
  [![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange)](https://mysql.com)
  [![Bootstrap](https://img.shields.io/badge/Bootstrap-5.1.3-purple)](https://getbootstrap.com)
  [![License](https://img.shields.io/badge/License-MIT-green)](LICENSE)
</div>

## 📋 Tentang Projek

**iProc** adalah sistem pengurusan perolehan yang dibangunkan khusus untuk **Unit Perolehan, Bahagian Pembangunan Perakaunan Pengurusan, Jabatan Akauntan Negara Malaysia**. Sistem ini direka bentuk untuk mengurus dan memudahkan proses perolehan kerajaan dengan ciri-ciri keselamatan dan kawalan akses yang komprehensif.

### 🎯 Objektif Utama
- Menguruskan proses perolehan kerajaan secara digital
- Menyediakan kawalan akses berlapis berdasarkan peranan pengguna
- Memudahkan pemantauan dan pelaporan aktiviti perolehan
- Meningkatkan ketelusan dan akauntabiliti dalam proses perolehan

## ✨ Ciri-Ciri Utama

### 🔐 Sistem Autentikasi & Keselamatan
- Autentikasi secure dengan password encryption
- Role-based access control (RBAC) dengan 8 peranan pengguna
- Session management yang selamat
- Kawalan akses berlapis untuk setiap modul dan proses

### 👥 Pengurusan Pengguna
- **Admin**: Pentadbiran sistem penuh
- **Pentadbir Sistem**: Pengurusan sistem dan konfigurasi
- **Penyedia**: Menyediakan dokumen perolehan
- **Penyemak I & II**: Semakan dokumen (2 tahap)
- **Pelulus I, II & III**: Kelulusan dokumen (3 tahap)
- **Naziran & Audit**: Pemantauan dan audit

### 📊 Modul Pengurusan
- **Modul PPT**: Perancangan Perolehan Tahunan
- **Modul PTL**: Perancangan Tetap Lahir
- **Modul SST**: Surat Setuju Terima
- **Modul PS**: Pentadbiran Sistem

### 📈 Ciri-Ciri Tambahan
- Dashboard interaktif untuk setiap peranan
- Sistem notifikasi dan tetapan pengguna
- Export data dalam pelbagai format (PDF, Excel, CSV)
- Responsive design untuk akses mudah alih
- Multilingual support (Bahasa Malaysia)

## 🛠️ Teknologi yang Digunakan

### Backend
- **PHP 7.4+** - Server-side scripting
- **MySQL 5.7+** - Database management
- **MySQLi** - Database connectivity

### Frontend
- **HTML5 & CSS3** - Markup dan styling
- **Bootstrap 5.1.3** - UI framework
- **JavaScript & jQuery 3.5.1** - Client-side scripting
- **Boxicons** - Icon library
- **ApexCharts** - Data visualization

### Build Tools & Libraries
- **Gulp 4.0+** - Task automation
- **Webpack** - Module bundling
- **SCSS/Sass** - CSS preprocessing
- **DataTables** - Advanced table features
- **SweetAlert** - Beautiful alerts
- **Perfect Scrollbar** - Custom scrollbars

## 📦 Keperluan Sistem

### Keperluan Minimum
- **Web Server**: Apache 2.4+ / Nginx 1.16+
- **PHP**: 7.4 atau lebih tinggi
- **Database**: MySQL 5.7+ / MariaDB 10.2+
- **Memory**: 512MB RAM minimum (1GB+ disyorkan)
- **Storage**: 500MB ruang disk

### Ekstensi PHP yang Diperlukan
```
- mysqli
- session
- json
- mbstring
- openssl
- fileinfo
- gd (untuk manipulasi gambar)
```

### Keperluan Development
- **Node.js**: 14.x atau lebih tinggi
- **npm**: 6.x atau lebih tinggi
- **Gulp CLI**: Untuk build automation

## 🚀 Panduan Pemasangan

⚠️ **BACA DAHULU**: [SECURITY.md](SECURITY.md) untuk panduan keselamatan kritikal!

### 1. Clone Repository
```bash
git clone https://github.com/your-organization/iproc.git
cd iproc
```

### 2. Setup Database
```bash
# Cipta database MySQL
mysql -u root -p
CREATE DATABASE iproc CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit

# Import struktur database (GUNA versi yang selamat)
mysql -u root -p iproc < database/iproc_clean.sql
```

### 3. Konfigurasi Database
Edit fail `database/config.php`:
```php
<?php
$db_host = 'localhost';        // Database host
$db_user = 'your_username';    // Database username
$db_pass = 'your_password';    // Database password
$db_name = 'iproc';           // Database name
```

### 4. Setup Dependencies (Untuk Development)
```bash
# Install Node.js dependencies
npm install

# Build assets
npm run build
```

### 5. Konfigurasi Web Server

#### Apache Configuration
```apache
<VirtualHost *:80>
    ServerName iproc.local
    DocumentRoot /path/to/iproc
    DirectoryIndex index.php
    
    <Directory /path/to/iproc>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

#### Nginx Configuration
```nginx
server {
    listen 80;
    server_name iproc.local;
    root /path/to/iproc;
    index index.php;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### 6. Set Permissions (Linux/macOS)
```bash
chmod -R 755 /path/to/iproc
chmod -R 777 /path/to/iproc/assets/uploads  # Jika folder upload wujud
```

## 🔧 Konfigurasi

### Akaun Default
Selepas pemasangan, gunakan akaun default berikut:

**Admin:**
- IC: `000000000000` (untuk testing sahaja)
- Kata Laluan: `TukarPassword123!`

**Pengguna Ujian:**
- IC: `111111111111` (untuk testing sahaja)
- Kata Laluan: `TukarPassword123!`

⚠️ **KRITIKAL**: 
- Data ini adalah DUMMY untuk development
- JANGAN guna untuk production
- Lihat `database/iproc_clean.sql` untuk data testing yang selamat
- Baca [SECURITY.md](SECURITY.md) untuk panduan keselamatan lengkap

### Tetapan Keselamatan
1. Aktifkan HTTPS untuk production
2. Tukar kunci enkripsi default
3. Konfigurasi backup database automatik
4. Setup monitoring log keselamatan

## 📁 Struktur Direktori

```
iProc/
├── admin/                      # Modul pentadbiran
│   ├── dashboard_admin.php
│   ├── modul/                  # Pengurusan modul
│   ├── pengurusan_pengguna/    # Pengurusan pengguna
│   ├── proses/                 # Pengurusan proses
│   ├── ptj/                    # Pengurusan PTJ
│   └── role/                   # Pengurusan peranan
├── assets/                     # Asset statik
│   ├── css/                    # Stylesheet
│   ├── js/                     # JavaScript files
│   ├── img/                    # Gambar dan ikon
│   └── vendor/                 # Library pihak ketiga
├── authentication/             # Sistem autentikasi
├── database/                   # Konfigurasi & skrip database
├── user/                       # Modul pengguna mengikut peranan
│   ├── pelulus/
│   ├── penonton/
│   ├── pentadbir_sistem/
│   ├── penyedia/
│   └── penyemak/
├── DataTables/                 # Plugin DataTables
├── error/                      # Halaman error
└── scss/                       # Source SCSS files
```

## 🔄 Development Workflow

### Build Assets
```bash
# Build untuk development
npm run build

# Build untuk production
npm run build:prod

# Watch untuk perubahan
npm run watch

# Serve dengan hot reload
npm run serve
```

### Database Migrations
Struktur database disimpan dalam `database/iproc.sql`. Untuk update database:

1. Backup database sedia ada
2. Buat perubahan pada fail SQL
3. Test pada environment development
4. Deploy ke production

## 🧪 Testing

### Menjalankan Test Manual
1. Login dengan akaun yang berbeza peranan
2. Test setiap modul dan proses
3. Verify kawalan akses berfungsi
4. Test responsive design pada device berbeza

### Test Cases Utama
- [ ] Autentikasi dan session management
- [ ] Role-based access control
- [ ] CRUD operations untuk setiap modul
- [ ] Export/import functionality
- [ ] Responsive design compatibility

## 📊 Monitoring & Maintenance

### Log Files
- PHP error logs: `/var/log/apache2/error.log`
- Application logs: Implement custom logging
- Database query logs: Enable dalam MySQL config

### Backup Strategy
```bash
# Backup database harian
mysqldump -u username -p iproc > backup_$(date +%Y%m%d).sql

# Backup files
tar -czf backup_files_$(date +%Y%m%d).tar.gz /path/to/iproc
```

### Performance Optimization
- Enable PHP OPcache
- Optimize MySQL queries
- Implement caching untuk data statik
- Compress static assets

## 🤝 Contributing

### Panduan Contribution
1. Fork repository
2. Cipta feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buka Pull Request

### Coding Standards
- Ikut PSR-12 untuk PHP code
- Gunakan meaningful variable names
- Tulis comment dalam Bahasa Malaysia
- Test thoroughly sebelum submit

### Organisasi
**Unit Perolehan**  
Bahagian Pembangunan Perakaunan Pengurusan  
Jabatan Akauntan Negara Malaysia  

📧 Email: [support@anm.gov.my]  
🌐 Website: [https://www.anm.gov.my]

## 🔒 Keselamatan

⚠️ **PENTING**: Projek ini mengandungi sistem kerajaan yang sensitif.

### Sebelum Contribute:
- **WAJIB** baca [SECURITY.md](SECURITY.md) 
- Install pre-commit hooks: `pip install pre-commit && pre-commit install`
- JANGAN commit data sebenar atau credentials
- Guna `database/config.example.php` sebagai template

### Jika Menemui Isu Keselamatan:
- **JANGAN** buat public issue
- Hubungi security team secara private
- Report melalui channel yang selamat

## 📄 License

Projek ini dilesenkan di bawah MIT License - lihat fail [LICENSE](LICENSE) untuk butiran lanjut.

## 🙏 Acknowledgments

- **Jabatan Akauntan Negara Malaysia** - Sokongan dan keperluan projek
- **ThemeSelection** - Sneat Bootstrap Admin Template
- **DataTables** - Advanced table functionality
- **Bootstrap Team** - Responsive framework
- **PHP Community** - Continuous support dan documentation

