<h2>Colorado Prep {$sportName} Leaders</h2>

<VAR $tpl = "Leaders">
<IFNOTEMPTY $form_ConferenceID>
<VAR $selector = "&ConferenceID=".$form_ConferenceID>
<VAR $tpl = "Conference">
</IFNOTEMPTY>
<IFNOTEMPTY $form_ClassID>
<VAR $selector = "&ClassID=".$form_ClassID>
<VAR $tpl = "Class">
</IFNOTEMPTY>

<!-- Leaders_Baseball -->
<VAR $isPlayerPage = false>
<VAR $isLeadersPage = true>
<VAR $isBoxScorePage = false>
<VAR $isTeamPage = false>
<VAR $oneTeam = false>
<VAR $beginLink = $externalURL."site=default&tpl=Leaders&Sport=".$form_Sport."&DistrictID=".$form_DistrictID."&ConferenceID=".$form_ConferenceID."&SearchType=".$form_SearchType>
<IFNOTEMPTY $form_ClassID>
<VAR $selector = "&ClassID=".$form_ClassID>
<VAR $tpl = "Class">
</IFNOTEMPTY>
<VAR $beginLink = "home.html?site=default&tpl=".$tpl."&Sport=".$form_Sport.$selector>
<form name="leaderForm" action="home.html" method="get">
<input type="hidden" name="tpl" id="tpl" value="{$form_tpl}" />
<input type="hidden" name="site" id="site" value="{$form_site}" />
<input type="hidden" name="Sport" id="Sport" value="{$form_Sport}" />
<input type="hidden" name="ConferenceID" id="ConferenceID" value="{$form_ConferenceID}" />
<input type="hidden" name="ClassID" id="ClassID" value="{$form_ClassID}" />

<?php
$title = " Leaders";
if( true == $isPlayerPage ) {
  $title = "";
}
if( true  == $isBoxscorePage ) { 
  $title = "Stats";
}

// Add a space to the beginning, if we forgot one
if( !empty( $title ) ) {
  $title = " " . trim( $title );
}
// Add a space to the beginning, if we forgot one
if( !empty( $currentTeamName ) ) {
  $teamName = " - " . trim( $currentTeamName );
}
if( $isTeamPage ) { 
  $teamName = "";
}

$atBatsLimit = "4";
$IPLimit = "0";

if( true == $isLeadersPage ) {
  // different ones for different sports
  switch( $sqlSportName ) {
    case "softball":
      $atBatsLimit = "16"; 
      $IPLimit = "20";
      break;
    case "baseball":
      $atBatsLimit = "10";
      $IPLimit = "15";
      break;
    default:
?><h1 style="color:red">Unknown sport</h1>
<p>"{$sqlSportname}</p>
<?php
  }
}

if( !empty( $isPlayerPage ) || !empty( $isTeamPage ) || !empty( $isBoxscorePage ) ) {
  $whereClause = $whereClause0." AND (Position != ".chr(34).chr(34)." OR (Hits ".chr(62)." 0 OR Doubles ".chr(62)." 0 OR Triples ".chr(62)." 0 OR HomeRuns ".chr(62)." 0 OR Runs ".chr(62)." 0 OR Walks ".chr(62)." 0 OR StolenBases ".chr(62)." 0))";
} else {
  $whereClause = $whereClause0." AND Hits ".chr(62)." 0 AND AtBats ".chr(62)." ".$atBatsLimit." ";
}
     if( empty( $form_sort ) ) {
        $form_sort = "BattingAverage";
      }
      if( empty( $form_sort1 ) ) {
        $form_sort1 = "EarnedRunAverage";
      }
      $sortClause = $form_sort;
      $sortClause1 = $form_sort1;
      if( "EarnedRunAverage" != $sortClause1 && "EarnedRuns" != $sortClause1 ) {
        $sortClause1 .= " DESC";
      }
      $sortClause .= " DESC";
?>
<VAR $district = $form_DistrictID>
<IFEQUAL -1 $district>
  <VAR $district = "">
</IFEQUAL>

<IFNOTEMPTY $form_debug>
<p><strong>District:</strong> {$district}</p>
<p><strong>Where:</strong> {$whereClause}</p>
<p><strong>Sort:</strong> {$sortClause}</p>
<p><strong>Sort1:</strong> {$form_sort1}</p>
</IFNOTEMPTY>

<IFTRUE $isBoxscorePage>
  <QUERY name=Leaders_game SPORTNAME=$sqlSportName DISTRICT=$district TEAMID=$currentTeamID SORT=$sortClause WHERECLAUSE=$whereClause GAMEID=$gameID prefix=Leaders ARCHIVETAG=$archiveTag SEASON=$form_Season>
<ELSE>
  <QUERY name=Leaders SPORTNAME=$sqlSportName DISTRICT=$district SORT=$sortClause WHERECLAUSE=$whereClause GAMEID=$gameID ARCHIVETAG=$archiveTag SEASON=$form_Season>
    <!-- query: {$Leaders_query} -->
</IFTRUE>

<IFNOTEMPTY $form_debug><p><strong>Rows: <?php echo count($Leaders_rows); ?></strong></p></IFNOTEMPTY>

<a name="offense"></a>
<h4>Offense {$title}{$teamName}</h4>
    <font class="smallText" >
    ###<span id="showKeyLeader"><a href="javascript:jqShowIt('Leader', 0);" class="keyButton" style="color:#CAD7DF;">Show key</a></span>
    <span id="hideKeyLeader" style="display:none"><a href="javascript:jqShowIt('Leader', 1);" class="keyButton" style="color:#CAD7DF;">Hide key</a></span>###
         <IFEMPTY $isPlayerPage><span class="colsort">Click column headers to sort</span></IFEMPTY></font>

<div id="statKeyLeader" style="display: none;">
<table class="keyTable" cellpadding="0" cellspacing="0" summary="Column Definitions">
 <tr class="statKeyRow">
  <td id="keyAtBats">AB: At Bats</td>
  <td id="keyHits">H: Hits</td>
  <td id="keyDoubles">2B: Doubles</td>
 </tr>
 <tr class="statKeyRowAlt">
  <td id="keyTriples">3B: Triples</td>
  <td id="keyHR">HR: Home Runs</td>
  <td id="keyRBI">RBI: Runs Batted In</td>
 </tr>
 <tr class="statKeyRow">
  <td id="keyAVG">
<IFNOTTRUE $isBoxscorePage>AVG: Batting Average</IFNOTTRUE></td>
  <td id="keyBB">BB: Base on Balls (Walks)</td>
  <td id="keySB">SB: Stolen Bases</td>
 </tr>
</table>
</div>

<table class="leadersTable deluxe" cellpadding="0" cellspacing="0"  summary="Leaders formatting" width="100%">
    <tbody>
        <tr id="header-sub" class="resultsText">
<?php 
if( true !== $isPlayerPage ) { ?>
            <th scope="col" abbr="">Name</th>
<?php 
}
if( true !== $oneTeam ) { ?>
            <th scope="col" abbr="">Team</th>
<?php 
} ?>
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=AtBats#offense" HILITEKEY="AtBats" TITLE="AB">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=Hits#offense" HILITEKEY="Hits" TITLE="H">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=Doubles#offense" HILITEKEY="Doubles" TITLE="2B">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=Triples#offense" HILITEKEY="Triples" TITLE="3B">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=HomeRuns#offense" HILITEKEY="HR" TITLE="HR">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=RunsBattedIn#offense" HILITEKEY="RBI" TITLE="RBI">
<IFNOTEMPTY $form_debug>
    <td align="right">Raw BattAvg</td>
</IFNOTEMPTY>
<IFNOTTRUE $isBoxscorePage>
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=BattingAverage#offense" HILITEKEY="AVG" TITLE="AVG">
</IFNOTTRUE>
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=Walks#offense" HILITEKEY="BB" TITLE="BB">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=StolenBases#offense" HILITEKEY="SB" TITLE="SB">
        </tr>
    <IFGREATER count($Leaders_rows) 0>
  <VAR $rowClass="leadersRow trRow">
  <RESULTS list=Leaders_rows prefix=Leader>
  <tr class="{$rowClass}">
<?php 
if( true !== $isPlayerPage ) { ?>
    <td><a href="{$externalURL}site=default&tpl=Player&ID={$Leader_PlayerID}&TeamID={$Leader_TeamID}&SearchType=Teams&Sport={$form_Sport}" CLASS="leadersNameLink"><?php echo fixApostrophes( $Leader_PlayerFirstName . " " . $Leader_PlayerLastName ); ?></a>
<IFNOTEMPTY $form_debug>
 <br />(PlayerID: {$Leader_PlayerID})
 <br />Season: {$Leader_SeasonPlyrSeason}
</IFNOTEMPTY>
</td>
<?php 
}
if( true !== $oneTeam ) { ?>
    <td><a href="{$externalURL}site=default&tpl=Team&Season={$form_Season}&TeamID={$Leader_TeamID}&SearchType=Teams&Sport={$form_Sport}" CLASS="leadersTeamLink">
<?php echo fixApostrophes( $Leader_TeamName ); ?></a></td>
<?php 
} ?>
    <ROW NAME=LeaderBBallCol STATFIELD="AtBats" STAT=$Leader_AtBats>
    <ROW NAME=LeaderBBallCol STATFIELD="Hits" STAT=$Leader_Hits>
    <ROW NAME=LeaderBBallCol STATFIELD="Doubles" STAT=$Leader_Doubles>
    <ROW NAME=LeaderBBallCol STATFIELD="Triples" STAT=$Leader_Triples>
    <ROW NAME=LeaderBBallCol STATFIELD="HomeRuns" STAT=$Leader_HomeRuns>
    <ROW NAME=LeaderBBallCol STATFIELD="RunsBattedIn" STAT=$Leader_RunsBattedIn>
<IFNOTEMPTY $form_debug>
    <td align="right">{$Leader_BattingAverage}</td>
</IFNOTEMPTY>
<?php
if( 1.0 == $Leader_BattingAverage ) {
  $avg = "1.00";
} else {
  $avg = substr( sprintf( "%05.3f", $Leader_BattingAverage ), 1 );
}
?>
<VAR $foo = round( $Leader_BattingAverage, 3 )>
<IFNOTTRUE $isBoxscorePage>
    <ROW NAME=LeaderBBallCol STATFIELD="BattingAverage" STAT=$avg>
</IFNOTTRUE>
    <ROW NAME=LeaderBBallCol STATFIELD="Walks" STAT=$Leader_Walks>
    <ROW NAME=LeaderBBallCol STATFIELD="StolenBases" STAT=$Leader_StolenBases>
  </tr>
    <IFEQUAL $rowClass "leadersRow trRow">
      <VAR $rowClass = "leadersRowAlternate trAlt">
    <ELSE>
      <VAR $rowClass = "leadersRow trRow">
    </IFEQUAL>
  </RESULTS>
<ELSE>
  <tr><td class="leadersRow" colspan="50">No data</td></tr>
</IFGREATER>    

</table>

<p> </p>
<IFTRUE $isBoxscorePage>
  <VAR $whereClause = $whereClause0." AND ( Win ".chr(62)." 0 OR Loss ".chr(62)." 0 OR Save ".chr(62)." 0 ) ">
<ELSE>
  <VAR $whereClause = $whereClause0." AND InningsPitched ".chr(62)." ".$IPLimit." ">
</IFTRUE>


<IFNOTEMPTY $form_debug>
<p><strong>Where:</strong> {$whereClause}</p>
</IFNOTEMPTY>


<IFTRUE $isBoxscorePage>
  <QUERY name=Leaders_game SPORTNAME=$sqlSportName DISTRICT=$district TEAMID=$currentTeamID SORT=$sortClause WHERECLAUSE=$whereClause GAMEID=$gameID prefix=Leaders ARCHIVETAG=$archiveTag SEASON=$form_Season>
<ELSE>
  <QUERY name=Leaders SPORTNAME=$sqlSportName DISTRICT=$district SORT=$sortClause1 WHERECLAUSE=$whereClause ARCHIVETAG=$archiveTag SEASON=$form_Season>
</IFTRUE>
###<!-- query: {$Leaders_query}-->###


<IFNOTEMPTY $form_debug><p><strong>Rows: <?php echo count($Leaders_rows); ?></strong></p></IFNOTEMPTY>

<a name="pitching"></a>
<h4>Pitching{$title}{$teamName}</h4>
    <font class="smallText" >
    ###<span id="showKeyPLeader"><a href="javascript:jqShowIt('PLeader', 0);" class="keyButton" style="color:#CAD7DF;">Show key</a></span>
    <span id="hideKeyPLeader" style="display:none"><a href="javascript:jqShowIt('PLeader', 1);" class="keyButton" style="color:#CAD7DF;">Hide key</a></span>###
         <IFEMPTY $isPlayerPage><span class="colsort">Click column headers to sort</span></IFEMPTY></font>
<div id="statKeyPLeader" style="display: none;">
<table class="keyTable" cellpadding="0" cellspacing="0" summary="Column Definitions">
 <tr class="statKeyRow">
  <td id="keyPWin">Win: Games won</td>
  <td id="keyPLoss">Loss: Games lost</td>
  <td id="keyPSave">Save: Games lost</td>
<IFNOTTRUE $isBoxScorePage>
  <td id="keyPERA">ERA: Earned Runs</td>
</IFNOTTRUE>
 </tr>
 <tr class="statKeyRowAlt">
  <td id="keyPIP">IP: Innings Pitched</td>
  <td id="keyPR">R: Runs Allowed</td>
  <td id="keyPER">ER: Earned Runs</td>
  <td id="keyPK">K: Strikeouts Pitched</td>
 </tr>
 <tr class="statKeyRow">
  <td id="keyPBB">BB: Base on Balls (Walks)</td>
 </tr>
</table>
</div>

<table class="leadersTable deluxe" cellpadding="0" cellspacing="0" summary="Leaders formatting" width="100%">
    <tbody>
        <tr id="header-sub" class="resultsText">
<?php 
if( true !== $isPlayerPage ) { ?>
            <th scope="col" abbr="">Name</th>
<?php 
}
if( true !== $oneTeam ) { ?>
            <th scope="col" abbr="">Team</th>
<?php } ?>
<IFNOTTRUE $isBoxscorePage>
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=Win#pitching" HILITEKEY="PWin" TITLE="Win">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=Loss#pitching" HILITEKEY="PLoss" TITLE="Loss">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=Save#pitching" HILITEKEY="PSave" TITLE="Save">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=EarnedRunAverage#pitching" HILITEKEY="PERA" TITLE="ERA">
</IFNOTTRUE>
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=InningsPitched#pitching" HILITEKEY="PIP" TITLE="IP">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=RunsAllowed#pitching" HILITEKEY="PR" TITLE="R">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=EarnedRuns#pitching" HILITEKEY="PER" TITLE="ER">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=Strikeouts#pitching" HILITEKEY="PK" TITLE="K">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=WalksAllowed#pitching" HILITEKEY="PBB" TITLE="BB">
  </tr>
    <IFGREATER count($Leaders_rows) 0>
  <VAR $rowClass="leadersRow trRow">
  <RESULTS list=Leaders_rows prefix=Leader>
  <tr class="{$rowClass}">
<?php 
if( true !== $isPlayerPage ) { ?>
    <td><a href="{$externalURL}site=default&tpl=Player&ID={$Leader_PlayerID}&TeamID={$Leader_TeamID}&SearchType=Teams&Sport={$form_Sport}" CLASS="leadersNameLink"><?php echo fixApostrophes( $Leader_PlayerFirstName . " " . $Leader_PlayerLastName ); ?> 
<IFTRUE $isBoxscorePage> (<IFEQUAL $Leader_Win 1>W</IFEQUAL><IFEQUAL $Leader_Loss 1>L</IFEQUAL><IFEQUAL $Leader_Save 1>S</IFEQUAL>)</IFTRUE></a>
<IFNOTEMPTY $form_debug>
 <br />(PlayerID: {$Leader_PlayerID})
 <br />Season: {$Leader_SeasonPlyrSeason}
</IFNOTEMPTY>
    </td>
<?php 
}
if( true !== $oneTeam ) { ?>
    <td><a href="{$externalURL}site=default&tpl=Team&TeamID={$Leader_TeamID}&SearchType=Teams&Sport={$form_Sport}" CLASS="leadersTeamLink">
<?php echo fixApostrophes( $Leader_TeamName ); ?></a></td>
<?php 
} ?>

<IFNOTTRUE $isBoxscorePage>
    <ROW NAME=LeaderBBallCol STATFIELD="Win" STAT=$Leader_Win>
    <ROW NAME=LeaderBBallCol STATFIELD="Loss" STAT=$Leader_Loss>
    <ROW NAME=LeaderBBallCol STATFIELD="Save" STAT=$Leader_Save>
</IFNOTTRUE>
    <VAR $era = round($Leader_EarnedRunAverage, 2)>
<?php
if( 1.0 <= $Leader_EarnedRunAverage ) {
  $era = sprintf( "%04.2f", $Leader_EarnedRunAverage );
} else {
  $era = substr( sprintf( "%05.3f", $Leader_EarnedRunAverage ), 1 );
}
?>
<IFNOTTRUE $isBoxscorePage>
    <ROW NAME=LeaderBBallCol STATFIELD="EarnedRunAverage" STAT=$era>
</IFNOTTRUE>
    <VAR $ip = round($Leader_InningsPitched, 2)>
    <ROW NAME=LeaderBBallCol STATFIELD="InningsPitched" STAT=$ip>
    <ROW NAME=LeaderBBallCol STATFIELD="RunsAllowed" STAT=$Leader_RunsAllowed>
    <ROW NAME=LeaderBBallCol STATFIELD="EarnedRuns" STAT=$Leader_EarnedRuns>
    <ROW NAME=LeaderBBallCol STATFIELD="Strikeouts" STAT=$Leader_StrikeoutsPitched>
    <ROW NAME=LeaderBBallCol STATFIELD="WalksAllowed" STAT=$Leader_WalksAllowed>
  </tr>
    <IFEQUAL $rowClass "leadersRow trRow">
      <VAR $rowClass = "leadersRowAlternate trAlt">
    <ELSE>
      <VAR $rowClass = "leadersRow trRow">
    </IFEQUAL>
  </RESULTS>
<ELSE>
  <tr><td class="leadersRow" colspan="50">No data</td></tr>
</IFGREATER>    

</table>
<!-- /Leaders_Baseball -->