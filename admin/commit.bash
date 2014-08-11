#! /bin/bash

# Log me in
wget \
    --user-agent="Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)" \
    --post-data "username=jmurphy&password=`cat .pass`" \
    -O 1 http://denver.newsengin.com/teamplayer/ui/login.php


# Get the files
# We only want files modified since the last time we saved, which is
# a number stored in unixtime in the file webtemplate.latest.txt
last_saved=`cat webtemplate.latest.txt`
now=`date +%s`
let since_seconds=$now-$last_saved
let since=$since_seconds/60
echo $since


# Take the files modified since the last time we saved and upload them
echo 'find ./files/webtemplates/ -iname "*php" -mmin -'$since
find ./files/webtemplates/ -iname '*php' -mmin -$since

find ./files/webtemplates/ -iname '*php' -mmin -$since \
    | xargs -i ./upload.bash {}


# update the last time we saved timestamp
date +%s > webtemplate.latest.txt
