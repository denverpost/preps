<VAR $domainURL = "http://preps.denverpost.com">
<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $homeConfWins = $TeamSeasonStats_Win>
<VAR $homeConfLosses = $TeamSeasonStats_Loss>
<VAR $Home_TeamName = fixApostrophes($Home_TeamName)>
<VAR $Away_TeamName = fixApostrophes($Away_TeamName)>

<VAR $TeamSeasonStats_query = "">
<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $awayConfWins = $TeamSeasonStats_Win>
<VAR $awayConfLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $homeOverallWins = $TeamSeasonStats_Win>
<VAR $homeOverallLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $awayOverallWins = $TeamSeasonStats_Win>
<VAR $awayOverallLosses = $TeamSeasonStats_Loss>

<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr><td colspan="3" class="pageTitle">Result</td></tr>
<tr><td colspan="3">
<IFGREATER $Home_TotalPoints $Away_TotalPoints>
{$Home_TeamName} {$Home_TotalPoints}, {$Away_TeamName} {$Away_TotalPoints}
<ELSE>
{$Away_TeamName} {$Away_TotalPoints}, {$Home_TeamName} {$Home_TotalPoints}
</IFGREATER>
 - <b><IFEQUAL $Game_GameScoreIsFinal 1>
Final
<ELSE>
In progress
</IFEQUAL></b>
<br /><br />
</td></tr>
<tr><td>{$Away_TeamName}</td>
<td><b>Overall:</b> {$awayOverallWins}-{$awayOverallLosses} </td>
<td><b>Conference:</b> {$awayConfWins}-{$awayConfLosses}</td></tr>
<tr><td>{$Home_TeamName}</td>
<td><b>Overall:</b> {$homeOverallWins}-{$homeOverallLosses} </td>
<td><b>Conference:</b> {$homeConfWins}-{$homeConfLosses}</td></tr>
</table>

<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr><td colspan="50" class="pageTitle">Boxscore</td></tr>
<tr><td colspan="50">
<VAR $dateTimeDisplay = date("l F j, Y",strtotime($Game_GameDate))." ".date("g:ia",strtotime($Game_GameTime))>
{$dateTimeDisplay}<br /><br />
</td></tr>
<tr>
<td> </td>
<td align="right">1</td>
<td align="right">2</td>
<td align="right">3</td>
<td align="right">4</td>
<td align="right">OT</td>
<td align="right">Total</td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
{$Away_TeamName}</a></td>
<td align="right">{$Away_FirstQuarterPoints}</td>
<td align="right">{$Away_SecondQuarterPoints}</td>
<td align="right">{$Away_ThirdQuarterPoints}</td>
<td align="right">{$Away_FourthQuarterPoints}</td>
<td align="right">{$Away_OvertimePoints}</td>
<td align="right">{$Away_TotalPoints}</td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
{$Home_TeamName}</a></td>
<td align="right">{$Home_FirstQuarterPoints}</td>
<td align="right">{$Home_SecondQuarterPoints}</td>
<td align="right">{$Home_ThirdQuarterPoints}</td>
<td align="right">{$Home_FourthQuarterPoints}</td>
<td align="right">{$Home_OvertimePoints}</td>
<td align="right">{$Home_TotalPoints}</td>
</tr>
</table>

<br /><br />
<QUERY name=GameScoringSummary GAMEID=$form_ID SPORTNAME=$sqlSportName>
<IFGREATER count(GameScoringSummary_rows) 0>
<VAR $rowClass = "boxscoreRow trRow">
<table class="boxscoreStatTable" width="350" cellpadding="0" cellspacing="0">
<tr><td class="pageTitle">Scoring summary
</td></tr></table>
<table class="boxscoreStatTable" width="350" cellpadding="0" cellspacing="0">
<RESULTS list=GameScoringSummary_rows prefix=Summary>
<IFNOTEQUAL $Summary_SummaryPlayer1 0>
<tr class="{$rowClass}">
<td valign=top>
{$Summary_TeamCode} -- 
<IFNOTEMPTY $Summary_SummaryPlayer2>
<VAR $summPlayer1Name = fixApostrophes($Summary_SummPlayer1FirstName." ".$Summary_SummPlayer1LastName)>
<VAR $summPlayer2Name = fixApostrophes($Summary_SummPlayer2FirstName." ".$Summary_SummPlayer2LastName)>
{$summPlayer2Name}
<ELSE>
{$summPlayer1Name}
</IFNOTEMPTY>
<IFGREATER $Summary_SummaryPlayLength 0>
 {$Summary_SummaryPlayLength}-yard <?PHP echo(strtolower($Summary_SummaryPlayType)); ?>
<ELSE>
 {$Summary_SummaryPlayType}
</IFGREATER>

<IFEQUAL $Summary_SummaryPlayType "Pass">

<IFNOTEMPTY $Summary_SummaryPlayer2>
 from {$summPlayer1Name}

<ELSE> 
</IFEQUAL>
</IFNOTEMPTY>
<VAR $summPATPlayerName = fixApostrophes($Summary_SummPATPlayerFirstName." ".$Summary_SummPATPlayerLastName)>
<IFNOTEQUAL $Summary_SummaryPAT "None">
. PAT {$Summary_SummaryPAT} 
(<IFNOTEQUAL $Summary_SummaryPATPlayer2 0>
<VAR $summPATPlayer2Name = fixApostrophes($Summary_SummPATPlayer2FirstName." ".$Summary_SummPATPlayer2LastName)>
{$summPATPlayer2Name} from {$summPATPlayerName}
<ELSE>
<IFNOTEQUAL $Summary_SummaryPATPlayer 0>
{$summPATPlayerName}
</IFNOTEQUAL>
</IFNOTEQUAL>
)</IFNOTEMPTY>
<IFNOTEMPTY $Summary_SummaryTime>
, {$Summary_SummaryTime}
</IFNOTEQUAL>
<?PHP $Summary_SummaryQuarter = str_replace(array("1","2","3","4"),array("1st","2nd","3rd","4th"),$Summary_SummaryQuarter); ?>
<IFNOTEMPTY $Summary_SummaryQuarter>
, {$Summary_SummaryQuarter}
</IFNOTEMPTY>
.
</td></tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFNOTEQUAL>
</RESULTS>
</table>
</IFGREATER>

<br /><br />

<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr><td colspan="3" class="pageTitle">Team Stats</td></tr>
<tr>
<td> </td>
<td align="right">{$Away_TeamName}</td>
<td align="right">{$Home_TeamName}</td>
</tr>
<tr class="boxscoreRow trRow"><td>Total yards</td>
<td align="right">{$Away_TotalYards}</td><td align="right">{$Home_TotalYards}</td></tr>
<tr class="boxscoreRowAlternate trAlt"><td>First downs</td>
<td align="right">{$Away_FirstDowns}</td><td align="right">{$Home_FirstDowns}</td></tr>
<tr class="boxscoreRow trRow"><td>Rushes/Yds</td>
<td align="right">{$Away_RushingAttempts}/{$Away_RushingYards}</td><td align="right">{$Home_RushingAttempts}/{$Home_RushingYards}</td></tr>
<VAR $yardsAtt = round($Away_RushingYardsPerAttempt,2)>
<tr class="boxscoreRowAlternate trAlt"><td>Average rush</td>
<td align="right">{$yardsAtt}</td>
<VAR $yardsAtt = round($Home_RushingYardsPerAttempt,2)>
<td align="right">{$yardsAtt}</td></tr>
<tr class="boxscoreRow trRow"><td>Comp/Atts</td>
<td align="right">{$Away_PassCompletions}/{$Away_PassAttempts}</td><td align="right">{$Home_PassCompletions}/{$Home_PassAttempts}</td></tr>
<tr class="boxscoreRowAlternate trAlt"><td>Pass yards</td>
<td align="right">{$Away_PassingYards}</td><td align="right">{$Home_PassingYards}</td></tr>
<tr class="boxscoreRow trRow">
<td>Comp pct</td>
<VAR $compPct = round($Away_PassCompletionPercentage,2)>
<td align="right">{$compPct}</td>
<VAR $compPct = round($Home_PassCompletionPercentage,2)>
<td align="right">{$compPct}</td></tr>
<tr class="boxscoreRowAlternate trAlt"><td>Punts</td>
<td align="right">{$Away_Punts}</td><td align="right">{$Home_Punts}</td></tr>
<tr class="boxscoreRow trRow"><td>Punting Yards</td>
<td align="right">{$Away_PuntingYards}</td><td align="right">{$Home_PuntingYards}</td></tr>
<tr class="boxscoreRowAlternate trAlt"><td>Punting Average</td>
<VAR $puntAvg = round($Away_PuntingAverage,2)>
<td align="right">{$puntAvg}</td>
<VAR $puntAvg = round($Home_PuntingAverage,2)>
<td align="right">{$puntAvg}</td></tr>
<tr class="boxscoreRow trRow"><td>Fumbles/Lost</td>
<td align="right">{$Away_Fumbles}/{$Away_FumblesLost}</td><td align="right">{$Home_Fumbles}/{$Home_FumblesLost}</td></tr>
</table>
<br /><br />
<VAR $teamIDs = array($awayTeamID,$homeTeamID)>
<VAR $teamNames = array($Away_TeamName,$Home_TeamName)>

<?PHP foreach($teamIDs as $teamKey => $teamID) { ?>
<table class="boxscoreStatTable" WIDTH=350 CELLPADDING=0 CELLSPACING=0>
<tr><TD CLASS="pageTitle">{$teamNames[$teamKey]}
</td></tr></table>
<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$teamID SPORTNAME=$sqlSportName>
<IFGREATER count(GamePlayerStats_rows) 0>
<table class="boxscoreStatTable" WIDTH=350 CELLPADDING=0 CELLSPACING = 0>
<tr><td colspan="50"><b>Passing</b></td></tr>
<tr>
<td width="120">Name</td>
<td align="right">Comp</td>
<td align="right">Att</td>
<td align="right">Pct</td>
<td align="right">Yds</td>
<td align="right">TD</td>
<td align="right">INT</td>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Passing>
<IFGREATER $Passing_PassAttempts 0>
<tr class="{$rowClass}">
<td width="120">
<VAR $playerName = fixApostrophes($Passing_PlayerFirstName." ".$Passing_PlayerLastName)>
<a href="{$externalURL}site=default&tpl=Player&ID={$Passing_PlayerID}">
{$playerName}
</a>
</td>
<td align="right">{$Passing_PassCompletions}</td>
<td align="right">{$Passing_PassAttempts}</td>
<VAR $compPct = round($Passing_PassCompletionPercentage,2)>
<td align="right">{$compPct}</td>
<td align="right">{$Passing_PassingYards}</td>
<td align="right">{$Passing_PassingTouchdowns}</td>
<td align="right">{$Passing_PassingInterceptions}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</RESULTS>
</table>

<table class="boxscoreStatTable" WIDTH=350 CELLPADDING=0 CELLSPACING=0>
<tr><td colspan="50"><b>Rushing</b></td></tr>
<tr>
<td width="120">Name</td>
<td align="right">Att</td>
<td align="right">Yds</td>
<td align="right">Yds/Att</td>
<td align="right">Long</td>
<td align="right">TD</td>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Rushing>
<IFGREATER $Rushing_RushingAttempts 0>
<tr class="{$rowClass}">
<td width="120">
<VAR $playerName = fixApostrophes($Rushing_PlayerFirstName." ".$Rushing_PlayerLastName)>
<a href="{$externalURL}site=default&tpl=Player&ID={$Rushing_PlayerID}">
{$playerName}
</a>
</td>
<td align="right">{$Rushing_RushingAttempts}</td>
<td align="right">{$Rushing_RushingYards}</td>
<VAR $yardsAtt = round($Rushing_RushingYardsPerAttempt,2)>
<td align="right">{$yardsAtt}</td>
<td align="right">{$Rushing_RushingLong}</td>
<td align="right">{$Rushing_RushingTouchdowns}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</RESULTS>
</table>

<table class="boxscoreStatTable" WIDTH=350 CELLPADDING=0 CELLSPACING=0>
<tr><td colspan="50"><b>Receiving</b></td></tr>
<tr>
<td width="120">Name</td>
<td align="right">Rec</td>
<td align="right">Yds</td>
<td align="right">Yds/Catch</td>
<td align="right">Long</td>
<td align="right">TD</td>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Receiving>
<IFGREATER $Receiving_Receptions 0>
<tr class="{$rowClass}">
<td width="120">
<VAR $playerName = fixApostrophes($Receiving_PlayerFirstName." ".$Receiving_PlayerLastName)>
<a href="{$externalURL}site=default&tpl=Player&ID={$Receiving_PlayerID}">
{$playerName}
</a>
</td>
<td align="right">{$Receiving_Receptions}</td>
<td align="right">{$Receiving_ReceivingYards}</td>
<VAR $yardsCatch = round($Receiving_YardsPerCatch,2)>
<td align="right">{$yardsCatch}</td>
<td align="right">{$Receiving_ReceptionLong}</td>
<td align="right">{$Receiving_ReceivingTouchdowns}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</RESULTS>
<br />
<?PHP } ?>
</IFGREATER>
