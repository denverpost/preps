<VAR $whereClause = " AND Points ".chr(62)." 0">
<VAR $beginLink = "home.html?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&sort=">
<VAR $sortClause = "PlayerLastName,PlayerFirstName">
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<!-- query: {$TeamPlayerStats_query} -->
<h4>Prep Volleyball Player Stats</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Points</th>
            <th scope="col" abbr="K">Kills</th>
            <th scope="col" abbr="A">Assists</th>
            <th scope="col" abbr="S">Serves</th>
            <th scope="col" abbr="SA">Service aces</th>
            <th scope="col" abbr="DIG">Digs</th>
            <th scope="col" abbr="BS">Blocks</th>
            <th scope="col" abbr="BSA">Block Assists</th>
            <th scope="col" abbr="E">Errors</th>
            <th scope="col" abbr="GP">Games Played</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Player>
        <tr class="{$rowClass}">
            <td>
                <a href="home.html?site=default&tpl=Player&ID={$Player_PlayerID}" class="leadersNameLink"> <VAR $Player_PlayerFirstName = fixApostrophes($Player_PlayerFirstName)>
<VAR $Player_PlayerLastName = fixApostrophes($Player_PlayerLastName)>
                    {$Player_PlayerFirstName} {$Player_PlayerLastName}</a></td>
            <td>{$Player_Points}</td>
            <td>{$Player_Kills}</td>
            <td>{$Player_Assists}</td>
            <td>{$Player_Serves}</td>
            <td>{$Player_ServiceAces}</td>
            <td>{$Player_Digs}</td>
            <td>{$Player_BlockSolos}</td>
            <td>{$Player_BlockAssists}</td>
            <td>{$Player_Errors}</td>
            <td>{$Player_GamesPlayed}</td>
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