#!/bin/bash
# Upload the latest version of the files listed in YEARCHECK_FILES to the NewsEngin CMS.
# The files listed in YEARCHECK_FILES are the ones with the string YEARCHECK in them, which is the marker for the thing that needs to be changed with each preps season.
for FILE in `cat YEARCHECK_FILES`; do ./upload.bash $FILE; done
