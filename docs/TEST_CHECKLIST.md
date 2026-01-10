# Functionality Test Checklist

## Overview
This document provides a comprehensive checklist for testing all functionality after the PHP migration.

## Pre-Testing Setup

### Server Requirements
- [ ] PHP 7.4+ installed and enabled
- [ ] Apache with mod_rewrite enabled (if using .htaccess)
- [ ] Database connection credentials configured in `includes/config.php`
- [ ] PHPMailer installed (for contact form)

### File Permissions
- [ ] All PHP files are readable (644 or 755)
- [ ] `data/` directory is readable
- [ ] `public/images/` and `public/videos/` are accessible

## Page Loading Tests

### 1. Homepage (`index.php` or `/`)
- [ ] Page loads without errors
- [ ] Navigation bar displays correctly
- [ ] Hero section with video background displays
- [ ] "What Sets Us Apart" section displays
- [ ] Clients section displays with logos
- [ ] Footer displays correctly
- [ ] All images load correctly
- [ ] Video background plays (if applicable)

### 2. Engineering Page (`engineering.php` or `/engineering.php`)
- [ ] Page loads without errors
- [ ] Hero section with background image displays
- [ ] Service sections display (Digital Plant, Product Support, Simulation & Analysis)
- [ ] Clients section filtered for engineering clients
- [ ] Portfolio slider displays engineering projects
- [ ] All images load correctly
- [ ] Navigation highlights "Services" link

### 3. Manufacturing Page (`manufacturing.php` or `/manufacturing.php`)
- [ ] Page loads without errors
- [ ] Hero section with video background displays
- [ ] Clients section filtered for manufacturing clients
- [ ] Portfolio grid displays manufactured products
- [ ] Global Trading section displays with globe video
- [ ] All images load correctly

### 4. 3D Studio Page (`3d-studio.php` or `/3d-studio.php`)
- [ ] Page loads without errors
- [ ] Hero section displays
- [ ] All images load correctly

### 5. Unreal Studio Page (`unreal-studio.php` or `/unreal-studio.php`)
- [ ] Page loads without errors
- [ ] Hero section with video background displays
- [ ] VideoTextGrid sections display
- [ ] All interactive elements work (if applicable)

### 6. Contact Page (`contact.php` or `/contact.php`)
- [ ] Page loads without errors
- [ ] Contact form displays
- [ ] Company information displays correctly
- [ ] Google Maps embed displays
- [ ] LinkedIn link works
- [ ] Navigation highlights "Contact" link

### 7. Employee Verification (`verify.php?t={token}`)
- [ ] Page loads without errors
- [ ] Styling matches website theme (Tailwind CSS)
- [ ] Error message displays for missing token
- [ ] Error message displays for invalid token format
- [ ] Employee information displays correctly with valid token
- [ ] Employee photo displays (if available)
- [ ] Status badge displays correctly (active/inactive)
- [ ] "Return to Homepage" link works

## Navigation Tests

### Desktop Navigation
- [ ] Logo links to homepage
- [ ] "Unreal Studio" link works
- [ ] "3D Studio" link works
- [ ] "Services" link works (goes to engineering page)
- [ ] "Careers" link works (goes to contact page)
- [ ] "Contact" link works
- [ ] Active page link is highlighted (blue color)

### Mobile Navigation
- [ ] Mobile menu button displays on small screens
- [ ] Menu button toggles menu (☰ / ✕)
- [ ] Mobile menu displays all links
- [ ] Links work in mobile menu
- [ ] Menu closes when link is clicked
- [ ] Active page link is highlighted in mobile menu

## Form Functionality Tests

### Contact Form
- [ ] Form fields are required (name, email, subject, message)
- [ ] Email validation works
- [ ] Form submission shows loading state
- [ ] Success message displays on successful submission
- [ ] Error message displays on failure
- [ ] Form resets after successful submission
- [ ] Submit button is disabled during submission
- [ ] Email is sent to sales@can-india.co.in

## JavaScript Functionality Tests

### Mobile Menu (`assets/js/mobile-menu.js`)
- [ ] Menu toggle button works
- [ ] Menu opens and closes correctly
- [ ] Icon changes (☰ ↔ ✕)
- [ ] Menu closes when clicking outside (if implemented)

### Contact Form (`assets/js/contact-form.js`)
- [ ] Form submission prevents default behavior
- [ ] Fetch API call works
- [ ] Loading state displays
- [ ] Success/error messages display
- [ ] Form resets on success

### Portfolio Slider (`assets/js/portfolio-slider.js`)
- [ ] Slider initializes correctly
- [ ] Navigation buttons work (prev/next)
- [ ] Pagination dots display
- [ ] Clicking pagination dots changes slide
- [ ] Autoplay works (if enabled)
- [ ] Autoplay pauses on hover (if enabled)
- [ ] Touch/swipe gestures work on mobile
- [ ] Responsive breakpoints work

## Data Loading Tests

### JSON Data Files
- [ ] `data/ClientsData.json` loads correctly
- [ ] `data/engineering.json` loads correctly
- [ ] `data/manufacturing.json` loads correctly
- [ ] `data/projectsData.json` loads correctly (if used)
- [ ] Error handling works for missing JSON files
- [ ] Error handling works for invalid JSON

### Client Filtering
- [ ] Landing page shows clients with `showOnLanding: true`
- [ ] Engineering page shows clients with `type: "engineering"`
- [ ] Manufacturing page shows clients with `type: "manufacturing"`

## Styling Tests

### Tailwind CSS
- [ ] Tailwind CSS loads from CDN
- [ ] All Tailwind classes apply correctly
- [ ] Responsive breakpoints work (sm, md, lg)
- [ ] Hover states work
- [ ] Transitions work

### Custom CSS (`assets/css/custom.css`)
- [ ] Custom CSS loads
- [ ] Marquee animation works (if used)
- [ ] FadeIn animation works (if used)
- [ ] Dark mode preferences respected (if applicable)

## Responsive Design Tests

### Mobile (< 768px)
- [ ] All pages display correctly
- [ ] Navigation collapses to mobile menu
- [ ] Images scale appropriately
- [ ] Text is readable
- [ ] Forms are usable
- [ ] Buttons are tappable

### Tablet (768px - 1024px)
- [ ] Layout adapts correctly
- [ ] Navigation displays appropriately
- [ ] Grid layouts adjust

### Desktop (> 1024px)
- [ ] Full desktop layout displays
- [ ] All features accessible
- [ ] Hover states work

## Performance Tests

### Page Load Speed
- [ ] Homepage loads in < 3 seconds
- [ ] Other pages load in < 2 seconds
- [ ] Images are optimized
- [ ] JavaScript files are minified (if applicable)

### Asset Loading
- [ ] Images load progressively
- [ ] Videos don't block page load
- [ ] CSS doesn't block rendering
- [ ] JavaScript doesn't block rendering

## Security Tests

### Input Validation
- [ ] Contact form validates email format
- [ ] Contact form sanitizes input
- [ ] Employee verification validates token format
- [ ] SQL injection protection (prepared statements)

### XSS Protection
- [ ] All user input is escaped (using `h()` function)
- [ ] No inline JavaScript with user data

## Browser Compatibility Tests

### Desktop Browsers
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Edge (latest)

### Mobile Browsers
- [ ] Chrome Mobile
- [ ] Safari Mobile
- [ ] Firefox Mobile

## Error Handling Tests

### Missing Files
- [ ] Graceful handling of missing JSON files
- [ ] Graceful handling of missing images
- [ ] Error messages are user-friendly

### Database Errors
- [ ] Database connection errors handled gracefully
- [ ] Query errors don't expose sensitive information
- [ ] Error messages are logged (if logging implemented)

## Integration Tests

### Verify.php Integration
- [ ] Uses shared config from `includes/config.php`
- [ ] Styling matches website theme
- [ ] Database connection works
- [ ] Token validation works
- [ ] Employee data displays correctly

## Accessibility Tests

### Basic Accessibility
- [ ] Alt text on images
- [ ] Semantic HTML structure
- [ ] Keyboard navigation works
- [ ] Focus states visible
- [ ] ARIA labels where needed

## Notes

### Known Issues
- Document any issues found during testing
- Note browser-specific problems
- Note performance concerns

### Test Environment
- Document PHP version
- Document server configuration
- Document database version

## Post-Testing

### Fixes Applied
- [ ] List all fixes applied after testing
- [ ] Document any workarounds

### Final Verification
- [ ] All critical functionality works
- [ ] All pages load correctly
- [ ] All forms submit correctly
- [ ] Navigation works on all devices
- [ ] Styling is consistent
