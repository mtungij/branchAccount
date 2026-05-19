-- Add structured columns for collateral details
-- Run once on mikopo_db

ALTER TABLE tbl_collelateral
  ADD COLUMN collateral_type VARCHAR(100) NULL AFTER loan_id,
  ADD COLUMN collateral_name VARCHAR(255) NULL AFTER collateral_type,
  ADD COLUMN collateral_description TEXT NULL AFTER collateral_name,
  ADD COLUMN submitted_at_office ENUM('Yes','No') NULL AFTER collateral_description,
  ADD COLUMN received_by VARCHAR(255) NULL AFTER submitted_at_office;
