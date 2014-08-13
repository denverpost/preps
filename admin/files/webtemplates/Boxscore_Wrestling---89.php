<VAR $domainURL = "http://preps.denverpost.com">
<VAR $timeDateDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>

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

###DAY: {$gameDay}
MONTH: {$gameMonth}
DATE: {$gameDate}
YEAR: {$gameYear}
HOUR: {$gameHour}
MINUTE:  {$gameMinute}
SECOND: {$gameSecond}
MERIDIAN: {$meridian}###

###<h2 class="list">{$timeDateDisplay}</h2>###

###<h3>{$gameHour}:{$gameMinute} {$meridian} {$gameDay}, {$gameMonth} {$gameDate}, {$gameYear}</h3>###




<VAR $dateTimeDisplay = date("l, F j, Y",strtotime($Game_GameDate))>
<h2>{$Game_GameMeetName} wrestling meet</h2>
<h4>{$gameHour}:{$gameMinute} {$meridian} {$gameDay}, {$gameMonth} {$gameDate}, {$gameYear}</h4>


###<h2 class="list">{$dateTimeDisplay}</h2>###
###<h3 class="timestamp grey">Last updated: {$updateTimeDisplay}</h3>###
<h4>Meet summary</h4>


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
<td align="left">{$MeetTeamStats_TotalPoints}</td>
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

<h4>Results</h4>
<QUERY name=WrestlingPlayerStats GAMEID=$form_ID SPORTNAME=$sqlSportName>
<IFGREATER $total_WrestlingPlayerStats 0>
<table class="boxscoreStatTable deluxe wide600" width="600" cellpadding="0" cellspacing="0">
<tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">WT</th>
            <th scope="col" abbr="">Winner</th>
            <th scope="col" abbr="">School</th>
            <th scope="col" abbr="">Type</th>
            <th scope="col" abbr="">Score/Time</th>
            <th scope="col" abbr="">Loser</th>
            <th scope="col" abbr="">School</th>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=WrestlingPlayerStats_rows prefix=Event> 
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
case "F": $winType = "Pin"; break;
case "TF": $winType = "TF"; break;
case "FOR": $winType = "Forfeit"; break;
case "DEF": $winType = "Default"; break;
case "DQ": $winType = "DQ"; break;
case "DEC": $winType = "Dec."; break;
case "MD": $winType = "MD"; break;
} ?>         
<tr class="{$rowClass}">
<td>{$Event_MeetEventName}</td>
<td>{$Event_WinWrestlerFirstName} {$Event_WinWrestlerLastName}</td>
<td>{$Event_WinTeamName}</td>
<td>{$winType}</td>
<td><IFNOTEMPTY $Event_Score>{$Event_Score}</IFNOTEMPTY><IFNOTEMPTY $Event_SummaryTime>{$Event_SummaryTime}</IFNOTEMPTY></td>
<td>{$Event_LoseWrestlerFirstName} {$Event_LoseWrestlerLastName}</td>
<td>{$Event_LoseTeamName}</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
</table>
</IFGREATER>