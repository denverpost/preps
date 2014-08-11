<VAR $whereClause = "">
<VAR $playerStatIDs = array("WinningPlayer1","WinningPlayer2","LosingPlayer1","LosingPlayer2")>
<VAR $playerStatIDWL = array("W","W","L","L")>
<VAR $sortClause = "PlayerLastName,PlayerFirstName">
<h3>Player Stats</h3>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">W-L</th>
        </tr>
<VAR $rowClass = "leadersRow trRow">
<QUERY name=TeamMeetPlayers SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<IFGREATER count($TeamMeetPlayers_rows) 0>
<RESULTS list=TeamMeetPlayers_rows prefix=ID>
<VAR $plyrWins = 0>
<VAR $plyrLosses = 0>
<EACH list=playerStatIDs prefix=Plyr>
<VAR $idClause = $Plyrval." = ".$ID_PlayerID>
<QUERY name=TennisWinLossCount SPORTNAME=$sqlSportName IDCLAUSE=$idClause prefix=WLCount>
<IFEQUAL $playerStatIDWL[$Plyrkey] "W">
<RUN $plyrWins += $WLCount_Tally>
<ELSE>
<RUN $plyrLosses += $WLCount_Tally>
</IFEQUAL>
</EACH>
        <tr class="{$rowClass}">
            <td>
###here###
<VAR $playerName = fixApostrophes($ID_PlayerFirstName." ".$ID_PlayerLastName)>
                <a href="home.html?site=default&tpl=Player&ID={$ID_PlayerID}" class="leadersNameLink">
{$playerName}</a></td>
            <td align="right">
                {$plyrWins}-{$plyrLosses}
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
