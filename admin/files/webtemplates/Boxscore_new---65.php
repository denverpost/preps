<VAR $domainURL = "http://preps.denverpost.com">
<!-- TeamPlayer box score begin -->
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<QUERY name=Game ID=$form_ID>
<VAR $sportName = $Game_SportName>
<VAR $sportType = $Game_SportType>
<VAR $sqlSportName = strtolower(convertForSQL($sportName))>
<VAR $awayTeamID = $Game_GameAwayTeamID>
<VAR $homeTeamID = $Game_GameHomeTeamID>
<IFEQUAL $Game_SportType 1>
<QUERY name=MeetTeamStats GAMEID=$form_ID SPORTNAME=$sqlSportName>
<ELSE>
<QUERY name=GameTeamStats GAMEID=$form_ID SPORTNAME=$sqlSportName TEAMID=$awayTeamID prefix=Away>
<QUERY name=GameTeamStats GAMEID=$form_ID SPORTNAME=$sqlSportName TEAMID=$homeTeamID prefix=Home>
</IFEQUAL>

<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=Boxscore_Football>
</IFEQUAL>
<IFEQUAL $sportName "Baseball">
<INCLUDE site=default tpl=Boxscore_Baseball>
</IFEQUAL>
<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=Boxscore_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Boys Cross Country">
<INCLUDE site=default tpl=Boxscore_CrossCountry>
</IFEQUAL>
<IFEQUAL $sportName "Girls Cross Country">
<INCLUDE site=default tpl=Boxscore_CrossCountry>
</IFEQUAL>
<IFEQUAL $sportName "Boys Golf">
<INCLUDE site=default tpl=Boxscore_Golf>
</IFEQUAL>
<IFEQUAL $sportName "Girls Golf">
<INCLUDE site=default tpl=Boxscore_Golf>
</IFEQUAL>
<IFEQUAL $sportName "Boys Tennis">
<INCLUDE site=default tpl=Boxscore_Tennis>
</IFEQUAL>
<IFEQUAL $sportName "Girls Tennis">
<INCLUDE site=default tpl=Boxscore_Tennis>
</IFEQUAL>
<!-- TeamPlayer box score end -->