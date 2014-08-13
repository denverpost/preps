<VAR $domainURL = "http://preps.denverpost.com">
###<VAR $sportYear = "2012">###
<h3>Player Stats</h3>

<table cellpadding="0" cellspacing="0" class="<table cellpadding="0" cellspacing="0" width="550px">
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
###<td id="keySavePercentage">SVPCT: Save percentage</td>###
</tr>
<tr class="statKeyRow">
<td id="keyCompleteGames">CG: Complete games</td>
<td id="keyErrors">E: Errors</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyStrikeoutsPitched">K: Strikeouts</td>
<td id="keyWalksAllowed">BB: Walks</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyHitsAllowed">H: H</td>
<td id="keyHitByPitchAllowed">HBP: HBP</td>
</tr>

</table>
</div>
</td></tr>
</table>


<VAR $whereClause = " AND PlateAppearances ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "BattingAverage DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
###{$TeamPlayerStats_query}###

<h4>Hitting</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide550">
    <tbody>
        <tr class="teamStatsHeader">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="" align="center">PA</th>
            <th scope="col" abbr="" align="center">AB</th>
            <th scope="col" abbr="" align="center">H</th>
            <th scope="col" abbr="" align="center">2B</th>
            <th scope="col" abbr="" align="center">3B</th>
            <th scope="col" abbr="" align="center">HR</th>
            <th scope="col" abbr="" align="center">RBI</th>
            <th scope="col" abbr="" align="center">K</th>
            <th scope="col" abbr="" align="center">BB</th>
            <th scope="col" abbr="" align="center">HBP</th>
            <th scope="col" abbr="" align="center">SBA</th>
            <th scope="col" abbr="" align="center">SB</th>
            <th scope="col" abbr="" align="center">E</th>
            <th scope="col" abbr="" align="center">OBP</th>
            <th scope="col" abbr="" align="center">Slug %</th>
            <th scope="col" abbr="" align="center">Avg.</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Offense>
		<tr class="{$rowClass}">
			<td>
<VAR $playerName = fixApostrophes($Offense_PlayerFirstName." ".$Offense_PlayerLastName)>
<a href="home.html?site=default&tpl=Player&ID={$Offense_PlayerID}" class="leadersNameLink">
{$playerName}</a></td>
<VAR $batAvg = trailingZeroes(round($Offense_BattingAverage,3),3,true)>
<VAR $slPct = trailingZeroes(round($Offense_SluggingPercentage,3),3,true)>
<VAR $flPct = trailingZeroes(round($Offense_FieldingPercentage,3),3,true)>
<VAR $obPct = trailingZeroes(round($Offense_OnBasePercentage,3),3,true)>


###<IFEQUAL $batAvg 1>
<VAR $btAvg = $batAvg>
<VAR $bAvg = 1>
<ELSE>
<VAR $bAvg = ($batAvg * 1000)>
<VAR $btAvg = ".$bAvg">
</IFEQUAL>

<IFEQUAL $bAvg 0>
<VAR $btAvg = ".000">
</IFEQUAL>###

<IFEQUAL $batAvg 1>
<VAR $btAvg = $batAvg>
<VAR $bAvg = 1>
<ELSE>
<VAR $bAvg = ($batAvg * 1000)>
<IFGREATER 100 $bAvg>
<VAR $btAvg = ".0$bAvg">

<ELSE>
<VAR $btAvg = ".$bAvg">
</IFGREATER>
</IFEQUAL>

<IFEQUAL $bAvg 0>
<VAR $btAvg = ".000">
</IFEQUAL>




###<IFEQUAL $slPct 1>
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
</IFEQUAL>###

<IFEQUAL $slPct 1>
<VAR $sPct = $slPct>
<ELSE>
<VAR $slugPct = ($slPct * 1000)>
<IFGREATER 100 $slugPct>
<VAR $sPct = ".0$slugPct">
<ELSE>
<VAR $sPct = ".$slugPct">
</IFGREATER>
</IFEQUAL>
<IFGREATER $slPct 1>
<VAR $sPct = $slPct>
</IFGREATER>
<IFEQUAL $slPct 0>
<VAR $sPct = ".000">
</IFEQUAL>





<IFEQUAL $obPct 1>
<VAR $obPct = $obPct>
<ELSE>
<VAR $obPct = ($obPct * 1000)>
<VAR $obPct = ".$obPct">
</IFEQUAL>
<IFEQUAL $obPct 0>
<VAR $obPct = ".000">
</IFEQUAL>

<ROW NAME=LeaderFootballCol STATFIELD="PlateAppearances" STAT=$Offense_PlateAppearances>
<ROW NAME=LeaderFootballCol STATFIELD="AtBats" STAT=$Offense_AtBats>
<ROW NAME=LeaderFootballCol STATFIELD="Hits" STAT=$Offense_Hits>
<ROW NAME=LeaderFootballCol STATFIELD="Doubles" STAT=$Offense_Doubles>
<ROW NAME=LeaderFootballCol STATFIELD="Triples" STAT=$Offense_Triples>
<ROW NAME=LeaderFootballCol STATFIELD="HomeRuns" STAT=$Offense_HomeRuns>
<ROW NAME=LeaderFootballCol STATFIELD="RunsBattedIn" STAT=$Offense_RunsBattedIn>
<ROW NAME=LeaderFootballCol STATFIELD="Walks" STAT=$Offense_Strikeouts>
<ROW NAME=LeaderFootballCol STATFIELD="Walks" STAT=$Offense_Walks>
<ROW NAME=LeaderFootballCol STATFIELD="HitbyPitch" STAT=$Offense_HitByPitch>
<ROW NAME=LeaderFootballCol STATFIELD="StolenBaseAttempts" STAT=$Offense_StolenBaseAttempts>
<ROW NAME=LeaderFootballCol STATFIELD="StolenBases" STAT=$Offense_StolenBases>
<ROW NAME=LeaderFootballCol STATFIELD="ROE" STAT=$Offense_Errors>
<ROW NAME=LeaderFootballCol STATFIELD="OBP" STAT=$obPct>
<ROW NAME=LeaderFootballCol STATFIELD="SluggingPercentage" STAT=$sPct>
<ROW NAME=LeaderFootballCol STATFIELD="BattingAverage" STAT=$btAvg>
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
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>Pitching</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide500">
    <tbody>
        <tr id="header-sub" class="teamStatsHeader">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="Innings Pitched" align="center">IP</th>
            <th scope="col" abbr="Earned Run Average" align="center">ERA</th>
            <th scope="col" abbr="Wins" align="center">W</th>
            <th scope="col" abbr="Losses" align="center">L</th>
            <th scope="col" abbr="Saves" align="center">Sv</th>
###            <th scope="col" abbr="Save Percent" align="center">Sv %</th>###
            <th scope="col" abbr="ShutOuts" align="center">SHO</th>
            <th scope="col" abbr="Complete Games" align="center">CG</th>
            <th scope="col" abbr="Earned Runs" align="center">ER</th>
            <th scope="col" abbr="Runs Allowed" align="center">RA</th>
           <th scope="col" abbr="Hits Allowed" align="center">H</th>
            <th scope="col" abbr="Strike outs" align="center">K</th>
            <th scope="col" abbr="Walks" align="center">BB</th>
            <th scope="col" abbr="HitByPitch" align="center">HBP</th>
            <th scope="col" abbr="WildPitch" align="center">WP</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Pitching>
<tr class="{$rowClass}">
<td>
<VAR $playerName = fixApostrophes($Pitching_PlayerFirstName." ".$Pitching_PlayerLastName)>
                <a href="home.html?site=default&tpl=Player&ID={$Pitching_PlayerID}" class="leadersNameLink">
{$playerName}</a></td>
<VAR $era = trailingZeroes(round($Pitching_EarnedRunAverage,2),2,true)>
<VAR $ip = round($Pitching_InningsPitched,2)>

<VAR $whole_Innings = (round($Pitching_InningsPitched - .5))>
###WHOLE INNINGS= {$whole_Innings}
INNINGS PITCHED = {$Pitching_InningsPitched}###
<VAR $partial_Innings = ($Pitching_InningsPitched - $whole_Innings)>
###PARTIAL INNINGS = {$partial_Innings}###
<IFEQUAL $partial_Innings 0>
<VAR $partial_Innings = ".0">
<ELSE>
<IFGREATER $partial_Innings .5>
<VAR $partial_Innings = ".2">
<ELSE>
<VAR $partial_Innings = ".1">
</IFGREATER>
</IFEQUAL>

<?php $ip = $whole_Innings.$partial_Innings;?>


<ROW NAME=LeaderFootballCol STATFIELD="InningsPitched" STAT=$ip>
<ROW NAME=LeaderFootballCol STATFIELD="EarnedRunAverage" STAT=$era>
<ROW NAME=LeaderFootballCol STATFIELD="Win" STAT=$Pitching_Win>
<ROW NAME=LeaderFootballCol STATFIELD="Loss" STAT=$Pitching_Loss>
<ROW NAME=LeaderFootballCol STATFIELD="Save" STAT=$Pitching_Save>
###<ROW NAME=LeaderFootballCol STATFIELD="SavePercentage" STAT=$Pitching_SavePercentage>###
<ROW NAME=LeaderFootballCol STATFIELD="Shutout" STAT=$Pitching_Shutout>
<ROW NAME=LeaderFootballCol STATFIELD="CompleteGame" STAT=$Pitching_CompleteGame>
<ROW NAME=LeaderFootballCol STATFIELD="EarnedRuns" STAT=$Pitching_EarnedRuns>
<ROW NAME=LeaderFootballCol STATFIELD="RunsAllowed" STAT=$Pitching_RunsAllowed>
<ROW NAME=LeaderFootballCol STATFIELD="HitsAllowed" STAT=$Pitching_HitsAllowed>
<ROW NAME=LeaderFootballCol STATFIELD="StrikeoutsPitched" STAT=$Pitching_StrikeoutsPitched>
<ROW NAME=LeaderFootballCol STATFIELD="WalksAllowed" STAT=$Pitching_WalksAllowed>
<ROW NAME=LeaderFootballCol STATFIELD="HitByPitchAllowed" STAT=$Pitching_HitByPitchAllowed>
<ROW NAME=LeaderFootballCol STATFIELD="WildPitch" STAT=$Pitching_WildPitch>
        </tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
</table>

<VAR $whereClause = " AND TotalChances ".chr(62)." 0">
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>Fielding</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide550">
    <tbody>
        <tr id="header-sub" class="teamStatsHeader">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="TotalChances" align="center">TC</th>
            <th scope="col" abbr="TotalPutouts" align="center">TPO</th>
            <th scope="col" abbr="Assists" align="center">A</th>
            <th scope="col" abbr="Errors" align="center">E</th>
            <th scope="col" abbr="DoublePlays" align="center">DP</th>
            <th scope="col" abbr="FieldingPercentage" align="center">Fld %</th>
            <th scope="col" abbr="PassedBalls" align="center">PB</th>
            <th scope="col" abbr="StolenBasesAgainst" align="center">SB</th>
            <th scope="col" abbr="CaughtStealingRunners" align="center">CS</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Fielding>
        <tr class="{$rowClass}">
            <td>
<VAR $playerName = fixApostrophes($Fielding_PlayerFirstName." ".$Fielding_PlayerLastName)>
                <a href="home.html?site=default&tpl=Player&ID={$Fielding_PlayerID}" class="leadersNameLink">
{$playerName}</a></td>

<ROW NAME=LeaderFootballCol STATFIELD="TotalChances" STAT=$Fielding_TotalChances>
<ROW NAME=LeaderFootballCol STATFIELD="TotalPutouts" STAT=$Fielding_TotalPutouts>
<ROW NAME=LeaderFootballCol STATFIELD="Assists" STAT=$Fielding_Assists>
<ROW NAME=LeaderFootballCol STATFIELD="Errors" STAT=$Fielding_Errors>
<ROW NAME=LeaderFootballCol STATFIELD="DoublePlays" STAT=$Fielding_DoublePlays>

<VAR $flPct = trailingZeroes(round($Fielding_FieldingPercentage,3),3,true)>
<ROW NAME=LeaderFootballCol STATFIELD="FieldingPercentage" STAT=$flPct>
<ROW NAME=LeaderFootballCol STATFIELD="PassedBalls" STAT=$Fielding_PassedBalls>
<ROW NAME=LeaderFootballCol STATFIELD="StolenBases" STAT=$Fielding_StolenBasesAgainst>
<ROW NAME=LeaderFootballCol STATFIELD="CaughtStealingRunners" STAT=$Fielding_CaughtStealingRunners>
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
