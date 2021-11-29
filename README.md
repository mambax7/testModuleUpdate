
# Test new functions for update module tables

# Require:
- XOOPS 2.5.11;
- XOOPS Admin 1.2;
- PHP 7.3 or higher;
- MySQL 5.5; -> Minimum Recommended Using InnoDB Version 5.1 or Later

# Important files
 - class/Common/MigrateHelper.php
 - include/update.php

# Info

The goal is to simply the update procedure for modules.
If we as developer change something in the table structure of a module (add tables, add fields to tables and so on) we have always to change the 'sql/mysql.sql' and additionally we have to handle the changes in the 'include/update.php'

and I hate double work ;)

therefore I had the idea to combine this and to create a function doing this automatically.

this code does following:
 
 - reading the 'sql/mysql.sql'
   
 - creating a yaml file with db schema
   
 - starting syncronisation of db tables based on this yaml


now i have to keep only 'sql/mysql.sql' uptodate

