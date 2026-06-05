-- Offline sync setup for deposit/withdraw transactions.
-- Run this on each local branch database and on the central database.

ALTER TABLE tbl_prev_lecod
  ADD COLUMN IF NOT EXISTS sync_uuid VARCHAR(36) NULL AFTER prev_id,
  ADD COLUMN IF NOT EXISTS sync_status VARCHAR(20) NOT NULL DEFAULT 'synced',
  ADD COLUMN IF NOT EXISTS sync_action VARCHAR(20) NULL,
  ADD COLUMN IF NOT EXISTS sync_version INT NOT NULL DEFAULT 1,
  ADD COLUMN IF NOT EXISTS sync_updated_at DATETIME NULL,
  ADD COLUMN IF NOT EXISTS synced_at DATETIME NULL;

SET @idx_exists := (
  SELECT COUNT(1)
  FROM information_schema.statistics
  WHERE table_schema = DATABASE()
    AND table_name = 'tbl_prev_lecod'
    AND index_name = 'idx_tbl_prev_lecod_sync_uuid'
);
SET @idx_sql := IF(@idx_exists = 0,
  'ALTER TABLE tbl_prev_lecod ADD UNIQUE KEY idx_tbl_prev_lecod_sync_uuid (sync_uuid)',
  'SELECT 1'
);
PREPARE idx_stmt FROM @idx_sql;
EXECUTE idx_stmt;
DEALLOCATE PREPARE idx_stmt;

CREATE TABLE IF NOT EXISTS tbl_sync_queue (
  sync_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  table_name VARCHAR(100) NOT NULL,
  record_id BIGINT UNSIGNED NOT NULL,
  record_uuid VARCHAR(36) NOT NULL,
  action VARCHAR(20) NOT NULL,
  payload LONGTEXT NOT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'pending',
  attempts INT NOT NULL DEFAULT 0,
  last_error TEXT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  synced_at DATETIME NULL,
  PRIMARY KEY (sync_id),
  KEY idx_sync_queue_status (status),
  KEY idx_sync_queue_record (table_name, record_uuid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
