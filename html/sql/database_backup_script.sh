#!/bin/bash

# Backup the MySQL database: "fidcon"

PW="asu;fiddlers!asu"
mysqldump --user=fiddlersdba --password=$PW --host=localhost fidcon > /var/www/fiddlers/sql/db_full_backup_`date +"%m-%d-%Y_%H%M%S"`.sql
