# Deployment script for Windows PowerShell
# Combines Next.js static export with PHP files

param(
    [string]$PublicHtmlPath = "",
    [switch]$DryRun = $false
)

# Colors for output
function Write-Info { Write-Host $args -ForegroundColor Cyan }
function Write-Success { Write-Host $args -ForegroundColor Green }
function Write-Warning { Write-Host $args -ForegroundColor Yellow }
function Write-Error { Write-Host $args -ForegroundColor Red }

Write-Info "=== Canorous Deployment Script ===" -ForegroundColor Cyan

# Check if public_html path is provided
if ([string]::IsNullOrWhiteSpace($PublicHtmlPath)) {
    Write-Warning "No deployment path specified."
    Write-Info "Usage: .\deploy.ps1 -PublicHtmlPath 'C:\path\to\public_html'"
    Write-Info "Or set it interactively below:"
    $PublicHtmlPath = Read-Host "Enter path to public_html directory"
}

if ([string]::IsNullOrWhiteSpace($PublicHtmlPath)) {
    Write-Error "Deployment path is required. Exiting."
    exit 1
}

# Validate path exists
if (-not (Test-Path $PublicHtmlPath)) {
    Write-Error "Path does not exist: $PublicHtmlPath"
    Write-Info "Creating directory..."
    New-Item -ItemType Directory -Path $PublicHtmlPath -Force | Out-Null
}

if ($DryRun) {
    Write-Warning "DRY RUN MODE - No files will be copied"
}

# Step 1: Build Next.js
Write-Info "`n[1/4] Building Next.js static export..."
if (-not $DryRun) {
    npm run build
    if ($LASTEXITCODE -ne 0) {
        Write-Error "Build failed! Exiting."
        exit 1
    }
} else {
    Write-Info "  (Skipped in dry-run mode)"
}

# Step 2: Copy Next.js output
Write-Info "`n[2/4] Copying Next.js static files..."
$outPath = Join-Path $PSScriptRoot "out"
if (Test-Path $outPath) {
    if (-not $DryRun) {
        Get-ChildItem -Path $outPath -Recurse | ForEach-Object {
            $relativePath = $_.FullName.Substring($outPath.Length + 1)
            $destPath = Join-Path $PublicHtmlPath $relativePath
            $destDir = Split-Path $destPath -Parent
            if (-not (Test-Path $destDir)) {
                New-Item -ItemType Directory -Path $destDir -Force | Out-Null
            }
            Copy-Item -Path $_.FullName -Destination $destPath -Force
        }
        Write-Success "  ✓ Next.js files copied"
    } else {
        Write-Info "  Would copy: $outPath\* -> $PublicHtmlPath\*"
    }
} else {
    Write-Error "  ✗ out/ directory not found. Run 'npm run build' first."
    exit 1
}

# Step 3: Copy PHP files
Write-Info "`n[3/4] Copying PHP files..."
$phpFiles = @("verify.php")
foreach ($file in $phpFiles) {
    $sourcePath = Join-Path $PSScriptRoot $file
    if (Test-Path $sourcePath) {
        if (-not $DryRun) {
            Copy-Item -Path $sourcePath -Destination $PublicHtmlPath -Force
            Write-Success "  ✓ Copied $file"
        } else {
            Write-Info "  Would copy: $sourcePath -> $PublicHtmlPath\$file"
        }
    } else {
        Write-Warning "  ⚠ $file not found (skipping)"
    }
}

# Portal directory removed - no longer needed

# Step 4: Copy .htaccess
Write-Info "`n[4/4] Copying .htaccess..."
$htaccessSource = Join-Path $PSScriptRoot "htaccess"
$htaccessDest = Join-Path $PublicHtmlPath ".htaccess"
if (Test-Path $htaccessSource) {
    if (-not $DryRun) {
        Copy-Item -Path $htaccessSource -Destination $htaccessDest -Force
        Write-Success "  ✓ Copied .htaccess"
    } else {
        Write-Info "  Would copy: $htaccessSource -> $htaccessDest"
    }
} else {
    Write-Warning "  ⚠ htaccess file not found (skipping)"
}

Write-Success "`n=== Deployment Complete! ===" -ForegroundColor Green
Write-Info "Files deployed to: $PublicHtmlPath"
Write-Info "`nNext steps:"
Write-Info "  1. Install PHPMailer: composer require phpmailer/phpmailer (required for contact form)"
Write-Info "  2. Verify database credentials in verify.php (if using employee verification)"
Write-Info "  3. Test the site: https://yourdomain.com"

