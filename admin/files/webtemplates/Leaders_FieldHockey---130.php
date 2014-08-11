<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s {$sportName} Season Stats</h2>

<table cellpadding="0" cellspacing="0" class="schedTable deluxe wide500">
    <tbody>
        <tr id="header-sub">
            <th scope="col" align="center" abbr="G">Goals</th>
            <th scope="col" align="center" abbr="A">Assists</th>
            <th scope="col" align="center" abbr="P">Points</th>
            <th scope="col" align="center" abbr="P">SOG</th>
            <th scope="col" align="center" abbr="GA">GA</th>
            <th scope="col" align="center" abbr="GA">GAA</th>
            <th scope="col" align="center" abbr="SV">Saves</th>
            <th scope="col" align="center" abbr="SV">Save%</th>
        </tr>
       <tr class="schedRow trRow">
            <td align="center">{$PlayerSeasonStats_Goals}</td>
            <td align="center">{$PlayerSeasonStats_Assists}</td>
            <td align="center">{$PlayerSeasonStats_Points}</td>
            <td align="center">{$PlayerSeasonStats_ShotsOnGoal}</td>
            <td align="center">{$PlayerSeasonStats_GoalsAllowed}</td>
            <IFEQUAL $sportName "Field Hockey">
            <VAR $gAAVG = round($PlayerSeasonStats_GoalsAgainstAverage,2)>
            </IFEQUAL>
            <IFEQUAL $sportName "Girls Lacrosse">
            <VAR $gAAVG = round($PlayerSeasonStats_GoalsAgainstAverageGLC,2)>
            </IFEQUAL>
            <IFEQUAL $sportName "Boys Lacrosse">
            <VAR $gAAVG = round($PlayerSeasonStats_GoalsAgainstAverageBLC,2)>
            </IFEQUAL>
            <td align="center">{$gAAVG}</td>
            <td align="center">{$PlayerSeasonStats_Saves}</td>
<?php
if( 1.0 == $PlayerSeasonStats_SavePercentage) {
  $svPCT = "1.00";
} else {
  $svPCT = substr( sprintf( "%05.3f", $PlayerSeasonStats_SavePercentage), 1 );
}
?>
            <td align="center">{$svPCT}</td>
        </tr>
    </tbody>
</table>










### ------------------------------------------------------------------------ ###
### Game-By-Game ###
### ------------------------------------------------------------------------ ###

<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s {$sportName} Game-By-Game Offensive Stats</h2>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe wide500">
    <tbody>
        <tr id="header-sub">
            <th scope="col" align="left" abbr="G">Date</th>
            <th scope="col" align="left" abbr="G">Opponent</th>
            <th scope="col" align="center" abbr="G">Goals</th>
            <th scope="col" align="center" abbr="A">Assists</th>
            <th scope="col" align="center" abbr="P">Points</th>
        </tr>
<RESULTS list=PlayerGameStats_rows prefix=PlayerGameStats>
<VAR $dateDisplay = date("F j",strtotime($PlayerGameStats_GameDate))>
{$dateTimeDisplay}
        <IFGREATER count($PlayerGameStats_rows) 0>
        <VAR $rowClass="leadersRow trRow">
<tr class="{$rowClass}">
            <td align="left"><a href="{$externalURL}site=default&tpl=Boxscore&ID={$PlayerGameStats_GamePlyrGameID}">{$dateDisplay}</a></td>
            <td align="left"><a href="{$externalURL}site=default&tpl=Boxscore&ID={$PlayerGameStats_GamePlyrGameID}">
<IFEQUAL $Player_SchoolName $PlayerGameStats_AwayTeamName>
    {$PlayerGameStats_HomeTeamName}
<ELSE>
    {$PlayerGameStats_AwayTeamName}
</IFEQUAL>
    </a></td>
            <td align="center">{$PlayerGameStats_Goals}</td>
            <td align="center">{$PlayerGameStats_Assists}</td>
            <td align="center">{$PlayerGameStats_Points}</td>
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
<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s {$sportName} Game-By-Game Goalie Stats</h2>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe wide500">
    <tbody>
        <tr id="header-sub">
            <th scope="col" align="center" abbr="P">Goalie Min.</th>
            <th scope="col" align="center" abbr="GA">SOG</th>
            <th scope="col" align="center" abbr="GA">GA</th>
            <th scope="col" align="center" abbr="GAA">GAA</th>
            <th scope="col" align="center" abbr="SV">Saves</th>
            <th scope="col" align="center" abbr="SV">Save%</th>
        </tr>
        <RESULTS list=PlayerGameStats_rows prefix=PlayerGameStats>
<VAR $dateDisplay = date("F j",strtotime($PlayerGameStats_GameDate))>
{$dateTimeDisplay}
        <IFGREATER count($PlayerGameStats_rows) 0>
        <VAR $rowClass="leadersRow trRow">
<tr class="{$rowClass}">
            <td align="left"><a href="{$externalURL}site=default&tpl=Boxscore&ID={$PlayerGameStats_GamePlyrGameID}">{$dateDisplay}</a></td>
            <td align="left"><a href="{$externalURL}site=default&tpl=Boxscore&ID={$PlayerGameStats_GamePlyrGameID}">
<IFEQUAL $Player_SchoolName $PlayerGameStats_AwayTeamName>
    {$PlayerGameStats_HomeTeamName}
<ELSE>
    {$PlayerGameStats_AwayTeamName}
</IFEQUAL>
    </a></td>
            <td align="center">{$PlayerGameStats_GoalkeeperMinutes}</td>
            <td align="center">{$PlayerGameStats_ShotsOnGoal}</td>
            <td align="center">{$PlayerGameStats_GoalsAllowed}</td>
<?php $gAA = sprintf("%.1f", $PlayerGameStats_GoalsAgainstAverage) ?>
            <td align="center">{$gAA}</td>
            <td align="center">{$PlayerGameStats_Saves}</td>
<?php
if( 1.0 == $PlayerSeasonStats_SavePercentage) {
  $svPCT = "1.00";
} else {
  $svPCT = substr( sprintf( "%05.3f", $PlayerGameStats_SavePercentage), 1 );
}
?>
            <td align="center">{$svPCT}</td>
###            <td align="center">{$PlayerGameStats_SavePercentage}</td>###
</RESULTS>
        </tbody>
        </table>
</div>