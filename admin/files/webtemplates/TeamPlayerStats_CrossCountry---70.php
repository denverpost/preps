<VAR $domainURL = "http://preps.denverpost.com">
<VAR $whereClauseOrig = " AND Minutes ".chr(62)." 0">
<VAR $whereClause = "">
<VAR $sortClause = "PlayerLastName,PlayerFirstName">
<h3>Player Stats</h3>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide300">
    <tbody>
        <tr id="header-sub">
            <th scope="col" abbr="">Player name</th>
            <th scope="col" abbr="" align="right">Best time</th>
        </tr>
<VAR $rowClass = "leadersRow trRow">
<QUERY name=TeamMeetPlayers SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<IFGREATER count($TeamMeetPlayers_rows) 0>
<RESULTS list=TeamMeetPlayers_rows prefix=ID>
<QUERY name=TeamMeetPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause PLAYERID=$ID_PlayerID>
<VAR $bestTime = "">
<VAR $bestDispTime = "">
<RESULTS list=TeamMeetPlayerStats_rows prefix=Player>
<IFEMPTY $bestTime>
<VAR $bestDispTime = $Player_Time>
<VAR $bestTime = timeToDecimal($Player_Time)>
<ELSE>
<VAR $meetTime = timeToDecimal($Player_Time)>
<IFGREATER $bestTime $meetTime>
<VAR $bestTime = $meetTime>
<VAR $bestDispTime = $Player_Time>
</IFGREATER>
</IFEMPTY>
</RESULTS>
        <tr class="{$rowClass}">
            <td>
<VAR $playerName = fixApostrophes($Player_PlayerFirstName." ".$Player_PlayerLastName)>
                <a href="/home.html?site=default&tpl=Player&ID={$Player_PlayerID}" class="leadersNameLink">
                    {$playerName}</a></td>
            <td align="right">
                {$bestDispTime}
            </td>
        </tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
    </tbody>
</table>

