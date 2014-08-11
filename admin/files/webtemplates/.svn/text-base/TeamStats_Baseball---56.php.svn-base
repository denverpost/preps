<h3>Team Stats</h3>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr class="teamStatsHeader">
            <th scope="col" abbr="" align="right">Win %</th>
            <th scope="col" abbr="" align="right">Avg.</th>
            <th scope="col" abbr="" align="right">Slug %</th>
            <th scope="col" abbr="" align="right">H</th>
            <th scope="col" abbr="" align="right">2B</th>
            <th scope="col" abbr="" align="right">3B</th>
            <th scope="col" abbr="" align="right">HR</th>
            <th scope="col" abbr="" align="right">RBI</td>
            <th scope="col" abbr="" align="right">SB</th>
            <th scope="col" abbr="" align="right">ERA</th>
            <th scope="col" abbr="" align="right">W</th>
            <th scope="col" abbr="" align="right">SV</th>
            <th scope="col" abbr="" align="right">SHO</th>
            <th scope="col" abbr="" align="right">E</th>
            <th scope="col" abbr="" align="right">K</th>
            <th scope="col" abbr="" align="right">BB</th>
        </tr>
        <tr class="resultsText">
<VAR $winPct = trailingZeroes(round($TeamSeasonStats_WinningPercentage,3),3,true)>
<VAR $batAvg = trailingZeroes(round($TeamSeasonStats_BattingAverage,3),3,true)>
<VAR $slgPct = trailingZeroes(round($TeamSeasonStats_SluggingPercentage,3),3,true)>
<VAR $fldPct = trailingZeroes(round($TeamSeasonStats_FieldingPercentage,3),3,true)>
<VAR $era = trailingZeroes(round($TeamSeasonStats_EarnedRunAverage,2),2,true)>


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

<IFEQUAL $winPct 1>
<VAR $wnPct = $winPct>
<VAR $wPct = 1>
<ELSE>
<VAR $wPct = ($winPct * 1000)>
<VAR $wnPct = ".$wPct">
</IFEQUAL>
<IFEQUAL $wPct 0>
<VAR $wnPct = ".000">
</IFEQUAL>

<IFEQUAL $slgPct 1>
<VAR $sPct = $slgPct>
<ELSE>
<VAR $slugPct = ($slgPct * 1000)>
<VAR $sPct = ".$slugPct">
</IFEQUAL>
<IFGREATER $slgPct 1>
<VAR $sPct = $slgPct>
</IFGREATER>
<IFEQUAL $slgPct 0>
<VAR $sPct = ".000">
</IFEQUAL>


<td align="right">{$wnPct}</td>
<td align="right">{$btAvg}</td>
<td align="right">{$sPct}</td>
<td align="right">{$TeamSeasonStats_TotalHits}</td>
<td align="right">{$TeamSeasonStats_Doubles}</td>
<td align="right">{$TeamSeasonStats_Triples}</td>
<td align="right">{$TeamSeasonStats_HomeRuns}</td>
<td align="right">{$TeamSeasonStats_RunsBattedIn}</td>
<td align="right">{$TeamSeasonStats_StolenBases}</td>
<td align="right">{$era}</td>
<td align="right">{$TeamSeasonStats_TotalWins}</td>
<td align="right">{$TeamSeasonStats_Save}</td>
<td align="right">{$TeamSeasonStats_Shutout}</td>
<td align="right">{$TeamSeasonStats_TotalErrors}</td>
<td align="right">{$TeamSeasonStats_StrikeoutsPitched}</td>
<td align="right">{$TeamSeasonStats_WalksAllowed}</td>
</td>
        </tr>
    </tbody>
</table>