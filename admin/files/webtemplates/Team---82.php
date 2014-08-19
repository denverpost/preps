<VAR $domainURL = "http://preps.denverpost.com">
<VAR $sportYear = "2014"> ### YEARCHECK ###
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<VAR $webURL = "http://denver-tpweb.newsengin.com/web/graphics/team/">
<VAR $rightSingleQuote = chr(38)."rsaquo;">
<VAR $gt = chr(62)>

<IFEMPTY $form_TeamID>
<font class="pageText">Please select a team in the search box above. </font>
<?PHP exit(); ?>
</IFEMPTY>

### Validate Input ###
<VAR $form_TeamID = intval($form_TeamID) >

<QUERY name=Team ID=$form_TeamID>
<VAR $sportName = $Team_SportName>
<VAR $sportType = $Team_SportType>
<VAR $Team_TeamName = fixApostrophes($Team_TeamName)>
<VAR $sqlSportName = strtolower(convertForSQL($sportName))>


<VAR $primaryColor = $Team_SchoolPrimaryColor>
<VAR $secondaryColor = $Team_SchoolSecondaryColor>
<IFEMPTY $primaryColor> <VAR $primaryColor = "#FF883D"> </IFEMPTY>
<IFEMPTY $secondaryColor> <VAR $secondaryColor = "#333399"> </IFEMPTY>

<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    {$rightSingleQuote} <a href="{$domainURL}/schools/">Schools</a>
    {$rightSingleQuote} <a href="{$externalURL}site=default&tpl=School&School={$Team_SchoolID}">{$Team_SchoolName}</a>
    {$rightSingleQuote} <a href="{$externalURL}site=default&tpl=Sport&Sport={$Team_SportID}">{$sportName}</a>
</div>

<IFEMPTY $Team_TeamID>
<?PHP exit; ?>
</IFEMPTY>
<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$form_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType SPORTYEAR=$sportYear>
###query: {$TeamSeasonStats_query}###
<VAR $confWins = $TeamSeasonStats_Win>
<VAR $confLosses = $TeamSeasonStats_Loss>
<VAR $confTies = $TeamSeasonStats_Tie>

<VAR $statType = "overall">
<VAR $TeamSeasonStats_query = "">
<QUERY name=TeamSeasonStats ID=$form_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $overallWins = $TeamSeasonStats_Win>
<VAR $overallLosses = $TeamSeasonStats_Loss>
<VAR $overallTies = $TeamSeasonStats_Tie>

<VAR $Team_TeamHeadCoach = fixApostrophes($Team_TeamHeadCoach)>
<VAR $Team_TeamAssistantCoaches = fixApostrophes($Team_TeamAssistantCoaches)>


<h1>{$Team_TeamName} {$Team_TeamNickname} Prep {$Team_SportName} </h1>
<IFNOTEMPTY $Team_TeamHeadCoach><h3>{$Team_TeamName} Head coach: {$Team_TeamHeadCoach}</h3></IFNOTEMPTY>
<IFNOTEMPTY $Team_TeamAssistantCoaches>
<VAR $assistantCoaches = str_replace("\r\n",", ",trim($Team_TeamAssistantCoaches))>
<h5>Assistant coaches: {$assistantCoaches}</h5>
</IFNOTEMPTY>
<ul id="subnav">
    <li><a href="#schedule">{$Team_TeamName} Schedule and Results</a></li>
    <li><a href="#stats">{$Team_TeamName} Statistics</a></li>
    <li><a href="#roster">{$Team_TeamName} Team Roster</a></li>
</ul>

<DIV align="left">
<QUERY name=TeamPhoto ID=$form_TeamID PATHID=3>
<IFNOTEMPTY $TeamPhoto_UploadFile>
<div id="team_photo" class="photo">
<img src="{$webURL}{$TeamPhoto_UploadFile}" alt="" />
</div>
</IFNOTEMPTY>

<div id="team_info" class="info">
    <div>
        <dl>
            <dt>Sport:</dt>
            <dd><a href="{$externalURL}site=default&tpl=Sport&Sport={$Team_TeamSportID}">{$Team_SportName}</a></dd>
        <IFNOTEMPTY $Team_ClassName>
            <dt>Class:</dt>
            <dd><a href="{$externalURL}site=default&tpl=Class&Sport={$Team_TeamSportID}&ClassID={$Team_TeamClassID}">{$Team_ClassName}</a></dd>
        </IFNOTEMPTY>
            <dt>Conference:</dt>
            <dd><a href="{$externalURL}site=default&tpl=Conference&Sport={$Team_TeamSportID}&ConferenceID={$Team_TeamConferenceID}">{$Team_ConferenceName}</a></dd>
        <IFNOTEMPTY $Team_DistrictName>
        <!--
            <dt>District:</dt>
            <dd>{$Team_DistrictName}</dd>
        -->
        </IFNOTEMPTY>
        </dl>

        <div class="clear"></div>
<IFNOTEQUAL $sportType 1>
        <dl class="lineitem">
            <?PHP if ($overallWins != "" && $overallLosses != "") { ?>
            <dt>Current record:</dt>
            <dd>{$overallWins}-{$overallLosses}<IFNOTEQUAL $overallTies 0>-{$overallTies}</IFNOTEQUAL> <IFNOTEMPTY $TeamSeasonStats_WinPercentage>(<?PHP echo str_replace("0.", ".", number_format(round($TeamSeasonStats_WinPercentage,3),3,".","")); ?>)</IFNOTEMPTY></dd>

<?PHP } else { ?>
             <dt>Current record:</dt> <dd>0-0</dd>

            <?PHP } ?>

      <IFTRUE $confWins == "0" && $confLosses == "0">
            <VAR $confWins = "">
            <VAR $confLosses = "">
       </IFTRUE>

            <?PHP if ($confWins != "" || $confLosses != ""){ ?>
            <dt>Conference record:</dt>
            <dd><a href="{$externalURL}site=default&tpl=Conference&Sport={$Team_TeamSportID}&ConferenceID={$Team_TeamConferenceID}#standings">
{$confWins}-{$confLosses}<IFNOTEQUAL $confTies 0>-{$confTies}</IFNOTEQUAL></a> (<?PHP echo str_replace("0.", ".", number_format(round($confWins / ($confWins + $confLosses),3),3,".",""));?>)
</dd>
<?PHP } else { ?>
             <dt>Conference record:</dt> <dd>0-0 (.000)</dd>

            <?PHP } ?>
</IFNOTEQUAL>


###<?PHP echo str_replace("0.", ".", number_format(round($confWins / ($confWins + $confLosses),3),3,".",""));?>###

<IFNOTEMPTY $TeamSeasonStats_TotalGoals>
<IFNOTEQUAL $TeamSeasonStats_TotalGoals 0>
            <dt>Goals Scored:</dt>
            <dd>{$TeamSeasonStats_TotalGoals}</dd>
</IFNOTEQUAL>
</IFNOTEMPTY>
<IFNOTEMPTY $TeamSeasonStats_GoalsAllowed>
            <dt>Goals Allowed:</dt>
            <dd>{$TeamSeasonStats_GoalsAllowed}</dd>
</IFNOTEMPTY>

<IFEQUAL $sportName "Football">

<IFNOTEMPTY $TeamSeasonStats_TotalPoints>
<IFNOTEQUAL $TeamSeasonStats_TotalPoints 0>
            <dt>Points Scored:</dt>
            <dd>{$TeamSeasonStats_TotalPoints}</dd>
</IFNOTEQUAL>
</IFNOTEMPTY>
<IFNOTEMPTY $TeamSeasonStats_PointsAllowed>
            <dt>Points Allowed:</dt>
            <dd>{$TeamSeasonStats_PointsAllowed}</dd>
</IFNOTEMPTY>
<ELSE>
</IFEQUAL>


            <div class="clear"></div>

    </div>
</div>


<DIV align="left">



<br /><br />
<a name="schedule" style="display:block; clear:both;"></a>
<h2>{$Team_TeamName} {$Team_TeamNickname} Schedule and Results</h2>
<IFEQUAL $sportType 1>
<QUERY name=TeamMeetSchedule TEAMID=$form_TeamID SPORTNAME=$sqlSportName>
<VAR $meetCount = count($TeamMeetSchedule_rows)>
<IFGREATER $meetCount 0>
<div class="schedDiv">
<h4>Schedule</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Date</th>
            <th scope="col" abbr="">Meet name</th>
    <?PHP if ($sportName == "Boys Tennis" || $sportName == "Girls Tennis" || $sportName == "Wrestling" || $sportName == "Boys Swimming and Diving" || $sportName == "Girls Swimming and Diving" || $sportName == "Girls Gymnastics" || $sportName == "Boys Track and Field" || $sportName == "Girls Track and Field") { ?>
    <?PHP } else { ?>
            <th scope="col" abbr="">Score</th>
    <?PHP } ?>
            <th scope="col" abbr=""></th>
        </tr>
<VAR $rowClass="schedRow trRow">
<RESULTS list=TeamMeetSchedule_rows prefix=Meet>
<VAR $Meet_GameMeetName = fixApostrophes($Meet_GameMeetName)>
<VAR $Meet_SchoolName = fixApostrophes($Meet_SchoolName)>
        <tr class="{$rowClass}">
            <td><VAR $gameDate = date("D n/d",strtotime($Meet_GameDate))>{$gameDate}<br />
###                <VAR $gameTime = date("g:i a",strtotime($Meet_GameTime))>{$gameTime}</td>###
                <VAR $gameTime = date("g:i a",strtotime($Game_GameTime))>
                <IFEQUAL $Meet_GameTimeTBD 1>
                <VAR $gameTime = "TBD">
                <ELSE>
                </IFEQUAL>
                {$gameTime}</td>
                <td valign="top">
                <a href="{$domainURL}/boxscores/{$Meet_GameID}/">{$Meet_GameMeetName}</a>
<IFNOTEMPTY $Meet_SchoolName>
                <br />at {$Meet_SchoolName}
</IFNOTEMPTY></td>
            <td valign="top">
<?PHP if ($sportName == "Boys Golf" || $sportName == "Girls Golf") { ?>
                {$Meet_TotalStrokes}
<?PHP } elseif ($sportName == "Boys Tennis" || $sportName == "Girls Tennis") { ?>
                ###{$Meet_Points}###
<?PHP } elseif ($sportName == "Boys Swimming and Diving" || $sportName == "Girls Swimming and Diving") { ?>
                ###{$Meet_TotalPoints}###
<?PHP } else { ?>
                ###{$Meet_Score}###
<?PHP } ?>
            </td>
            <td valign="top">
<?PHP if($Meet_GameStatStatus == "3") { ?>
                <a href="{$domainURL}/boxscores/{$Meet_GameID}/">Summary</a>
<?PHP } ?>
            </td>
        </tr>
<IFEQUAL $rowClass "schedRow trRow">
<VAR $rowClass = "schedRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "schedRow trRow">
</IFEQUAL>
</RESULTS>
    </tbody>
</table>
</div>
</IFGREATER>

<ELSE>
<br>
<VAR $pointsClause = "">
<?PHP if ($sportName == "Football" || $sportName == "Boys Basketball" || $sportName == "Girls Basketball") { ?>
<VAR $pointsClause = ",awayteamstats.TotalPoints as AwayTeamPoints,hometeamstats.TotalPoints as HomeTeamPoints">
<?PHP } elseif ($sportName == "Ice Hockey" || $sportName == "Field Hockey" || $sportName == "Boys Soccer"  || $sportName == "Girls Soccer" || $sportName == "Girls Lacrosse" || $sportName == "Boys Lacrosse") { ?>
<VAR $pointsClause = ",awayteamstats.TotalGoals as AwayTeamPoints,hometeamstats.TotalGoals as HomeTeamPoints">
<?PHP } elseif ($sportName == "Baseball" || $sportName == "Softball") { ?>
<VAR $pointsClause = ",awayteamstats.Runs as AwayTeamPoints,hometeamstats.Runs as HomeTeamPoints">
<?PHP } elseif ($sportName == "Girls Volleyball") { ?>
<VAR $pointsClause = ",awayteamstats.FinalScore as AwayTeamPoints,hometeamstats.FinalScore as HomeTeamPoints">
<?PHP } ?>
<QUERY name=TeamSchedule TEAMID=$form_TeamID SPORTNAME=$sqlSportName POINTSCLAUSE=$pointsClause>
###query: {$TeamSchedule_query}###
<VAR $gameCount = count($TeamSchedule_rows)>
<IFGREATER $gameCount 0>
<DIV CLASS="schedDiv">
<h4>Schedule</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Date</th>
            <th scope="col" abbr="" colspan="2">Away</th>
            <th scope="col" abbr="" colspan="2">Home</th>
            <th scope="col" abbr="">Conference</th>
            <th scope="col" abbr=""></th>
        </tr>
<VAR $rowClass="schedRow trRow">
<RESULTS list=TeamSchedule_rows prefix=Game>
        <tr class="{$rowClass}">
            <td><VAR $gameDate = date("D n/d",strtotime($Game_GameDate))>
                {$gameDate}<br />
<VAR $gameTime = date("g:i a",strtotime($Game_GameTime))>
                <IFEQUAL $Game_GameTimeTBD 1>
                <VAR $gameTime = "TBD">
                <ELSE>
                </IFEQUAL>
                {$gameTime}
            </td>
<VAR $Game_AwayTeamName = fixApostrophes($Game_AwayTeamName)>
<VAR $Game_HomeTeamName = fixApostrophes($Game_HomeTeamName)>
            <td valign="top">
<IFNOTEQUAL $Game_AwayTeamID $form_TeamID>
                <A HREF="{$externalURL}site=default&tpl=Team&TeamID={$Game_AwayTeamID}&Sport={$form_Sport}">
</IFNOTEQUAL>
<?PHP if ($Game_GameStatStatus == "3") { ?>
<IFGREATER $Game_AwayTeamPoints $Game_HomeTeamPoints>
                <b>{$Game_AwayTeamName}</b>
<ELSE>
                {$Game_AwayTeamName}
</IFGREATER>
<ELSE>
                {$Game_AwayTeamName}
<?PHP } ?>
<IFNOTEQUAL $Game_AwayTeamID $form_ID></a></IFNOTEQUAL>
            </td>
            <td valign="top">
<?PHP if($Game_GameStatStatus == "3") { ?>
                {$Game_AwayTeamPoints}
<?PHP } ?>
            </td>
            <td valign="top">
<IFNOTEQUAL $Game_HomeTeamID $form_TeamID>
                <A HREF="{$externalURL}site=default&tpl=Team&TeamID={$Game_HomeTeamID}&Sport={$form_Sport}">
</IFNOTEQUAL>
<?PHP if ($Game_GameStatStatus == "3") { ?>
<IFGREATER $Game_HomeTeamPoints $Game_AwayTeamPoints>
                <b>{$Game_HomeTeamName}</b>
<ELSE>
                {$Game_HomeTeamName}
</IFGREATER>
<ELSE>
                {$Game_HomeTeamName}
<?PHP } ?>
<IFNOTEQUAL $Game_HomeTeamID $form_TeamID></a></IFNOTEQUAL>
<IFNOTEQUAL $Game_GameLocation $Game_HomeTeamID>
                <br />(at {$Game_SchoolName})
</IFNOTEQUAL>
            </td>
            <td valign="top">
<?PHP if($Game_GameStatStatus == "3") { ?>
{$Game_HomeTeamPoints}
<?PHP } ?>
            </td>
            <td valign="top">
<IFEQUAL $Game_GameIsConference 1>
                <a href="{$externalURL}site=default&tpl=Conference&Sport={$Team_TeamSportID}&ConferenceID={$Team_TeamConferenceID}#standings" title="See {$Team_ConferenceName} conference standings">Yes</a>
<ELSE>
                No
</IFEQUAL>
            </td>
            <td valign="top">
<?PHP if($Game_GameStatStatus == "3") { ?>
                <A HREF="{$externalURL}site=default&tpl=Boxscore&ID={$Game_GameID}">Boxscore</a>
            </td>
<?PHP } ?>
        </tr>

<IFEQUAL $rowClass "schedRow trRow">
<VAR $rowClass = "schedRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "schedRow trRow">
</IFEQUAL>
</RESULTS>
    </tbody>
</table>
</DIV>
</IFGREATER>

</IFEQUAL>


<br>
<a name="stats"></a>
<h2>{$Team_TeamName} {$Team_TeamNickname} Statistics</h2>
<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=TeamStats_Football>
</IFEQUAL>
<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=TeamStats_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Girls Basketball">
<INCLUDE site=default tpl=TeamStats_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Baseball">
<INCLUDE site=default tpl=TeamStats_Baseball>
</IFEQUAL>
<IFEQUAL $sportName "Softball">
<INCLUDE site=default tpl=TeamStats_Baseball>
</IFEQUAL>
<IFEQUAL $sportName "Girls Volleyball">
<INCLUDE site=default tpl=TeamStats_GirlsVolleyball>
</IFEQUAL>
<IFEQUAL $sportName "Girls Soccer">
<INCLUDE site=default tpl=TeamStats_Soccer>
</IFEQUAL>
<IFEQUAL $sportName "Boys Soccer">
<INCLUDE site=default tpl=TeamStats_Soccer>
</IFEQUAL>
<IFEQUAL $sportName "Ice Hockey">
<INCLUDE site=default tpl=TeamStats_Hockey>
</IFEQUAL>
<IFEQUAL $sportName "Field Hockey">
<INCLUDE site=default tpl=TeamStats_FieldHockey>
</IFEQUAL>
<IFEQUAL $sportName "Boys Lacrosse">
<INCLUDE site=default tpl=TeamStats_BoysLacrosse>
</IFEQUAL>
<IFEQUAL $sportName "Girls Lacrosse">
<INCLUDE site=default tpl=TeamStats_GirlsLacrosse>
</IFEQUAL>


<br />
<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=TeamPlayerStats_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Girls Basketball">
<INCLUDE site=default tpl=TeamPlayerStats_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=TeamPlayerStats_Football>
</IFEQUAL>
<IFEQUAL $sportName "Baseball">
<INCLUDE site=default tpl=TeamPlayerStats_Baseball>
</IFEQUAL>
<IFEQUAL $sportName "Boys Cross Country">
<INCLUDE site=default tpl=TeamPlayerStats_CrossCountry>
</IFEQUAL>
<IFEQUAL $sportName "Girls Cross Country">
<INCLUDE site=default tpl=TeamPlayerStats_CrossCountry>
</IFEQUAL>
<IFEQUAL $sportName "Boys Golf">
<INCLUDE site=default tpl=TeamPlayerStats_Golf>
</IFEQUAL>
<IFEQUAL $sportName "Girls Golf">
<INCLUDE site=default tpl=TeamPlayerStats_Golf>
</IFEQUAL>
<IFEQUAL $sportName "Boys Tennis">
<INCLUDE site=default tpl=TeamPlayerStats_Tennis>
</IFEQUAL>
<IFEQUAL $sportName "Girls Tennis">
<INCLUDE site=default tpl=TeamPlayerStats_Tennis>
</IFEQUAL>
<IFEQUAL $sportName "Wrestling">
<INCLUDE site=default tpl=TeamPlayerStats_Wrestling>
</IFEQUAL>
<IFEQUAL $sportName "Softball">
<INCLUDE site=default tpl=TeamPlayerStats_Softball>
</IFEQUAL>
<IFEQUAL $sportName "Girls Volleyball">
<INCLUDE site=default tpl=TeamPlayerStats_GirlsVolleyball>
</IFEQUAL>
<IFEQUAL $sportName "Field Hockey">
<INCLUDE site=default tpl=TeamPlayerStats_FieldHockey>
</IFEQUAL>
<IFEQUAL $sportName "Ice Hockey">
<INCLUDE site=default tpl=TeamPlayerStats_Hockey>
</IFEQUAL>
<IFEQUAL $sportName "Girls Soccer">
<INCLUDE site=default tpl=TeamPlayerStats_Soccer>
</IFEQUAL>
<IFEQUAL $sportName "Boys Soccer">
<INCLUDE site=default tpl=TeamPlayerStats_Soccer>
</IFEQUAL>
<IFEQUAL $sportName "Boys Lacrosse">
<INCLUDE site=default tpl=TeamPlayerStats_BoysLacrosse>
</IFEQUAL>
<IFEQUAL $sportName "Girls Lacrosse">
<INCLUDE site=default tpl=TeamPlayerStats_GirlsLacrosse>
</IFEQUAL>

<br />
<a name="roster"></a>
<h2>{$Team_TeamName} {$Team_TeamNickname} Team Roster</h2><br>
<QUERY name=TeamRoster ID=$form_TeamID>
###query: {$TeamRoster_query}<br>###
<VAR $rosterCount = count($TeamRoster_rows)>
<IFGREATER $rosterCount 0>
###<h4>Roster:</h4>###
<table cellpadding="0" cellspacing="0" class="teamRosterTable deluxe wide400">
    <tbody>
        <tr id="header-sub" class="resultsText">
<IFNOTEQUAL $sportType 1>           <th scope="col" abbr="">Number</th></IFNOTEQUAL>
            <th scope="col" abbr="">Player name</th>
            <th scope="col" abbr="">Height</th>
            <th scope="col" abbr="">Weight</th>
            <th scope="col" abbr="">Year</th>
<IFNOTEQUAL $sportType 1>            <th scope="col" abbr="">Position</th></IFNOTEQUAL>
        </tr>
<VAR $rowClass = "rosterRow trRow">
<RESULTS list=TeamRoster_rows prefix=Roster>
        <tr class="{$rowClass}">
<IFNOTEQUAL $sportType 1>            <td>{$Roster_TeamRosterPlayerNumber}</td></IFNOTEQUAL>
            <td>
<VAR $playerName = fixApostrophes($Roster_PlayerFirstName." ".$Roster_PlayerLastName)>
                <a href="/home.html?site=default&tpl=Player&ID={$Roster_PlayerID}">{$playerName}</a></td>
            <td><IFNOTEQUAL $Roster_PlayerHeightFeet 0>{$Roster_PlayerHeightFeet}'</IFNOTEQUAL>
<IFNOTEQUAL $Roster_PlayerHeightInches 0>{$Roster_PlayerHeightInches}"</IFNOTEQUAL>
            </td>
            <td><IFNOTEQUAL $Roster_PlayerWeight 0>{$Roster_PlayerWeight}</IFNOTEQUAL></td>
            <td>{$Roster_PlayerYear}</td>
<IFNOTEQUAL $sportType 1><td>{$Roster_TeamRosterPosition}<IFNOTEMPTY $Roster_TeamRosterAdditionalPositions>, {$Roster_TeamRosterAdditionalPositions}</IFNOTEMPTY></td>
</IFNOTEQUAL>
        </tr>
<IFEQUAL $rowClass "rosterRow trRow">
<VAR $rowClass = "rosterRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "rosterRow trRow">
</IFEQUAL>
</RESULTS>
    </tbody>
</table>
</IFGREATER>


</div></div>



<!-- BEGIN SIDEBAR -->
<h2 class="teamTitleText">
    {$Team_TeamName} {$Team_TeamNickname}
</h2>
<QUERY name=TeamPhoto prefix=TeamLogo ID=$form_TeamID PATHID=2>
<IFNOTEMPTY $TeamLogo_UploadFile>
<img src="http://denver-tpweb.newsengin.com/web/graphics/team/{$TeamLogo_UploadFile}" alt="{$Team_TeamName} {$Team_TeamNickname} Logo" style="float:left; margin-right:5px;" />
<ELSE>
<IFEQUAL $sportName "Football">
<img src="{$webURL}graphics/nophotofootball.jpg" height="100" width="100"  alt="" />
<ELSE>
<img src="{$webURL}graphics/nophoto.jpg" height="50" width="50" alt="" />
</IFEQUAL>
</IFNOTEMPTY>
<div id="team_color_wrapper">
    <div class="team_color_margin" style="border-color:{$marginColor}" >
        <div class="team_color" style="background-color:{$primaryColor}" ></div>
        <div class="team_color" style="background-color:{$secondaryColor}" ></div>
    </div>
</div>

<div id="map-field">
<?PHP
$Map_Address = str_replace(" ", "+", trim($Team_SchoolAddress) . "&csz=" . trim($Team_SchoolCity . ",+" . $Team_SchoolState . "+" . $Team_SchoolZip));
?>
<p>
<a href="http://maps.yahoo.com/py/maps.py?addr={$Map_Address}" title=""><img src="http://extras.denverpost.com/media/gif/preps_map.gif" alt="" border="0" ><br>
<strong>Get a map and directions to the school</strong></a>
</p>
<h3>{$Team_SchoolName}</h3>
<p class="teamAddressBox">
<span class="teamLeftBoxText">
<IFNOTEMPTY $Team_SchoolAddress>
<i>{$Team_SchoolAddress}</i>
</IFNOTEMPTY>

<IFNOTEMPTY $Team_SchoolAddressLine2>{$Team_SchoolAddressLine2}
</IFNOTEMPTY>

<IFNOTEMPTY $Team_SchoolCity>
<br />{$Team_SchoolCity}, {$Team_SchoolState} {$Team_SchoolZip}
</IFNOTEMPTY><br />

<IFNOTEMPTY $Team_SchoolURL>
<a href="{$Team_SchoolURL}">{$Team_SchoolURL}</a>
</IFNOTEMPTY>
</span>

<IFNOTEMPTY $Team_SchoolEmailAddress>
<span class="teamLeftBoxText">
{$Team_SchoolEmailAddress}
</span>
</IFNOTEMPTY><br />

<IFNOTEMPTY $Team_SchoolPhone>
<span class="teamLeftBoxText">
{$Team_SchoolPhone}
</span>
</IFNOTEMPTY>

<IFNOTEMPTY $Team_SchoolFax>
 <span class="teamLeftBoxText">Fax: {$Team_SchoolFax}</span>
</IFNOTEMPTY>
</p>
</div>
<!-- END SIDEBAR -->
