<VAR $domainURL = "http://preps.denverpost.com">
<VAR $sportYear = 2016> ###YEARCHECK###
<VAR $statType = "conf">


<QUERY name=Game_preview GAMEID=$form_ID>
<VAR $Home_TeamID = $Game_preview_GameHomeTeamID>
<VAR $Away_TeamID = $Game_preview_GameAwayTeamID>



<IFEQUAL $Game_preview_GameStatStatus 0>

<QUERY name=TeamSeasonStats_Baseball ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportYear>
<VAR $homeConfWins = $TeamSeasonStats_Baseball_Win>
<VAR $homeConfLosses = $TeamSeasonStats_Baseball_Loss>
<VAR $Home_TeamName = fixApostrophes($Home_TeamName)>
<VAR $Away_TeamName = fixApostrophes($Away_TeamName)>

###query:{$TeamSeasonStats_Baseball_query}###

###<VAR $TeamSeasonStats_Baseball_query = "">###
<VAR $statType = "conf">
<QUERY name=TeamSeasonStats_Baseball ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportYear>
<VAR $awayConfWins = $TeamSeasonStats_Baseball_Win>
<VAR $awayConfLosses = $TeamSeasonStats_Baseball_Loss>

###<VAR $TeamSeasonStats_Baseball_query = "">###
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats_Baseball ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportYear>
<VAR $homeOverallWins = $TeamSeasonStats_Baseball_Win>
<VAR $homeOverallLosses = $TeamSeasonStats_Baseball_Loss>

###<VAR $TeamSeasonStats_Baseball_query = "">###
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats_Baseball ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportYear>
<VAR $awayOverallWins = $TeamSeasonStats_Baseball_Win>
<VAR $awayOverallLosses = $TeamSeasonStats_Baseball_Loss>


<IFEQUAL $Game_preview_GameStatStatus 0>
###query:{$Game_preview_query}<br>###
<h1>
{$Game_preview_AwayTeamName} at {$Game_preview_HomeTeamName}<br>
<ELSE>
<IFGREATER $Home_Runs $Away_Runs>
{$Home_TeamName} {$Home_Runs}, {$Away_TeamName} {$Away_Runs}
<ELSE>
{$Away_TeamName} {$Away_Runs}, 
{$Home_TeamName} {$Home_Runs}
</IFGREATER>
</IFEQUAL>


</h1>

<VAR $isBoxscore = true>
<VAR $gameHour = date("g",strtotime($Game_GameTime))>
<VAR $gameMinute = date("i",strtotime($Game_GameTime))>
<VAR $gameSecond = date("s",strtotime($Game_GameTime))>
<VAR $meridian = date("a",strtotime($Game_GameTime))>
<VAR $gameDay = date("l",strtotime($Game_GameDate))>
<VAR $gameMonth = date("M",strtotime($Game_GameDate))>
<VAR $gameDate = date("j",strtotime($Game_GameDate))>
<VAR $gameYear = date("Y",strtotime($Game_GameDate))>

<IFTRUE $meridian == "pm">
<VAR $meridian = "p.m.">
<ELSE>
<VAR $meridian = "a.m.">
</IFTRUE>

<IFEQUAL $Game_preview_GameTimeTBD 1>
<VAR $timeDateDisplay = date("l, F j, Y",strtotime($Game_GameDate))>
<h3 class="list">TBD  {$gameDay}, {$gameMonth} {$gameDate}, {$gameYear}</h3>
<ELSE>
<VAR $timeDateDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>
<h3 class="list"><h3>{$gameHour}:{$gameMinute} {$meridian} {$gameDay}, {$gameMonth} {$gameDate}, {$gameYear}</h3>
</IFEQUAL>


<VAR $Away_TeamName = $Game_preview_AwayTeamName>
<VAR $Home_TeamName = $Game_preview_HomeTeamName>

<table class="boxscoreStatTable deluxe" cellpadding="0" cellspacing="0">
         <tbody>
	<tr>
		<td><b><a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">{$Away_TeamName}</b></td>
		<td>Overall: {$awayOverallWins}-{$awayOverallLosses} </td>
		<td>Conference: {$awayConfWins}-{$awayConfLosses}</td>
	</tr>
	        <tr class="trAlt">
		<td><b><a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">{$Home_TeamName}</td>
		<td>Overall: {$homeOverallWins}-{$homeOverallLosses} </td>
		<td>Conference: {$homeConfWins}-{$homeConfLosses}</td>
	</tr>
    </tbody>
</table>

<ELSE>


<QUERY name=TeamSeasonStats_Baseball ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportYear>
<VAR $homeConfWins = $TeamSeasonStats_Baseball_Win>
<VAR $homeConfLosses = $TeamSeasonStats_Baseball_Loss>
<VAR $Home_TeamName = fixApostrophes($Home_TeamName)>
<VAR $Away_TeamName = fixApostrophes($Away_TeamName)>

###query:{$TeamSeasonStats_Baseball_query}###

###<VAR $TeamSeasonStats_Baseball_query = "">###
<VAR $statType = "conf">
<QUERY name=TeamSeasonStats_Baseball ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportYear>
<VAR $awayConfWins = $TeamSeasonStats_Baseball_Win>
<VAR $awayConfLosses = $TeamSeasonStats_Baseball_Loss>

###<VAR $TeamSeasonStats_Baseball_query = "">###
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats_Baseball ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportYear>
<VAR $homeOverallWins = $TeamSeasonStats_Baseball_Win>
<VAR $homeOverallLosses = $TeamSeasonStats_Baseball_Loss>

###<VAR $TeamSeasonStats_Baseball_query = "">###
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats_Baseball ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR = $sportYear>
<VAR $awayOverallWins = $TeamSeasonStats_Baseball_Win>
<VAR $awayOverallLosses = $TeamSeasonStats_Baseball_Loss>


<h1>
<IFGREATER $Home_Runs $Away_Runs>
{$Home_TeamName} {$Home_Runs}, {$Away_TeamName} {$Away_Runs}
<ELSE>
{$Away_TeamName} {$Away_Runs}, 
{$Home_TeamName} {$Home_Runs}
</IFGREATER>
</h1>

<VAR $dateTimeDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>

<h3 class="list">{$dateTimeDisplay}</h3>

<table class="boxscoreStatTable deluxe" cellpadding="0" cellspacing="0">
         <tbody>
	<tr>
		<td>{$Away_TeamName}</td>
		<td>Overall: {$awayOverallWins}-{$awayOverallLosses} </td>
		<td>Conference: {$awayConfWins}-{$awayConfLosses}</td>
	</tr>
	        <tr class="trAlt">
		<td>{$Home_TeamName}</td>
		<td>Overall: {$homeOverallWins}-{$homeOverallLosses} </td>
		<td>Conference: {$homeConfWins}-{$homeConfLosses}</td>
	</tr>
    </tbody>
</table>


<h4>Boxscore</h4>
<table class="boxscoreStatTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" align="center"><strong>1</strong></th>
            <th scope="col" abbr="" align="center"><strong>2</strong></th>
            <th scope="col" abbr="" align="center"><strong>3</strong></th>
            <th scope="col" abbr="" align="center"><strong>4</strong></th>
            <th scope="col" abbr="" align="center"><strong>5</strong></th>
            <th scope="col" abbr="" align="center"><strong>6</strong></th>
            <th scope="col" abbr="" align="center"><strong>7</strong></th>
<IFGREATER $Game_GameLength 7>
            <th scope="col" abbr="" align="center"><strong>8</strong></th>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 8>
            <th scope="col" abbr="" align="center"><strong>9</strong></th>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 9>
            <th scope="col" abbr="" align="center"><strong>10</strong></th>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 10>
            <th scope="col" abbr="" align="center"><strong>11</strong></th>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 11>
            <th scope="col" abbr="" align="center"><strong>12</strong></th>
<ELSE>
</IFGREATER>
            <th scope="col" abbr="" align="center"><strong>R</strong></th>
            <th scope="col" abbr="" align="center"><strong>H</strong></th>
            <th scope="col" abbr="" align="center"><strong>E</strong></th>
        </tr>
        <tr>
            <td>
<IFEMPTY $Away_Inning1>
<VAR $Away_Inning1 = "0">
</IFEMPTY>
<IFEMPTY $Away_Inning2>
<VAR $Away_Inning2 = "0">
</IFEMPTY>
<IFEMPTY $Away_Inning3>
<VAR $Away_Inning3 = "0">
</IFEMPTY>
<IFEMPTY $Away_Inning4>
<VAR $Away_Inning4 = "0">
</IFEMPTY>
<IFEMPTY $Away_Inning5>
<VAR $Away_Inning5 = "0">
</IFEMPTY>
<IFEMPTY $Away_Inning6>
<VAR $Away_Inning6 = "0">
</IFEMPTY>
<IFEMPTY $Away_Inning7>
<VAR $Away_Inning7 = "0">
</IFEMPTY>

<a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
<b>{$Away_TeamName}</b></a></td>
<td align="center">{$Away_Inning1}</td>
<td align="center">{$Away_Inning2}</td>
<td align="center">{$Away_Inning3}</td>
<td align="center">{$Away_Inning4}</td>
<td align="center">{$Away_Inning5}</td>
<td align="center">{$Away_Inning6}</td>
<td align="center">{$Away_Inning7}</td>
<IFGREATER $Game_GameLength 7>
<td align="center">{$Away_Inning8}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 8>
<td align="center">{$Away_Inning9}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 9>
<td align="center">{$Away_Inning10}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 10>
<td align="center">{$Away_Inning11}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 11>
<td align="center">{$Away_Inning12}</td>
<ELSE>
</IFGREATER>
<td align="center">{$Away_Runs}</td>
<td align="center">{$Away_Hits}</td>
<td align="center">{$Away_Errors}</td>
</tr>
	        <tr class="trAlt">
<td>

<IFEMPTY $Home_Inning1>
<VAR $Home_Inning1 = "0">
</IFEMPTY>
<IFEMPTY $Home_Inning2>
<VAR $Home_Inning2 = "0">
</IFEMPTY>
<IFEMPTY $Home_Inning3>
<VAR $Home_Inning3 = "0">
</IFEMPTY>
<IFEMPTY $Home_Inning4>
<VAR $Home_Inning4 = "0">
</IFEMPTY>
<IFEMPTY $Home_Inning5>
<VAR $Home_Inning5 = "0">
</IFEMPTY>
<IFEMPTY $Home_Inning6>
<VAR $Home_Inning6 = "0">
</IFEMPTY>
<IFEMPTY $Home_Inning7>
<VAR $Home_Inning7 = "0">
</IFEMPTY>





<a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
<b>{$Home_TeamName}</b></a></td>
<td align="center">{$Home_Inning1}</td>
<td align="center">{$Home_Inning2}</td>
<td align="center">{$Home_Inning3}</td>
<td align="center">{$Home_Inning4}</td>
<td align="center">{$Home_Inning5}</td>
<td align="center">{$Home_Inning6}</td>
<td align="center">{$Home_Inning7}</td>
<IFGREATER $Game_GameLength 7>
<td align="center">{$Home_Inning8}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 8>
<td align="center">{$Home_Inning9}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 9>
<td align="center">{$Home_Inning10}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 10>
<td align="center">{$Home_Inning11}</td>
<ELSE>
</IFGREATER>
<IFGREATER $Game_GameLength 11>
<td align="center">{$Home_Inning12}</td>
<ELSE>
</IFGREATER>
<td align="center">{$Home_Runs}</td>
<td align="center">{$Home_Hits}</td>
<td align="center">{$Home_Errors}</td></tr>
  </tbody>
</table>
</tr>
<br /><br />

<VAR $teamIDs = array($awayTeamID,$homeTeamID)>
<VAR $teamNames = array($Away_TeamName,$Home_TeamName)>

<?PHP foreach($teamIDs as $teamKey => $teamID) { ?>
<h3>{$teamNames[$teamKey]} Boxscore</h3>

<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$teamID SPORTNAME=$sqlSportName>
<IFGREATER count($GamePlayerStats_rows) 0>
<VAR $GamePlayerStats_rows = sortResults($GamePlayerStats_rows,"BattingOrder")>
<h4>Offense</h4>
<table class="boxscoreStatTable deluxe" CELLPADDING=0 CELLSPACING=0>
    <tbody>
        <tr id="header-sub" class="resultsText">
<th width="120"><b>Name</td>
<th align="center"><b>AB</td>
<th align="center"><b>R</td>
<th align="center" onmouseover="highlightKey('keyHits')" onmouseout = "unHighlightKey('keyHits')"><b>H</th>
<th align="center" onmouseover="highlightKey('keyDoubles')" onmouseout = "unHighlightKey('keyDoubles')"><b>2B</th>
<th align="center" onmouseover="highlightKey('keyTriples')" onmouseout = "unHighlightKey('keyTriples')"><b>3B</th>
<th align="center" onmouseover="highlightKey('keyHomeRuns')" onmouseout = "unHighlightKey('keyHomeRuns')"><b>HR</th>
<th align="center" onmouseover="highlightKey('keyRunsBattedIn')" onmouseout = "unHighlightKey('keyRunsBattedIn')"><b>RBI</th>
<th align="center" onmouseover="highlightKey('keyBattingAverage')" onmouseout = "unHighlightKey('keyBattingAverage')"><b>AVG</th>
<th align="center" onmouseover="highlightKey('keySluggingPercentage')" onmouseout = "unHighlightKey('keySluggingPercentage')"><b>SLPCT</th>
<th align="center" onmouseover="highlightKey('keyStrikeouts')" onmouseout = "unHighlightKey('keyStrikeouts')"><b>K</th>
<th align="center" onmouseover="highlightKey('keyWalks')" onmouseout = "unHighlightKey('keyWalks')"><b>BB</th>
<th align="center"><B>HBP</th>
<th align="center" onmouseover="highlightKey('keyStolenBases')" onmouseout = "unHighlightKey('keyStolenBases')"><b>SB</th>
<th align="center"><B>CS</th>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Offense>

<tr class="{$rowClass}">
<td width="120">
<VAR $playerName = fixApostrophes($Offense_PlayerFirstName." ".$Offense_PlayerLastName)>
<a href="{$domainURL}/players/<?PHP echo slugify($playerName); ?>/{$Offense_PlayerID}/">
{$playerName}
</a>
</td>
<td align="center">{$Offense_AtBats}</td>
<td align="center">{$Offense_Runs}</td>
<td align="center">{$Offense_Hits}</td>
<td align="center">{$Offense_Doubles}</td>
<td align="center">{$Offense_Triples}</td>
<td align="center">{$Offense_HomeRuns}</td>
<td align="center">{$Offense_RunsBattedIn}</td>
<VAR $compPct = trailingZeroes(round($Offense_BattingAverage,3),3,true)>
<td align="center">{$compPct}</td>
<VAR $compPct = trailingZeroes(round($Offense_SluggingPercentage,3),3,true)>
<td align="center">{$compPct}</td>
<td align="center">{$Offense_Strikeouts}</td>
<td align="center">{$Offense_Walks}</td>
<td align="center">{$Offense_HitByPitch}</td>
<td align="center">{$Offense_StolenBases}</td>
<td align="center">{$Offense_CaughtStealing}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
<tr class="{$rowClass}">
<td width="120">
<b>Total</b>
</td>
<IFEQUAL $teamID $awayTeamID>
<td align="center">{$Away_AtBats}</td>
<td align="center">{$Away_TotalRuns}</td>
<td align="center">{$Away_TotalHits}</td>
<td align="center">{$Away_Doubles}</td>
<td align="center">{$Away_Triples}</td>
<td align="center">{$Away_HomeRuns}</td>
<td align="center">{$Away_RunsBattedIn}</td>
<VAR $compPct = trailingZeroes(round($Away_BattingAverage,3),3,true)>
<td align="center">{$compPct}</td>
<VAR $compPct = trailingZeroes(round($Away_SluggingPercentage,3),3,true)>
<td align="center">{$compPct}</td>
<td align="center">{$Away_Strikeouts}</td>
<td align="center">{$Away_Walks}</td>
<td align="center">{$Away_HitByPitch}</td>
<td align="center">{$Away_StolenBases}</td>
<td align="center">{$Away_CaughtStealing}</td>
<ELSE>
<td align="center">{$Home_AtBats}</td>
<td align="center">{$Home_TotalRuns}</td>
<td align="center">{$Home_TotalHits}</td>
<td align="center">{$Home_Doubles}</td>
<td align="center">{$Home_Triples}</td>
<td align="center">{$Home_HomeRuns}</td>
<td align="center">{$Home_RunsBattedIn}</td>
<VAR $compPct = trailingZeroes(round($Home_BattingAverage,3),3,true)>
<td align="center">{$compPct}</td>
<VAR $compPct = trailingZeroes(round($Home_SluggingPercentage,3),3,true)>
<td align="center">{$compPct}</td>
<td align="center">{$Home_Strikeouts}</td>
<td align="center">{$Home_Walks}</td>
<td align="center">{$Home_HitByPitch}</td>
<td align="center">{$Home_StolenBases}</td>
<td align="center">{$Home_CaughtStealing}</td>
</IFEQUAL>
</tr>
</table>

<h4>Pitching</h4>
<table class="boxscoreStatTable deluxe wide400" CELLPADDING=0 CELLSPACING=0>
    <tbody>
        <tr id="header-sub" class="resultsText">
<th width="120"><b>Name</th>
<th align="center"><b>IP</th>
<th align="center"><b>R</th>
<th align="center"><b>ER</th>
<th align="center" onmouseover="highlightKey('keyEarnedRunAverage')" onmouseout = "unHighlightKey('keyEarnedRunAverage')"><b>ERA</th>
<th align="center"><b>H</th>
<th align="center"><b>K</th>
<th align="center"><b>BB</th>
<th align="center"><b>HPB</th>
<th align="center"><b>WP</th>
<th align="center"><b>HR</th>
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
<a href="{$domainURL}/players/<?PHP echo slugify($playerName); ?>/{$Pitching_PlayerID}/">
{$playerName}
</a>
<IFEQUAL $Pitching_Win 1> (W) </IFEQUAL>
<IFEQUAL $Pitching_Loss 1> (L) </IFEQUAL>
<IFEQUAL $Pitching_Save 1> (S) </IFEQUAL>
</td>


<td align="center">{$Pitching_InningsPitchedEntered}</td>

<td align="center">{$Pitching_RunsAllowed}</td>
<td align="center">{$Pitching_EarnedRuns}</td>
<VAR $compVal = trailingZeroes(round($Pitching_EarnedRunAverage,2),2,true)>
<td align="center">{$compVal}</td>
<td align="center">{$Pitching_HitsAllowed}</td>
<td align="center">{$Pitching_StrikeoutsPitched}</td>
<td align="center">{$Pitching_WalksAllowed}</td>
<td align="center">{$Pitching_HitByPitchAllowed}</td>
<td align="center">{$Pitching_WildPitch}</td>
###<td align="center">{$Pitching_SaveOpportunity}</td>###
<td align="center">{$Pitching_HomeRunsAllowed}</td>
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
<VAR $whole_Innings = (round($Away_InningsPitched - .5))>
<VAR $partial_Innings = ($Away_InningsPitched - $whole_Innings)>
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
<IFEQUAL $Away_InningsPitched 0>
<VAR $ip = "0">
<ELSE>
</IFEQUAL> 

<td align="center">{$ip}</td>
<td align="center">{$Away_RunsAllowed}</td>
<td align="center">{$Away_EarnedRuns}</td>
<VAR $compVal = trailingZeroes(round($Away_EarnedRunAverage,2),2,true)>
<td align="center">{$compVal}</td>
<td align="center">{$Away_HitsAllowed}</td>
<td align="center">{$Away_StrikeoutsPitched}</td>
<td align="center">{$Away_WalksAllowed}</td>
<td align="center">{$Away_HitByPitchAllowed}</td>
<td align="center">{$Away_WildPitch}</td>
###<td align="center">{$Away_SaveOpportunity}</td>###
<td align="center">{$Away_HomeRunsAllowed}</td>

<ELSE>
<VAR $whole_Innings = (round($Home_InningsPitched - .5))>
<VAR $partial_Innings = ($Home_InningsPitched - $whole_Innings)>
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
<IFEQUAL $Home_InningsPitched 0>
<VAR $ip = "0">
<ELSE>
</IFEQUAL> 

<td align="center">{$ip}</td>
<td align="center">{$Home_RunsAllowed}</td>
<td align="center">{$Home_EarnedRuns}</td>
<VAR $compVal = trailingZeroes(round($Home_EarnedRunAverage,2),2,true)>
<td align="center">{$compVal}</td>
<td align="center">{$Home_HitsAllowed}</td>
<td align="center">{$Home_StrikeoutsPitched}</td>
<td align="center">{$Home_WalksAllowed}</td>
<td align="center">{$Home_HitByPitchAllowed}</td>
<td align="center">{$Home_WildPitch}</td>
<td align="center">{$Home_HomeRunsAllowed}</td>
</IFEQUAL>
        </tr>
    </tbody>
</table>



<h4>Fielding</h4>
<table class="boxscoreStatTable deluxe wide400" CELLPADDING=0 CELLSPACING=0>
    <tbody>
        <tr id="header-sub" class="resultsText">
<th width="120">Name</th>
<th align="center">TC</th>
<th align="center">TPO</th>
<th align="center">A</th>
<th align="center">E</th>
<th align="center">DP</th>
<th align="center" onmouseover="highlightKey('keyFieldingPercentage')" onmouseout = "unHighlightKey('keyFieldingPercentage')">FLPCT</th>
<th align="center">PB</th>
<th align="center">SB</th>
<th align="center">CS</th>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Fielding>
<IFGREATER $Fielding_TotalChances 0>
<tr class="{$rowClass}">
<td width="120">
<VAR $playerName = fixApostrophes($Fielding_PlayerFirstName." ".$Fielding_PlayerLastName)>
<a href="{$domainURL}/players/<?PHP echo slugify($playerName); ?>/{$Fielding_PlayerID}/">
{$playerName}
</a>
</td>
<td align="center">{$Fielding_TotalChances}</td>
<td align="center">{$Fielding_TotalPutouts}</td>
<td align="center">{$Fielding_Assists}</td>
<td align="center">{$Fielding_Errors}</td>
<td align="center">{$Fielding_DoublePlays}</td>
<VAR $compVal = trailingZeroes(round($Fielding_FieldPercentage,3),3,true)>
<td align="center">{$compVal}</td>
<td align="center">{$Fielding_PassedBalls}</td>
<td align="center">{$Fielding_StolenBasesAgainst}</td>
<td align="center">{$Fielding_CaughtStealingRunners}</td>
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
<td align="center">{$Away_TotalChances}</td>
<td align="center">{$Away_TotalPutouts}</td>
<td align="center">{$Away_Assists}</td>
<td align="center">{$Away_ErrorsAllowed}</td>
<td align="center">{$Away_DoublePlays}</td>
<VAR $compVal = trailingZeroes(round($Away_FieldPercentage,3),3,true)>
<td align="center">{$compVal}</td>
<td align="center">{$Away_PassedBalls}</td>
<td align="center">{$Away_StolenBasesAgainst}</td>
<td align="center">{$Away_CaughtStealingRunners}</td>
<ELSE>
<td align="center">{$Home_TotalChances}</td>
<td align="center">{$Home_TotalPutouts}</td>
<td align="center">{$Home_Assists}</td>
<td align="center">{$Home_ErrorsAllowed}</td>
<td align="center">{$Home_DoublePlays}</td>
<VAR $compVal = trailingZeroes(round($Home_FieldPercentage,3),3,true)>
<td align="center">{$compVal}</td>
<td align="center">{$Home_PassedBalls}</td>
<td align="center">{$Home_StolenBasesAgainst}</td>
<td align="center">{$Home_CaughtStealingRunners}</td>
</IFEQUAL>
</tr>
</table>
###</div>###
<br />
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

###</IFEQUAL>###
