# Deployment Guide

This is a PHP-based website. All pages are PHP files that can be deployed to any PHP-enabled web server.

## Project Structure

```
canorous/
├── index.php              # Homepage
├── engineering.php        # Engineering services page
├── manufacturing.php      # Manufacturing page
├── 3d-studio.php          # 3D Studio page
├── unreal-studio.php      # Unreal Studio page
├── contact.php            # Contact form page
├── verify.php             # Employee verification (optional)
├── components/            # PHP components
│   ├── hero.php
│   ├── clients-section.php
│   ├── what-sets-us-apart.php
│   ├── portfolio-slider.php
│   ├── portfolio-grid.php
│   └── video-text-grid.php
├── includes/               # PHP includes
│   ├── config.php
│   ├── header.php
│   └── footer.php
├── data/                   # JSON data files
│   ├── ClientsData.json
│   ├── engineering.json
│   └── manufacturing.json
├── public/                 # Static assets
│   ├── images/
│   ├── videos/
│   ├── robots.txt
│   └── sitemap.xml
├── assets/                 # CSS and JavaScript
│   ├── css/
│   └── js/
├── htaccess               # Apache .htaccess (rename to .htaccess on server)
└── vendor/                # Composer dependencies (PHPMailer)
```

## Prerequisites

### Server Requirements
- PHP 7.4 or higher (uses strict types)
- Apache web server with mod_rewrite enabled
- MySQL/MariaDB database (only if using verify.php for employee verification)

### Required PHP Extensions
- mysqli (for database connections)
- mbstring (for string handling)
- session (for session management)

## Installation Steps

### 1. Install PHPMailer (Required for Contact Form)

The contact form requires PHPMailer to send emails. Install it using Composer:

```bash
composer require phpmailer/phpmailer
```

This will create a `vendor/` directory with PHPMailer and its dependencies.

**Note:** If you don't install PHPMailer, the contact form will display an error message when users try to submit it.

### 2. Configure Contact Form Email Settings

Edit `contact.php` and update the SMTP settings (lines 33-40):

```php
$mail->Host = 'mail.can-india.co.in';
$mail->SMTPAuth = true;
$mail->Username = 'sales@can-india.co.in';
$mail->Password = 'your-password-here';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;
```

### 3. Configure Database (Optional - Only if using verify.php)

If you're using `verify.php` for employee verification, update database credentials in `includes/config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'your-database-user');
define('DB_PASS', 'your-database-password');
define('DB_NAME', 'your-database-name');
```

## Deployment Steps

### Manual Deployment

1. **Upload all files** to your web server's `public_html/` directory (or equivalent):
   - All `.php` files (index.php, engineering.php, etc.)
   - `components/` directory
   - `includes/` directory
   - `data/` directory
   - `public/` directory (images, videos, robots.txt, sitemap.xml)
   - `assets/` directory (CSS and JavaScript)
   - `vendor/` directory (if using Composer, or install on server)
   - `htaccess` file (rename to `.htaccess` on server)

2. **Set proper file permissions:**
   ```bash
   chmod 644 *.php
   chmod 755 components/ includes/ data/ assets/ public/
   chmod 644 .htaccess
   ```

3. **Rename htaccess to .htaccess:**
   ```bash
   mv htaccess .htaccess
   ```

### Automated Deployment (Windows PowerShell)

Use the provided `deploy.ps1` script:

```powershell
.\deploy.ps1 -PublicHtmlPath "C:\path\to\public_html"
```

**Note:** The deployment script is currently configured for Next.js builds. Since this is now a PHP-only site, you may need to update the script or deploy manually.

## Final Structure on Server

```
public_html/
├── index.php
├── engineering.php
├── manufacturing.php
├── 3d-studio.php
├── unreal-studio.php
├── contact.php
├── verify.php
├── components/
│   ├── hero.php
│   ├── clients-section.php
│   ├── what-sets-us-apart.php
│   ├── portfolio-slider.php
│   ├── portfolio-grid.php
│   └── video-text-grid.php
├── includes/
│   ├── config.php
│   ├── header.php
│   └── footer.php
├── data/
│   ├── ClientsData.json
│   ├── engineering.json
│   └── manufacturing.json
├── public/
│   ├── images/
│   ├── videos/
│   ├── robots.txt
│   └── sitemap.xml
├── assets/
│   ├── css/
│   └── js/
├── vendor/              # PHPMailer (if installed via Composer)
└── .htaccess
```

## How It Works

1. **PHP Pages**: All pages are PHP files that include components and render HTML
2. **Components**: Reusable PHP components in `components/` directory
3. **Includes**: Shared header, footer, and configuration in `includes/` directory
4. **Data Files**: JSON files in `data/` directory are loaded by PHP components
5. **Static Assets**: Images and videos in `public/` directory
6. **Routing**: Direct file access (e.g., `/engineering.php` loads `engineering.php`)

## Apache Configuration

The `.htaccess` file handles:
- URL rewriting (if needed)
- Security headers
- PHP file serving

Make sure `mod_rewrite` is enabled on your Apache server.

## Testing Locally

For local testing, use PHP's built-in server:

```bash
# From project root directory
php -S localhost:8000
```

Then visit:
- http://localhost:8000/index.php (or just http://localhost:8000/)
- http://localhost:8000/engineering.php
- http://localhost:8000/manufacturing.php
- http://localhost:8000/contact.php

**Note:** For full functionality, you'll need:
- PHPMailer installed for contact form
- Database configured if using verify.php

## Troubleshooting

### Contact Form Not Working
- Ensure PHPMailer is installed: `composer require phpmailer/phpmailer`
- Check SMTP credentials in `contact.php`
- Verify PHP error logs for detailed error messages

### Images/Videos Not Loading
- Check that `public/images/` and `public/videos/` directories are uploaded
- Verify file paths in components match server structure
- Check file permissions (should be readable by web server)

### Database Connection Errors (verify.php)
- Verify database credentials in `includes/config.php`
- Ensure database exists and user has proper permissions
- Check that mysqli extension is enabled in PHP

## Security Notes

- Keep `includes/config.php` secure (contains database credentials)
- Don't expose `vendor/` directory in public URLs (should be outside web root if possible)
- Regularly update PHPMailer and other dependencies
- Use HTTPS for production deployment
- Review and update `.htaccess` security rules as needed