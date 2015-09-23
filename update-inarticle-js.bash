#!/bin/bash
# Update the preps js that allows for auto-linking of proper nouns.
wget "http://preps.denverpost.com/js.php?include=school" -O schools.js
python deletecomma.py `tr -d '\n\r' < schools.js` > school.js

wget "http://preps.denverpost.com/js.php?include=player" -O players.js 
python deletecomma.py `tr -d '\n\r' < players.js` > player.js 

cat school.js player.js > prep_lookup.js
