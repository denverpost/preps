<VAR $sportYear = "2009">
<h3>Player Stats <span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span></h3>

<table cellpadding="0" cellspacing="0" class="leadersTable" width="100%">
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
<h4>Offense</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
    <tbody>
        <tr class="teamStatsHeader">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="" align="right">Avg.</th>
            <th scope="col" abbr="" align="right">Slug %</th>
            <th scope="col" abbr="" align="right">H</th>
            <th scope="col" abbr="" align="right">2B</th>
            <th scope="col" abbr="" align="right">3B</th>
            <th scope="col" abbr="" align="right">HR</th>
            <th scope="col" abbr="" align="right">RBI</th>
            <th scope="col" abbr="" align="right">SB</th>
            <th scope="col" abbr="" align="right">E</th>
        </tr>
<IFGREATER count($TeamPlayerStats_Baseball_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=TeamPlayerStats_Baseball_rows prefix=Offense>
		<tr class="{$rowClass}">
			<td>
<VAR $playerName = fixApostrophes($Offense_PlayerFirstName." ".$Offense_PlayerLastName)>
<a href="home.html?site=default&tpl=Player&ID={$Offense_PlayerID}" class="leadersNameLink">
{$playerName}</a></td>
<VAR $batAvg = trailingZeroes(round($Offense_BattingAverage,3),3,true)>
<VAR $slPct = trailingZeroes(round($Offense_SluggingPercentage,3),3,true)>
<VAR $flPct = trailingZeroes(round($Offense_FieldingPercentage,3),3,true)>


<IFEQUAL $batAvg 1>
<VAR $btAvg = $batAvg>
<VAR $bAvg = 1>
<ELSE>
<VAR $bAvg = ($batAvg * 1000)>
<VAR $btAvg = ".$bAvg">
</IFEQUAL>

<IFEQUAL $bAvg 0>
<VAR $btAvg = ".000">
</IFEQUAL>

<ROW NAME=LeaderFootballCol STATFIELD="BattingAverage" STAT=$btAvg>

<IFEQUAL $slPct 1>
<VAR $sPct = $slPct>
<ELSE>
<VAR $slugPct = ($slPct * 1000)>
<VAR $sPct = ".$slugPct">
</IFEQUAL>
<IFGREATER $slPct 1>
<VAR $sPct = $slPct>
</IFGREATER>
<IFEQUAL $slPct 0>
<VAR $sPct = ".000">
</IFEQUAL>

<ROW NAME=LeaderFootballCol STATFIELD="SluggingPercentage" STAT=$sPct>
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
    </tbody>
</table>
<br /><br />

<VAR $whereClause = " AND InningsPitched ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "EarnedRunAverage ASC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats_Baseball SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>Pitching</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
    <tbody>
        <tr id="header-sub" class="teamStatsHeader">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="Earned Run Average" align="right">ERA</th>
            <th scope="col" abbr="Wins" align="right">W</th>
            <th scope="col" abbr="Losses" align="right">L</th>
            <th scope="col" abbr="Saves" align="right">Sv</th>
            <th scope="col" abbr="Save Percent" align="right">Sv %</th>
            <th scope="col" abbr="ShutOuts" align="right">SHO</th>
            <th scope="col" abbr="Complete Games" align="right">CG</th>
            <th scope="col" abbr="Strike outs" align="right">K</th>
            <th scope="col" abbr="Walks" align="right">BB</th>
        </tr>
<IFGREATER count($TeamPlayerStats_Baseball_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_Baseball_rows prefix=Pitching>
<tr class="{$rowClass}">
<td>
<VAR $playerName = fixApostrophes($Pitching_PlayerFirstName." ".$Pitching_PlayerLastName)>
                <a href="home.html?site=default&tpl=Player&ID={$Pitching_PlayerID}" class="leadersNameLink">
{$playerName}</a></td>
<VAR $era = trailingZeroes(round($Pitching_EarnedRunAverage,2),2,true)>
<ROW NAME=LeaderFootballCol STATFIELD="EarnedRunAverage" STAT=$era>
<ROW NAME=LeaderFootballCol STATFIELD="Win" STAT=$Pitching_Win>
<ROW NAME=LeaderFootballCol STATFIELD="Loss" STAT=$Pitching_Loss>
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
    </tbody>
</table>
<br /><br />

