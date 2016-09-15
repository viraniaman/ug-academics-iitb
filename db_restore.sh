#! /bin/sh

# Settings
BACKUP_DIR="sql_backup"
DB_USER="ugacademics"
DB_PASS="ug_acads"
DB="ugacademics"
DB_DUMP="$BACKUP_DIR/$DB.sql"

# Restore from the dump
mysql -u $DB_USER -p$DB_PASS $DB < $DB_DUMP
