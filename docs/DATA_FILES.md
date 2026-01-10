# JSON Data Files Documentation

## Overview
This document describes all JSON data files used in the Canorous website and their usage across components.

## Data Files Location
All data files are located in the `data/` directory at the root level.

## 1. ClientsData.json

### Location
`data/ClientsData.json`

### Structure
```json
{
  "clients": [
    {
      "name": "string",
      "logo": "string (image path)",
      "type": "engineering" | "manufacturing" | "unrealstudio",
      "showOnLanding": boolean
    }
  ]
}
```

### Usage
- **Component**: `ClientsSection.js`
- **Filtering Logic**:
  - `page="landing"`: Shows clients where `showOnLanding: true`
  - `page="engineering"`: Shows clients where `type: "engineering"`
  - `page="manufacturing"`: Shows clients where `type: "manufacturing"`
  - `page="unreal"`: Shows clients where `type: "unreal"`
  - `page="studio3d"`: Shows clients where `type: "studio3d"`

### Pages Using This Data
- **Homepage** (`page.tsx`): `page="landing"`
- **Engineering** (`engineering/page.tsx`): `page="engineering"`
- **Manufacturing** (`manufacturing/page.tsx`): `page="manufacturing"`

### PHP Migration Notes
- Load using: `json_decode(file_get_contents('data/ClientsData.json'), true)`
- Filter array in PHP based on page context
- Pass filtered array to `components/clients-section.php`

## 2. projectsData.json

### Location
`data/projectsData.json`

### Structure
```json
[
  {
    "image": "string (image path)",
    "alt": "string (optional)"
  }
]
```

### Usage
- **Component**: `PortfolioSlider.js` (currently commented out on homepage)
- **Purpose**: General portfolio images for homepage slider
- **Status**: Currently not actively used (commented out in `page.tsx`)

### PHP Migration Notes
- Can be used for future homepage portfolio slider
- Load using: `json_decode(file_get_contents('data/projectsData.json'), true)`
- Pass to portfolio slider component if needed

## 3. engineering.json

### Location
`data/engineering.json`

### Structure
```json
[
  {
    "title": "string",
    "image": "string (image path)",
    "category": "string",
    "description": "string"
  }
]
```

### Usage
- **Component**: `PortfolioSliderOriginalSize.js`
- **Page**: Engineering page (`engineering/page.tsx`)
- **Display**: Portfolio slider showing engineering projects

### Example Data
- FEA Simulation - Valve Assembly
- Mechanical Component Assembly
- Electrical Distribution Panel (multiple variations)

### PHP Migration Notes
- Load using: `json_decode(file_get_contents('data/engineering.json'), true)`
- Pass to `components/portfolio-slider.php` or similar component
- Used in `engineering.php` page

## 4. manufacturing.json

### Location
`data/manufacturing.json`

### Structure
```json
[
  {
    "title": "string",
    "description": "string",
    "image": "string (image path)"
  }
]
```

### Usage
- **Component**: `PortfolioGrid.js`
- **Page**: Manufacturing page (`manufacturing/page.tsx`)
- **Display**: Grid layout of manufactured products

### Example Data
- Precision Valves
- Actuators
- Custom Gears
- Pumps
- Bearings
- Hydraulic Cylinders
- Flanges
- Shafts
- Industrial Fasteners
- Seals
- Couplings
- Assemblies

### PHP Migration Notes
- Load using: `json_decode(file_get_contents('data/manufacturing.json'), true)`
- Pass to `components/portfolio-grid.php` or similar component
- Used in `manufacturing.php` page

## Data Loading Patterns

### Current (Next.js)
```javascript
import projects from "@data/projectsData.json";
import engineeringData from "@data/engineering.json";
import manufacturingData from "@data/manufacturing.json";
import clientsData from "@data/clientsData.json";
```

### PHP Migration
```php
<?php
$projects = json_decode(file_get_contents('data/projectsData.json'), true);
$engineeringData = json_decode(file_get_contents('data/engineering.json'), true);
$manufacturingData = json_decode(file_get_contents('data/manufacturing.json'), true);
$clientsData = json_decode(file_get_contents('data/ClientsData.json'), true);
?>
```

## Component Data Flow

### ClientsSection Component
1. Receives `page` prop
2. Loads `ClientsData.json`
3. Filters based on `page` value:
   - `landing` → `showOnLanding: true`
   - `engineering` → `type: "engineering"`
   - `manufacturing` → `type: "manufacturing"`
   - `unreal` → `type: "unreal"`
   - `studio3d` → `type: "studio3d"`
4. Renders filtered client logos

### Portfolio Components
1. Receive `data` prop (pre-loaded JSON array)
2. Map through array to render items
3. Display images with titles/descriptions

## PHP Implementation Strategy

### Option 1: Load in Page, Pass to Component
```php
<?php
// In page file (e.g., engineering.php)
$engineeringData = json_decode(file_get_contents('data/engineering.json'), true);
include 'components/portfolio-slider.php';
?>
```

### Option 2: Load in Component
```php
<?php
// In component file (e.g., components/portfolio-slider.php)
$data = json_decode(file_get_contents('data/engineering.json'), true);
// Render component
?>
```

### Recommended Approach
- **Load in page file** for better control and flexibility
- **Pass as variable** to component includes
- Allows same component to be reused with different data sources

## Data File Maintenance

### Adding New Clients
1. Edit `data/ClientsData.json`
2. Add new client object with required fields
3. Set appropriate `type` and `showOnLanding` flags

### Adding Portfolio Items
1. Edit appropriate JSON file (`engineering.json` or `manufacturing.json`)
2. Add new object with required fields
3. Ensure image paths are correct

### Image Paths
- All image paths are relative to `/public/images/` or root
- Example: `/images/img1.png` resolves to `public/images/img1.png`
- In PHP, paths remain the same (relative to document root)

## Error Handling

### PHP Implementation
```php
<?php
$dataFile = 'data/engineering.json';
if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true);
    if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {
        // Use $data
    } else {
        // Handle JSON decode error
        $data = [];
    }
} else {
    // Handle missing file
    $data = [];
}
?>
```
