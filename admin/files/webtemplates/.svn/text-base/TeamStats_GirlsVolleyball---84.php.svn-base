<h3>Team Stats</h3>
<IFGREATER $TeamSeasonStats_TotalAttempts 0>
<VAR $hitPercentage = round(($TeamSeasonStats_TotalKills-$TeamSeasonStats_TotalErrors)/$TeamSeasonStats_TotalAttempts,2)>
<ELSE>
<VAR $hitPercentage = "-">
</IFGREATER>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
<tbody><tr id="header-sub">
<th scope="col" abbr="">GP</th>
<th scope="col" abbr="">K</th>
<th scope="col" abbr="">E</th>
<th scope="col" abbr="">TotAtt</th>
<th scope="col" abbr="">H%</th>
<th scope="col" abbr="">Asst</th>
<th scope="col" abbr="">SA</th>
<th scope="col" abbr="">SvcErr</th>
<th scope="col" abbr="">RecErr</th>
<th scope="col" abbr="">Digs</th>
<th scope="col" abbr="">BlkSolos</th>
<th scope="col" abbr="">BlkAsst</th>
<th scope="col" abbr="">BlkErr</th>
<th scope="col" abbr="">BHE</th>
</tr>
<tr class="resultsText">
<td align="right">{$TeamSeasonStats_TeamGames}</td>
<td align="right">{$TeamSeasonStats_TotalKills}</td>
<td align="right">{$TeamSeasonStats_TotalErrors}</td>
<td align="right">{$TeamSeasonStats_TotalAttempts}</td>
<td align="right">{$hitPercentage}</td>
<td align="right">{$TeamSeasonStats_Assists}</td>
<td align="right">{$TeamSeasonStats_ServiceAces}</td>
<td align="right">{$TeamSeasonStats_ServiceErrors}</td>
<td align="right">{$TeamSeasonStats_ReceivingErrors}</td>
<td align="right">{$TeamSeasonStats_Digs}</td>
<td align="right">{$TeamSeasonStats_BlockSolos}</td>
<td align="right">{$TeamSeasonStats_BlockAssists}</td>
<td align="right">{$TeamSeasonStats_BlockErrors}</td>
<td align="right">{$TeamSeasonStats_BallHandlingErrors}</td>
</tr>
</tbody>
</table>