#! /bin/sh

# Settings
BACKUP_DIR="sql_backup"
DB_USER="ugacademics"
DB_PASS="ug_acads"
DB="ugacademics"
DB_DUMP="$BACKUP_DIR/$DB.sql"

# Create a backup directory if it doesn't exist
mkdir -p $BACKUP_DIR

# Dump the database

mysqldump -u $DB_USER -p$DB_PASS --ignore-table=$DB.wiki_l10n_cache --ignore-table=$DB.wiki_objectcache --skip-extended-insert $DB > $DB_DUMP

# Add the database to the repo and commit

git add $DB_DUMP
git commit -a -m "Update database dump"
git push origin master
