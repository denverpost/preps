<VAR $domainURL = "http://preps.denverpost.com">
<VAR $seasonYear = "2017"> ###YEARCHECK###


<QUERY name=Game_preview GAMEID=$form_ID>
<VAR $Home_TeamID = $Game_preview_GameHomeTeamID>
<VAR $Away_TeamID = $Game_preview_GameAwayTeamID>


<QUERY name=TeamInfo TEAMID=$Home_TeamID>
<VAR $Home_ConferenceID = $TeamInfo_TeamConferenceID>
<VAR $Home_SportID = $TeamInfo_TeamSportID>
###Query: {$TeamInfo_query}###
###HOMECONF: {$TeamInfo_TeamConferenceID}###

<QUERY name=TeamInfo TEAMID=$Away_TeamID>
<VAR $Away_ConferenceID = $TeamInfo_TeamConferenceID>
<VAR $Away_SportID = $TeamInfo_TeamSportID>
###AWAY: {$TeamInfo_TeamConferenceID}###

<VAR $statType = "conf">
<VAR $dash = chr(151)>

<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR=$seasonYear>
###Query: {$TeamSeasonStats_query}###
<VAR $homeConfWins = $TeamSeasonStats_Win>
<VAR $homeConfLosses = $TeamSeasonStats_Loss>
<VAR $homeConfTies = $TeamSeasonStats_Tie>

<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR=$seasonYear>
###Query: {$TeamSeasonStats_query}###
<VAR $awayConfWins = $TeamSeasonStats_Win>
<VAR $awayConfLosses = $TeamSeasonStats_Loss>
<VAR $awayConfTies = $TeamSeasonStats_Tie>


<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR=$seasonYear>
### Query: {$TeamSeasonStats_query}###
<VAR $homeOverallWins = $TeamSeasonStats_Win>
<VAR $homeOverallLosses = $TeamSeasonStats_Loss>
<VAR $homeOverallTies = $TeamSeasonStats_Tie>



<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR=$seasonYear>
### Query: {$TeamSeasonStats_query}###
<VAR $awayOverallWins = $TeamSeasonStats_Win>
<VAR $awayOverallLosses = $TeamSeasonStats_Loss>
<VAR $awayOverallTies = $TeamSeasonStats_Tie>

<IFTRUE $Game_preview_GameStatStatus == 0 || $Game_preview_GameStatStatus == 1>
<h1>
{$Game_preview_AwayTeamName} at {$Game_preview_HomeTeamName}<br>
<ELSE>
<h1>
			<IFGREATER $Home_TotalGoals $Away_TotalGoals>
				{$Home_TeamName} {$Home_TotalGoals}, {$Away_TeamName} {$Away_TotalGoals}
			<ELSE>
				{$Away_TeamName} {$Away_TotalGoals}, {$Home_TeamName} {$Home_TotalGoals}
			</IFGREATER>
</IFTRUE>
</h1>


<VAR $isBoxscore = true>
<VAR $gameHour = date("g",strtotime($Game_GameTime))>
<VAR $gameMinute = date("i",strtotime($Game_GameTime))>
<VAR $gameSecond = date("s",strtotime($Game_GameTime))>
<VAR $meridian = date("a",strtotime($Game_GameTime))>
<VAR $gameDay = date("l",strtotime($Game_GameDate))>
<VAR $gameMonth = date("F",strtotime($Game_GameDate))>
<VAR $gameDate = date("j",strtotime($Game_GameDate))>
<VAR $gameYear = date("Y",strtotime($Game_GameDate))>

<IFTRUE $meridian == "pm">
<VAR $meridian = "p.m.">
<ELSE>
<VAR $meridian = "a.m.">
</IFTRUE>


<IFEQUAL $Game_preview_GameTimeTBD 1>
<VAR $timeDateDisplay = date("l, F j, Y",strtotime($Game_GameDate))>
<h3 class="list">TBD, {$gameDay}, {$gameMonth} {$gameDate} {$gameYear}###{$timeDateDisplay}###</h3>
<ELSE>
###<VAR $timeDateDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>###
<h3 class="list">{$gameHour}:{$gameMinute} {$meridian} {$gameDay}, {$gameMonth} {$gameDate}, {$gameYear}</h3>
</IFEQUAL>

<IFTRUE $Game_preview_GameStatStatus == 0 || $Game_preview_GameStatStatus == 1>
<VAR $Away_TeamName = $Game_preview_AwayTeamName>
<VAR $Home_TeamName = $Game_preview_HomeTeamName>
<ELSE>
</IFTRUE>



<table class="boxscoreStatTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td> <a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}"><b>{$Away_TeamName}</b></td>
            <td>Overall: {$awayOverallWins}-{$awayOverallLosses}-{$awayOverallTies} </td>

            <td><a href="{$externalURL}site=default&tpl=Conference&Sport={$Away_SportID}&ConferenceID={$Away_ConferenceID}#standings"><b>Conference:</b></a> {$awayConfWins}-{$awayConfLosses}-{$awayConfTies}</td>
        </tr>
        <tr class="trAlt">
            <td> <a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}"><b>{$Home_TeamName}</b></td>
            <td>Overall: {$homeOverallWins}-{$homeOverallLosses}-{$homeOverallTies} </td>

            <td><a href="{$externalURL}site=default&tpl=Conference&Sport={$Home_SportID}&ConferenceID={$Home_ConferenceID}#standings"><b>Conference:</b></a> 
{$homeConfWins}-{$homeConfLosses}-{$homeConfTies}</td>
        </tr>
    </tbody>
</table>
<IFTRUE $Game_preview_GameStatStatus == 0 || $Game_preview_GameStatStatus == 1>
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR =  $seasonYear>
<h3>Team Stats </h3>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide450">
<tbody>
<tr id="header-sub" class="resultsText">
<th scope="col" abbr="" align="left">Team</th>
<th scope="col" abbr="" align="center">Goals</th>
<th scope="col" abbr="" align="center">Assists</th>
<th scope="col" abbr=""  align="center">Goals allowed</th>
<th scope="col" abbr="" align="center">Saves</th>
</tr>
<tr>
<td align="left">{$Away_TeamName}</td> 
<td align="center">{$TeamSeasonStats_TotalGoals}</td>
<td align="center">{$TeamSeasonStats_TotalAssists}</td>
<td align="center">{$TeamSeasonStats_GoalsAllowed}</td>
<td align="center">{$TeamSeasonStats_Saves}</td>
</td>
</tr>
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR =  $seasonYear>
<tr class="trAlt">
<td align="left">{$Home_TeamName}</td> 
<td align="center">{$TeamSeasonStats_TotalGoals}</td>
<td align="center">{$TeamSeasonStats_Assists}</td>
<td align="center">{$TeamSeasonStats_GoalsAllowed}</td>
<td align="center">{$TeamSeasonStats_Saves}</td>
</td>
</tr>
</tbody>
</table>

<ELSE>
<h4>Boxscore</h4>
<table class="boxscoreStatTable deluxe wide300" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" td align="center">1</th>
            <th scope="col" abbr="" td align="center">2</th>
		<IFNOTEQUAL $Away_Overtime1Goals 0>
			<th scope="col" abbr="" align="center">OT</th>
		<ELSE>
			<IFNOTEQUAL $Home_Overtime1Goals 0>
			<th scope="col" abbr="" align="center">OT</th>
			</IFNOTEQUAL>	
		</IFNOTEQUAL>
		
		
		<IFNOTEQUAL $Away_Overtime2Goals 0>
						<th scope="col" abbr="" align="center">OT</th>
<th scope="col" abbr="" align="center">OT2</th>
		<ELSE>
			<IFNOTEQUAL $Home_Overtime2Goals 0>
						<th scope="col" abbr="" align="center">OT</th>
<th scope="col" abbr="" align="center">OT2</th>
			</IFNOTEQUAL>	
		</IFNOTEQUAL>
		
		<IFTRUE $Away_ShootoutWin != 0 || $Home_ShootoutWin != 0>
			<th scope="col" abbr="" td>Shootout</th>
###		<ELSE>###
###			<IFNOTEQUAL $Home_ShootoutWin 0>###
###			<th scope="col" abbr="">Shootout</th>###
###			</IFNOTEQUAL>###
		</IFTRUE>

            <th scope="col" abbr="" td align="center">Total</th>
        </tr>
        <tr>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">{$Away_TeamName}</a>
            </td>
            <td align="center">{$Away_FirstHalfGoals}</td>
            <td align="center">{$Away_SecondHalfGoals}</td>
		
		<IFNOTEQUAL $Away_Overtime1Goals 0>
			<td align="center">{$Away_Overtime1Goals}</td>
			<ELSE>
				<IFNOTEQUAL $Home_Overtime1Goals 0>
					<td align="center">0</td>
				</IFNOTEQUAL>
		</IFNOTEQUAL>	
		<IFNOTEQUAL $Away_Overtime2Goals 0>
			<td align="center">{$Away_Overtime1Goals}</td>
			<td align="center">{$Away_Overtime2Goals}</td>
			<ELSE>
				<IFNOTEQUAL $Home_Overtime2Goals 0>
			<td align="center">{$Away_Overtime1Goals}</td>
			<td align="center">{$Away_Overtime2Goals}</td>
				</IFNOTEQUAL>
		</IFNOTEQUAL>

                <IFTRUE $Away_ShootoutWin !=0 || $Home_ShootoutWin !=0>
          		<IFTRUE $Away_ShootoutWin != 0>
	         		<td align="center">Yes</td>
		        	<ELSE>
					<td align="center"> </td>
        		</IFTRUE>
		</IFTRUE>
		
            <td align="center">{$Away_TotalGoals}</td>
        </tr>
     	        <tr class="trAlt">
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">{$Home_TeamName}</a>
            </td>
            <td align="center">{$Home_FirstHalfGoals}</td>
            <td align="center">{$Home_SecondHalfGoals}</td>
		
		<IFNOTEQUAL $Home_Overtime1Goals 0>
			<td align="center">{$Home_Overtime1Goals}</td>
			<ELSE>
				<IFNOTEQUAL $Away_Overtime1Goals 0>
					<td align="center">0</td>
				</IFNOTEQUAL>
		</IFNOTEQUAL>	
		<IFNOTEQUAL $Home_Overtime2Goals 0>
						<td align="center">{$Home_Overtime1Goals}</td>
                                                <td align="center">{$Home_Overtime2Goals}</td>
			<ELSE>
				<IFNOTEQUAL $Away_Overtime2Goals 0>
						<td align="center">{$Home_Overtime1Goals}</td>
						<td align="center">{$Home_Overtime2Goals}</td>
				</IFNOTEQUAL>
		</IFNOTEQUAL>
                <IFTRUE $Away_ShootoutWin !=0 || $Home_ShootoutWin !=0>
          		<IFTRUE $Home_ShootoutWin != 0>
	         		<td>Yes</td>
		        	<ELSE>
					<td>Ãƒâ€š </td>
        		</IFTRUE>
		</IFTRUE>
		
            <td align="center">{$Home_TotalGoals}</td>
        </tr>
    </tbody>
</table>

<QUERY name=GameScoringSummarySoccer GAMEID=$form_ID SPORTNAME=$sqlSportName>
<VAR $rowClass = "boxscoreRow">
<VAR $rowCount = count($GameScoringSummarySoccer_rows)>
<IFGREATER $rowCount 0>
<h4>Scoring summary</h4>
<table class="boxscoreStatTable deluxe" cellpadding="0" cellspacing="0">
	<RESULTS list=GameScoringSummarySoccer_rows prefix=Summary>
		<tr class="{$rowClass}">
			<td valign=top>
<IFTRUE $Summary_SummaryHalf == 1>	
<VAR $sumHalf = "1st">
<ELSE>
<IFTRUE $Summary_SummaryHalf == 2>	
<var $sumHalf = "2nd">
<ELSE>
<var $sumHalf = "OT">
###</IFTRUE>###
</IFTRUE>
</IFTRUE>

			<b>{$sumHalf}:</b> {$Summary_TeamCode} {$dash}  
				<VAR $sum1firstName = fixApostrophes($Summary_SummaryPlayerFirstName)>
				<VAR $sum1lastName = fixApostrophes($Summary_SummaryPlayerLastName)>
				<VAR $sum2firstName = fixApostrophes($Summary_SummaryPlayerAssist1FirstName)>
				<VAR $sum2lastName = fixApostrophes($Summary_SummaryPlayerAssist1LastName)>
				<VAR $sum3firstName = fixApostrophes($Summary_SummaryPlayerAssist2FirstName)>
				<VAR $sum3lastName = fixApostrophes($Summary_SummaryPlayerAssist2LastName)>
				
				<IFNOTEMPTY $Summary_SummaryPlayType> 
<b>{$Summary_SummaryPlayType}</b></IFNOTEMPTY>:

				<IFNOTEMPTY $sum1firstName>
					{$sum1firstName} {$sum1lastName}<IFNOTEMPTY $Summary_SummaryTime>({$Summary_SummaryTime})</IFNOTEMPTY>.
				</IFNOTEMPTY>
	
				<IFNOTEMPTY $sum2firstName>
					<IFNOTEMPTY $sum3firstName> 
						<b><i> Assists: </b> {$sum2firstName} {$sum2lastName} and {$sum3firstName} {$sum3lastName}</i>
					<ELSE>
						<b><i>Assist: </b>{$sum2firstName} {$sum2lastName}
					</IFNOTEMPTY> 
				</IFNOTEMPTY> 	 
			</td>
		</tr>
	
		<IFEQUAL $rowClass "boxscoreRow">
			<VAR $rowClass = "boxscoreRowAlternate"> 
		<ELSE>
			<VAR $rowClass = "boxscoreRow"> 
		</IFEQUAL> 
		
	</RESULTS> 
</table>
</IFGREATER>



###</IFTRUE>###
<h3>{$Away_TeamName} boxscore</h3>

###<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$Away_TeamID SPORTNAME=$sqlSportName SORT=Points>
<RESULTS list=GamePlayerStats_rows prefix=AwayStats>
<IFGREATER count($GamePlayerStats_rows) 0>###

<h4>Scoring</h4>

<table class="boxscoreStatTable deluxe" CELLPADDING=0 CELLSPACING=0>
    <tbody>
	<tr id="header-sub" class="resultsText">
<th scope="col" abbr="">Name</th>
<th scope="col" abbr="" td align="center">Goals</th>
<th scope="col" abbr="" td align="center">Assists</th>
<th scope="col" abbr="" td align="center">Points</th>
</td>
</tr>

<VAR $rowClass = "boxscoreRow trRow">
<tr class="{$rowClass}">

<QUERY name=GamePlayerStatsSoccer GAMEID=$form_ID TEAMID=$Away_TeamID SPORTNAME=$sqlSportName>
<RESULTS list=GamePlayerStatsSoccer_rows prefix=AwayStats>
<IFGREATER count($GamePlayerStatsSoccer_rows) 0>
<IFGREATER $AwayStats_Points 0>
<tr class="{$rowClass}">
<td width="120">
<VAR $playerName = fixApostrophes($AwayStats_PlayerFirstName." ".$AwayStats_PlayerLastName)>
<?PHP
$player_slug = slugify($playerName);
?>
<a href="{$domainURL}/players/{$player_slug}/{$AwayStats_PlayerID}/">
{$playerName}</a>
</td>
<td align="center">{$AwayStats_Goals}</td>
<td align="center">{$AwayStats_Assists}</td>
<td align="center">{$AwayStats_Points}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</IFGREATER>
</RESULTS>
<tr class="{$rowClass}">
<td width="120">
<b>Total</b>
</td>
<td align="center">{$Away_Goals}</td>
<td align="center">{$Away_Assists}</td>
<td align="center">{$Away_Points}</td>
</tr>
</tbody>
</table>

<h4>Goalkeeping</h4>
<table class="boxscoreStatTable deluxe" CELLPADDING=0 CELLSPACING=0>
    <tbody>
	<tr id="header-sub" class="resultsText">
<th scope="col" abbr="">Name</th>
<th scope="col" abbr="" td align="center">Minutes</th>
<th scope="col" abbr="" td align="center">Goals</th>
<th scope="col" abbr="" td align="center">Saves</th>
<th scope="col" abbr="" td align="center">SOG</th>
<th scope="col" abbr="" td align="center">Save %</th>
<VAR $rowClass = "boxscoreRow trRow">
<tr class="{$rowClass}">

<QUERY name=GamePlayerStatsSoccer GAMEID=$form_ID TEAMID=$Away_TeamID SPORTNAME=$sqlSportName>
<RESULTS list=GamePlayerStatsSoccer_rows prefix=AwayStats>
<IFGREATER count($GamePlayerStatsSoccer_rows) 0>
<IFGREATER $AwayStats_GoalkeeperMinutes 0>
<tr class="{$rowClass}">
<td width="120">
<VAR $playerName = fixApostrophes($AwayStats_PlayerFirstName." ".$AwayStats_PlayerLastName)>
<?PHP
$player_slug = slugify($playerName);
?>
<a href="{$domainURL}/players/{$player_slug}/{$AwayStats_PlayerID}/">
{$playerName}</a>
<IFEQUAL $AwayStats_GoalieWin 1>
(W)</td>
</IFEQUAL>
<IFEQUAL $AwayStats_GoalieLoss 1>
(L)</td>
</IFEQUAL>
<IFEQUAL $AwayStats_GoalieTie 1>
(T)</td>
</IFEQUAL>
<td align="center">{$AwayStats_GoalkeeperMinutes}</td>
<td align="center">{$AwayStats_GoalsAllowed}</td>
<td align="center">{$AwayStats_Saves}</td>
<td align="center">{$AwayStats_ShotsOnGoal}</td>
<?php
if( 1.0 == $AwayStats_SavePercentage ) {
  $svPct = "1.000";
} else {
  $svPct = substr( sprintf( "%05.3f", $AwayStats_SavePercentage), 1 );
}
?>
<td align="center">{$svPct}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</IFGREATER>
</RESULTS>
<tr class="{$rowClass}">
<td width="120">
<b>Total</b>
</td>
<td align="center"></td>
<td align="center">{$Away_GoalsAllowed}</td>
<td align="center">{$Away_Saves}</td>
<td align="center">{$Away_ShotsOnGoal}</td>
<?php
if( 1.0 == $Away_SavePercentage ) {
  $svPct = "1.000";
} else {
  $svPct = substr( sprintf( "%05.3f", $Away_SavePercentage), 1 );
}
?>
<td align="center">{$svPct}</td>
</tr>
</tbody>
</table>

<h3>{$Home_TeamName} boxscore</h3>
<h4>Scoring</h4>
<table class="boxscoreStatTable deluxe" CELLPADDING=0 CELLSPACING=0>
    <tbody>
	<tr id="header-sub" class="resultsText">
<th scope="col" abbr="">Name</th>
<th scope="col" abbr="" td align="center">Goals</th>
<th scope="col" abbr="" td align="center">Assists</th>
<th scope="col" abbr="" td align="center">Points</th>
<VAR $rowClass = "boxscoreRow trRow">
<tr class="{$rowClass}">

<QUERY name=GamePlayerStatsSoccer GAMEID=$form_ID TEAMID=$Home_TeamID SPORTNAME=$sqlSportName SORT=Points>
<RESULTS list=GamePlayerStatsSoccer_rows prefix=HomeStats>
<IFGREATER count($GamePlayerStatsSoccer_rows) 0>
<IFGREATER $HomeStats_Points 0>
<tr class="{$rowClass}">
<td width="120">
<VAR $playerName = fixApostrophes($HomeStats_PlayerFirstName." ".$HomeStats_PlayerLastName)>
<?PHP
$player_slug = slugify($playerName);
?>
<a href="{$domainURL}/players/{$player_slug}/{$HomeStats_PlayerID}/">
{$playerName}</a>
</td>
<td align="center">{$HomeStats_Goals}</td>
<td align="center">{$HomeStats_Assists}</td>
<td align="center">{$HomeStats_Points}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</IFGREATER>
</RESULTS>
<tr class="{$rowClass}">
<td width="120">
<b>Total</b>
</td>
<td align="center">{$Home_Goals}</td>
<td align="center">{$Home_Assists}</td>
<td align="center">{$Home_Points}</td>
</tr>


</tbody>
</table>


<h4>Goalkeeping</h4>
<table class="boxscoreStatTable deluxe" CELLPADDING=0 CELLSPACING=0>
    <tbody>
	<tr id="header-sub" class="resultsText">
<th scope="col" abbr="">Name</th>
<th scope="col" abbr="" td align="center">Minutes</th>
<th scope="col" abbr="" td align="center">Goals</th>
<th scope="col" abbr="" td align="center">Saves</th>
<th scope="col" abbr="" td align="center">SOG</th>
<th scope="col" abbr="" td align="center">Save %</th>
<VAR $rowClass = "boxscoreRow trRow">
<tr class="{$rowClass}">

<QUERY name=GamePlayerStatsSoccer GAMEID=$form_ID TEAMID=$Home_TeamID SPORTNAME=$sqlSportName>
<RESULTS list=GamePlayerStatsSoccer_rows prefix=HomeStats>
<IFGREATER count($GamePlayerStatsSoccer_rows) 0>
<IFGREATER $HomeStats_GoalkeeperMinutes 0>
<tr class="{$rowClass}">
<td width="120">
<VAR $playerName = fixApostrophes($HomeStats_PlayerFirstName." ".$HomeStats_PlayerLastName)>
<?PHP
$player_slug = slugify($playerName);
?>
<a href="{$domainURL}/players/{$player_slug}/{$HomeStats_PlayerID}/">
{$playerName}</a>
<IFEQUAL $HomeStats_GoalieWin 1>
(W)</td>
</IFEQUAL>
<IFEQUAL $HomeStats_GoalieLoss 1>
(L)</td>
</IFEQUAL>
<IFEQUAL $HomeStats_GoalieTie 1>
(T)</td>
</IFEQUAL>


</td>
<td align="center">{$HomeStats_GoalkeeperMinutes}</td>
<td align="center">{$HomeStats_GoalsAllowed}</td>
<td align="center">{$HomeStats_Saves}</td>
<td align="center">{$HomeStats_ShotsOnGoal}</td>
<?php
if( 1.0 == $HomeStats_SavePercentage ) {
  $svPct = "1.000";
} else {
  $svPct = substr( sprintf( "%05.3f", $HomeStats_SavePercentage), 1 );
}
?>
<td align="center">{$svPct}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</IFGREATER>
</RESULTS>
<tr class="{$rowClass}">
<td width="120">
<b>Total</b>
</td>
<td align="center"></td>
<td align="center">{$Home_GoalsAllowed}</td>
<td align="center">{$Home_Saves}</td>
<td align="center">{$Home_ShotsOnGoal}</td>
<?php
if( 1.0 == $Home_SavePercentage ) {
  $svPct = "1.000";
} else {
  $svPct = substr( sprintf( "%05.3f", $Home_SavePercentage), 1 );
}
?>
<td align="center">{$svPct}</td>
</tr>



</tbody>
</table>
</IFTRUE>
