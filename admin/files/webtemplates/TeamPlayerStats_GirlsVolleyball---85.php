<VAR $domainURL = "http://preps.denverpost.com">
<VAR $whereClause = " AND Points ".chr(62)." 0">
<VAR $beginLink = "/home.html?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&sort=">
<VAR $sortClause = "PlayerLastName,PlayerFirstName">
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID SPORTYEAR=$sportYear>
<!-- query: {$TeamPlayerStats_query} -->
<h4>Prep Volleyball Player Stats</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="" align="center">Name</th>
            <th scope="col" abbr="" align="center">Pts</th>
            <th scope="col" abbr="K" align="center">Kills</th>
            <th scope="col" abbr="A" align="center">Assists</th>
            <th scope="col" abbr="S" align="center">Serves</th>
            <th scope="col" abbr="SA" align="center">Aces</th>
            <th scope="col" abbr="DIG" align="center">Digs</th>
            <th scope="col" abbr="BS" align="center">Blocks</th>
            <th scope="col" abbr="BSA" align="center">Block Asst</th>
            <th scope="col" abbr="E" align="center">Errors</th>
            <th scope="col" abbr="GP" align="center">Games</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Player>
        <tr class="{$rowClass}">
            <td>
<VAR $first = fixApostrophes($Player_PlayerFirstName)>
<VAR $last = fixApostrophes($Player_PlayerLastName)>
<?PHP
$player_name = $first . ' ' . $last;
$player_slug = slugify($player_name);
?>
                <a href="{$domainURL}/players/{$player_slug}/{$Player_PlayerID}/" class="leadersNameLink">
                    {$player_name}</a></td>
            <td align="center">{$Player_Points}</td>
            <td align="center">{$Player_Kills}</td>
            <td align="center">{$Player_Assists}</td>
            <td align="center">{$Player_Serves}</td>
            <td align="center">{$Player_ServiceAces}</td>
            <td align="center">{$Player_Digs}</td>
            <td align="center">{$Player_BlockSolos}</td>
            <td align="center">{$Player_BlockAssists}</td>
            <td align="center">{$Player_Errors}</td>
            <td align="center">{$Player_GamesPlayed}</td>
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
