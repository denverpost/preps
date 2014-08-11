<table class="boxscoreStatTable" width="100%" cellpadding="0" cellspacing="0">
<tr><td>
<font class="pageTitle">Summary</font>
</td></tr>
</table>

<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr><td colspan="50">
###I switched the time and date around so it gives time, then date###
###<VAR $dateTimeDisplay = date("l F j, Y",strtotime($Game_GameDate))." ### ###".date("g:ia",strtotime($Game_GameTime))>###
<VAR $dateTimeDisplay = date("g:ia",strtotime($Game_GameTime))."
".date("l, F j, Y",strtotime($Game_GameDate))>
<b>{$Game_GameMeetName}:</b> {$dateTimeDisplay}<br />

<h3 class="timestamp grey">Last updated: {$updateTimeDisplay}</h3>
</td></tr>
<tr>

<td align="left"><b>Team</b></td>
<td align="right"><b>Score</b></td>
</tr>


<IFGREATER $total_MeetTeamStats 0>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=MeetTeamStats_rows prefix=MeetTeamStats>

<tr class="{$rowClass}">
<td>
<VAR $MeetTeamStats_TeamName = fixApostrophes($MeetTeamStats_TeamName)>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$MeetTeamStats_TeamID}">
{$MeetTeamStats_TeamName}</a></td>
<td align="right">{$MeetTeamStats_TotalPoints}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
</table>
<br />

<h2>Results</h2>
<QUERY name=WrestlingPlayerStats GAMEID=$form_ID SPORTNAME=$sqlSportName>
<IFGREATER $total_WrestlingPlayerStats 0>
<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=WrestlingPlayerStats_rows prefix=Event>
<tr class="{$rowClass}">
<td>
<b>{$Event_MeetEventName} - </b>  
<VAR $winTeamCode = $Event_WinTeamCode>
<VAR $loseTeamCode = $Event_LoseTeamCode>
<IFEMPTY $winTeamCode>
<VAR $winTeamCode = $Event_WinTeamName>
</IFEMPTY>
<IFEMPTY $loseTeamCode>
<VAR $loseTeamCode = $Event_LoseTeamName>
</IFEMPTY>
<VAR $winType = "">
<?PHP switch ($Event_SummaryWinType) {
case "F": $winType = "fall"; break;
case "TF": $winType = "technical fall"; break;
case "FOR": $winType = "forfeit"; break;
case "DEF": $winType = "default"; break;
case "DQ": $winType = "disqualification"; break;
case "DEC": $winType = "decision"; break;
case "MD": $winType = "major decision"; break;
} ?>
{$Event_WinWrestlerLastName}, {$winTeamCode}, 
won by {$winType} over {$Event_LoseWrestlerLastName}, {$loseTeamCode}, {$Event_Score}
<IFNOTEMPTY $Event_SummaryTime>, {$Event_SummaryTime}
</IFNOTEMPTY>.
</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
</table>
</IFGREATER>

