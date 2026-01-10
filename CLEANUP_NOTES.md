# Next.js to PHP Migration - Cleanup Notes

## Files Removed
This document tracks files removed during the Next.js to PHP migration cleanup.

## Next.js Configuration Files (Removed)
- `next.config.js` - Next.js configuration
- `next-env.d.ts` - Next.js TypeScript definitions
- `next-sitemap.config.js` - Next.js sitemap configuration
- `tsconfig.json` - TypeScript configuration (no longer needed for PHP)
- `postcss.config.mjs` - PostCSS configuration
- `eslint.config.mjs` - ESLint configuration (optional, can be kept for JS files)

## Node.js Files (Removed)
- `package.json` - Node.js dependencies
- `package-lock.json` - Lock file
- `node_modules/` - All npm dependencies

## Next.js Source Files (Kept for Reference)
The following files are kept for reference during migration but can be removed after all PHP pages are created:
- `src/` directory - Contains original Next.js pages and components
- `components/` directory - Original React components (for reference)

## Files to Keep
- `data/` - JSON data files (used by PHP)
- `public/` - Static assets (images, videos)
- `includes/` - PHP includes (header, footer, config)
- `assets/` - CSS and JavaScript files
- `verify.php` - Employee verification (PHP)
- `contact.php` - Contact form handler (PHP)
- `htaccess` - Apache configuration
- `docs/` - Documentation files

## Migration Status
- ✅ PHP structure created
- ✅ Shared config created
- ✅ Header and footer created
- ✅ Vanilla JavaScript created
- ✅ Custom CSS extracted
- ✅ Verify.php integrated
- ✅ All PHP pages created (index.php, engineering.php, manufacturing.php, 3d-studio.php, unreal-studio.php, contact.php)
- ✅ All PHP components created and functional
- ✅ Portal directory removed (non-functional)

## Removed During Cleanup
- `portal/` directory - Removed (non-functional employee management system)
- `src/` directory - Removed (Next.js source files no longer needed)
- All React components - Removed (replaced with PHP components)
