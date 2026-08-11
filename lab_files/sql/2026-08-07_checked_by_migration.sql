-- Lab report footer: add real Checked By column + fix Consultant sourcing.
-- Run ONCE, after lab_approval_flow.sql has already been applied.
--
-- Background: alltest.cby / iinves.conby / einves.conby are the Consultant
-- (doctor sign-off) field. iinves.cby is UNRELATED ("Cancelled By" from the
-- order-cancel flow) and must never be treated as Checked By. No column
-- anywhere previously tracked which lab staff member checked a report, so
-- this adds one. It will be empty on every row until a "lab staff confirms"
-- write path is built (not part of this migration).

-- 1) Add the new column (safe to run once; will error if it already exists
--    on a re-run — check with SHOW COLUMNS first if unsure).
ALTER TABLE alltest ADD COLUMN checked_by VARCHAR(100) NOT NULL DEFAULT '' AFTER cby;
ALTER TABLE iinves  ADD COLUMN checked_by VARCHAR(100) NOT NULL DEFAULT '' AFTER cby;
ALTER TABLE einves  ADD COLUMN checked_by VARCHAR(30)  NOT NULL DEFAULT '' AFTER conby;

-- 2) Deactivate lab_approval_flow 'checked' roster rows that were seeded
--    (in an earlier rollout) from cby/conby data — that data is Consultant
--    data (real doctors), not lab staff, so those rows were wrong. Scoped by
--    condition (not row id) so it applies correctly regardless of this
--    server's actual row ids. Only touches role='checked'; 'consultant' rows
--    and the pre-existing EYE category (real uname 912, a genuine lab-staff
--    account) are untouched. Safe/idempotent to re-run.
UPDATE lab_approval_flow
SET status = 'inactive'
WHERE role = 'checked'
  AND status = 'active'
  AND subtype <> 'EYE'
  AND uname IN ('910', '153', '1580', '1584', '865', '1602');
