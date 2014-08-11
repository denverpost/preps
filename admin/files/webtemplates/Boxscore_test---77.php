<!-- TeamPlayer box score begin -->
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<QUERY name=Game ID=$form_ID>
<VAR $sportName = $Game_SportName>
<VAR $sqlSportName = strtolower(convertForSQL($sportName))>
<VAR $awayTeamID = $Game_GameAwayTeamID>
<VAR $homeTeamID = $Game_GameHomeTeamID>
<QUERY name=GameTeamStats GAMEID=$form_ID SPORTNAME=$sqlSportName TEAMID=$awayTeamID prefix=Away>
<QUERY name=GameTeamStats GAMEID=$form_ID SPORTNAME=$sqlSportName TEAMID=$homeTeamID prefix=Home>

<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=Boxscore_Football>
</IFEQUAL>
<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=Boxscore_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Girls Basketball">
<INCLUDE site=default tpl=Boxscore_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Baseball">
<INCLUDE site=default tpl=Boxscore_Baseball>
</IFEQUAL>
<!-- TeamPlayer box score end -->