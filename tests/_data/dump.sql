PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: sub_shop_log
DROP TABLE IF EXISTS sub_shop_log;
CREATE TABLE sub_shop_log (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  entityName VARCHAR (255) NOT NULL,
  entityId INTEGER NOT NULL,
  actionId INTEGER NOT NULL,
  producedAt INTEGER NOT NULL
);

-- Table: sub_shop_log_actions
DROP TABLE IF EXISTS sub_shop_log_actions;
CREATE TABLE sub_shop_log_actions (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  title VARCHAR (255) NOT NULL
);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
