<VAR $domainURL = "http://preps.denverpost.com">
<VAR $dateTimeDisplay = date("g:i a",strtotime($Game_GameTime))." 
".date("l, F j, Y",strtotime($Game_GameDate))>

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
<VAR $gameStatStatus = $Game_GameStatStatus>

###GAMESTATSTATUS: {$gameStatStatus}###

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

<h1>{$Game_GameMeetName}</h1>

<IFEQUAL $Game_preview_GameTimeTBD 1>
<VAR $timeDateDisplay = date("l, F j, Y",strtotime($Game_GameDate))>
<h3 class="list">TBD {$timeDateDisplay}</h3>


<ELSE>
<VAR $timeDateDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>
<h3 class="list"><h3>{$gameHour}:{$gameMinute} {$meridian} {$gameMonth} {$gameDate}, {$gameYear}</h3>
</IFEQUAL>



###<h2 class="list"><h3>{$gameHour}:{$gameMinute} {$meridian} {$gameMonth} {$gameDate}, {$gameYear}</h3>
<h3 class="timestamp grey">Last updated: {$updateTimeDisplay}</h3>###

<IFEQUAL $gameStatStatus 0>
<H4>Check back later for results</h4>
<ELSE>
<table class="boxscoreStatTable deluxe wide300" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" align="right">Score</th>
        </tr>
###<IFGREATER $total_MeetTeamStats 0> ###
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=MeetTeamStats_rows prefix=MeetTeamStats>

        <tr class="{$rowClass}">
            <td>
<VAR $MeetTeamStats_TeamName = fixApostrophes($MeetTeamStats_TeamName)>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$MeetTeamStats_TeamID}">
                {$MeetTeamStats_TeamName}</a></td>
            <td align="right">{$MeetTeamStats_Points}</td>
        </tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
###</IFGREATER>###
    </tbody>
</table>


<h3>Results</h3>
<QUERY name=TennisPlayerStats GAMEID=$form_ID SPORTNAME=$sqlSportName SORTFIELD=$sortField>
<IFGREATER $total_TennisPlayerStats 0>
<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=TennisPlayerStats_rows prefix=Match>
<tr class="{$rowClass}">
<td>
<IFEQUAL $Match_EventType 1>
No. {$Match_TeamRank} Singles: 
<ELSE>
No. {$Match_TeamRank} Doubles: 
</IFEQUAL>
<IFEQUAL  $Match_Set1 "forfeit">
{$Match_WinTeamName} def. {$Match_LoseTeamName1}, forfeit.
<ELSE>
###</IFEQUAL>###
<IFNOTEMPTY $Match_WinPlayerLastName1>
{$Match_WinPlayerFirstName1} {$Match_WinPlayerLastName1}</IFNOTEMPTY><IFNOTEMPTY $Match_WinPlayerLastName2> and {$Match_WinPlayerFirstName2} {$Match_WinPlayerLastName2}</IFNOTEMPTY>, {$Match_WinTeamName}, def. {$Match_LosePlayerFirstName1} {$Match_LosePlayerLastName1}<IFNOTEMPTY $Match_LosePlayerFirstName2> and {$Match_LosePlayerFirstName2} {$Match_LosePlayerLastName2}</IFNOTEMPTY>, {$Match_LoseTeamName1}, <IFNOTEMPTY $Match_Set1>{$Match_Set1}</IFNOTEMPTY><IFNOTEMPTY $Match_Set2>, {$Match_Set2}</IFNOTEMPTY><IFNOTEMPTY $Match_Set3>, {$Match_Set3}</IFNOTEMPTY>.
</IFEQUAL>### this closes the IFEQUAL for forfeited matches###
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
</IFEQUAL>
