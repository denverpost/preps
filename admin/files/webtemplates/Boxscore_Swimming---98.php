<VAR $domainURL = "http://preps.denverpost.com">
<VAR $timeDateDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>

<QUERY name=Game_preview GAMEID=$form_ID>
<VAR $Home_TeamID = $Game_preview_GameHomeTeamID>
<VAR $Away_TeamID = $Game_preview_GameAwayTeamID>




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





<VAR $dateTimeDisplay = date("l, F j, Y",strtotime($Game_GameDate))>
<h1>{$Game_GameMeetName}</h1>

<IFEQUAL $Game_preview_GameTimeTBD 1>
<VAR $timeDateDisplay = date("l, F j, Y",strtotime($Game_GameDate))>
<h3 class="list">TBD, {$gameDay}, {$gameMonth}, {$gameDate} {$gameYear}###{$timeDateDisplay}###</h3>
<ELSE>
###<VAR $timeDateDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>###
<h3 class="list">{$gameHour}:{$gameMinute} {$meridian} {$gameDay} {$gameMonth} {$gameDate}, {$gameYear}</h3>
</IFEQUAL>

###GSS: {$Game_GameStatStatus}###
<IFEQUAL $Game_GameStatStatus 0>
<ELSE>
<h4>###{$Game_GameMeetName}### Meet Summary</h4>
<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr>
<td> </td>
<td align="right">Score</td>
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

<VAR $sortField = "TIME_TO_SEC(FinalsTime) AS TimeSecs">
<VAR $orderClause = "TimeSecs ASC">
<QUERY name=GameMeetEvents GAMEID=$form_ID>
<IFGREATER $total_GameMeetEvents 0>
<VAR $meetEvents = array("200-yard Medley Relay","200-yard Freestyle","200-yard IM","50-yard Freestyle","1-M Springboard","100-yard Butterfly",
"100-yard Freestyle","500-yard Freestyle","200-yard Freestyle Relay","100-yard Backstroke","100-yard Breaststroke","400-yard Freestyle Relay")>
<RESULTS list=GameMeetEvents_rows prefix=MeetEvents>
<VAR $meetEventIDs[$MeetEvents_MeetEventName] = $MeetEvents_MeetEventID>
</RESULTS>
<EACH list=meetEvents prefix=Evt>
<IFNOTEMPTY $meetEventIDs[$Evtval]>
<VAR $meetEventID = $meetEventIDs[$Evtval]>
<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr>
<td class="pageTitle">{$Evtval}</td></tr></table>
<IFTRUE ($Evtval == "200-yard Medley Relay") || ($Evtval == "200-yard Freestyle Relay") || ($Evtval == "400-yard Freestyle Relay")>
<QUERY name=MeetTeamEventStats GAMEID=$form_ID EVENTID=$meetEventID SPORTNAME=$sqlSportName SORTFIELD=$sortField ORDERCLAUSE=$orderClause>
<IFGREATER $total_MeetTeamEventStats 0>
<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr>
<td align="left">Team</td>
<td align="right">Time</td>
</tr>
<VAR $teamNames = array()>
<VAR $teamIDs = array()>
<VAR $teamTimes = array()>
<VAR $teamDispTimes = array()>
<VAR $sqt = array()>
<RESULTS list=MeetTeamEventStats_rows prefix=TeamStats>
<VAR $teamNames[] = fixApostrophes($TeamStats_TeamName)>
<VAR $teamIDs[] = $TeamStats_TeamID>
<VAR $teamTimes[] = timeToDecimal($TeamStats_FinalsTime)>
<VAR $teamDispTimes[] = $TeamStats_FinalsTime>
</RESULTS>
<RUN array_multisort($teamTimes, SORT_ASC, $teamNames, SORT_ASC, $teamIDs, SORT_ASC, $teamDispTimes, SORT_ASC)>
<VAR $rowClass = "boxscoreRow trRow">
<EACH list=teamTimes prefix=TT>
<tr class="{$rowClass}">
<td>
<a href="{$externalURL}site=default&tpl=Team&ID={$teamIDs[$PTkey]}">{$teamNames[$TTkey]}</a>
</td>
<td align="right">
{$teamDispTimes[$TTkey]}
</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
<?PHP if ($TTkey == 9) break; ?>
</EACH>
</table>
</IFGREATER>
<ELSE>
<VAR $isDiving = false>
<IFEQUAL $Evtval "1-M Springboard"><VAR $isDiving = true></IFEQUAL>
<IFTRUE $isDiving>
<VAR $sortField = "">
<VAR $orderClause = "Points DESC">
<ELSE>
<VAR $sortField = "TIME_TO_SEC(FinalsTime) AS TimeSecs">
<VAR $orderClause = "TimeSecs ASC">
</IFTRUE>
<QUERY name=MeetPlayerStats GAMEID=$form_ID EVENTID=$meetEventID SPORTNAME=$sqlSportName SORTFIELD=$sortField ORDERCLAUSE=$orderClause>
<IFGREATER $total_MeetPlayerStats 0>
<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr>
<td width="110">Name</td>
<td align="left">Team</td>
<IFTRUE $isDiving>
<td align="right">Points</td>
<ELSE>
<td align="right">Time</td>
</IFTRUE>
</tr>
<VAR $playerNames = array()>
<VAR $playerFirstNames = array()>
<VAR $playerIDs = array()>
<VAR $teamNames = array()>
<VAR $teamIDs = array()>
<VAR $playerTimes = array()>
<VAR $playerDispTimes = array()>
<VAR $sqt = array()>
<RESULTS list=MeetPlayerStats_rows prefix=PlayerStats>
<VAR $playerIDs[] = $PlayerStats_PlayerID>
<VAR $playerNames[] = fixApostrophes($PlayerStats_PlayerLastName)>
<VAR $playerFirstNames[] = fixApostrophes($PlayerStats_PlayerFirstName)>
<VAR $teamNames[] = fixApostrophes($PlayerStats_TeamName)>
<VAR $teamIDs[] = $PlayerStats_TeamID>
<VAR $sqt[] = $PlayerStats_StateQualifyingTime>
<IFTRUE $isDiving>
<VAR $playerTimes[] = $PlayerStats_Points>
<VAR $playerDispTimes[] = $PlayerStats_Points>
<ELSE>
<VAR $playerTimes[] = timeToDecimal($PlayerStats_FinalsTime)>
<VAR $playerDispTimes[] = $PlayerStats_FinalsTime>
<RUN array_multisort($playerTimes, SORT_ASC, $playerNames, SORT_ASC, $playerIDs, SORT_ASC, $teamNames, SORT_ASC, $teamIDs, SORT_ASC, $playerDispTimes, SORT_ASC)>
</IFTRUE>
</RESULTS>
<VAR $rowClass = "boxscoreRow trRow">
<EACH list=playerTimes prefix=PT>
<tr class="{$rowClass}">
<td>
<a href="{$externalURL}site=default&tpl=Player&ID={$playerIDs[$PTkey]}">{$playerFirstNames[$PTkey]} {$playerNames[$PTkey]}</a>
</td>
<td align="left">
<a href="{$externalURL}site=default&tpl=Team&TeamID={$teamIDs[$PTkey]}">{$teamNames[$PTkey]}</a>
</td>
<td align="right">
{$playerDispTimes[$PTkey]}<IFEQUAL $sqt[$PTkey] 1>*<ELSE></IFEQUAL>
</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
<?PHP if ($PTkey == 5) break; ?>
</EACH>
</table>
</IFGREATER>
</IFTRUE>
</EACH>
</IFNOTEMPTY>
</IFGREATER>
* = State Qualifying Time or Dive Score
</IFEQUAL>