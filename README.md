# Denver Post Preps Stats
Here lies the preps template files, and the means of uploading / retrieving them from the production server web admin on NewsEngin.

The files live here because editing code in a textarea sucks.

# Yearly / Seasonal Updates
# Yearly
These files should be updated at the beginning of each school year. As early in August as possible. Look for the "###YEARCHECK###" in the files below.
- ScheduleInclude
- Main
- Team

# Dev-specific
These are commands I used regularly for certain tasks.

Search and replace across templates:
` cd admin/files/webtemplates/; perl -pi -w -e 's/{\$externalURL}site=default&tpl=Boxscore&ID=/{\$domainURL}\/boxscores\//g;' *.php `

Upload all the templates to the server:
` cd admin; ./login.bash; for FILE in ``ls files/webtemplates/*.php``; do ./upload.bash ./$FILE; done `
