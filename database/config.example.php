<?php
/**
 * Database Configuration Example
 * 
 * ARAHAN KESELAMATAN:
 * 1. Salin fail ini sebagai 'config.php'
 * 2. Tukar nilai-nilai di bawah dengan kredential database sebenar
 * 3. JANGAN commit fail 'config.php' ke Git!
 * 
 * SECURITY INSTRUCTIONS:
 * 1. Copy this file as 'config.php'
 * 2. Replace values below with actual database credentials
 * 3. DO NOT commit 'config.php' to Git!
 */

// Database Host (biasanya 'localhost' untuk development)
$db_host = 'localhost';

// Database Username (guna user dengan akses minimum yang diperlukan)
$db_user = 'your_database_username';

// Database Password (guna password yang kuat)
$db_pass = 'your_secure_password';

// Database Name
$db_name = 'iproc';

// Database Port (optional, default: 3306 untuk MySQL)
$db_port = 3306;

// Database Charset (untuk sokongan Unicode)
$db_charset = 'utf8mb4';

// Connection dengan error handling yang lebih baik
try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
    
    // Set charset untuk mengelakkan masalah encoding
    $conn->set_charset($db_charset);
    
    // Check connection
    if ($conn->connect_error) {
        // Log error secara selamat (jangan expose credentials)
        error_log("Database connection failed: " . $conn->connect_error);
        die("Connection failed. Please check server configuration.");
    }
    
} catch (Exception $e) {
    // Log error secara selamat
    error_log("Database connection exception: " . $e->getMessage());
    die("Database connection error. Please contact system administrator.");
}

/**
 * NOTA KESELAMATAN / SECURITY NOTES:
 * 
 * 1. Untuk Production:
 *    - Guna environment variables daripada hardcode credentials
 *    - Aktifkan SSL untuk database connection
 *    - Guna user database dengan permission minimum
 *    - Regular update password database
 * 
 * 2. Contoh menggunakan environment variables:
 *    $db_host = $_ENV['DB_HOST'] ?? 'localhost';
 *    $db_user = $_ENV['DB_USER'] ?? 'default_user';
 *    $db_pass = $_ENV['DB_PASS'] ?? '';
 *    $db_name = $_ENV['DB_NAME'] ?? 'iproc';
 * 
 * 3. Untuk keselamatan tambahan, consider guna:
 *    - Database connection pooling
 *    - Read/Write database separation
 *    - Regular backup dan monitoring
 */
?> 