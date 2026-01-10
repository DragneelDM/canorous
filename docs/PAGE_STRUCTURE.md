# Page Structure, Routing, and Metadata Documentation

## Overview
This document outlines the page structure, routing, and metadata requirements for the Canorous website migration from Next.js to PHP.

## Page Routes

### 1. Homepage (`/` → `index.php`)
- **File**: `src/app/page.tsx`
- **Components Used**:
  - `Hero` - Video background hero section
  - `WhatSetsUsApart` - Value proposition cards
  - `ClientsSection` - Client logos (filtered for landing page)
- **Metadata**:
  - Title: "Canorous | Engineering, Manufacturing, 3D Visualization, and Unreal Studio"
  - Description: "Canorous delivers end-to-end engineering, turnkey manufacturing, 3D visualization, and Unreal Studio VR/AR solutions for industries worldwide."
  - Keywords: MEP engineering, turnkey manufacturing, Unreal Engine, VR/AR, 3D visualization, product design, engineering solutions, Canorous
- **Data**: Uses `ClientsData.json` (filtered by `showOnLanding: true`)

### 2. Engineering Page (`/engineering` → `engineering.php`)
- **File**: `src/app/engineering/page.tsx`
- **Components Used**:
  - Custom hero section with background image (`/images/engineering-hero.webp`)
  - Service sections (Digital Plant, Product Support, Simulation & Analysis)
  - `ClientsSection` - Filtered for engineering clients
  - `PortfolioSliderOriginalSize` - Engineering portfolio items
- **Metadata**:
  - Title: "Canorous Engineering | CAD, MEP & Technical Documentation"
  - Description: "We provide CAD modeling, simulation, technical documentation, and end-to-end MEP engineering solutions."
- **Data**: Uses `engineering.json` for portfolio items, `ClientsData.json` (filtered by `type: "engineering"`)

### 3. Manufacturing Page (`/manufacturing` → `manufacturing.php`)
- **File**: `src/app/manufacturing/page.tsx`
- **Components Used**:
  - `Hero` - Video background (`/videos/Warehouse.mp4`)
  - `ClientsSection` - Filtered for manufacturing clients
  - `PortfolioGrid` - Manufacturing product grid
  - Global Trading section with globe video
- **Metadata**:
  - Title: "Canorous Manufacturing | Turnkey Solutions & Global Trading"
  - Description: "From design and prototyping to production and delivery — Canorous delivers full turnkey manufacturing solutions and industrial trading."
- **Data**: Uses `manufacturing.json` for portfolio items, `ClientsData.json` (filtered by `type: "manufacturing"`)

### 4. 3D Studio Page (`/3D-studio` → `3d-studio.php`)
- **File**: `src/app/3D-studio/page.tsx`
- **Components Used**:
  - `Hero` - Video background (`/videos/Outdoor-Clip.mp4`)
  - `BentoGrid` - Grid layout for 3D portfolio (currently commented out)
- **Metadata**:
  - Title: "Canorous 3D Studio | Modeling & Visualization"
  - Description: "High-quality 3D modeling, visualization, and asset creation for architecture, design, and interactive experiences."
- **Data**: Hardcoded bento items array (images from `/images/3d/`)

### 5. Unreal Studio Page (`/unreal-studio` → `unreal-studio.php`)
- **File**: `src/app/unreal-studio/page.tsx` + `UnrealPageContent.tsx`
- **Components Used**:
  - `Hero` - Video background (`/videos/Gameplay.mp4`)
  - `VideoTextGrid` - Interactive content sections with 3D pins
  - `UnrealPin`, `UnrealPin2`, `UnrealPin3` - 3D interactive elements
- **Metadata**:
  - Title: "Canorous Unreal Studio | VR/AR & Configurators"
  - Description: "Immersive VR/AR experiences, configurators, and interactive solutions powered by Unreal Engine."
- **Data**: Hardcoded `unrealItems` array with titles, descriptions, and custom content

### 6. Contact Page (`/contact` → `contact.php`)
- **File**: `src/app/contact/page.tsx`
- **Components Used**:
  - `ContactPage` - Contact form and company information
- **Metadata**: Uses default metadata from `src/data/metadata.ts`
- **Form Handler**: `contact.php` (existing PHP mailer using PHPMailer)
- **Data**: Static company information (address, email, phone, LinkedIn)

### 7. Employee Verification (`/verify.php?t={token}`)
- **File**: `verify.php` (root level)
- **Purpose**: Employee verification via token
- **Database**: Uses `rqqsllyj_EmployeesDB` database
- **Functionality**: Validates token, displays employee information
- **Note**: Currently has basic styling, needs integration with website theme

## Navigation Structure

### Navbar Links (from `components/Navbar.js`)
- **Unreal Studio** → `/unreal-studio`
- **3D Studio** → `/3D-studio`
- **Services** → `/engineering`
- **Careers** → `/contact`
- **Contact** → `/contact`

### Active Link Detection
- Current: Uses Next.js `usePathname()` hook
- PHP Migration: Use `$_SERVER['REQUEST_URI']` to detect current page

## Metadata Structure

### Default Metadata (`src/data/metadata.ts`)
```typescript
{
  title: string
  description: string
  keywords: string[]
  icons: { icon: Array<{ url, sizes, type }> }
  openGraph: {
    title, description, url, siteName, images[], locale, type
  }
}
```

### Page-Specific Metadata
- `pageMetadata.engineering`
- `pageMetadata.manufacturing`
- `pageMetadata.studio3d`
- `pageMetadata.unreal`

## Routing Conversion Notes

### Next.js → PHP Mapping
- `/` → `index.php`
- `/engineering` → `engineering.php`
- `/manufacturing` → `manufacturing.php`
- `/3D-studio` → `3d-studio.php` (note: lowercase filename)
- `/unreal-studio` → `unreal-studio.php`
- `/contact` → `contact.php`
- `/verify?t={token}` → `verify.php?t={token}` (already PHP)

### URL Structure
- All pages are top-level PHP files
- No nested routing needed
- Static assets remain in `/public/images/` and `/public/videos/`

## Layout Structure

### Root Layout (`src/app/layout.tsx`)
- Wraps all pages
- Includes:
  - HTML head with Tailwind CDN
  - `Navbar` component
  - Page content (`{children}`)
  - `Footer` component
- Fonts: Geist Sans, Geist Mono (via Next.js font optimization)
- PHP Migration: Use `includes/header.php` and `includes/footer.php`

## Component Dependencies

### Page → Component Mapping
1. **Homepage**: Hero, WhatSetsUsApart, ClientsSection
2. **Engineering**: Custom hero, service sections, ClientsSection, PortfolioSliderOriginalSize
3. **Manufacturing**: Hero, ClientsSection, PortfolioGrid, Global Trading section
4. **3D Studio**: Hero, BentoGrid (commented out)
5. **Unreal Studio**: Hero, VideoTextGrid, UnrealPin components
6. **Contact**: ContactPage component

## SEO Requirements

### Meta Tags Required
- `<title>` - Page-specific title
- `<meta name="description">` - Page-specific description
- `<meta name="keywords">` - Relevant keywords
- Open Graph tags for social sharing
- Favicon links

### Implementation
- Each PHP page should include proper `<head>` section
- Use `includes/header.php` for consistent meta tag structure
- Pass page-specific metadata as variables to header include
