<VAR $sportyear = 2009>

<VAR $statType = "conf">
<QUERY name=TeamSeasonStats_softball ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportyear>
<VAR $homeConfWins = $TeamSeasonStats_softball_Win>
<VAR $homeConfLosses = $TeamSeasonStats_softball_Loss>
<VAR $Home_TeamName = fixApostrophes($Home_TeamName)>
<VAR $Away_TeamName = fixApostrophes($Away_TeamName)>

<VAR $TeamSeasonStats_softball_query = "">
<VAR $statType = "conf">
<QUERY name=TeamSeasonStats_softball ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportyear>
<VAR $awayConfWins = $TeamSeasonStats_softball_Win>
<VAR $awayConfLosses = $TeamSeasonStats_softball_Loss>

<VAR $TeamSeasonStats_softball_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats_softball ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportyear>
<VAR $homeOverallWins = $TeamSeasonStats_softball_Win>
<VAR $homeOverallLosses = $TeamSeasonStats_softball_Loss>

<VAR $TeamSeasonStats_softball_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats_softball ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportyear>
<VAR $awayOverallWins = $TeamSeasonStats_softball_Win>
<VAR $awayOverallLosses = $TeamSeasonStats_softball_Loss>


<h1>
<IFGREATER $Home_Runs $Away_Runs>
{$Home_TeamName} {$Home_Runs}, {$Away_TeamName} {$Away_Runs}
<ELSE>
{$Away_TeamName} {$Away_Runs}, 
{$Home_TeamName} {$Home_Runs}
</IFGREATER>
 &mdash;&nbsp; <IFEQUAL $Game_GameScoreIsFinal 1>
Final
<ELSE>
In progress
</IFEQUAL>
</h1>
<VAR $dateTimeDisplay = date("l F j, Y",strtotime($Game_GameDate))." ".date("g:ia",strtotime($Game_GameTime))>
<h2 class="list">Prep Softball game played {$dateTimeDisplay}</h2>

<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr><td><b><a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
{$Away_TeamName}</b></td>
<td><b>Overall:</b> {$awayOverallWins}-{$awayOverallLosses} </td>
<td><b>Conference:</b> {$awayConfWins}-{$awayConfLosses}</td></tr>
<tr><td><a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
<b>{$Home_TeamName}</b></td>
<td><b>Overall:</b> {$homeOverallWins}-{$homeOverallLosses} </td>
<td><b>Conference:</b> {$homeConfWins}-{$homeConfLosses}</td></tr>
</table>


<h4>Game Boxscore</h4>
<table class="boxscoreStatTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" align="right"><strong>1</strong></th>
            <th scope="col" abbr="" align="right"><strong>2</strong></th>
            <th scope="col" abbr="" align="right"><strong>3</strong></th>
            <th scope="col" abbr="" align="right"><strong>4</strong></th>
            <th scope="col" abbr="" align="right"><strong>5</strong></th>
            <th scope="col" abbr="" align="right"><strong>6</strong></th>
            <th scope="col" abbr="" align="right"><strong>7</strong></th>
<IFGREATER $Game_GameLength 7>
            <th scope="col" abbr="" align="right"><strong>8</strong></th>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 8>
            <th scope="col" abbr="" align="right"><strong>9</strong></th>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 9>
            <th scope="col" abbr="" align="right"><strong>10</strong></th>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 10>
            <th scope="col" abbr="" align="right"><strong>11</strong></th>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 11>
            <th scope="col" abbr="" align="right"><strong>12</strong></th>
<ELSE>
</IFGREATER>
            <th scope="col" abbr="" align="right"><strong>R</strong></th>
            <th scope="col" abbr="" align="right"><strong>H</strong></th>
            <th scope="col" abbr="" align="right"><strong>E</strong></th>
        </tr>
        <tr>
            <td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
<b>{$Away_TeamName}</b></a></td>
<td align="right">{$Away_Inning1}</td>
<td align="right">{$Away_Inning2}</td>
<td align="right">{$Away_Inning3}</td>
<td align="right">{$Away_Inning4}</td>
<td align="right">{$Away_Inning5}</td>
<td align="right">{$Away_Inning6}</td>
<td align="right">{$Away_Inning7}</td>
<IFGREATER $Game_GameLength 7>
<td align="right">{$Away_Inning8}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 8>
<td align="right">{$Away_Inning9}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 9>
<td align="right">{$Away_Inning10}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 10>
<td align="right">{$Away_Inning11}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 11>
<td align="right">{$Away_Inning12}</td>
<ELSE>
</IFGREATER>
<td align="right">{$Away_Runs}</td>
<td align="right">{$Away_Hits}</td>
<td align="right">{$Away_Errors}</td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
<b>{$Home_TeamName}</b></a></td>
<td align="right">{$Home_Inning1}</td>
<td align="right">{$Home_Inning2}</td>
<td align="right">{$Home_Inning3}</td>
<td align="right">{$Home_Inning4}</td>
<td align="right">{$Home_Inning5}</td>
<td align="right">{$Home_Inning6}</td>
<td align="right">{$Home_Inning7}</td>
<IFGREATER $Game_GameLength 7>
<td align="right">{$Home_Inning8}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 8>
<td align="right">{$Home_Inning9}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 9>
<td align="right">{$Home_Inning10}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 10>
<td align="right">{$Home_Inning11}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 11>
<td align="right">{$Home_Inning12}</td>
<ELSE>
</IFGREATER>
<td align="right">{$Home_Runs}</td>
<td align="right">{$Home_Hits}</td>
<td align="right">{$Home_Errors}</td></tr>
    </tbody>
</table>

<br /><br />

<VAR $teamIDs = array($awayTeamID,$homeTeamID)>
<VAR $teamNames = array($Away_TeamName,$Home_TeamName)>

<?PHP foreach($teamIDs as $teamKey => $teamID) { ?>
<h3>{$teamNames[$teamKey]} Prep Softball Player Stats</h3>

<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$teamID SPORTNAME=$sqlSportName>
<IFGREATER count($GamePlayerStats_rows) 0>
<VAR $GamePlayerStats_rows = sortResults($GamePlayerStats_rows,"BattingOrder")>
<h4>Offense</h4>
<table class="boxscoreStatTable deluxe" CELLPADDING=0 CELLSPACING=0>
    <tbody>
        <tr id="header-sub" class="resultsText">
<td width="120"><b>Name</td>
<td align="right"><b>AB</td>
<td align="right"><b>R</td>
<td align="right" onmouseover="highlightKey('keyHits')" onmouseout = "unHighlightKey('keyHits')"><b>H</td>
<td align="right" onmouseover="highlightKey('keyDoubles')" onmouseout = "unHighlightKey('keyDoubles')"><b>2B</td>
<td align="right" onmouseover="highlightKey('keyTriples')" onmouseout = "unHighlightKey('keyTriples')"><b>3B</td>
<td align="right" onmouseover="highlightKey('keyHomeRuns')" onmouseout = "unHighlightKey('keyHomeRuns')"><b>HR</td>
<td align="right" onmouseover="highlightKey('keyRunsBattedIn')" onmouseout = "unHighlightKey('keyRunsBattedIn')"><b>RBI</td>
<td align="right" onmouseover="highlightKey('keyBattingAverage')" onmouseout = "unHighlightKey('keyBattingAverage')"><b>AVG</td>
<td align="right" onmouseover="highlightKey('keySluggingPercentage')" onmouseout = "unHighlightKey('keySluggingPercentage')"><b>SLPCT</td>
<td align="right" onmouseover="highlightKey('keyStrikeouts')" onmouseout = "unHighlightKey('keyStrikeouts')"><b>K</td>
<td align="right" onmouseover="highlightKey('keyWalks')" onmouseout = "unHighlightKey('keyWalks')"><b>BB</td>
<td align="right"><B>HBP</td>
<td align="right" onmouseover="highlightKey('keyStolenBases')" onmouseout = "unHighlightKey('keyStolenBases')"><b>SB</td>
<td align="right"><B>CS</td>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Offense>


###<IFGREATER $Offense_AtBats 0>###
<tr class="{$rowClass}">
<td width="120">
<VAR $playerName = fixApostrophes($Offense_PlayerFirstName." ".$Offense_PlayerLastName)>
<a href="{$externalURL}site=default&tpl=Player&ID={$Offense_PlayerID}">
{$playerName}
</a>
</td>
<td align="right">{$Offense_AtBats}</td>
<td align="right">{$Offense_Runs}</td>
<td align="right">{$Offense_Hits}</td>
<td align="right">{$Offense_Doubles}</td>
<td align="right">{$Offense_Triples}</td>
<td align="right">{$Offense_HomeRuns}</td>
<td align="right">{$Offense_RunsBattedIn}</td>
<VAR $compPct = trailingZeroes(round($Offense_BattingAverage,3),3,true)>
<td align="right">{$compPct}</td>
<VAR $compPct = trailingZeroes(round($Offense_SluggingPercentage,3),3,true)>
<td align="right">{$compPct}</td>
<td align="right">{$Offense_Strikeouts}</td>
<td align="right">{$Offense_Walks}</td>
<td align="right">{$Offense_HitByPitch}</td>
<td align="right">{$Offense_StolenBases}</td>
<td align="right">{$Offense_CaughtStealing}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
###</IFGREATER>###
</RESULTS>
<tr class="{$rowClass}">
<td width="120">
<b>Total</b>
</td>
<IFEQUAL $teamID $awayTeamID>
<td align="right">{$Away_AtBats}</td>
<td align="right">{$Away_TotalRuns}</td>
<td align="right">{$Away_TotalHits}</td>
<td align="right">{$Away_Doubles}</td>
<td align="right">{$Away_Triples}</td>
<td align="right">{$Away_HomeRuns}</td>
<td align="right">{$Away_RunsBattedIn}</td>
<VAR $compPct = trailingZeroes(round($Away_BattingAverage,3),3,true)>
<td align="right">{$compPct}</td>
<VAR $compPct = trailingZeroes(round($Away_SluggingPercentage,3),3,true)>
<td align="right">{$compPct}</td>
<td align="right">{$Away_Strikeouts}</td>
<td align="right">{$Away_Walks}</td>
<td align="right">{$Away_HitByPitch}</td>
<td align="right">{$Away_StolenBases}</td>
<td align="right">{$Away_CaughtStealing}</td>
<ELSE>
<td align="right">{$Home_AtBats}</td>
<td align="right">{$Home_TotalRuns}</td>
<td align="right">{$Home_TotalHits}</td>
<td align="right">{$Home_Doubles}</td>
<td align="right">{$Home_Triples}</td>
<td align="right">{$Home_HomeRuns}</td>
<td align="right">{$Home_RunsBattedIn}</td>
<VAR $compPct = trailingZeroes(round($Home_BattingAverage,3),3,true)>
<td align="right">{$compPct}</td>
<VAR $compPct = trailingZeroes(round($Home_SluggingPercentage,3),3,true)>
<td align="right">{$compPct}</td>
<td align="right">{$Home_Strikeouts}</td>
<td align="right">{$Home_Walks}</td>
<td align="right">{$Home_HitByPitch}</td>
<td align="right">{$Home_StolenBases}</td>
<td align="right">{$Home_CaughtStealing}</td>
</IFEQUAL>
</tr>
</table>

<h4>Pitching</h4>
<table class="boxscoreStatTable deluxe wide400" CELLPADDING=0 CELLSPACING=0>
    <tbody>
        <tr id="header-sub" class="resultsText">
<td width="120"><b>Name</td>
<td align="right"><b>IP</td>
<td align="right"><b>R</td>
<td align="right"><b>ER</td>
<td align="right" onmouseover="highlightKey('keyEarnedRunAverage')" onmouseout = "unHighlightKey('keyEarnedRunAverage')"><b>ERA</td>
<td align="right"><b>H</td>
<td align="right"><b>K</td>
<td align="right"><b>BB</td>
<td align="right"><b>HPB</td>
<td align="right"><b>WP</td>
<td align="right"><b>SO</td>
<td align="right"><b>HR</td>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<IFGREATER count(GamePlayerStats_rows) 0>
<VAR $GamePlayerStats_rows = sortResults($GamePlayerStats_rows,"PitchingOrder")>
</IFGREATER>
<RESULTS list=GamePlayerStats_rows prefix=Pitching>
<IFGREATER $Pitching_InningsPitched 0>
<tr class="{$rowClass}">
<td width="120">
<VAR $playerName = fixApostrophes($Pitching_PlayerFirstName." ".$Pitching_PlayerLastName)>
<a href="{$externalURL}site=default&tpl=Player&ID={$Pitching_PlayerID}">
{$playerName}
</a>
<IFEQUAL $Pitching_Win 1> (W) </IFEQUAL>
<IFEQUAL $Pitching_Loss 1> (L) </IFEQUAL>
<IFEQUAL $Pitching_Save 1> (S) </IFEQUAL>
</td>
<td align="right">{$Pitching_InningsPitchedEntered}</td>
<td align="right">{$Pitching_RunsAllowed}</td>
<td align="right">{$Pitching_EarnedRuns}</td>
<VAR $compVal = trailingZeroes(round($Pitching_EarnedRunAverage,2),2,true)>
<td align="right">{$compVal}</td>
<td align="right">{$Pitching_HitsAllowed}</td>
<td align="right">{$Pitching_StrikeoutsPitched}</td>
<td align="right">{$Pitching_WalksAllowed}</td>
<td align="right">{$Pitching_HitByPitchAllowed}</td>
<td align="right">{$Pitching_WildPitch}</td>
<td align="right">{$Pitching_SaveOpportunity}</td>
<td align="right">{$Pitching_HomeRunsAllowed}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</RESULTS>
<tr class="{$rowClass}">
<td width="120">
<b>Total</b>
</td>
<IFEQUAL $teamID $awayTeamID>
<td align="right">{$Away_InningsPitched}</td>
<td align="right">{$Away_RunsAllowed}</td>
<td align="right">{$Away_EarnedRuns}</td>
<VAR $compVal = trailingZeroes(round($Away_EarnedRunAverage,2),2,true)>
<td align="right">{$compVal}</td>
<td align="right">{$Away_HitsAllowed}</td>
<td align="right">{$Away_StrikeoutsPitched}</td>
<td align="right">{$Away_WalksAllowed}</td>
<td align="right">{$Away_HitByPitchAllowed}</td>
<td align="right">{$Away_WildPitch}</td>
<td align="right">{$Away_SaveOpportunity}</td>
<td align="right">{$Away_HomeRunsAllowed}</td>
<ELSE>
<td align="right">{$Home_InningsPitched}</td>
<td align="right">{$Home_RunsAllowed}</td>
<td align="right">{$Home_EarnedRuns}</td>
<VAR $compVal = trailingZeroes(round($Home_EarnedRunAverage,2),2,true)>
<td align="right">{$compVal}</td>
<td align="right">{$Home_HitsAllowed}</td>
<td align="right">{$Home_StrikeoutsPitched}</td>
<td align="right">{$Home_WalksAllowed}</td>
<td align="right">{$Home_HitByPitchAllowed}</td>
<td align="right">{$Home_WildPitch}</td>
<td align="right">{$Home_SaveOpportunity}</td>
<td align="right">{$Home_HomeRunsAllowed}</td>
</IFEQUAL>
        </tr>
    </tbody>
</table>



###<table class="boxscoreStatTable" WIDTH=350 CELLPADDING=0 CELLSPACING=0>
<tr><td colspan="50"><b>Fielding</b></td></tr>
<tr>
<td width="120">Name</td>
<td align="right">IP</td>
<td align="right">TC</td>
<td align="right">TPO</td>
<td align="right">A</td>
<td align="right">E</td>
<td align="right">DP</td>
<td align="right" onmouseover="highlightKey('keyFieldingPercentage')" onmouseout = "unHighlightKey('keyFieldingPercentage')">FLPCT</td>
<td align="right">PB</td>
<td align="right">SB</td>
<td align="right">CS</td>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Fielding>
<IFGREATER $Fielding_InningsPlayed 0>
<tr class="{$rowClass}">
<td width="120">
<VAR $playerName = fixApostrophes($Fielding_PlayerFirstName." ".$Fielding_PlayerLastName)>
<a href="{$externalURL}site=default&tpl=Player&ID={$Fielding_PlayerID}">
{$playerName}
</a>
</td>
<td align="right">{$Fielding_InningsPlayed}</td>
<td align="right">{$Fielding_TotalChances}</td>
<td align="right">{$Fielding_TotalPutouts}</td>
<td align="right">{$Fielding_Assists}</td>
<td align="right">{$Fielding_Errors}</td>
<td align="right">{$Fielding_DoublePlays}</td>
<VAR $compVal = trailingZeroes(round($Fielding_FieldPercentage,3),3,true)>
<td align="right">{$compVal}</td>
<td align="right">{$Fielding_PassedBalls}</td>
<td align="right">{$Fielding_StolenBasesAgainst}</td>
<td align="right">{$Fielding_CaughtStealingRunners}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</RESULTS>
<tr class="{$rowClass}">
<td width="120">
<b>Total</b>
</td>
<IFEQUAL $teamID $awayTeamID>
<td align="right">{$Away_InningsPlayed}</td>
<td align="right">{$Away_TotalChances}</td>
<td align="right">{$Away_TotalPutouts}</td>
<td align="right">{$Away_Assists}</td>
<td align="right">{$Away_ErrorsAllowed}</td>
<td align="right">{$Away_DoublePlays}</td>
<VAR $compVal = trailingZeroes(round($Away_FieldPercentage,3),3,true)>
<td align="right">{$compVal}</td>
<td align="right">{$Away_PassedBalls}</td>
<td align="right">{$Away_StolenBasesAgainst}</td>
<td align="right">{$Away_CaughtStealingRunners}</td>
<ELSE>
<td align="right">{$Home_InningsPlayed}</td>
<td align="right">{$Home_TotalChances}</td>
<td align="right">{$Home_TotalPutouts}</td>
<td align="right">{$Home_Assists}</td>
<td align="right">{$Home_ErrorsAllowed}</td>
<td align="right">{$Home_DoublePlays}</td>
<VAR $compVal = trailingZeroes(round($Home_FieldPercentage,3),3,true)>
<td align="right">{$compVal}</td>
<td align="right">{$Home_PassedBalls}</td>
<td align="right">{$Home_StolenBasesAgainst}</td>
<td align="right">{$Home_CaughtStealingRunners}</td>
</IFEQUAL>
</tr>
<br />###
<?PHP } ?>
</IFGREATER>


###

<span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span></td></tr>

<tr><td colspan=50>
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
###