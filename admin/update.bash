#! /bin/bash

# Log me in
wget \
    --user-agent="Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)" \
    --post-data "username=jmurphy&password=`cat .pass`" \
    --keep-session-cookies \
    --save-cookies=cookies.txt \
    -O login http://denver.newsengin.com/teamplayer/ui/login.php

# cat webtemplate.ids.txt | xargs -i -d'\t' echo {}

# Get the files
#cut webtemplate.ids.txt -f1 | head -n 1 | xargs -i wget --load-cookies cookies.txt \
cut -f1 webtemplate.ids.txt | xargs -i wget --load-cookies cookies.txt \
    --keep-session-cookies \
    --user-agent="Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)" \
    -SN -O{} 'http://denver.newsengin.com/teamplayer/ui/item.php?type=WebTemplate&action=edit&ID={}'


# Run the python script that parses out the editable text and
# saves the file in the right place.
#
# We do this with python because running multi-line regexes with
# bash is unnecessarily difficult.
python process.py

# update the last time we saved timestamp
date +%s > webtemplate.latest.txt
