<h3>Season Stats</h3>
<h4>Offense</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
    <tbody>
        <tr id="header-sub" class="teamStatsHeader">
            <th scope="col" abbr="" align="right">Avg.</th>
            <th scope="col" abbr="" align="right">Slug %</th>
            <th scope="col" abbr="" align="right">H</th>
            <th scope="col" abbr="" align="right">2B</th>
            <th scope="col" abbr="" align="right">3B</th>
            <th scope="col" abbr="" align="right">HR</th>
            <th scope="col" abbr="" align="right">RBI</th>
            <th scope="col" abbr="" align="right">SB</th>
            <th scope="col" abbr="" align="right">E</th>
        </tr>
        <tr>
<VAR $batAvg = trailingZeroes(round($PlayerSeasonStats_BattingAverage,3),3,true)>
<VAR $slPct = trailingZeroes(round($PlayerSeasonStats_SluggingPercentage,3),3,true)>
<VAR $flPct = trailingZeroes(round($PlayerSeasonStats_FieldingPercentage,3),3,true)>


<IFEQUAL $batAvg 1>
<VAR $btAvg = $batAvg>
<VAR $bAvg = 1>
<ELSE>
<VAR $bAvg = ($batAvg * 1000)>
<VAR $btAvg = ".$bAvg">
</IFEQUAL>

<IFEQUAL $bAvg 0>
<VAR $btAvg = ".000">
</IFEQUAL>

<ROW NAME=LeaderFootballCol STATFIELD="BattingAverage" STAT=$btAvg>

<IFEQUAL $slPct 1>
<VAR $sPct = $slPct>
<ELSE>
<VAR $slugPct = ($slPct * 1000)>
<VAR $sPct = ".$slugPct">
</IFEQUAL>
<IFGREATER $slPct 1>
<VAR $sPct = $slPct>
</IFGREATER>
<IFEQUAL $slPct 0>
<VAR $sPct = ".000">
</IFEQUAL>

<ROW NAME=LeaderFootballCol STATFIELD="SluggingPercentage" STAT=$sPct>
<ROW NAME=LeaderFootballCol STATFIELD="Hits" STAT=$PlayerSeasonStats_Hits>
<ROW NAME=LeaderFootballCol STATFIELD="Doubles" STAT=$PlayerSeasonStats_Doubles>
<ROW NAME=LeaderFootballCol STATFIELD="Triples" STAT=$PlayerSeasonStats_Triples>
<ROW NAME=LeaderFootballCol STATFIELD="HomeRuns" STAT=$PlayerSeasonStats_HomeRuns>
<ROW NAME=LeaderFootballCol STATFIELD="RunsBattedIn" STAT=$PlayerSeasonStats_RunsBattedIn>
<ROW NAME=LeaderFootballCol STATFIELD="StolenBases" STAT=$PlayerSeasonStats_StolenBases>
<ROW NAME=LeaderFootballCol STATFIELD="Errors" STAT=$PlayerSeasonStats_Errors>
</tr>
</tbody>
</table>

<h4>Pitching</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
    <tbody>
        <tr id="header-sub" class="teamStatsHeader">
            <th scope="col" abbr="Earned Run Average" align="right">ERA</th>
            <th scope="col" abbr="Wins" align="right">W</th>
            <th scope="col" abbr="Losses" align="right">L</th>
            <th scope="col" abbr="Saves" align="right">Sv</th>
            <th scope="col" abbr="Save Percent" align="right">Sv %</th>
            <th scope="col" abbr="ShutOuts" align="right">SHO</th>
            <th scope="col" abbr="Complete Games" align="right">CG</th>
            <th scope="col" abbr="Strike outs" align="right">K</th>
            <th scope="col" abbr="Walks" align="right">BB</th>
        </tr>
        <tr>
<VAR $era = trailingZeroes(round($PlayerSeasonStats_EarnedRunAverage,2),2,true)>
<ROW NAME=LeaderFootballCol STATFIELD="EarnedRunAverage" STAT=$era>
<ROW NAME=LeaderFootballCol STATFIELD="Win" STAT=$PlayerSeasonStats_Win>
<ROW NAME=LeaderFootballCol STATFIELD="Loss" STAT=$PlayerSeasonStats_Loss>
<ROW NAME=LeaderFootballCol STATFIELD="Save" STAT=$PlayerSeasonStats_Save>
<ROW NAME=LeaderFootballCol STATFIELD="SavePercentage" STAT=$PlayerSeasonStats_SavePercentage>
<ROW NAME=LeaderFootballCol STATFIELD="Shutout" STAT=$PlayerSeasonStats_Shutout>
<ROW NAME=LeaderFootballCol STATFIELD="CompleteGame" STAT=$PlayerSeasonStats_CompleteGame>
<ROW NAME=LeaderFootballCol STATFIELD="StrikeoutsPitched" STAT=$PlayerSeasonStats_StrikeoutsPitched>
<ROW NAME=LeaderFootballCol STATFIELD="WalksAllowed" STAT=$PlayerSeasonStats_WalksAllowed>
</tr>
</tbody>
</table>


<h3>Game-By-Game Stats</h3>
<h2>Coming soon.</h2>