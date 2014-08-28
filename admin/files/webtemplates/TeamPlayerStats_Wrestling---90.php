<VAR $domainURL = "http://preps.denverpost.com">
<VAR $whereClause = "">
<VAR $playerStatIDs = array("WinningWrestler","LosingWrestler")>
<VAR $playerStatIDWL = array("W","L")>
<VAR $sortClause = "PlayerLastName,PlayerFirstName">
<table cellpadding="0" cellspacing="0" class="teamStatTable">
<tr><td colspan="50"><font class="pageTitle">Player Stats</font>
</td></tr>
<tr class="teamStatsHeader">
<td><b>Name</b></td>
<td><b>Weight class</b></td>
<td align="right"><b>W-L</b></td>
</tr>
<VAR $rowClass = "leadersRow trRow">
<QUERY name=TeamMeetPlayers SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>

<IFGREATER count($TeamMeetPlayers_rows) 0>
<RESULTS list=TeamMeetPlayers_rows prefix=ID>
<VAR $plyrWins = array()>
<VAR $plyrLosses = array()>
<VAR $eventNames = array()>
<EACH list=playerStatIDs prefix=Plyr>
<VAR $idClause = $Plyrval." = ".$ID_PlayerID>
<QUERY name=WrestlingWinLossCount SPORTNAME=$sqlSportName IDCLAUSE=$idClause>
<RESULTS list=WrestlingWinLossCount_rows prefix=WLCount>
<VAR $eventID = $WLCount_GameSummEventID>
<VAR $eventNames[$eventID] = $WLCount_MeetEventName>
<IFEQUAL $playerStatIDWL[$Plyrkey] "W">
<RUN $plyrWins[$eventID] += $WLCount_Tally>
<ELSE>
<RUN $plyrLosses[$eventID] += $WLCount_Tally>
</IFEQUAL>
</RESULTS>
</EACH>
<VAR $playerName = fixApostrophes($ID_PlayerFirstName." ".$ID_PlayerLastName)>
<?PHP foreach ($eventNames as $eventID => $eventVal) { ?>
<tr class="{$rowClass}">
<VAR $plyrWinsEvent = $plyrWins[$eventID]>
<VAR $plyrLossesEvent = $plyrLosses[$eventID]>
<IFEMPTY $plyrWinsEvent><VAR $plyrWinsEvent = 0></IFEMPTY>
<IFEMPTY $plyrLossesEvent><VAR $plyrLossesEvent = 0></IFEMPTY>
<td>
###here###
<?PHP
$player_slug = slugify($playerName);
?>
<a href="{$domainURL}/players/{$player_slug}/{$ID_PlayerID}/" class="leadersNameLink">
{$playerName}</a></td>
<td>
{$eventNames[$eventID]}
</td>
<td align="right">
{$plyrWinsEvent}-{$plyrLossesEvent}
</td>
</tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
<?PHP } ?>
</RESULTS>
</IFGREATER>

</table>
