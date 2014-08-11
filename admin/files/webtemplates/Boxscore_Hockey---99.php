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


<h1>
<IFGREATER $Home_TotalPoints $Away_TotalPoints>
{$Home_TeamName} {$Home_TotalGoals}, {$Away_TeamName} {$Away_TotalGoals}
<ELSE>
{$Away_TeamName} {$Away_TotalGoals}, {$Home_TeamName} {$Home_TotalGoals}
</IFGREATER>
 &mdash;&nbsp; <IFEQUAL $Game_GameScoreIsFinal 1>
Final
<ELSE>
In progress
</IFEQUAL>
<IFTRUE $Home_OvertimeGoals != 0 || $Away_OvertimeGoals != 0>
OT
</IFTRUE>
</h1>
<h3 class="timestamp grey">Last updated: {$updateTimeDisplay}</h3>
<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr><td colspan="3" class="pageTitle">Result</td></tr>
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
<td align="right">OT</td>
<td align="right">SO</td>
<td align="right">Total</td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
{$Away_TeamName}</a></td>
<td align="right">{$Away_FirstPeriodGoals}</td>
<td align="right">{$Away_SecondPeriodGoals}</td>
<td align="right">{$Away_ThirdPeriodGoals}</td>
<td align="right">{$Away_OvertimeGoals}</td>
<td align="right">{$Away_ShootoutGoals}</td>
<td align="right">{$Away_TotalGoals}</td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
{$Home_TeamName}</a></td>
<td align="right">{$Home_FirstPeriodGoals}</td>
<td align="right">{$Home_SecondPeriodGoals}</td>
<td align="right">{$Home_ThirdPeriodGoals}</td>
<td align="right">{$Home_OvertimeGoals}</td>
<td align="right">{$Home_ShootoutGoals}</td>
<td align="right">{$Home_TotalGoals}</td>
</tr>
</table>

<br /><br />
<QUERY name=HockeyScoringSummary GAMEID=$form_ID SPORTNAME=$sqlSportName>
<IFGREATER count(HockeyScoringSummary_rows) 0>
<VAR $rowClass = "boxscoreRow trRow">
<table class="boxscoreStatTable" width="350" cellpadding="0" cellspacing="0">
<tr><td class="pageTitle">Scoring summary
</td></tr></table>
<table class="boxscoreStatTable" width="350" cellpadding="0" cellspacing="0">
<RESULTS list=HockeyScoringSummary_rows prefix=Summary>
<IFNOTEMPTY $Summary_GoalScorerLastName>
<tr class="{$rowClass}">
<td valign=top>
<VAR $teamCode = $Summary_TeamCode>
<IFEMPTY $teamCode><VAR $teamCode = $Summary_TeamName></IFEMPTY>
{$teamCode}: {$Summary_GoalScorerLastName}
<IFNOTEMPTY $Summary_AsstPlayer1LastName>
 ({$Summary_AsstPlayer1LastName}
<IFNOTEMPTY $Summary_AsstPlayer2LastName>
, {$Summary_AsstPlayer2LastName}
</IFNOTEMPTY>
)
</IFNOTEMPTY>
<IFNOTEMPTY $Summary_SummaryTime>
, {$Summary_SummaryTime}
</IFNOTEQUAL>
<?PHP $Summary_SummaryPeriod = str_replace(array("1","2","3","4"),array("1st","2nd","3rd","OT"),$Summary_SummaryPeriod); ?>
<IFNOTEMPTY $Summary_SummaryPeriod>
, {$Summary_SummaryPeriod}
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