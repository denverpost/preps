<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s Prep Football Season Stats</h2>
<IFGREATER $PlayerSeasonStats_PassAttempts 0>
<h4>Passing</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe wide400">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="Comp">Comp</th>
            <th scope="col" abbr="Att">Att</th>
            <th scope="col" abbr="Pct">Pct</th>
            <th scope="col" abbr="Yds">Yds</th>
            <th scope="col" abbr="TD">TD</th>
            <th scope="col" abbr="INT">INT</th>
        </tr>
        <tr class="schedRow trRow">
            <VAR $compPct = round($PlayerSeasonStats_PassCompletionPercentage,1)>
            <td align="right">{$PlayerSeasonStats_PassCompletions}</td>
            <td align="right">{$PlayerSeasonStats_PassAttempts}</td>
            <td align="right">{$compPct}</td>
            <td align="right">{$PlayerSeasonStats_PassingYards}</td>
            <td align="right">{$PlayerSeasonStats_PassingTouchdowns}</td>
            <td align="right">{$PlayerSeasonStats_PassingInterceptions}</td>
        </tr>
    </tbody>
</table>
</IFGREATER>

<IFGREATER $PlayerSeasonStats_RushingAttempts 0>
<h4>Rushing</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe wide400">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="Att">Attempts</th>
            <th scope="col" abbr="Yds">Yards</th>
            <th scope="col" abbr="Yds/Att">Yards/Attempt</th>
            <th scope="col" abbr="Long">Long</th>
            <th scope="col" abbr="TD">TD</th>
        </tr>
        <tr class="schedRow trRow">
<VAR $yardsAtt = round($PlayerSeasonStats_RushingYardsPerAttempt,1)>
            <td align="right">{$PlayerSeasonStats_RushingAttempts}</td>
            <td align="right">{$PlayerSeasonStats_RushingYards}</td>
            <td align="right">{$yardsAtt}</td>
            <td align="right">{$PlayerSeasonStats_RushingLong}</td>
            <td align="right">{$PlayerSeasonStats_RushingTouchdowns}</td>
        </tr>
    </tbody>
</table>
</IFGREATER>

<IFGREATER $PlayerSeasonStats_Receptions 0>
<h4>Receiving</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe wide400">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Rec</th>
            <th scope="col" abbr="">Yds</th>
            <th scope="col" abbr="">Yds/Catch</th>
            <th scope="col" abbr="">Long</th>
            <th scope="col" abbr="">TD</th>
        </tr>
        <tr class="schedRow trRow">
<VAR $yardsCatch = round($PlayerSeasonStats_YardsPerCatch,1)>
            <td align="right">{$PlayerSeasonStats_Receptions}</td>
            <td align="right">{$PlayerSeasonStats_ReceivingYards}</td>
            <td align="right">{$yardsCatch}</td>
            <td align="right">{$PlayerSeasonStats_ReceptionLong}</td>
            <td align="right">{$PlayerSeasonStats_ReceivingTouchdowns}</td>
        </tr>
    </tbody>
</table>
</IFGREATER>

<IFTRUE $PlayerSeasonStats_FieldGoalsAttempted != 0 || $PlayerSeasonStats_PointAfterTouchdownAttempts != 0 >
<h4>PlaceKicking</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
    <tbody>
        <tr id="header-main">
            <th scope="col" abbr="" colspan="2">Extra Points</th>
            <th scope="col" abbr="" colspan="3">Field Goals</th>
        </tr>
        <tr id="header-sub">
            <th scope="col" abbr="">Attempted</th>
            <th scope="col" abbr="">Made</th>
            <th scope="col" abbr="">Attempted</th>
            <th scope="col" abbr="">Made</th>
            <th scope="col" abbr="">Long</th>
        </tr>
        <tr class="schedRow trRow">
            <td align="right">{$PlayerSeasonStats_PointAfterTouchdownAttempts}</td>
            <td align="right">{$PlayerSeasonStats_PointAfterTouchdown}</td>
            <td align="right">{$PlayerSeasonStats_FieldGoalsAttempted}</td>
            <td align="right">{$PlayerSeasonStats_FieldGoalsMade}</td>
            <td align="right">{$PlayerSeasonStats_FieldGoalLong}</td>
        </tr>
    </tbody>
</table>
</IFTRUE>


<IFGREATER $PlayerSeasonStats_Punts 0>
<h4>Punting</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
    <tbody>
        <tr id="header-sub">
            <th scope="col" abbr=""># of Punts</th>
            <th scope="col" abbr="">Average Yards</th>
            <th scope="col" abbr="">Blocked Punts</th>
            <th scope="col" abbr="">Long</th>
        </tr>
        <tr class="schedRow trRow">
            <td align="right">{$PlayerSeasonStats_Punts}</td>
            <td align="right">{$PlayerSeasonStats_PuntingAverage}</td>
            <td align="right">{$PlayerSeasonStats_PuntsBlocked}</td>
            <td align="right">{$PlayerSeasonStats_PuntingLong}</td>
###
            <td align="right">{$PlayerSeasonStats_}</td>
            <td align="right">{$PlayerSeasonStats_}</td>
###
        </tr>
    </tbody>
</table>
</IFGREATER>


<IFTRUE $PlayerSeasonStats_DefensiveInterceptions != 0 || $PlayerSeasonStats_InterceptionYards != 0 || $PlayerSeasonStats_FumbleRecoveries != 0 || PlayerSeasonStats_FumbleRecYards != 0 || $PlayerSeasonStats_Tackles != 0 || $PlayerSeasonStats_Sacks != 0 || $PlayerSeasonStats_SackYards != 0 >
<h4>Defense</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide500">
    <tbody>
        <tr id="header-sub">
            <th scope="col" abbr="INT">Interceptions</th>
            <th scope="col" abbr="INTR">Interception Return Yards</th>
            <th scope="col" abbr="FUM">Fumble Recoveries</th>
            <th scope="col" abbr="RUBR">Fumble Return Yards</th>
            <th scope="col" abbr="T">Tackles</th>
            <th scope="col" abbr="S">Sacks</th>
            <th scope="col" abbr="SY">Sack Yards</th>
        </tr>
        <tr class="schedRow trRow">
            <td align="right">{$PlayerSeasonStats_DefensiveInterceptions}</td>
            <td align="right">{$PlayerSeasonStats_InterceptionYards}</td>
            <td align="right">{$PlayerSeasonStats_FumbleRecoveries}</td>
            <td align="right">{$PlayerSeasonStats_FumbleRecYards}</td>
            <td align="right">{$PlayerSeasonStats_Tackles}</td>
            <td align="right">{$PlayerSeasonStats_Sacks}</td>
            <td align="right">{$PlayerSeasonStats_SackYards}</td>
        </tr>
    </tbody>
</table>
</IFTRUE>
###
<IFGREATER $PlayerSeasonStats_PassAttempts 0>
<h4>Placekicking</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Comp</th>
            <th scope="col" abbr="">Att</th>
            <th scope="col" abbr="">Pct</th>
            <th scope="col" abbr="">Yds</th>
            <th scope="col" abbr="">TD</th>
            <th scope="col" abbr="">INT</th>
        </tr>
        <tr class="schedRow trRow">
            <VAR $compPct = round($PlayerSeasonStats_PassCompletionPercentage,1)>
            <td align="right">{$PlayerSeasonStats_PassCompletions}</td>
            <td align="right">{$PlayerSeasonStats_PassAttempts}</td>
            <td align="right">{$compPct}</td>
            <td align="right">{$PlayerSeasonStats_PassingYards}</td>
            <td align="right">{$PlayerSeasonStats_PassingTouchdowns}</td>
            <td align="right">{$PlayerSeasonStats_PassingInterceptions}</td>
        </tr>
    </tbody>
</table>
</IFGREATER>
###

<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s Football Game-By-Game Stats</h2>
