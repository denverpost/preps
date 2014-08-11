<VAR $SORTCLAUSE = "TotalStrokes">

<h1>
<VAR $dateTimeDisplay = date("g:ia",strtotime($Game_GameTime))."
".date("l, F j, Y",strtotime($Game_GameDate))>
###<VAR $dateTimeDisplay = date("l F j, Y",strtotime($Game_GameDate))."### ###".date("g:ia",strtotime($Game_GameTime))>###
{$Game_GameMeetName} Cross Country Meet
</h1>
<h2 class="list">{$dateTimeDisplay} <IFNOTEMPTY $Game_SchoolName>at {$Game_SchoolName}</IFNOTEMPTY></h2>
<h3 class="timestamp grey">Last updated: {$updateTimeDisplay}</h3>

<h4>Boxscore</h4>
<table class="boxscoreStatTable deluxe wide300" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="">Score</th>
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
</IFGREATER>
    </tbody>
</table>
<br />




<VAR $sortField = "TIME_TO_SEC(Time) AS TimeSecs">
<VAR $orderClause = "TimeSecs ASC">
<QUERY name=GameMeetEvents GAMEID=$form_ID>
<IFGREATER $total_GameMeetEvents 0>
<RESULTS list=GameMeetEvents_rows prefix=MeetEvents>
<h2>{$MeetEvents_MeetEventName}</h2>
<QUERY name=MeetPlayerStats GAMEID=$form_ID EVENTID=$MeetEvents_MeetEventID SPORTNAME=$sqlSportName SORTFIELD=$sortField ORDERCLAUSE=$orderClause>
<IFGREATER $total_MeetPlayerStats 0>
<table class="boxscoreStatTable deluxe wide300" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="">Time</th>
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

