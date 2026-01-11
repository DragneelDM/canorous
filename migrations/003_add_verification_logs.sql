-- Migration: Add verification logs table for audit trail
-- Date: 2026-01-11
-- Description: Creates verification_logs table to track all verification attempts

CREATE TABLE IF NOT EXISTS verification_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    token VARCHAR(64) DEFAULT NULL,
    employee_id VARCHAR(50) DEFAULT NULL,
    ip_address VARCHAR(45) NOT NULL,
    user_agent TEXT DEFAULT NULL,
    success BOOLEAN NOT NULL DEFAULT FALSE,
    error_message VARCHAR(255) DEFAULT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_token (token),
    INDEX idx_employee_id (employee_id),
    INDEX idx_ip_address (ip_address),
    INDEX idx_created_at (created_at),
    INDEX idx_success (success)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Verification: Check the table
-- DESCRIBE verification_logs;
