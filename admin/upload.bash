#! /bin/bash
# Parse and upload a file to NewsEngin

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
TMP=${1/.*---/}
ID=${TMP/\.php/}

# To get the web template out of the filename, we also
# need some substitution regex's:
TMP=${1/\.\/*\//}
NAME=${TMP%---*}


# Spoof the opening and editing of the file
wget --load-cookies cookies.txt \
    --keep-session-cookies \
    --user-agent="Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)" \
    --header="Keep-Alive: 300" \
    -SN -O- 'http://denver.newsengin.com/teamplayer/ui/ajax/lock.php?action=getLock&options=&DocID='$ID'&DocElem=WebTemplate'

echo '---------------------------------------------'
echo
echo

wget --load-cookies cookies.txt \
    --keep-session-cookies \
    --user-agent="Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)" \
    --header="Keep-Alive: 300" \
    -SN -O- 'http://denver.newsengin.com/teamplayer/ui/item.php?type=WebTemplate&action=read&ID='$ID

echo '---------------------------------------------'
echo
echo

wget --load-cookies cookies.txt \
    --keep-session-cookies \
    --user-agent="Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)" \
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
    --user-agent="Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)" \
    --header="Keep-Alive: 300" \
    -SN -O- 'http://denver.newsengin.com/teamplayer/ui/ajax/justSave.php?type=WebTemplate'
