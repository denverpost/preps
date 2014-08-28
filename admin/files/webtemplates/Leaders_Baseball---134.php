<VAR $domainURL = "http://preps.denverpost.com">
###this was replaced on 3-16-2012 to include fielding leaders###
###FORMSPORT: {$form_Sport}###


<h2>Colorado High School {$sportName} Leaders</h2>
<VAR $resultNum = 25>
<VAR $resultNum1 = 25>
<VAR $tpl = "Leaders">
<IFNOTEMPTY $form_ConferenceID>
<VAR $selector = "&ConferenceID=".$form_ConferenceID>
<VAR $tpl = "Conference">
</IFNOTEMPTY>
<IFNOTEMPTY $form_ClassID>
<VAR $selector = "&ClassID=".$form_ClassID>
<VAR $tpl = "Class">
</IFNOTEMPTY>
### xxx ###

<?PHP $strNow = time() ?>
<IFTRUE $sportName == "Softball">
<VAR $seasonStart = strtotime("19 August 2011")>
<ELSE>
<VAR $seasonStart = strtotime("08 March 2012")>
</IFTRUE>

<?PHP $difference = $strNow - $seasonStart ?>
<?PHP $difference = ($difference / 604800) ?>

<?PHP $minPlateAppearances = round(($difference * 3)-1) ?>
<IFGREATER 1 $difference>
<VAR $minPlateAppearances = 1>
</IFGREATER>

<IFEQUAL $minPlateAppearances 1>
<VAR $attempts = "Plate Appearance">
<ELSE>
<VAR $attempts = "Plate Appearances">
</IFEQUAL>

<IFGREATER $minPlateAppearances 23>
<VAR $minPlateAppearances = 24>
</IFGREATER>

<?PHP $minInningsPitched = round(($difference * 5)-1) ?>
<IFGREATER 1 $difference>
<VAR $minInningsPitched = 1>
</IFGREATER>

<IFGREATER $minInningsPitched 29>
<VAR $minInningsPitched = 29.75>
<ELSE $minInningsPitched = $minInningsPitched - .25>
</IFGREATER>


###SEASONSTART: {$seasonStart}###
###NOW: {$strNow}###
###DIFFERENCE: {$difference}###
###MININNINGSPITCHED: {$minInningsPitched}###



<IFNOTEMPTY $form_res>
<VAR $selector = $selector."&res=".$form_res>
</IFNOTEMPTY>
<VAR $beginLink = "home.html?site=default&tpl=".$tpl."&Sport=".$form_Sport.$selector."&sort=">
<IFEMPTY $form_res>
<VAR $resultNum=25>
<ELSE>
<VAR $resultNum=$form_res>
</IFEMPTY>

<IFNOTEMPTY $form_res1>
<VAR $selector = $selector."&res1=".$form_res1>
</IFNOTEMPTY>
<VAR $beginLink = "home.html?site=default&tpl=".$tpl."&Sport=".$form_Sport.$selector."&sort=">
<IFEMPTY $form_res1>
<VAR $resultNum1=25>
<ELSE>
<VAR $resultNum1=$form_res1>
</IFEMPTY>



###<!-- Leaders_Baseball -->###
<VAR $isPlayerPage = false>
<VAR $isLeadersPage = true>
<VAR $isBoxScorePage = false>
<VAR $isTeamPage = false>
<VAR $oneTeam = false>
<VAR $beginLink = $externalURL."site=default&tpl=Leaders&Sport=".$form_Sport."&DistrictID=".$form_DistrictID."&ConferenceID=".$form_ConferenceID>
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

$plateAppearancesLimit = "4";
$IPLimit = "0";

if( true == $isLeadersPage ) {
  // different ones for different sports
  switch( $sqlSportName ) {
    case "softball":
     $IPLimit = $minInningsPitched;
      $plateAppearancesLimit = ($minPlateAppearances + 1); 
      $plateAppearancesValue = ($minPlateAppearances - 1);
      $roundedIPLimit = (round($IPLimit, 0, PHP_ROUND_HALF_UP));
      $IPLimit = $roundedIPLimit;
      $minIPExplanation = " (Minimum $IPLimit innings pitched)";
      $minExplanation = " (Minimum $plateAppearancesLimit plate appearances)";
      $minInningsPitchedWhere = $minInningsPitched - .33;
    break;

    case "baseball":
     $IPLimit = $minInningsPitched;
      $plateAppearancesLimit = ($minPlateAppearances + 1); 
      $plateAppearancesValue = ($minPlateAppearances - 1);
      $roundedIPLimit = (round($IPLimit, 0, PHP_ROUND_HALF_UP));
      $IPLimit = $roundedIPLimit;
      $minIPExplanation = " (Minimum $IPLimit innings pitched)";
      $minExplanation = " (Minimum $plateAppearancesLimit plate appearances)";
      $minInningsPitchedWhere = $minInningsPitched - .33;
      break;
    default:
?>
<h1 style="color:red">Unknown sport</h1>
<p>"{$sqlSportname}</p>

<?php
  }
}
if( !empty( $isPlayerPage ) || !empty( $isTeamPage ) || !empty( $isBoxscorePage ) ) {
  $whereClause = $whereClause0." AND (Position != ".chr(34).chr(34)." OR (Hits ".chr(62)." 0 OR Doubles ".chr(62)." 0 OR Triples ".chr(62)." 0 OR HomeRuns ".chr(62)." 0 OR Runs ".chr(62)." 0 OR Walks ".chr(62)." 0 OR StolenBases ".chr(62)." 0))";
} else {
  $whereClause = $whereClause0." AND Hits ".chr(62)." 0 AND PlateAppearances ".chr(62)." ".$plateAppearancesValue." ";
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

      if( "WinningPercentage" != $sortClause1 ) {
        $sortClause1 .= ", Win DESC"; 
        } 
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
  <QUERY name=Leaders_game SPORTNAME=$sqlSportName DISTRICT=$district TEAMID=$currentTeamID SORT=$sortClause WHERECLAUSE=$whereClause GAMEID=$gameID prefix=Leaders ARCHIVETAG=$archiveTag SEASON=$form_Season count=$resultNum>
<ELSE>
  <QUERY name=Leaders SPORTNAME=$sqlSportName DISTRICT=$district SORT=$sortClause WHERECLAUSE=$whereClause GAMEID=$gameID ARCHIVETAG=$archiveTag SEASON=$form_Season count=$resultNum>
</IFTRUE>

<IFNOTEMPTY $form_debug><p><strong>Rows: <?php echo count($Leaders_rows); ?></strong></p></IFNOTEMPTY>

<a name="offense"></a>
<h4>Hitting {$title}{$teamName}{$minExplanation}</h4>
    <font class="smallText" >
         <IFEMPTY $isPlayerPage><span class="colsort">Click column headers to sort</span>
</IFEMPTY></font><br>

<font class="smallText">Show top <a href = "{$beginLink}&res=5">5</a> | <a href = "{$beginLink}&res=10">10</a> | <a href = "{$beginLink}&res=15">15</a> |  <a href = "{$beginLink}&res=25">25</a> |  <a href = "{$beginLink}&res=50">50</a> | <a href = "{$beginLink}&res=100">100 | <a href = "{$beginLink}&res=2000">All</a></font>
</td></tr>

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
  <td id="keyHBP">HBP: Hit by Pitch (Hit by Pitch)</td>
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
    <ROW NAME=LeaderBBallCol_Title align="right" SORT0="sort=PlateAppearances#offense" HILITEKEY="PlateAppearances" TITLE="PA">
    <ROW NAME=LeaderBBallCol_Title align="right" SORT0="sort=AtBats#offense" HILITEKEY="AtBats" TITLE="AB">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=Hits#offense" HILITEKEY="Hits" TITLE="H">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=Doubles#offense" HILITEKEY="Doubles" TITLE="2B">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=Triples#offense" HILITEKEY="Triples" TITLE="3B">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=HomeRuns#offense" HILITEKEY="HR" TITLE="HR">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=RunsBattedIn#offense" HILITEKEY="RBI" TITLE="RBI">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=OnBasePercentage#offense" HILITEKEY="OBP" TITLE="OBP">
<IFNOTEMPTY $form_debug>
    <td align="right">Raw BattAvg</td>
</IFNOTEMPTY>
<IFNOTTRUE $isBoxscorePage>
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=BattingAverage#offense" HILITEKEY="AVG" TITLE="AVG">
</IFNOTTRUE>
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=SluggingPercentage#offense" HILITEKEY="SLG" TITLE="SLG">
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=Walks#offense" HILITEKEY="BB" TITLE="BB">

###xxx###
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=HitbyPitch#offense" HILITEKEY="HBP" TITLE="HBP">
###xxx###
    <ROW NAME=LeaderBBallCol_Title SORT0="sort=StolenBases#offense" HILITEKEY="SB" TITLE="SB">
        </tr>
    <IFGREATER count($Leaders_rows) 0>
  <VAR $rowClass="leadersRow trRow">
  <RESULTS list=Leaders_rows prefix=Leader>
  <tr class="{$rowClass}">
<?php 
if( true !== $isPlayerPage ) { ?>
    <td><a href="{$externalURL}site=default&tpl=Player&ID={$Leader_PlayerID}&TeamID={$Leader_TeamID}&Sport={$form_Sport}" CLASS="leadersNameLink"><?php echo fixApostrophes( $Leader_PlayerFirstName . " " . $Leader_PlayerLastName ); ?></a>
<IFNOTEMPTY $form_debug>
 <br />(PlayerID: {$Leader_PlayerID})
 <br />Season: {$Leader_SeasonPlyrSeason}
</IFNOTEMPTY>
</td>
<?php 
}
if( true !== $oneTeam ) { ?>
    <td><a href="{$externalURL}site=default&tpl=Team&Season={$form_Season}&TeamID={$Leader_TeamID}&Sport={$form_Sport}" CLASS="leadersTeamLink">
<?php echo fixApostrophes( $Leader_TeamName ); ?></a></td>
<?php 
} ?>
    <ROW NAME=LeaderBBallCol STATFIELD="PlateAppearances" STAT=$Leader_PlateAppearances>
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
if( 1.0 == $Leader_OnBasePercentage ) {
  $obp = "1.000";
} else {
  $obp = substr( sprintf( "%05.3f", $Leader_OnBasePercentage ), 1 );
}
?>
    <ROW NAME=LeaderBBallCol STATFIELD="OnBasePercentage" STAT=$obp>


<?php
if( 1.0 == $Leader_BattingAverage ) {
  $avg = "1.000";
} else {
  $avg = substr( sprintf( "%05.3f", $Leader_BattingAverage ), 1 );
}
?>
<VAR $foo = round( $Leader_BattingAverage, 3 )>
<IFNOTTRUE $isBoxscorePage>
    <ROW NAME=LeaderBBallCol STATFIELD="BattingAverage" STAT=$avg>
</IFNOTTRUE>

<?php
if( 1.0 == $Leader_SluggingPercentage ) {
  $slPct = "1.000";
} else {
  $slPct = substr( sprintf( "%05.3f", $Leader_SluggingPercentage ), 1 );
}
?>

<IFGREATER $Leader_SluggingPercentage 1>
<VAR $slPct = trailingZeroes(round($Leader_SluggingPercentage,3),3,true)>
<ELSE>
</IFGREATER>
<IFEQUAL $Leader_SluggingPercentage 1>
<VAR $slPct = "1.000">
</IFEQUAL>
<IFGREATER 1 $Leader_SluggingPercentage>
<VAR $slugPct = $Leader_SluggingPercentage * 100>
###<VAR $slPct = trailingZeroes(round($slugPct,3),3,true)>###
###<VAR $slPct = ". $slPct">###
<ELSE>
</IFGREATER>

    <ROW NAME=LeaderBBallCol STATFIELD="SluggingPercentage" STAT=$slPct>
    <ROW NAME=LeaderBBallCol STATFIELD="Walks" STAT=$Leader_Walks>
    <ROW NAME=LeaderBBallCol STATFIELD="HitByPitch" STAT=$Leader_HitByPitch>
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
  <VAR $whereClause = $whereClause0." AND InningsPitched ".chr(62)." ".$minInningsPitchedWhere." ">
</IFTRUE>


<IFNOTEMPTY $form_debug>
<p><strong>Where:</strong> {$whereClause}</p>
</IFNOTEMPTY>


<IFTRUE $isBoxscorePage>
  <QUERY name=Leaders_game SPORTNAME=$sqlSportName DISTRICT=$district TEAMID=$currentTeamID SORT=$sortClause WHERECLAUSE=$whereClause GAMEID=$gameID prefix=Leaders ARCHIVETAG=$archiveTag SEASON=$form_Season count=$resultNum>
<ELSE>
  <QUERY name=Leaders SPORTNAME=$sqlSportName DISTRICT=$district SORT=$sortClause1 WHERECLAUSE=$whereClause ARCHIVETAG=$archiveTag SEASON=$form_Season count=$resultNum1>
</IFTRUE>



###query: {$Leaders_query}###


<IFNOTEMPTY $form_debug><p><strong>Rows: <?php echo count($Leaders_rows); ?></strong></p></IFNOTEMPTY>

###FORMSPORT: {$form_Sport}###


<a name="pitching"></a>
<h4>Pitching {$minIPExplanation}</h4>
    <font class="smallText" >
<IFEMPTY $isPlayerPage><span class="colsort">    <font class="smallText">
Click column headers to sort<br></span></IFEMPTY></font><br>
<font class="smallText">###Click column headers to sort.### Show top <a href = "{$beginLink}&res1=5">5</a> | <a href = "{$beginLink}&res1=10">10</a> | <a href = "{$beginLink}&res1=15">15</a> |  <a href = "{$beginLink}&res1=25">25</a> |  <a href = "{$beginLink}&res1=50">50</a> |  <a href = "{$beginLink}&res1=100">100 | <a href = "{$beginLink}&res1=2000">All</a></font>
</td></tr>

<div id="statKeyPLeader" style="display: none;">
<table class="keyTable" cellpadding="0" cellspacing="0" summary="Column Definitions">
 <tr class="statKeyRow">
  <td id="keyPWin">Win: Games won</td>
  <td id="keyPLoss">Loss: Games lost</td>
  <td id="keyPWinPct">Pct: Win Pct</td>
  <td id="keyPSave">Save: Saves</td>
<IFNOTTRUE $isBoxScorePage>
  <td id="keyPERA">ERA: Earned Runs</td>
</IFNOTTRUE>
 </tr>
 <tr class="statKeyRowAlt">
  <td id="keyPIP">IP: Innings Pitched</td>
  <td id="keyPR">H: Hits Allowed</td>
  <td id="keyPR">R: Runs Allowed</td>
  <td id="keyPER">ER: Earned Runs</td>
  <td id="keyPK">K: Strikeouts Pitched</td>
 </tr>
 <tr class="statKeyRow">
  <td id="keyPBB">BB: Base on Balls (Walks)</td>
 <tr class="statKeyRow">
  <td id="keyPHPB">HBP: Hit by Pitch Allowed (Hit by Pitch)</td>
  <td id="keyPWP">WP: Wild Pitch (Wild Pitch)</td>
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
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=WinningPercentage#pitching" HILITEKEY="PWinningPercentage" TITLE="Pct">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=Save#pitching" HILITEKEY="PSave" TITLE="Saves">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=EarnedRunAverage#pitching" HILITEKEY="PERA" TITLE="ERA">
</IFNOTTRUE>
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=InningsPitched#pitching" HILITEKEY="PIP" TITLE="IP">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=HitsAllowed#pitching" HILITEKEY="H" TITLE="H">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=RunsAllowed#pitching" HILITEKEY="PR" TITLE="R">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=EarnedRuns#pitching" HILITEKEY="PER" TITLE="ER">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=StrikeoutsPitched#pitching" HILITEKEY="PK" TITLE="K">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=WalksAllowed#pitching" HILITEKEY="PBB" TITLE="BB">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=HitByPitchAllowed#pitching" HILITEKEY="PHPB" TITLE="HBP">
    <ROW NAME=LeaderBBallCol_Title SORT1="sort1=WildPitch#pitching" HILITEKEY="PWP" TITLE="WP">
  </tr>
    <IFGREATER count($Leaders_rows) 0>
  <VAR $rowClass="leadersRow trRow">
  <RESULTS list=Leaders_rows prefix=Leader>
  <tr class="{$rowClass}">
<?php 
if( true !== $isPlayerPage ) { ?>
    <td><a href="{$externalURL}site=default&tpl=Player&ID={$Leader_PlayerID}&TeamID={$Leader_TeamID}&Sport={$form_Sport}" CLASS="leadersNameLink"><?php echo fixApostrophes( $Leader_PlayerFirstName . " " . $Leader_PlayerLastName ); ?> 
<IFTRUE $isBoxscorePage> (<IFEQUAL $Leader_Win 1>W</IFEQUAL><IFEQUAL $Leader_Loss 1>L</IFEQUAL><IFEQUAL $Leader_Save 1>S</IFEQUAL>)</IFTRUE></a>
<IFNOTEMPTY $form_debug>
 <br />(PlayerID: {$Leader_PlayerID})
 <br />Season: {$Leader_SeasonPlyrSeason}
</IFNOTEMPTY>
    </td>
<?php 
}
if( true !== $oneTeam ) { ?>
    <td><a href="{$externalURL}site=default&tpl=Team&TeamID={$Leader_TeamID}&Sport={$form_Sport}" CLASS="leadersTeamLink">
<?php echo fixApostrophes( $Leader_TeamName ); ?></a></td>
<?php 
} ?>

<IFNOTTRUE $isBoxscorePage>
    <ROW NAME=LeaderBBallCol STATFIELD="Win" STAT=$Leader_Win>
    <ROW NAME=LeaderBBallCol STATFIELD="Loss" STAT=$Leader_Loss>
<? $wPCT = sprintf("%.3f", $Leader_WinningPercentage) ?>
    <ROW NAME=LeaderBBallCol STATFIELD="Pct" STAT=$wPCT>
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

<VAR $whole_Innings = (round($Leader_InningsPitched - .5))>
<VAR $partial_Innings = ($Leader_InningsPitched - $whole_Innings)>
<IFEQUAL $partial_Innings 0>
<VAR $partial_Innings = ".0">
<ELSE>
<IFGREATER $partial_Innings .5>
<VAR $partial_Innings = ".2">
<ELSE>
<VAR $partial_Innings = ".1">
</IFGREATER>
</IFEQUAL>


<?php $ip = $whole_Innings.$partial_Innings;?>




###    <VAR $ip = round($Leader_InningsPitched, 2)>###
    <ROW NAME=LeaderBBallCol STATFIELD="InningsPitched" STAT=$ip>
    <ROW NAME=LeaderBBallCol STATFIELD="HitsAllowed" STAT=$Leader_HitsAllowed>
    <ROW NAME=LeaderBBallCol STATFIELD="RunsAllowed" STAT=$Leader_RunsAllowed>
    <ROW NAME=LeaderBBallCol STATFIELD="EarnedRuns" STAT=$Leader_EarnedRuns>
    <ROW NAME=LeaderBBallCol STATFIELD="StrikeoutsPitched" STAT=$Leader_StrikeoutsPitched>
    <ROW NAME=LeaderBBallCol STATFIELD="WalksAllowed" STAT=$Leader_WalksAllowed>
###  </tr>###
    <ROW NAME=LeaderBBallCol STATFIELD="HitByPitchAllowed" STAT=$Leader_HitByPitchAllowed>
    <ROW NAME=LeaderBBallCol STATFIELD="WildPitch" STAT=$Leader_WildPitch>
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
</tbody>
</table>


