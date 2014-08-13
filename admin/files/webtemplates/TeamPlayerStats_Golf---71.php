<VAR $domainURL = "http://preps.denverpost.com">
<VAR $whereClauseOrig = " AND Minutes ".chr(62)." 0">
<VAR $whereClause = "">
<VAR $sortClause = "TotalStrokes,PlayerLastName,PlayerFirstName">
###<VAR $sortClause = "TotalStrokes">###

<h3>Player Stats</h3>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Lowest score</th>
        </tr>
<VAR $rowClass = "leadersRow trRow">
<QUERY name=TeamMeetPlayers SPORTNAME=$sqlSportName SORT=$sortClause
WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<IFGREATER count($TeamMeetPlayers_rows) 0>
<RESULTS list=TeamMeetPlayers_rows prefix=ID>
<QUERY name=TeamGolfPlayerStats SPORTNAME=$sqlSportName WHERECLAUSE=$whereClause PLAYERID=$ID_PlayerID prefix=Player>
        <tr class="{$rowClass}">
            <td>
<VAR $playerName = fixApostrophes($ID_PlayerFirstName." ".$ID_PlayerLastName)>
                <a href="{$externalURL}site=default&tpl=Player&ID={$ID_PlayerID}" class="leadersNameLink"> ###target="_blank">###
{$playerName}</a></td>
            <td align="right">
                {$Player_LowestScore}
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
