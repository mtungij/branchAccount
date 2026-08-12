-- Adds columns needed for: (1) officer-chosen loan terms (duration/repayments/interest formula)
-- captured at top-up request time, and (2) the admin-approve -> officer-withdraw split.
-- Run this if tbl_loan_topup already exists (created via create_loan_topup_table.sql before this change).
ALTER TABLE `tbl_loan_topup`
  ADD COLUMN `day` INT(11) DEFAULT NULL AFTER `reason`,
  ADD COLUMN `session` INT(11) DEFAULT NULL AFTER `day`,
  ADD COLUMN `rate` VARCHAR(50) DEFAULT NULL AFTER `session`,
  ADD COLUMN `disburse_method` INT(11) DEFAULT NULL AFTER `new_loan_int`,
  ADD COLUMN `disbursed_by` VARCHAR(255) DEFAULT NULL AFTER `disburse_method`,
  ADD COLUMN `disbursed_at` TIMESTAMP NULL DEFAULT NULL AFTER `disbursed_by`;
