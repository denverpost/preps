# Denver Post Preps Stats
Here lies the preps template files, and the means of uploading / retrieving them from the production server web admin on NewsEngin.

The files live here because editing code in a textarea sucks.

# Yearly / Seasonal Updates

## Yearly

### Before each new school year, do this:

These files should be updated at the beginning of each school year. As early in August as possible. Look for the "###YEARCHECK###" in the files below. This is a job for a developer, or if a developer's not available, you'll have to go through each of the files below in NewsEngin and make this change yourself.
- Boxscore_Baseball
- Boxscore_Football
- Boxscore_Hockey
- Boxscore_Soccer
- Boxscore_Volleyball
- Boxscore_softball
- Leaders
- Leaders_Football
- Main
- ScheduleInclude
- Standings
- StandingsConferencesAll
- Team
- TeamPlayerStats_Football
- TeamPlayerStats_Softball

## Seasonal

### Before each season, do this:
1. Log in to NewsEngin's TeamPlayer CMS, http://denver.newsengin.com/teamplayer/
1. Make sure there aren't any games from the previous year's season still in there for that sport (see screenshot of interface below).
1. Make sure there are games for the current year's season in there. If there aren't, contact MaxPreps as well as NewsEngin.

![An example search for games](https://cloud.githubusercontent.com/assets/125554/11539189/1e7df52e-98e3-11e5-8ca8-d73079a1ee29.png)

# Dev-specific
These are commands I used regularly for certain tasks.

Search and replace across templates:
` cd admin/files/webtemplates/; perl -pi -w -e 's/{\$externalURL}site=default&tpl=Boxscore&ID=/{\$domainURL}\/boxscores\//g;' *.php `

Upload all the templates to the server:
` cd admin; ./login.bash; for FILE in ``ls files/webtemplates/*.php``; do ./upload.bash ./$FILE; done `

# License
   Copyright 2007-2016 The Denver Post
   
   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
