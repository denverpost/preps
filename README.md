# Denver Post Preps Stats
Here lies the preps template files, and the means of uploading / retrieving them from the production server web admin on NewsEngin.

The files live here because editing code in a textarea sucks.

## Yearly / Seasonal Updates

### Yearly

#### Before each new school year, do this:

These files should be updated at the beginning of each school year. As early in August as possible. Look for the "###YEARCHECK###" in the files below. This is a job for a developer, or if a developer's not available, you'll have to go through each of the files below in the NewsEngin web-based CMS and make this change yourself.
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

### Seasonal

#### Before each season, do this:
1. Log in to NewsEngin's TeamPlayer CMS, http://denver.newsengin.com/teamplayer/
1. Make sure there aren't any games from the previous year's season still in there for that sport (see screenshot of interface below).
1. Make sure there are games for the current year's season in there. If there aren't, contact MaxPreps as well as NewsEngin.

![An example search for games](https://cloud.githubusercontent.com/assets/125554/11539189/1e7df52e-98e3-11e5-8ca8-d73079a1ee29.png)

## Dev-specific
These are commands I used regularly for certain tasks.

Search and replace across templates:
` cd admin/files/webtemplates/; perl -pi -w -e 's/{\$externalURL}site=default&tpl=Boxscore&ID=/{\$domainURL}\/boxscores\//g;' *.php `

## The Yearly Update
This happens sometime in August. You'll need to edit all the files that have the string "YEARCHECK" in them with the current year. You can take a look at [how that looked in the 2018-2019 school year with this commit](https://github.com/denverpost/preps/commit/c891331ec1d66c88647566c74ed493faf7af41c9).

1. Clone this repo to your computer, if you haven't already.
1. In your terminal, cd into the repo root, then cd into the admin directory.
1. To make sure we're not overwriting other changes people made in the NewsEngin CMS in the prior year, run this command in your shell: `./login.bash; ./update.bash` -- this downloads the current version of the files from the NewsEngin CMS.
1. Open all the files that have the string YEARCHECK in them. There's a list of those files, current as of August 2018, in the file [admin/YEARCHECK_FILES](admin/YEARCHECK_FILES)
1. You'll do two search and replaces across all the files. The order you do these absolutely matters.
    1. Search and replace all instances of the current year with the next year (i.e. replace 2018 with 2019)
    1. Search and replace all instances of the previous year with the current year (i.e. replace 2017 with 2018)
1. Send these updated files to the NewsEngin CMS with `./update_yearcheck.bash`.

If you make changes to one particular file and want to send that to the NewsEngin CMS, you can do that with `./upload.bash ./path/to/file.php`. Example (from the admin directory): `./upload.bash ./files/webtemplates/Boxscore_Baseball---54.php`


Upload all the templates to the server:
` cd admin; ./login.bash; for FILE in ``ls files/webtemplates/*.php``; do ./upload.bash ./$FILE; done `

## License
   Copyright 2007-3030 The Denver Post
   
   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
