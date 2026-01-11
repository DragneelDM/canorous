-- Migration: Add token expiration columns to employees table
-- Date: 2026-01-11
-- Description: Adds token_created_at and token_expires_at columns for security

-- Add token_created_at column (timestamp when token was generated)
ALTER TABLE employees
ADD COLUMN token_created_at DATETIME DEFAULT NULL AFTER token;

-- Add token_expires_at column (timestamp when token expires)
ALTER TABLE employees
ADD COLUMN token_expires_at DATETIME DEFAULT NULL AFTER token_created_at;

-- Add index for faster expiration queries
CREATE INDEX idx_token_expires ON employees(token_expires_at);

-- Update existing records to set expiration 90 days from now
UPDATE employees
SET token_created_at = NOW(),
    token_expires_at = DATE_ADD(NOW(), INTERVAL 90 DAY)
WHERE token IS NOT NULL AND token_expires_at IS NULL;

-- Verification: Check the schema
-- SHOW COLUMNS FROM employees;
