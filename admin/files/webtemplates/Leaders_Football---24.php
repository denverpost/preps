<h2>Colorado Prep Football Leaders</h2>
<?PHP $strNow = time() ?>
<VAR $myTime = strtotime("30 November 2010")>
<VAR $seasonStart = strtotime("02 September 2010")>

<?PHP $difference = $strNow - $seasonStart ?>

<?PHP $difference = round($difference / 604800) ?>

<VAR $tpl = "Leaders">
<IFNOTEMPTY $form_ConferenceID>
<VAR $selector = "&ConferenceID=".$form_ConferenceID>
<VAR $tpl = "Conference">
</IFNOTEMPTY>
<IFNOTEMPTY $form_ClassID>
<VAR $selector = "&ClassID=".$form_ClassID>
<VAR $tpl = "Class">
</IFNOTEMPTY>
<IFNOTEMPTY $form_res>
<VAR $selector = $selector."&res=".$form_res>
</IFNOTEMPTY>

<VAR $beginLink = "home.html?site=default&tpl=".$tpl."&Sport=".$form_Sport.$selector."&sort=">
<form name="leaderForm" action="home.html" method="get">
<input type="hidden" name="tpl" id="tpl" value="{$form_tpl}" />
<input type="hidden" name="site" id="site" value="{$form_site}" />
<input type="hidden" name="Sport" id="Sport" value="{$form_Sport}" />
<input type="hidden" name="ConferenceID" id="ConferenceID" value="{$form_ConferenceID}" />
<input type="hidden" name="ClassID" id="ClassID" value="{$form_ClassID}" />
<IFEMPTY $form_res>
<VAR $resultNum=25>
<ELSE>
<VAR $resultNum=$form_res>
</IFEMPTY>
<table cellpadding="0" cellspacing="0" class="leadersTable" width="100%">
<tr><td>
<br>
<IFNOTEMPTY $form_leadersType>
<span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span>
</IFNOTEMPTY>
<font class="smallText">Click column headers to sort. Show top <a href = "{$beginLink}&res=5">5</a> | <a href = "{$beginLink}&res=10">10</a> | <a href = "{$beginLink}&res=15">15</a> |  <a href = "{$beginLink}&res=25">25</a> |  <a href = "{$beginLink}&res=50">50</a>|  <a href = "{$beginLink}&res=100">100</a></font>
</td></tr>

<IFNOTEMPTY $form_leadersType>
<tr><td colspan="50">
<div id="statKey" style="display:none">
<table class="keyTable" cellpadding="0" cellspacing="0">
<IFEQUAL $form_leadersType "Passing">
<tr class="statKeyRow">
<td id="keyPassCompletions">Comp: Pass completions</td>
<td id="keyPassAttempts">Att: Pass attempts</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyPassCompletionPercentage">Pct: Pass completion percentage</td>
<td id="keyPassingYards">Yds: Passing yards</td>
</tr>
<tr class="statKeyRow">
<td id="keyPassingTouchdowns">TD: Passing touchdowns</td>
<td id="keyPassingInterceptions">INT: Interceptions</td>
</tr>
</IFEQUAL>

<IFEQUAL $form_leadersType "Rushing">
<tr class="statKeyRow">
<td id="keyRushingAttempts">Att: Rushing attempts</td>
<td id="keyRushingYards">Yds: Rushing yards</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyRushingYardsPerAttempt">Yds/Att: Rushing yards per attempt</td>
<td id="keyRushingLong">Long: Rushing long</td>
</tr>
<tr class="statKeyRow">
<td id="keyRushingTouchdowns">TD: Rushing touchdowns</td>
</tr>
</IFEQUAL>

<IFEQUAL $form_leadersType "Receiving">
<tr class="statKeyRow">
<td id="keyReceptions">Rec: Receptions</td>
<td id="keyReceivingYards">Yds: Receiving yards</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyYardsPerCatch">Yds/Catch: Receiving yards per catch</td>
<td id="keyReceptionLong">Long: Reception long</td>
</tr>
<tr class="statKeyRow">
<td id="keyReceivingTouchdowns">TD: Receiving touchdowns</td>
</tr>
</IFEQUAL>

</table>
</div>
</td></tr>
</IFNOTEMPTY>
</table>

###<?PHP $strNow = time() ?>
<VAR $myTime = strtotime("30 November 2010")>
<VAR $seasonStart = strtotime("02 September 2010")>

<?PHP $difference = $strNow - $seasonStart ?>

<?PHP $difference = round($difference / 604800) ?>###

<?PHP $minPasses = round($difference * 10) ?>
<?PHP $minPassGreaterThan = (round($minPasses - 1)) ?>
###SEASONSTART: {$seasonStart}
NOW: {$strNow}
DIFFERENCE: {$difference}
MINIMUM PASS ATTEMPTS: {$minPasses} <br>
MINIMUM PASS greater than: {$minPassGreaterThan} <br>###

<IFGREATER 1 $difference>
<VAR $minPasses = 1>
</IFGREATER>

<IFGREATER  $minPassGreaterThan 89>
<VAR $minPassGreaterThan = 89>
<VAR $minPassNumber = 90>
</IFGREATER>
<IFEQUAL $minPasses 1>
<VAR $attempts = "Attempt">
<ELSE>
<VAR $attempts = "Attempts">
</IFEQUAL>
<a name="passing"></a>
<h4>Passing (Minimum {$minPassNumber} {$attempts})</h4>
###<font class="smallText">Minimum {$minPassesLimit} attempts</font>###
###<VAR $whereClause = " AND PassAttempts ".chr(62)." 0">###

<?PHP $minPassesLimit = ($minPasses + 1) ?>


<VAR $whereClause = " AND PassAttempts ".chr(62)." $minPassGreaterThan">

###MINPASSGREATERTHAN: {$minPassGreaterThan}<BR>###
<IFEMPTY $form_sort>
<VAR $sortClause = "PassingYards DESC">
<ELSE>

<IFEQUAL $form_sort "PassingInterceptions">
  <VAR $sortClause = "PassingInterceptions ASC">
<ELSE>
  <VAR $sortClause = $form_sort." DESC">
</IFEQUAL>

###<VAR $sortClause = $form_sort." DESC">###

</IFEMPTY>

###<IFEQUAL $form_sort "PassingInterceptions">
  <VAR $sortClause = "PassingInterceptions ASC">
<ELSE>
  <VAR $sortClause = $form_sort." DESC">
</IFEQUAL>###




<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause count=$resultNum WHERECLAUSE=$whereClause>
<table class="leadersTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}PassCompletions#passing" onmouseover="highlightKey('keyPassCompletions')" onmouseout = "unHighlightKey('keyPassCompletions')">Comp</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}PassAttempts#passing" onmouseover="highlightKey('keyPassAttempts')" onmouseout = "unHighlightKey('keyPassAttempts')">Att</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}PassCompletionPercentage#passing" onmouseover="highlightKey('keyPassCompletionPercentage')" onmouseout = "unHighlightKey('keyPassCompletionPercentage')">Pct</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}PassingYards#passing" onmouseover="highlightKey('keyPassingYards')" onmouseout = "unHighlightKey('keyPassingYards')">Yds</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}PassingTouchdowns#passing" onmouseover="highlightKey('keyPassingTouchdowns')" onmouseout = "unHighlightKey('keyPassingTouchdowns')">TD</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}PassingInterceptions#passing" onmouseover="highlightKey('keyPassingInterceptions')" onmouseout = "unHighlightKey('keyPassingInterceptions')">INT</a></th>
        </tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Passing>
        <tr class="{$rowClass}">
            <td>
                <a href="{$externalURL}site=default&tpl=Player&ID={$Passing_PlayerID}" class="leadersNameLink">
                    {$Passing_PlayerFirstName} {$Passing_PlayerLastName}</a></td>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Passing_TeamID}" class="leadersTeamLink">
                    {$Passing_TeamName}</a></td>
<VAR $compPct = round($Passing_PassCompletionPercentage,2)>
<ROW NAME=LeaderFootballCol STATFIELD="PassCompletions" STAT=$Passing_PassCompletions>
<ROW NAME=LeaderFootballCol STATFIELD="PassAttempts" STAT=$Passing_PassAttempts>
<? $compPct = sprintf("%.1f", $compPct) ?>
<ROW NAME=LeaderFootballCol STATFIELD="PassCompletionPercentage" STAT=$compPct>
<ROW NAME=LeaderFootballCol STATFIELD="PassingYards" STAT=$Passing_PassingYards>
<ROW NAME=LeaderFootballCol STATFIELD="PassingTouchdowns" STAT=$Passing_PassingTouchdowns>
<ROW NAME=LeaderFootballCol STATFIELD="PassingInterceptions" STAT=$Passing_PassingInterceptions>
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
<br /><br />


<a name="rushing"></a>
<h4>Rushing (Minimum 100 yards and 5 attempts)</h4>
###<font class="smallText">Minimum 100 yards</font>###
###<VAR $whereClause = " AND RushingYards ".chr(62)." 99">###
<VAR $whereClause = " AND RushingYards ".chr(62)." 99 AND RushingAttempts ".chr(62)." 4">
<IFEMPTY $form_sort>
<VAR $sortClause = "RushingYards DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause count=$resultNum WHERECLAUSE=$whereClause>
<table class="leadersTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}RushingAttempts#rushing" onmouseover="highlightKey('keyRushingAttempts')" onmouseout = "unHighlightKey('keyRushingAttempts')">Att</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}RushingYards#rushing" onmouseover="highlightKey('keyRushingYards')" onmouseout = "unHighlightKey('keyRushingYards')">Yds</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}RushingYardsPerAttempt#rushing" onmouseover="highlightKey('keyRushingYardsPerAttempt')" onmouseout = "unHighlightKey('keyRushingYardsPerAttempt')">Yds/Att</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}RushingLong#rushing" onmouseover="highlightKey('keyRushingLong')" onmouseout = "unHighlightKey('keyRushingLong')">Long</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}RushingTouchdowns#rushing" onmouseover="highlightKey('keyRushingTouchdowns')" onmouseout = "unHighlightKey('keyRushingTouchdowns')">TD</a></th>
        </tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Rushing>
        <tr class="{$rowClass}">
            <td>
                <a href="{$externalURL}site=default&tpl=Player&ID={$Rushing_PlayerID}" class="leadersNameLink">
                    {$Rushing_PlayerFirstName} {$Rushing_PlayerLastName}</a></td>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Rushing_TeamID}" class="leadersTeamLink">
                    {$Rushing_TeamName}</a></td>
<VAR $yardsAtt = round($Rushing_RushingYardsPerAttempt,2)>
<ROW NAME=LeaderFootballCol STATFIELD="RushingAttempts" STAT=$Rushing_RushingAttempts>
<ROW NAME=LeaderFootballCol STATFIELD="RushingYards" STAT=$Rushing_RushingYards>
<? $yardsAtt = sprintf("%.1f", $yardsAtt) ?>
<ROW NAME=LeaderFootballCol STATFIELD="RushingYardsPerAttempt" STAT=$yardsAtt>
<ROW NAME=LeaderFootballCol STATFIELD="RushingLong" STAT=$Rushing_RushingLong>
<ROW NAME=LeaderFootballCol STATFIELD="RushingTouchdowns" STAT=$Rushing_RushingTouchdowns>
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
<br /><br />



<a name="receiving"></a>
<h4>Receiving (Minimum 10 receptions and 100 yards)</h4>
###<font class="smallText">Minimum 15 receptions</font>###
###<VAR $whereClause = " AND Receptions ".chr(62)." 0">###
<VAR $whereClause = " AND Receptions ".chr(62)." 9 AND ReceivingYards ".chr(62)." 99">
<IFEMPTY $form_sort>
<VAR $sortClause = "ReceivingYards DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause count=$resultNum WHERECLAUSE=$whereClause>
<table class="leadersTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}Receptions#receiving" onmouseover="highlightKey('keyReceptions')" onmouseout = "unHighlightKey('keyReceptions')">Rec</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}ReceivingYards#receiving" onmouseover="highlightKey('keyReceivingYards')" onmouseout = "unHighlightKey('keyReceivingYards')">Yds</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}YardsPerCatch#receiving" onmouseover="highlightKey('keyYardsPerCatch')" onmouseout = "unHighlightKey('keyYardsPerCatch')">Yds/Catch</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}ReceptionLong#receiving" onmouseover="highlightKey('keyReceptionLong')" onmouseout = "unHighlightKey('keyReceptionLong')">Long</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}ReceivingTouchdowns#receiving" onmouseover="highlightKey('keyReceivingTouchdowns')" onmouseout = "unHighlightKey('keyReceivingTouchdowns')">TD</a></th>
        </tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Receiving>
        <tr class="{$rowClass}">
            <td>
                <a href="{$externalURL}site=default&tpl=Player&ID={$Receiving_PlayerID}" class="leadersNameLink">
                    {$Receiving_PlayerFirstName} {$Receiving_PlayerLastName}</a></td>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Receiving_TeamID}" class="leadersTeamLink">
                    {$Receiving_TeamName}</a></td>
<VAR $yardsCatch = round($Receiving_YardsPerCatch)>
<ROW NAME=LeaderFootballCol STATFIELD="Receptions" STAT=$Receiving_Receptions>
<ROW NAME=LeaderFootballCol STATFIELD="ReceivingYards" STAT=$Receiving_ReceivingYards>
<? $yardsCatch = sprintf("%.1f", $Receiving_YardsPerCatch) ?>
###<ROW NAME=LeaderFootballCol STATFIELD="ReceivingYards" STAT=$Receiving_YardsPerCatch>###
<ROW NAME=LeaderFootballCol STATFIELD="YardsPerCatch" STAT=$yardsCatch>
<ROW NAME=LeaderFootballCol STATFIELD="ReceptionLong" STAT=$Receiving_ReceptionLong>
<ROW NAME=LeaderFootballCol STATFIELD="ReceivingTouchdowns" STAT=$Receiving_ReceivingTouchdowns>
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


<br /><br />

<!-- punting leaders -->
<?PHP $minPunts = round(($difference * 1)) ?>
<?PHP $minPuntsGreaterThan = ($minPunts - 1) ?>

###SEASONSTART: {$seasonStart}
NOW: {$strNow}
DIFFERENCE: {$difference}
MINIMUM Punt ATTEMPTS: {$minPunts} <br>
MINIMUM Punt greater than: {$minPuntsGreaterThan} <br>###



<IFGREATER 1 $difference>
<VAR $minPunts = 1>
<VAR $minPuntsGreaterThan = 0>
</IFGREATER>

<IFGREATER $minPuntsGreaterThan 8>
<VAR $minPuntsGreaterThan = 8>
</IFGREATER>
<IFEQUAL $minPunts 1>
<VAR $attempts = "Punt">
<VAR $minPuntsGreaterThan = 0>
<ELSE>
<VAR $attempts = "Punts">
</IFEQUAL>



<a name="punting"></a>
<h4>Punting (Minimum {$minPunts} {$attempts})</h4>
###<font class="smallText">Minimum 10 punts</font>###
<VAR $whereClause = " AND Punts ".chr(62)." $minPuntsGreaterThan">
<IFEMPTY $form_sort>
<VAR $sortClause = "PuntingYards DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause count=$resultNum WHERECLAUSE=$whereClause>
<table class="leadersTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}Punts#punting" onmouseover="highlightKey('keyPunts')" onmouseout = "unHighlightKey('keyPunts')">Punt</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}PuntingYards#punting" onmouseover="highlightKey('keyPuntingYards')" onmouseout = "unHighlightKey('keyPuntingYards')">Yds</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}PuntingAverage#punting" onmouseover="highlightKey('keyPuntingAverage')" onmouseout = "unHighlightKey('keyPuntingAverage')">Avg</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}PuntingLong#punting" onmouseover="highlightKey('keyPuntingLong')" onmouseout = "unHighlightKey('keyPuntsLong')">Long</a></th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}PuntsBlocked#punting" onmouseover="highlightKey('keyPuntsBlocked')" onmouseout = "unHighlightKey('keyPuntsBlocked')">Blk</a></th>
        </tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Punting>
        <tr class="{$rowClass}">
            <td>
                <a href="{$externalURL}site=default&tpl=Player&ID={$Punting_PlayerID}" class="leadersNameLink">
                    {$Punting_PlayerFirstName} {$Punting_PlayerLastName}</a></td>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Punting_TeamID}" class="leadersTeamLink">
                    {$Punting_TeamName}</a></td>
<VAR $yardsCatch = round($Punting_YardsPerCatch)>
<ROW NAME=LeaderFootballCol STATFIELD="Punts" STAT=$Punting_Punts>
<ROW NAME=LeaderFootballCol STATFIELD="PuntingYards" STAT=$Punting_PuntingYards>
<? $puntingAverage = sprintf("%.1f", $Punting_PuntingAverage) ?>
<ROW NAME=LeaderFootballCol STATFIELD="PuntingAverage" STAT=$puntingAverage>
<ROW NAME=LeaderFootballCol STATFIELD="PuntingLong" STAT=$Punting_PuntingLong>
<ROW NAME=LeaderFootballCol STATFIELD="PuntsBlocked" STAT=$Punting_PuntsBlocked>
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
<!-- end punting leaders -->

<br /><br />

<!-- placekicking leaders -->
<a name="placekicking"></a>
<h4>Placekicking</h4>
<VAR $whereClause = " AND FieldGoalsMade+PointAfterTouchdown ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "PlacekickingPoints DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause count=$resultNum WHERECLAUSE=$whereClause>
<table class="leadersTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" align="right"><a href="{$beginLink}PointAfterTouchdownAttempts#placekicking" onmouseover="highlightKey('keyPointAfterTouchdownAttempts')" onmouseout = "unHighlightKey('keyPointAfterTouchdownAttempts')">PAT att</a></th>

            <th scope="col" abbr="" align="right"><a href="{$beginLink}PointAfterTouchdown#placekicking" onmouseover="highlightKey('keyPointAfterTouchdown')" onmouseout = "unHighlightKey('keyPointAfterTouchdown')">PAT</a></th>

            <th scope="col" abbr="" align="right"><a href="{$beginLink}FieldGoalsAttempted#placekicking" onmouseover="highlightKey('keyFieldGoalsAttempted')" onmouseout = "unHighlightKey('keyFieldGoalsAttempted')">FG att</a></th>

           <th scope="col" abbr="" align="right"><a href="{$beginLink}FieldGoalsMade#placekicking" onmouseover="highlightKey('keyFieldGoalsMade')" onmouseout = "unHighlightKey('keyFieldGoalsMade')">FG</a></th>

            <th scope="col" abbr="" align="right"><a href="{$beginLink}PlacekickingPoints#placekicking" onmouseover="highlightKey('keyPlacekickingPoints')" onmouseout = "unHighlightKey('keyPlacekickingPoints')">Pts</a></th>
        </tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Placekicking>
        <tr class="{$rowClass}">
            <td>
                <a href="{$externalURL}site=default&tpl=Player&ID={$Placekicking_PlayerID}" class="leadersNameLink">
                    {$Placekicking_PlayerFirstName} {$Placekicking_PlayerLastName}</a></td>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Placekicking_TeamID}" class="leadersTeamLink">
                    {$Placekicking_TeamName}</a></td>
<VAR $yardsCatch = round($Placekicking_YardsPerCatch)>
<ROW NAME=LeaderFootballCol STATFIELD="PointAfterTouchdownAttempts" STAT=$Placekicking_PointAfterTouchdownAttempts>
<ROW NAME=LeaderFootballCol STATFIELD="PointAfterTouchdown" STAT=$Placekicking_PointAfterTouchdown>
<ROW NAME=LeaderFootballCol STATFIELD="FieldGoalsAttempted" STAT=$Placekicking_FieldGoalsAttempted>
<ROW NAME=LeaderFootballCol STATFIELD="PlacekickingFieldGoalsMade" STAT=$Placekicking_FieldGoalsMade>
<ROW NAME=LeaderFootballCol STATFIELD="PlacekickingPoints" STAT=$Placekicking_PlacekickingPoints>
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
<!-- end placekicking leaders -->

<br />
<br /><!-- defensive leaders -->
<a name="defensive"></a>
<h4>Defensive</h4>
<VAR $whereClause = " AND Tackles ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "Tackles DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause count=$resultNum WHERECLAUSE=$whereClause>
<table class="leadersTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
        <th scope="col" abbr="">Name</th>
        <th scope="col" abbr="">Team</th>
        <th scope="col" abbr="" align="right"><a href="{$beginLink}DefensiveInterceptions#defensive" onmouseover="highlightKey('keyDefensiveInterceptions')" onmouseout = "unHighlightKey('keyDefensiveInterceptions')">Int</a></th>

        <th scope="col" abbr="" align="right"><a href="{$beginLink}InterceptionYards#defensive" onmouseover="highlightKey('keyInterceptionYards')" onmouseout = "unHighlightKey('keyInterceptionYards')">Yds</a></th>

        <th scope="col" abbr="" align="right"><a href="{$beginLink}InterceptionTouchdowns#defensive" onmouseover="highlightKey('keyInterceptionTouchdowns')" onmouseout = "unHighlightKey('keyInterceptionTouchdowns')">TD</a></th>

        <th scope="col" abbr="" align="right"><a href="{$beginLink}FumbleRecoveries#defensive" onmouseover="highlightKey('keyFumbleRecoveries')" onmouseout = "unHighlightKey('keyFumbleRecoveries')">FR</a></th>

        <th scope="col" abbr="" align="right"><a href="{$beginLink}FumbleRecYards#defensive" onmouseover="highlightKey('keyFumbleRecYards')" onmouseout = "unHighlightKey('keyFumbleRecYards')">Yds</a></th>

        <th scope="col" abbr="" align="right"><a href="{$beginLink}FumbleRecoveryTouchdowns#defensive" onmouseover="highlightKey('keyFumbleRecoveryTouchdowns')" onmouseout = "unHighlightKey('keyFumbleRecoveryTouchdowns')">TD</a></th>

        <th scope="col" abbr="" align="right"><a href="{$beginLink}Tackles#defensive" onmouseover="highlightKey('keyTackles')" onmouseout = "unHighlightKey('keyTackles')">Tck</a></th>

        <th scope="col" abbr=""align="right"><a href="{$beginLink}Sacks#defensive" onmouseover="highlightKey('keySacks')" onmouseout = "unHighlightKey('keySacks')">Sck</a></th>

        <th scope="col" abbr="" align="right"><a href="{$beginLink}SackYards#defensive" onmouseover="highlightKey('keySackYards')" onmouseout = "unHighlightKey('keySackYardss')">Yds</a></th>
  </tr>
  <IFGREATER count($Leaders_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Defensive>
        <tr class="{$rowClass}">
            <td>
                <a href="{$externalURL}site=default&tpl=Player&ID={$Defensive_PlayerID}" class="leadersNameLink">
                    {$Defensive_PlayerFirstName} {$Defensive_PlayerLastName}</a></td>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Defensive_TeamID}" class="leadersTeamLink">
                    {$Defensive_TeamName}</a></td>
<ROW NAME=LeaderFootballCol STATFIELD="Interceptions" STAT=$Defensive_DefensiveInterceptions>
<ROW NAME=LeaderFootballCol STATFIELD="InterceptionYards" STAT=$Defensive_InterceptionYards>
<ROW NAME=LeaderFootballCol STATFIELD="InterceptionTouchdowns" STAT=$Defensive_InterceptionTouchdowns>
<ROW NAME=LeaderFootballCol STATFIELD="FumbleRecoveries" STAT=$Defensive_FumbleRecoveries>
<ROW NAME=LeaderFootballCol STATFIELD="FumbleRecYards" STAT=$Defensive_FumbleRecYards>
<ROW NAME=LeaderFootballCol STATFIELD="FumbleRecoveryTouchdowns" STAT=$Defensive_FumbleRecoveryTouchdowns>
<ROW NAME=LeaderFootballCol STATFIELD="Tackles" STAT=$Defensive_Tackles>
<ROW NAME=LeaderFootballCol STATFIELD="Sacks" STAT=$Defensive_Sacks>
<ROW NAME=LeaderFootballCol STATFIELD="SackYards" STAT=$Defensive_SackYards>
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
<!-- end defensive leaders -->
