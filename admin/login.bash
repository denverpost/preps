#!/bin/bash
# In case we need to log in.

# Log me in
wget \
    --user-agent="Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125" \
    --post-data "username=jmurphy&password=`cat .pass`" \
    --keep-session-cookies \
    --save-cookies=cookies.txt \
    -O login http://denver.newsengin.com/teamplayer/ui/login.php
