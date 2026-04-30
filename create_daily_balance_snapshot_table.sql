-- Create daily balance snapshot table to store historical account balances
CREATE TABLE IF NOT EXISTS tbl_daily_balance_snapshot (
  snapshot_id INT PRIMARY KEY AUTO_INCREMENT,
  blanch_id INT NOT NULL,
  trans_id INT NOT NULL,
  account_name VARCHAR(100),
  balance_amount DECIMAL(15,2) DEFAULT 0,
  snapshot_date DATE NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY unique_balance (blanch_id, trans_id, snapshot_date),
  INDEX idx_date (snapshot_date),
  INDEX idx_blanch_date (blanch_id, snapshot_date)
);

CREATE TABLE IF NOT EXISTS tbl_account_balance_ledger (
  ledger_id INT PRIMARY KEY AUTO_INCREMENT,
  comp_id INT DEFAULT NULL,
  blanch_id INT NOT NULL,
  trans_id INT NOT NULL,
  account_name VARCHAR(100) DEFAULT NULL,
  reference_type VARCHAR(50) NOT NULL,
  reference_id INT DEFAULT NULL,
  movement_date DATE NOT NULL,
  amount_in DECIMAL(15,2) DEFAULT 0,
  amount_out DECIMAL(15,2) DEFAULT 0,
  balance_before DECIMAL(15,2) DEFAULT 0,
  balance_after DECIMAL(15,2) DEFAULT 0,
  description VARCHAR(255) DEFAULT NULL,
  created_by INT DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_ledger_date (movement_date),
  INDEX idx_ledger_account (blanch_id, trans_id, movement_date),
  INDEX idx_ledger_reference (reference_type, reference_id)
);
