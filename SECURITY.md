# 🔒 Panduan Keselamatan iProc

## ⚠️ AMARAN KESELAMATAN KRITIKAL

Projek ini adalah **sistem kerajaan yang sensitif**. Sila patuhi garis panduan keselamatan ini dengan teliti.

## 🚨 Maklumat yang TIDAK BOLEH di-commit ke Git

### 1. Kredential Database
```
❌ database/config.php
❌ Sebarang fail yang mengandungi password database
❌ Connection strings dengan kredential sebenar
```

### 2. Data Peribadi & Kerajaan
```
❌ IC numbers sebenar
❌ Email addresses pegawai kerajaan (@anm.gov.my)
❌ Nombor telefon sebenar
❌ Alamat rumah/pejabat
❌ Maklumat gaji atau kewangan
```

### 3. Konfigurasi Production
```
❌ API keys
❌ Secret keys
❌ SSL certificates
❌ Session keys
❌ Encryption keys
```

### 4. Data Operasi Sebenar
```
❌ Database dumps dengan data production
❌ Log files dengan aktiviti sebenar
❌ Backup files dengan data sebenar
❌ Documents/attachments upload
```

## ✅ Apa yang SELAMAT untuk di-commit

### 1. Kod Aplikasi
```
✅ PHP source code (tanpa credentials)
✅ HTML templates
✅ CSS/SCSS files
✅ JavaScript files (tanpa API keys)
✅ Configuration templates (.example files)
```

### 2. Database Schema
```
✅ Table structures
✅ Database schema (tanpa data)
✅ Migration files
✅ Seed files dengan data dummy
```

### 3. Documentation
```
✅ README files
✅ Installation guides
✅ API documentation
✅ Code comments
```

## 🔧 Garis Panduan Setup Keselamatan

### 1. Setup Development Environment

```bash
# Clone repository
git clone [repository-url]
cd iproc

# Copy configuration template
cp database/config.example.php database/config.php

# Edit dengan kredential development
nano database/config.php
```

### 2. Setup Production Environment

```bash
# JANGAN copy terus dari development
# Guna environment variables

# Contoh di .env file (jangan commit!)
DB_HOST=production_host
DB_USER=production_user
DB_PASS=very_secure_password
DB_NAME=iproc_production
```

### 3. Database Security

```sql
-- Cipta user database khusus dengan permission minimum
CREATE USER 'iproc_user'@'localhost' IDENTIFIED BY 'secure_password';
GRANT SELECT, INSERT, UPDATE, DELETE ON iproc.* TO 'iproc_user'@'localhost';
FLUSH PRIVILEGES;
```

## 📋 Checklist Sebelum Commit

### ✅ Periksa Setiap Commit
- [ ] Tiada password dalam kod
- [ ] Tiada IC numbers sebenar
- [ ] Tiada email @anm.gov.my sebenar
- [ ] Tiada nombor telefon sebenar
- [ ] Tiada API keys atau secret keys
- [ ] Configuration files menggunakan template sahaja

### ✅ Periksa Files yang Berubah
```bash
# Periksa apa yang akan di-commit
git diff --cached

# Periksa untuk pattern sensitif
git diff --cached | grep -i "password\|secret\|key\|@anm.gov.my"
```

## 🛡️ Best Practices Keselamatan

### 1. Environment Variables
```php
// ✅ BAIK - Guna environment variables
$db_pass = $_ENV['DB_PASSWORD'] ?? '';

// ❌ TIDAK BAIK - Hardcode password
$db_pass = 'actual_password';
```

### 2. Error Handling
```php
// ✅ BAIK - Log secara selamat
error_log("Database connection failed");
die("Connection error. Contact administrator.");

// ❌ TIDAK BAIK - Expose credentials
die("Cannot connect to database with password: $password");
```

### 3. Data Sanitization
```php
// ✅ BAIK - Sanitize input
$ic = filter_input(INPUT_POST, 'ic', FILTER_SANITIZE_STRING);

// ❌ TIDAK BAIK - Direct usage
$ic = $_POST['ic'];
```

## 📞 Melaporkan Masalah Keselamatan

Jika anda menemui masalah keselamatan:

1. **JANGAN** buat public issue di GitHub
2. **JANGAN** commit fix tanpa review
3. **HUBUNGI** team keselamatan secara private
4. **TUNGGU** arahan sebelum mengambil tindakan

### Kontak Keselamatan
- **Email**: [security@anm.gov.my] (untuk isu kritikal)
- **Internal**: Hubungi System Administrator
- **Urgent**: Escalate kepada IT Security Team

## 🔍 Tools untuk Security Checking

### 1. Pre-commit Hooks
```bash
# Install pre-commit hooks
pip install pre-commit
pre-commit install

# Setup hooks untuk check secrets
# File: .pre-commit-config.yaml
repos:
  - repo: https://github.com/Yelp/detect-secrets
    rev: v1.2.0
    hooks:
      - id: detect-secrets
```

### 2. Manual Checks
```bash
# Search untuk password patterns
grep -r "password\|secret\|key" --exclude-dir=.git .

# Search untuk IC patterns
grep -r "\d\{12\}" --exclude-dir=.git .

# Search untuk email patterns
grep -r "@anm\.gov\.my" --exclude-dir=.git .
```

## 📚 Resources Tambahan

- [OWASP Security Guidelines](https://owasp.org/)
- [PHP Security Best Practices](https://www.php.net/manual/en/security.php)
- [MySQL Security Guidelines](https://dev.mysql.com/doc/refman/8.0/en/security-guidelines.html)
- [Malaysian Government IT Security Policy](https://www.mampu.gov.my/)

---

## ⚡ Ringkasan Pantas

### ❌ JANGAN COMMIT:
- `database/config.php`
- Files dengan password sebenar
- IC numbers sebenar
- Email @anm.gov.my sebenar
- Database dumps dengan data production

### ✅ SELAMAT COMMIT:
- Source code (tanpa credentials)
- Configuration templates
- Documentation
- Database schema (tanpa data)

### 🔍 SENTIASA PERIKSA:
- `git diff --cached` sebelum commit
- Search pattern sensitif
- Review changes dengan teliti

**INGAT: Keselamatan data kerajaan adalah tanggungjawab semua!** 