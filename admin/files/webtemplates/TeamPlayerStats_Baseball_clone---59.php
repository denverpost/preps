<VAR $domainURL = "http://preps.denverpost.com">
<table cellpadding="0" cellspacing="0" class="leadersTable" width="100%">
<tr><td>
<font class="pageTitle">Player Stats</font><span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span>
</td></tr>

<tr><td COLSPAN=50>
<div id="statKey" style="display:none">
<table class="keyTable" cellpadding="0" cellspacing="0">
<tr class="statKeyRow">
<td id="keyBattingAverage">AVG: Batting average</td>
<td id="keySluggingPercentage">SLPCT: Slugging percentage</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyFieldingPercentage">FLPCT: Fielding percentage</td>
<td id="keyHits">H: Hits</td>
</tr>
<tr class="statKeyRow">
<td id="keyDoubles">2B: Doubles</td>
<td id="keyTriples">3B: Triples</td>
</tr>
<tr class="statKeyRow">
<td id="keyHomeRuns">HR: Home runs</td>
<td id="keyRunsBattedIn">RBI: Runs batted in</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyEarnedRunAverage">ERA: Earned run average</td>
<td id="keyStolenBases">SB: Stolen bases</td>
</tr>
<tr class="statKeyRow">
<td id="keyShutout">SHO: Shutouts</td>
<td id="keyWin">W: Wins</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keySave">SV: Saves</td>
<td id="keySavePercentage">SVPCT: Save percentage</td>
</tr>
<tr class="statKeyRow">
<td id="keyCompleteGames">CG: Complete games</td>
<td id="keyErrors">E: Errors</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyStrikeoutsPitched">K: Strikeouts</td>
<td id="keyWalksAllowed">BB: Walks</td>
</tr>

</table>
</div>
</td></tr>

</table>
<VAR $whereClause = " AND AtBats ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "BattingAverage DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats_Baseball SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<table cellpadding="0" cellspacing="0" class="teamStatTable">
<tr class="teamStatsHeader"><td colspan="50"><b>Offense</b></td></tr>
<tr class="teamStatsHeader">
<td>Name</td>
<td align="right">AVG</td>
<td align="right">SLPCT</td>
<td align="right">FLPCT</td>
<td align="right">H</td>
<td align="right">2B</td>
<td align="right">3B</td>
<td align="right">HR</td>
<td align="right">RBI</td>
<td align="right">SB</td>
<td align="right">E</td>
</tr>
<IFGREATER count($TeamPlayerStats_Baseball_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=TeamPlayerStats_Baseball_rows prefix=Offense>
<tr class="{$rowClass}">
<td>
<VAR $playerName = fixApostrophes($Offense_PlayerFirstName." ".$Offense_PlayerLastName)>
<a href="{$externalURL}site=default&tpl=Player&ID={$Offense_PlayerID}" class="leadersNameLink">
{$playerName}</a></td>
<VAR $batAvg = trailingZeroes(round($Offense_BattingAverage,3),3,true)>
<VAR $slPct = trailingZeroes(round($Offense_SluggingPercentage,3),3,true)>
<VAR $flPct = trailingZeroes(round($Offense_FieldingPercentage,3),3,true)>
<ROW NAME=LeaderFootballCol STATFIELD="BattingAverage" STAT=$batAvg>
<ROW NAME=LeaderFootballCol STATFIELD="SluggingPercentage" STAT=$slPct>
<ROW NAME=LeaderFootballCol STATFIELD="FieldingPercentage" STAT=$flPct>
<ROW NAME=LeaderFootballCol STATFIELD="Hits" STAT=$Offense_Hits>
<ROW NAME=LeaderFootballCol STATFIELD="Doubles" STAT=$Offense_Doubles>
<ROW NAME=LeaderFootballCol STATFIELD="Triples" STAT=$Offense_Triples>
<ROW NAME=LeaderFootballCol STATFIELD="HomeRuns" STAT=$Offense_HomeRuns>
<ROW NAME=LeaderFootballCol STATFIELD="RunsBattedIn" STAT=$Offense_RunsBattedIn>
<ROW NAME=LeaderFootballCol STATFIELD="StolenBases" STAT=$Offense_StolenBases>
<ROW NAME=LeaderFootballCol STATFIELD="Errors" STAT=$Offense_Errors>
</tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
</table>
<br /><br />

<VAR $whereClause = " AND InningsPitched ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "EarnedRunAverage ASC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats_Baseball SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<table cellpadding="0" cellspacing="0" class="teamStatTable">
<tr class="teamStatsHeader"><td colspan="50"><b>Pitching</b></td></tr>
<tr class="teamStatsHeader">
<td>Name</td>
<td align="right">ERA</td>
<td align="right">W</td>
<td align="right">SV</td>
<td align="right">SVPCT</td>
<td align="right">SHO</td>
<td align="right">CG</td>
<td align="right">K</td>
<td align="right">BB</td>
</tr>
<IFGREATER count($TeamPlayerStats_Baseball_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_Baseball_rows prefix=Pitching>
<tr class="{$rowClass}">
<td>
<VAR $playerName = fixApostrophes($Pitching_PlayerFirstName." ".$Pitching_PlayerLastName)>
<a href="{$externalURL}site=default&tpl=Player&ID={$Pitching_PlayerID}" class="leadersNameLink">
{$playerName}</a></td>
<VAR $era = trailingZeroes(round($Pitching_EarnedRunAverage,2),2,true)>
<ROW NAME=LeaderFootballCol STATFIELD="EarnedRunAverage" STAT=$era>
<ROW NAME=LeaderFootballCol STATFIELD="Win" STAT=$Pitching_Win>
<ROW NAME=LeaderFootballCol STATFIELD="Save" STAT=$Pitching_Save>
<ROW NAME=LeaderFootballCol STATFIELD="SavePercentage" STAT=$Pitching_SavePercentage>
<ROW NAME=LeaderFootballCol STATFIELD="Shutout" STAT=$Pitching_Shutout>
<ROW NAME=LeaderFootballCol STATFIELD="CompleteGame" STAT=$Pitching_CompleteGame>
<ROW NAME=LeaderFootballCol STATFIELD="StrikeoutsPitched" STAT=$Pitching_StrikeoutsPitched>
<ROW NAME=LeaderFootballCol STATFIELD="WalksAllowed" STAT=$Pitching_WalksAllowed>
</tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
</table>
<br /><br />

