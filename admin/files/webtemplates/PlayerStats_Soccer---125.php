<VAR $domainURL = "http://preps.denverpost.com">
<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s Prep Soccer Season Stats</h2>
<table class="playerStatTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="" align="center">Goals</th>
            <th scope="col" abbr="" align="center">Assists</th>
            <th scope="col" abbr="" align="center">Points</th>
            <th scope="col" abbr="" align="center">GK Min.</th>
            <th scope="col" abbr="" align="center">GA</th>
            <th scope="col" abbr="" align="center">Saves</th>
            <th scope="col" abbr="" align="center">Save %</th>
        </tr>
        <tr>
            <td align="center">{$PlayerSeasonStats_Goals}</td>
            <td align="center">{$PlayerSeasonStats_Assists}</td>
            <td align="center">{$PlayerSeasonStats_Points}</td>
            <td align="center">{$PlayerSeasonStats_GoalkeeperMinutes}</td>
            <td align="center">{$PlayerSeasonStats_GoalsAllowed}</td>
            <td align="center">{$PlayerSeasonStats_Saves}</td>
            <? $savePct = sprintf("%.3f", $PlayerSeasonStats_SavePercentage) ?>
            <td align="center">{$savePct}</td>
        </tr>
    </tbody>
</table>











### ------------------------------------------------------------------------ ###
### Game-By-Game ###
### ------------------------------------------------------------------------ ###

<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s Prep Soccer Game-By-Game Stats</h2>
<table class="playerStatTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" align="left" abbr="D">Date</th>
            <th scope="col" align="left" abbr="Opp">Opponent</th>
            <th scope="col" abbr="" align="center">Goals</th>
            <th scope="col" abbr="" align="center">Assists</th>
            <th scope="col" abbr="" align="center">Points</th>
            <th scope="col" abbr="" align="center">GK Min</th>
            <th scope="col" abbr="" align="center">GA</th>
            <th scope="col" abbr="" align="center">Saves</th>
            <th scope="col" abbr="" align="center">Save %</th>
        </tr>
        <IFGREATER count($PlayerGameStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=PlayerGameStats_rows prefix=PlayerGameStats>
		<tr class="{$rowClass}">
<VAR $dateDisplay = date("F j",strtotime($PlayerGameStats_GameDate))>
{$dateTimeDisplay}
            <td align="left"><a href="{$externalURL}site=default&tpl=Boxscore&ID={$PlayerGameStats_GamePlyrGameID}">{$dateDisplay}</a></td>
<IFEQUAL $Player_SchoolName $PlayerGameStats_AwayTeamName>
            <td align="left"><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerGameStats_GameHomeTeamID}">
<ELSE>
            <td align="left"><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerGameStats_GameAwayTeamID}">
</IFEQUAL>
<IFEQUAL $Player_SchoolName $PlayerGameStats_AwayTeamName>
    {$PlayerGameStats_HomeTeamName}
<ELSE>
    {$PlayerGameStats_AwayTeamName}
</IFEQUAL>
    </a></td>
            <td align="center">{$PlayerGameStats_Goals}</td>
            <td align="center">{$PlayerGameStats_Assists}</td>
            <td align="center">{$PlayerGameStats_Points}</td>
            <td align="center">{$PlayerGameStats_GoalkeeperMinutes}</td>
            <td align="center">{$PlayerGameStats_GoalsAllowed}</td>
            <td align="center">{$PlayerGameStats_Saves}</td>
            <? $savePct = sprintf("%.3f", $PlayerGameStats_SavePercentage) ?>
            <td align="center">{$savePct}</td>
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
