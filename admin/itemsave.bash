#! /bin/bash

# Log me in
wget \
    --user-agent="Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)" \
    --post-data "username=jmurphy&password=`cat .pass`" \
    -O 1 http://denver.newsengin.com/teamplayer/ui/login.php


# Take the files modified since the last time we saved and upload them
./upload.bash $1 
