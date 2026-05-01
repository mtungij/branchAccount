-- Fix duplicate customer detail rows and enforce one detail row per customer.
-- Safe target: tbl_sub_customer only (does not alter tbl_customer primary records).

START TRANSACTION;

-- 1) Remove duplicate rows in tbl_sub_customer, keep only newest row per customer_id.
DELETE sc1
FROM tbl_sub_customer sc1
JOIN tbl_sub_customer sc2
  ON sc1.customer_id = sc2.customer_id
 AND sc1.id < sc2.id;

-- 2) Enforce one-row-per-customer in tbl_sub_customer.
ALTER TABLE tbl_sub_customer
  ADD UNIQUE KEY uq_tbl_sub_customer_customer_id (customer_id);

COMMIT;

-- Optional checks
-- SELECT customer_id, COUNT(*) AS cnt
-- FROM tbl_sub_customer
-- GROUP BY customer_id
-- HAVING COUNT(*) > 1;
