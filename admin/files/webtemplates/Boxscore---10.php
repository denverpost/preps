<VAR $domainURL = "http://preps.denverpost.com">
<!-- TeamPlayer box score begin -->
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<VAR $rightSingleQuote = chr(38)."rsaquo;">
<INCLUDE site=default tpl=SportSeasons>
<QUERY name=Game ID=$form_ID>
<VAR $sportName = $Game_SportName>
<?PHP $sportslug = sport_id($Game_SportID); ?>
<VAR $sportType = $Game_SportType>
    
<VAR $sqlSportName = strtolower(convertForSQL($sportName))>
<VAR $awayTeamID = $Game_GameAwayTeamID>
<VAR $homeTeamID = $Game_GameHomeTeamID>


<IFEQUAL $sportType 1>
<IFEQUAL $sqlSportName "boysgolf">
<VAR $SORTCLAUSE = "TotalStrokes">
<ELSE>
<IFEQUAL $sqlSportName "girlsgolf">
<VAR $SORTCLAUSE = "TotalStrokes">
<ELSE>
<IFEQUAL $sqlSportName "boystennis">
<VAR $SORTCLAUSE = "Points DESC">
<ELSE>
<IFEQUAL $sqlSportName "girlstennis">
<VAR $SORTCLAUSE = "Points DESC">
<ELSE>
<IFEQUAL $sqlSportName "boyscrosscountry">
<VAR $SORTCLAUSE = "Score">
<ELSE>
<IFEQUAL $sqlSportName "girlscrosscountry">
<VAR $SORTCLAUSE = "Score">
<ELSE>
<IFEQUAL $sqlSportName "wrestling">
<VAR $SORTCLAUSE = "TotalPoints DESC">
<ELSE>
<IFTRUE $sqlSportName == "boysswimminganddiving" || $sqlSportName == "girlsswimminganddiving">
<VAR $SORTCLAUSE = "TotalPoints DESC">
<VAR $FILTERCLAUSE = "AND GameTeamEventType = 0">
<ELSE>
<IFTRUE $sqlSportName == "boystrackandfield" || $sqlSportName == "girlstrackandfield">
<VAR $SORTCLAUSE = "Points DESC">
<VAR $FILTERCLAUSE = "AND GameTeamEventType = 0">
</IFTRUE>
</IFTRUE>
</IFEQUAL>
</IFEQUAL>
</IFEQUAL>
</IFEQUAL>
</IFEQUAL>
</IFEQUAL>
</IFEQUAL>

<QUERY name=MeetTeamStats GAMEID=$form_ID SPORTNAME=$sqlSportName>
<ELSE>
<QUERY name=GameTeamStats GAMEID=$form_ID SPORTNAME=$sqlSportName TEAMID=$awayTeamID prefix=Away>
<QUERY name=GameTeamStats GAMEID=$form_ID SPORTNAME=$sqlSportName TEAMID=$homeTeamID prefix=Home>
</IFEQUAL>

<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    {$rightSingleQuote} <a href="{$domainURL}/sport/" title="Prep Sports in Colorado">Sports</a>
    {$rightSingleQuote} <a href="{$domainURL}/sport/{$sportslug}/" title="High School {$sportName} in Colorado">{$sportName}</a>
</div>
<VAR $updateTimeDisplay = date("g:ia l, F j, Y", strtotime($Game_GameStatsDateTimeModified))>

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
<IFEQUAL $sportName "Boys Golf">
<INCLUDE site=default tpl=Boxscore_Golf>
</IFEQUAL>
<IFEQUAL $sportName "Girls Golf">
<INCLUDE site=default tpl=Boxscore_Golf>
</IFEQUAL>
<IFEQUAL $sportName "Softball">
<INCLUDE site=default tpl=Boxscore_softball>
</IFEQUAL>
<IFEQUAL $sportName "Boys Cross Country">
<INCLUDE site=default tpl=Boxscore_CrossCountry>
</IFEQUAL>
<IFEQUAL $sportName "Girls Cross Country">
<INCLUDE site=default tpl=Boxscore_CrossCountry>
</IFEQUAL>
<IFEQUAL $sportName "Boys Tennis">
<INCLUDE site=default tpl=Boxscore_Tennis>
</IFEQUAL>
<IFEQUAL $sportName "Girls Tennis">
<INCLUDE site=default tpl=Boxscore_Tennis>
</IFEQUAL>
<IFEQUAL $sportName "Girls Volleyball">
<INCLUDE site=default tpl=Boxscore_Volleyball>
</IFEQUAL>
<IFEQUAL $sportName "Wrestling">
<INCLUDE site=default tpl=Boxscore_Wrestling>
</IFEQUAL>
<IFEQUAL $sportName "Girls Gymnastics">
<INCLUDE site=default tpl=Boxscore_Gymnastics>
</IFEQUAL>
<IFTRUE $sqlSportName == "boysswimminganddiving" || $sqlSportName == "girlsswimminganddiving">
<INCLUDE site=default tpl=Boxscore_Swimming>
</IFTRUE>
<IFTRUE $sqlSportName == "boystrackandfield" || $sqlSportName == "girlstrackandfield">
<INCLUDE site=default tpl=Boxscore_TrackAndField>
</IFTRUE>
<IFTRUE $sqlSportName == "boyshockey" || $sqlSportName == "girlshockey" || $sqlSportName == "icehockey">
<INCLUDE site=default tpl=Boxscore_Hockey>
</IFTRUE>
<IFTRUE $sqlSportName == "boyssoccer" || $sqlSportName == "girlssoccer">
<INCLUDE site=default tpl=Boxscore_Soccer>
</IFTRUE>
<IFTRUE $sqlSportName == "fieldhockey">
<INCLUDE site=default tpl=Boxscore_FieldHockey>
</IFTRUE>
<IFTRUE $sqlSportName == "boyslacrosse">
<INCLUDE site=default tpl=Boxscore_BoysLacrosse>
</IFTRUE>
<IFTRUE $sqlSportName == "girlslacrosse">
<INCLUDE site=default tpl=Boxscore_GirlsLacrosse>
</IFTRUE>

<!-- TeamPlayer box score end -->
