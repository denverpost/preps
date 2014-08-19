#! /bin/bash
# Parse and upload a file to NewsEngin
# Example command:
# $ ./upload.bash ./files/webtemplates/TeamStats_Soccer---131.php
# Example upload 'em all:
# $ for FILE in `ls files/webtemplates/*.php`; do ./upload.bash ./$FILE; done

echo $1
ENCODED=`php -q rawurlencode.php $1`

# Filenames will follow this structure:
# ./files/webtemplates/TeamPlayerStats_CrossCountry---70.php
#
# We need two parts of that string:
# The "TeamPlayerStats_CrossCountry" and the "70".
# The number goes into the $ID var,
# and the name into the $NAME.
#
#
# To get the ID out of the filename, we need to run a couple variable 
# substitution regex's:
TMP=${1/*---/}
ID=${TMP/\.php/}

# To get the web template out of the filename, we also
# need some substitution regex's:
TMP=${1/\.\/*\//}
NAME=${TMP%---*}

echo $ID $NAME


# Spoof the opening and editing of the file
wget --load-cookies cookies.txt \
    --keep-session-cookies \
    --user-agent="Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125" \
    --header="Keep-Alive: 300" \
    -SN -O- 'http://denver.newsengin.com/teamplayer/ui/ajax/lock.php?action=getLock&options=&DocID='$ID'&DocElem=WebTemplate'

echo '---------------------------------------------'
echo
echo

wget --load-cookies cookies.txt \
    --keep-session-cookies \
    --user-agent="Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125" \
    --header="Keep-Alive: 300" \
    -SN -O- 'http://denver.newsengin.com/teamplayer/ui/item.php?type=WebTemplate&action=read&ID='$ID

echo '---------------------------------------------'
echo
echo

wget --load-cookies cookies.txt \
    --keep-session-cookies \
    --user-agent="Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125" \
    --header="Keep-Alive: 300" \
    -SN -O- 'http://denver.newsengin.com/teamplayer/ui/item.php?type=WebTemplate&action=edit&ID='$ID



POSTDATA="action=save&WebTemplateID="$ID"&DocID="$ID"&DocElem=WebTemplate&WebTemplateName="$NAME"&WebTemplateActive=1&WebTemplateSite=default&WebTemplateDisplayMethod=Ajax&WebTemplateTemplate="$ENCODED"&formLoaded=yes"

echo $POSTDATA > tmp

echo '---------------------------------------------'
echo
echo

# Now we upload the file.
wget --load-cookies cookies.txt \
    --post-data $POSTDATA \
    --keep-session-cookies \
    --user-agent="Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125" \
    --header="Keep-Alive: 300" \
    -SN -O- 'http://denver.newsengin.com/teamplayer/ui/ajax/justSave.php?type=WebTemplate'
