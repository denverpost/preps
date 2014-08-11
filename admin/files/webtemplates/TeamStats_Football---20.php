<h3>Team Stats</h3>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide450">
<tbody><tr id="header-sub">
<th scope="col" abbr="" align="center">Tot yds</th>
###<th scope="col" abbr="" align="center">1st downs</th>###
<th scope="col" abbr="" align="center">Rush Att</th>
<th scope="col" abbr="" align="center">Rush yards</th>
<th scope="col" abbr="" align="center">Yds/Att</th>
<th scope="col" abbr="" align="center">Pass att</th>
<th scope="col" abbr="" align="center">Pass comp</th>
<th scope="col" abbr="" align="center">Comp %</th>
<th scope="col" abbr="" align="center">Pass Yds</th>
<th scope="col" abbr="" align="center">Rec</th>
<th scope="col" abbr="" align="center">Rec yards</th>
<th scope="col" abbr="" align="center">Yds/Catch</th>
</tr>
<tr class="resultsText">
<VAR $yardsAtt = round($TeamSeasonStats_RushingYardsPerAttempt,1)>
<VAR $yardsCatch = round($TeamSeasonStats_YardsPerCatch,1)>

<? $yardsCatch = sprintf("%.1f", $yardsCatch) ?>


<VAR $passComPercent = round($TeamSeasonStats_PassCompletionPercentage,1)>

<?php
$totalYardsFormatted =  $TeamSeasonStats_TotalYards;
$totalYardsFormatted  = number_format($totalYardsFormatted );
$totalYardsFormatted  = sprintf("%s", $totalYardsFormatted);
?>

<td align="center">{$totalYardsFormatted}</td>
###<td align="center">{$TeamSeasonStats_FirstDowns}</td>###
<td align="center">{$TeamSeasonStats_RushingAttempts}</td>

<?php
$rushingYardsFormatted =  $TeamSeasonStats_RushingYards;
$rushingYardsFormatted = number_format($rushingYardsFormatted);
$rushingYardsFormatted = sprintf("%s", $rushingYardsFormatted);
?>

<td align="center">{$rushingYardsFormatted}</td>
<td align="center">{$yardsAtt}</td>
<td align="center">{$TeamSeasonStats_PassAttempts}</td>
<td align="center">{$TeamSeasonStats_PassCompletions}</td>
<td align="center">{$passComPercent}</td>

<?php
$passingYardsFormatted =  $TeamSeasonStats_PassingYards;
$passingYardsFormatted = number_format($passingYardsFormatted);
$passingYardsFormatted = sprintf("%s", $passingYardsFormatted);
?>

<td align="center">{$passingYardsFormatted}</td>
<td align="center">{$TeamSeasonStats_Receptions}</td>

<?php
$receivingYardsFormatted =  $TeamSeasonStats_ReceivingYards;
$receivingYardsFormatted = number_format($receivingYardsFormatted);
$receivingYardsFormatted = sprintf("%s", $receivingYardsFormatted);
?>

<td align="center">{$receivingYardsFormatted}</td>
<td align="center">{$yardsCatch}</td>
</td>
</tr>
</tbody>
</table>
