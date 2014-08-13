<VAR $domainURL = "http://preps.denverpost.com">
<VAR $SORTCLAUSE = "TotalStrokes">

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
<h3 class="list">TBD, {$gameDay}, {$gameMonth}, {$gameDate}, {$gameYear}</h3>
<ELSE>
<h3 class="list">{$gameHour}:{$gameMinute} {$meridian} {$gameDay}, {$gameMonth} {$gameDate}, {$gameYear}</h3>
</IFEQUAL>

<IFTRUE $Game_GameStatStatus == 0 || $Game_GameStatStatus == 1>
<ELSE>
###{$Game_GameMeetName}### <h4>Meet Summary</h4>
###<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">###
<table class="boxscoreStatTable deluxe wide300" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" align="right">Score</th>
        </tr>
<IFGREATER $total_MeetTeamStats 0>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=MeetTeamStats_rows prefix=MeetTeamStats>
<tr class="{$rowClass}">
<td>
<VAR $MeetTeamStats_TeamName = fixApostrophes($MeetTeamStats_TeamName)>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$MeetTeamStats_TeamID}">
{$MeetTeamStats_TeamName}</a></td>
<td align="right">{$MeetTeamStats_Score}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
###</IFTRUE>###
    </tbody>
</table>
<br />
</IFGREATER>
<VAR $sortField = "TIME_TO_SEC(Time) AS TimeSecs">
<VAR $orderClause = "TimeSecs ASC">
<QUERY name=GameMeetEvents GAMEID=$form_ID>
<IFGREATER $total_GameMeetEvents 0>
<RESULTS list=GameMeetEvents_rows prefix=MeetEvents>
<h4>{$MeetEvents_MeetEventName}</h4>
<QUERY name=MeetPlayerStats GAMEID=$form_ID EVENTID=$MeetEvents_MeetEventID SPORTNAME=$sqlSportName SORTFIELD=$sortField ORDERCLAUSE=$orderClause>
<IFGREATER $total_MeetPlayerStats 0>
<table class="boxscoreStatTable deluxe wide300" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" align="right">Time</th>
        </tr>
<VAR $playerNames = array()>
<VAR $playerIDs = array()>
<VAR $teamNames = array()>
<VAR $teamIDs = array()>
<VAR $playerTimes = array()>
<VAR $playerDispTimes = array()>
<RESULTS list=MeetPlayerStats_rows prefix=PlayerStats>
<VAR $playerIDs[] = $PlayerStats_PlayerID>
<VAR $playerNames[] = fixApostrophes($PlayerStats_PlayerFirstName." ".$PlayerStats_PlayerLastName)>
<VAR $teamNames[] = fixApostrophes($PlayerStats_TeamName)>
<VAR $teamIDs[] = $PlayerStats_TeamID>

<VAR $playerTimes[] = timeToDecimal($PlayerStats_Time)>

<VAR $playerDispTimes[] = $PlayerStats_Time>
</RESULTS>
<RUN array_multisort($playerTimes, SORT_ASC, $playerNames, SORT_ASC, $playerIDs, SORT_ASC, $teamNames, SORT_ASC, $teamIDs, SORT_ASC, $playerDispTimes, SORT_ASC)>
<VAR $rowClass = "boxscoreRow trRow">
<EACH list=playerTimes prefix=PT>
<tr class="{$rowClass}">
<td>
<a href="{$externalURL}site=default&tpl=Player&ID={$playerIDs[$PTkey]}">{$playerNames[$PTkey]}</a>
</td>
<td align="left">
<a href="{$externalURL}site=default&tpl=Team&TeamID={$teamIDs[$PTkey]}">{$teamNames[$PTkey]}</a>
</td>
<td align="right">
{$playerDispTimes[$PTkey]}
</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
<?PHP if ($key == 9) break; ?>
</EACH>
    </tbody>
</table>
</IFGREATER>
</RESULTS>
</IFGREATER>
###</IFGREATER>###
</IFTRUE>
