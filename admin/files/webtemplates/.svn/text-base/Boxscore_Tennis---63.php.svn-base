<VAR $dateTimeDisplay = date("g:ia",strtotime($Game_GameTime))."
".date("l, F j, Y",strtotime($Game_GameDate))>
<h1>{$Game_GameMeetName} Prep Tennis Results</h1>
<h2 class="list">{$dateTimeDisplay}</h2>
<h3 class="timestamp grey">Last updated: {$updateTimeDisplay}</h3>


<table class="boxscoreStatTable deluxe wide300" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="">Score</th>
        </tr>
###<IFGREATER $total_MeetTeamStats 0> ###
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=MeetTeamStats_rows prefix=MeetTeamStats>

        <tr class="{$rowClass}">
            <td>
<VAR $MeetTeamStats_TeamName = fixApostrophes($MeetTeamStats_TeamName)>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$MeetTeamStats_TeamID}">
                {$MeetTeamStats_TeamName}</a></td>
            <td align="center">{$MeetTeamStats_Points}</td>
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


<h2>Results</h2>
<QUERY name=TennisPlayerStats GAMEID=$form_ID SPORTNAME=$sqlSportName SORTFIELD=$sortField>
<IFGREATER $total_TennisPlayerStats 0>
<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=TennisPlayerStats_rows prefix=Match>
<tr class="{$rowClass}">
<td>
<IFEQUAL $Match_EventType 1>
<b>Singles:</b>  
<ELSE>
<b>Doubles:  </b>
</IFEQUAL>
{$Match_WinPlayerFirstName1} {$Match_WinPlayerLastName1}
<IFNOTEMPTY $Match_WinPlayerFirstName2>
 and {$Match_WinPlayerFirstName2} {$Match_WinPlayerLastName2}
</IFNOTEMPTY>
, {$Match_WinTeamName}, def. {$Match_LosePlayerFirstName1} 
{$Match_LosePlayerLastName1}
<IFNOTEMPTY $Match_LosePlayerFirstName2>
 and {$Match_LosePlayerFirstName2} {$Match_LosePlayerLastName2}
</IFNOTEMPTY>
, {$Match_LoseTeamName1}, 
<IFNOTEMPTY $Match_Set1>{$Match_Set1}</IFNOTEMPTY>
<IFNOTEMPTY $Match_Set2>, {$Match_Set2}</IFNOTEMPTY>
<IFNOTEMPTY $Match_Set3>, {$Match_Set3}</IFNOTEMPTY>.
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

