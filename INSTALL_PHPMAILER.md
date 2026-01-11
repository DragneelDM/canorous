# PHPMailer Installation Guide

## ⚠️ Composer Not Found

Composer is not currently installed on your system. You have 2 options:

---

## Option A: Install Composer (Recommended)

### Step 1: Download Composer
1. Go to: https://getcomposer.org/download/
2. Download **Composer-Setup.exe** for Windows
3. Run the installer
4. Follow the installation wizard (it will automatically detect your PHP)

### Step 2: Verify Installation
Open a new terminal/command prompt and run:
```bash
composer --version
```

You should see something like:
```
Composer version 2.x.x
```

### Step 3: Install PHPMailer
Navigate to your project directory and run:
```bash
cd d:\Github-Projects\canorous
composer install
```

This will:
- Read the `composer.json` file
- Download PHPMailer and dependencies
- Create a `vendor/` directory with all required files
- Create `composer.lock` file

### Step 4: Verify PHPMailer Installation
Check that these files exist:
- `vendor/autoload.php`
- `vendor/phpmailer/phpmailer/`
- `composer.lock`

---

## Option B: Manual Download (Quick but Not Recommended)

If you can't install Composer right now, you can manually download PHPMailer:

### Step 1: Download PHPMailer
1. Go to: https://github.com/PHPMailer/PHPMailer/releases
2. Download the latest release ZIP file (e.g., `PHPMailer-6.9.1.zip`)
3. Extract the ZIP file

### Step 2: Create vendor Directory Structure
```
d:\Github-Projects\canorous\vendor\
└── phpmailer\
    └── phpmailer\
        └── src\
            ├── PHPMailer.php
            ├── SMTP.php
            ├── Exception.php
            └── ... (all other PHPMailer files)
```

### Step 3: Create autoload.php
Create `d:\Github-Projects\canorous\vendor\autoload.php`:

```php
<?php
// Manual autoloader for PHPMailer
spl_autoload_register(function ($class) {
    // Convert namespace to file path
    $prefix = 'PHPMailer\\PHPMailer\\';
    $base_dir = __DIR__ . '/phpmailer/phpmailer/src/';

    // Check if the class uses the PHPMailer namespace
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // Get the relative class name
    $relative_class = substr($class, $len);

    // Replace namespace separators with directory separators
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // If the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});
```

### Step 4: Test PHPMailer
The contact form should now work!

---

## ✅ Verification Checklist

After installation (either method), verify these files exist:

- [ ] `vendor/autoload.php`
- [ ] `vendor/phpmailer/phpmailer/src/PHPMailer.php`
- [ ] `vendor/phpmailer/phpmailer/src/SMTP.php`
- [ ] `vendor/phpmailer/phpmailer/src/Exception.php`

---

## 🧪 Test Contact Form

1. Start XAMPP Apache server
2. Navigate to: http://localhost/canorous/contact.php
3. Fill out the form
4. Submit and check for success message

If you see errors, check:
- PHPMailer files are in correct location
- SMTP credentials in `contact.php` are correct (lines 34-39)
- PHP error logs for detailed error messages

---

## 🚀 For XAMPP Testing

### Windows Path for XAMPP:
If using XAMPP, copy your project to:
```
C:\xampp\htdocs\canorous\
```

Then run Composer from there:
```bash
cd C:\xampp\htdocs\canorous
composer install
```

---

## 📝 Notes

- **Option A (Composer)** is recommended because:
  - Easier to update dependencies
  - Automatic autoloading
  - Industry standard
  - Works with other PHP packages

- **Option B (Manual)** is only for quick testing:
  - No easy updates
  - Manual autoload management
  - Not recommended for production

---

## Need Help?

If you encounter issues:
1. Check PHP version: `php --version` (needs PHP 7.4+)
2. Check if composer is in PATH: `composer --version`
3. Check XAMPP PHP path: `C:\xampp\php\php.exe`
4. Verify file permissions on vendor/ directory
