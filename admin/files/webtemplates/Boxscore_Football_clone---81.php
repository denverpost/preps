<VAR $domainURL = "http://preps.denverpost.com">
<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $homeConfWins = $TeamSeasonStats_Win>
<VAR $homeConfLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "TeamSeasonStats">
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
<tr><td colspan="3">
<IFGREATER $Home_TotalPoints $Away_TotalPoints>
<strong>{$Home_TeamName} {$Home_TotalPoints}, {$Away_TeamName} {$Away_TotalPoints}</strong>
<ELSE>
<strong>{$Away_TeamName} {$Away_TotalPoints}, {$Home_TeamName} {$Home_TotalPoints}</strong>
</IFGREATER>
 - <IFEQUAL $Game_GameScoreIsFinal 1>
Final
<ELSE>
In progress
</IFEQUAL>
<br /><br />
</td></tr>
<tr><td>{$Away_TeamName}</td>
<td><strong>Overall:</strong> {$awayOverallWins}-{$awayOverallLosses} </td>
<td><strong>Conference:</strong> {$awayConfWins}-{$awayConfLosses}</td></tr>
<tr><td>{$Home_TeamName}</td>
<td><strong>Overall:</strong> {$homeOverallWins}-{$homeOverallLosses} </td>
<td><strong>Conference:</strong> {$homeConfWins}-{$homeConfLosses}</td></tr>
</table>

<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr><td colspan="50">
<font class="pageTitle">Boxscore</font><br />
<VAR $dateTimeDisplay = date("l F j, Y",strtotime($Game_GameDate))." ".date("g:ia",strtotime($Game_GameTime))>
{$dateTimeDisplay}<br /><br />
</td></tr>
<tr>
<td> </td>
<IFGREATER $Away_OvertimePoints 0 || $Home_OvertimePoints 0>
<td align="right"><strong>1</strong></td>
<td align="right"><strong>2</strong></td>
<td align="right"><strong>3</strong></td>
<td align="right"><strong>4</strong></td>
<td align="right"><strong>OT</strong></td>
<td align="right"><strong>Total</strong></td>
<ELSE>
<td align="right"><strong>1</strong></td>
<td align="right"><strong>2</strong></td>
<td align="right"><strong>3</strong></td>
<td align="right"><strong>4</strong></td>
<td align="right"><strong>Tota</strong>l</td>
</IFGREATER></tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
<strong>{$Away_TeamName}</strong></a></td>
<td align="right">{$Away_FirstQuarterPoints}</td>
<td align="right">{$Away_SecondQuarterPoints}</td>
<td align="right">{$Away_ThirdQuarterPoints}</td>
<td align="right">{$Away_FourthQuarterPoints}</td>

<IFGREATER $Away_OvertimePoints 0 || $Home_OvertimePoints 0>
<td align="right">{$Away_OvertimePoints}</td>
<ELSE>
</IFGREATER>
<td align="right">{$Away_TotalPoints}</td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
<strong>{$Home_TeamName}</strong></a></td>
<td align="right">{$Home_FirstQuarterPoints}</td>
<td align="right">{$Home_SecondQuarterPoints}</td>
<td align="right">{$Home_ThirdQuarterPoints}</td>
<td align="right">{$Home_FourthQuarterPoints}</td>
<IFGREATER $Away_OvertimePoints 0 || $Home_OvertimePoints 0>
<td align="right">{$Home_OvertimePoints}</td>
<ELSE>
</IFGREATER>
<td align="right">{$Home_TotalPoints}</td>
</tr>
</table>

<br /><br />


<QUERY name=GameScoringSummary GAMEID=$form_ID SPORTNAME=$sqlSportName>
<IFGREATER count(GameScoringSummary_rows) 0>
<VAR $rowClass = "boxscoreRow trRow">
<table class="boxscoreStatTable" width="425" cellpadding="0" cellspacing="0">
<tr><TD CLASS="pageTitle">Scoring summary
</td></tr></table>
<table class="boxscoreStatTable" width="450" cellpadding="0" cellspacing="0">
<RESULTS list=GameScoringSummary_rows prefix=Summary>

<IFNOTEQUAL $Summary_SummaryPlayer2 0>

<tr class="{$rowClass}">
<td valign=top>
<strong>{$Summary_TeamCode} -- </strong>
<IFNOTEMPTY $Summary_SummaryPlayer2>

<VAR $lastName = fixApostrophes($Summary_SummPlayer2LastName)>

{$Summary_SummPlayer2FirstName} {$lastName},
<ELSE>
{$Summary_SummPlayer1FirstName} {$lastName},
</IFNOTEMPTY>
<IFGREATER $Summary_SummaryPlayLength 0>
 {$Summary_SummaryPlayLength}-yard <?PHP echo(strtolower($Summary_SummaryPlayType)); ?>
<ELSE>
 {$Summary_SummaryPlayType}
</IFGREATER>
<IFEQUAL $Summary_SummaryPlayType "Interception">
 return
<ELSE>
</IFEQUAL>
<IFEQUAL $Summary_SummaryPlayType "Pass">

<IFNOTEMPTY $Summary_SummaryPlayer2>
<VAR $lastName = fixApostrophes($Summary_SummPlayer1LastName)>
 from {$Summary_SummPlayer1FirstName} {$lastName}
<ELSE>
</IFEQUAL>
</IFNOTEMPTY>

<IFNOTEQUAL $Summary_SummaryPAT "None">
. PAT: {$Summary_SummaryPAT} 


(<IFNOTEQUAL $Summary_SummaryPATPlayer2 0>
<VAR $patLastName = fixApostrophes($Summary_SummPATPlayer2LastName)>
<VAR $patLASTName = fixApostrophes($Summary_SummPATPlayerLastName)>



<IFEQUAL $Summary_SummaryPAT "2 Pt Pass">
{$Summary_SummPATPlayer2FirstName} {$patLastName} from {$Summary_SummPATPlayerFirstName} {$patLASTName}
<ELSE>
{$Summary_SummPATPlayer2FirstName} {$patLastName} 
</IFEQUAL>
<ELSE>
###<IFNOTEQUAL $Summary_SummaryPATPlayer2 0>###
###<VAR $patLastName = fixApostrophes($Summary_SummPATPlayer2LastName)>###
{$Summary_SummPATPlayer2FirstName} {$patLastName}
###</IFNOTEQUAL>###

###</IFEQUAL>###


</IFNOTEQUAL>
)</IFNOTEMPTY>
### THIS IFEQUAL PERTAINS TO THE IFEQUAL AT THE TOP OF THE PAT SECTION ###
###</IFEQUAL>###

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




<br /><br />

<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr><td colspan="3" class="pageTitle">Team Stats</td></tr>
<tr>
<td> </td>
<td align="right"><strong>{$Away_TeamName}</strong></td>
<td align="right"><strong>{$Home_TeamName}</strong></td>
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
<VAR $teamNames = array($Game_AwayTeamName,$Game_HomeTeamName)>

<?PHP foreach($teamIDs as $teamKey => $teamID) { ?>
<table class="boxscoreStatTable" WIDTH=425 CELLPADDING=0 CELLSPACING=0>
<tr><TD CLASS="pageTitle">{$teamNames[$teamKey]}
</td></tr></table>
<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$teamID SPORTNAME=$sqlSportName>
<IFGREATER count(GamePlayerStats_rows) 0>
<table class="boxscoreStatTable" WIDTH=425 CELLPADDING=0 CELLSPACING = 0>
<tr><td colspan="50"><b>Passing</b></td></tr>
<tr>
<td width="120"><strong>Name</strong></td>
<td align="right"><strong>Comp</strong></td>
<td align="right"><strong>Att</strong></td>
<td align="right"><strong>Pct</strong></td>
<td align="right"><strong>Yds</strong></td>
<td align="right"><strong>TD</strong></td>
<td align="right"><strong>INT</strong></td>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Passing>
<IFGREATER $Passing_PassAttempts 0>
<tr class="{$rowClass}">
<td width="120">
<a href="{$externalURL}site=default&tpl=Player&ID={$Passing_PlayerID}">

<VAR $passingLastName = fixApostrophes($Passing_PlayerLastName)>

{$Passing_PlayerFirstName} {$passingLastName}
</a>
</td>
<td align="right">{$Passing_PassCompletions}</td>
<td align="right">{$Passing_PassAttempts}</td>
<VAR $compPct = round($Passing_PassCompletionPercentage,1)>
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

<table class="boxscoreStatTable" WIDTH=425 CELLPADDING=0 CELLSPACING=0>
<tr><td colspan="50"><b>Rushing</b></td></tr>
<tr>
<td width="120"><strong>Name</strong></td>
<td align="right"><strong>Att</strong></td>
<td align="right"><strong>Yds</strong></td>
<td align="right"><strong>Yds/Att</strong></td>
<td align="right"><strong>Long</strong></td>
<td align="right"><strong>TD</strong></td>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Rushing>
<IFGREATER $Rushing_RushingAttempts 0>
<tr class="{$rowClass}">
<td width="120">
<a href="{$externalURL}site=default&tpl=Player&ID={$Rushing_PlayerID}">
<VAR $rushingLastName = fixApostrophes($Rushing_PlayerLastName)>
{$Rushing_PlayerFirstName} {$rushingLastName}
</a>
</td>
<td align="right">{$Rushing_RushingAttempts}</td>
<td align="right">{$Rushing_RushingYards}</td>
<VAR $yardsAtt = round($Rushing_RushingYardsPerAttempt,1)>
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

<table class="boxscoreStatTable" WIDTH=425 CELLPADDING=0 CELLSPACING=0>
<tr><td colspan="50"><b>Receiving</b></td></tr>
<tr>
<td width="120"><strong>Name</strong></td>
<td align="right"><strong>Rec</strong></td>
<td align="right"><strong>Yds</strong></td>
<td align="right"><strong>Yds/Catch</strong></td>
<td align="right"><strong>Long</strong></td>
<td align="right"><strong>TD</strong></td>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Receiving>
<IFGREATER $Receiving_Receptions 0>
<tr class="{$rowClass}">
<td width="120">
<a href="{$externalURL}site=default&tpl=Player&ID={$Receiving_PlayerID}">

<VAR $recLastName = fixApostrophes($Receiving_PlayerLastName)>

{$Receiving_PlayerFirstName} {$recLastName}
</a>
</td>
<td align="right">{$Receiving_Receptions}</td>
<td align="right">{$Receiving_ReceivingYards}</td>
<VAR $yardsCatch = round($Receiving_YardsPerCatch,1)>
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