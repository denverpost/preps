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

# License
   Copyright 2014-2015 The Denver Post
   
   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
