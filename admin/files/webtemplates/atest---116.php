<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<VAR $TeamInitialCharacter = "A">
<VAR $ConferenceInitialCharacter = "5">

### Set default values for start and count ###
### TEST2 ###
<?PHP if ( intval($form_Sport) < 0 ) { $form_Sport = False; } ?>
<IFEMPTY $form_Sport><VAR $form_Sport="No Search Query Entered"></IFEMPTY>

<QUERY name=Sport prefix=Sport SPORTID=$form_Sport>
<IFEMPTY $Sport_SportName>
<QUERY name=Sports>
<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
</div>
<h1>Prep Sport Results + Schedules in Colorado</h1>

<h2>Fall Prep Sports in Colorado</h2>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=13" title="Prep Boys Cross Country in Colorado">Boys Cross Country</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=14" title="Prep Girls Cross Country in Colorado">Girls Cross Country</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=32" title="Prep Field Hockey in Colorado">Field Hockey</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=1" title="Prep Football in Colorado">Football</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=18" title="Prep Boys Golf in Colorado">Boys Golf</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=33" title="Prep Girls Gymnastics in Colorado">Girls Gymnastics</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=12" title="Prep Boys Soccer in Colorado">Boys Soccer</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=30" title="Prep Softball in Colorado">Softball</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=27" title="Prep Boys Tennis in Colorado">Boys Tennis</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=11" title="Prep Girls Volleyball in Colorado">Girls Volleyball</a></h3>

<h2>Winter Prep Sports in Colorado</h2>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=6" title="Prep Boys Basketball in Colorado">Boys Basketball</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=21" title="Prep Girls Basketball in Colorado">Girls Basketball</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=34" title="Prep Ice Hockey in Colorado">Ice Hockey</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=17" title="Prep Girls Swimming and Diving in Colorado">Girls Swimming and Diving</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=23" title="Prep Wrestling in Colorado">Wrestling</a></h3>


<h2>Spring Prep Sports in Colorado</h2>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=29" title="Prep Baseball in Colorado">Baseball</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=19" title="Prep Girls Golf in Colorado">Girls Golf</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=35" title="Prep Boys Lacrosse in Colorado">Boys Lacrosse</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=36" title="Prep Girls Lacrosse in Colorado">Girls Lacrosse</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=15" title="Prep Girls Soccer in Colorado">Girls Soccer</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=16" title="Prep Boys Swimming and Diving in Colorado">Boys Swimming and Diving</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=31" title="Prep Girls Tennis in Colorado">Girls Tennis</a></h3>




###
<hr>
<RESULTS list=Sports_rows prefix=Sport>
<h2 class="list"><a href="{$externalURL}site=default&tpl=Sport&Sport={$Sport_SportID}" title="Prep {$Sport_SportName} in Colorado">{$Sport_SportName}</a></h2>
</RESULTS>
###

<ELSE>


<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    &rsaquo; <a href="{$domainURL}/sport/">Sport Results</a>
</div>
<h1>Prep {$Sport_SportName} Results in Colorado</h1>
<ul id="subnav">
	<li><a href="#results">{$Sport_SportName} recent results</a></li>
	<li><a href="#games">{$Sport_SportName} schedule</a></li>
### Only show the leader subnav for sports that have leaders ###
<IFTRUE $Sport_SportName == "Football" || $Sport_SportName == "Boys Basketball" || $Sport_SportName == "Wrestling" || $Sport_SportName == "Boys Swimming and Diving" || $Sport_SportName == "Girls Swimming and Diving">
	<li><a href="#leaders">{$Sport_SportName} leaders</a></li>
</IFTRUE>
	<li><a href="#conference">{$Sport_SportName}, by conference</a></li>
	<li><a href="#school">{$Sport_SportName}, by school</a></li>
</ul>

<a name="results"></a>
<h2>Recent Prep {$Sport_SportName} Results</h2>
<VAR $form_SearchDate>
<IFEMPTY $form_SearchDateEnd><VAR $form_SearchDateEnd = date("m/d/Y")></IFEMPTY>
<VAR $schedule_type = "results">
<INCLUDE site=default tpl=ScheduleResultsWrapper>




<a name="games"></a>
<h2>This week's Prep {$Sport_SportName} Games</h2>

<VAR $form_count = 250>
<VAR $count = $form_count>
<VAR $form_SearchDate = date("m/d/Y")>
<?PHP
// To show the remainder of this week's schedule,
// we need to figure out what day is the next Saturday.
$saturday = 6;
$this_day = date("w");
$days_until_saturday = $saturday - $this_day;
$saturday_date = strtotime("+$days_until_saturday days");
?>
<VAR $form_SearchDateEnd = date("m/d/Y", $saturday_date)>
<VAR $schedule_type = "schedule">
### START ###
<VAR $externalURL = "http://preps.denverpost.com/home.html?">



### Set default values for start and count ###
<IFEMPTY $form_start><VAR $form_start = 0></IFEMPTY>
<IFEMPTY $form_count><VAR $form_count = 25></IFEMPTY>
<?PHP $strFutureEnd = time()+(3 * 24 * 60 * 60) ?>
<IFEMPTY $form_SearchDateEnd><VAR $form_SearchDateEnd = date("m/d/Y",$strFutureEnd)></IFEMPTY>

### Format search begin/end dates for MySQL, display ###
<IFNOTEMPTY $form_SearchDate>
    <IFEQUAL $form_SearchDate "mm/dd/yy">
        <VAR $_REQUEST["SearchDate"] = date("Y-m-d")>
    <ELSE>
        <VAR $_REQUEST["SearchDate"] = date("Y-m-d",strtotime($form_SearchDate))>
    </IFEQUAL>
    
    <VAR $strDateDisplay = date("m/d/Y",strtotime($_REQUEST["SearchDate"]))>
<ELSE>
### It defaults to the current day ###
    <VAR $strDateDisplay = date("m/d/Y")>
</IFNOTEMPTY>

<IFNOTEMPTY $form_SearchDateEnd>
    <IFEQUAL $form_SearchDateEnd "mm/dd/yy">
        <VAR $_REQUEST["SearchDateEnd"] = date("Y-m-d",$strFutureEnd)>
    <ELSE>
        <VAR $_REQUEST["SearchDateEnd"] = date("Y-m-d",strtotime($form_SearchDateEnd))>
    </IFEQUAL>


    ### If we look up just one day, we don't need to display the date range ###
    <VAR $strDateDisplayEnd = date("m/d/Y",strtotime($_REQUEST["SearchDateEnd"]))>
    <IFEQUAL $strDateDisplay $strDateDisplayEnd>
        <VAR $strDateDisplay = date("F j, Y",strtotime($_REQUEST["SearchDateEnd"]))>
        <VAR $singleDay = 1>
    <ELSE>
        <VAR $strDateDisplay = $strDateDisplay." - ".$strDateDisplayEnd>
        <VAR $singleDay = 0>
    </IFEQUAL>
<ELSE>
### It defaults to several weeks from today ###
    <VAR $strDateDisplay = $strDateDisplay." - ".date("m/d/Y",$strFutureEnd)>
</IFNOTEMPTY>



<VAR $pointsClause = "">
<IFNOTEMPTY $form_Sport>
<QUERY name=Sport SPORTID=$form_Sport>
<VAR $sportName=$Sport_SportName>
<VAR $sportType = $Sport_SportType>
<VAR $sqlSportName=strtolower(convertForSQL($sportName))>

### Week-by-week schedule pagination functions ###
<?PHP
// Configure the variables for the week generator


function week_generate($game_timestamp)
{
    $saturday = 6;
    $game_day = date("w", $game_timestamp);
    $game_days_until_saturday = $saturday - $game_day;
    $week_start = strtotime("-$game_day days", $game_timestamp);
    $week_end = strtotime("+$game_days_until_saturday days", $game_timestamp);
    return array($week_start, $week_end);
}


function season_by_week($season_start, $season_end, $type="schedule", $sport_id=1, $week_current=0, $conference_id=0, $day_current=0)
{
    /*
     Generates pagination-style navigation for a particular sport's schedule.
     We do it by week because that makes sense to people.
     
     The $type variable recognizes three options:
        schedule: Returns weeks for current and future weeks.
        results: Returns weeks for current and past weeks.
        all: Returns all.
    */
    $season_start = strtotime($season_start);
    $season_end = strtotime($season_end);
    $seconds_in_a_week = 604800;
    $seconds_in_a_day = 86400;
        
    // How many weeks are in a season?
    $season_weeks = round(( $season_end - $season_start ) / $seconds_in_a_week);
    
    $this_week = round(( time() - $season_start ) / $seconds_in_a_week);
    if ( $this_week < 0 ) $this_week = 0;

    switch ( strtolower($type) )
    {
        case "schedule":
            $week_start = $this_week;
            break;
        case "results":
            $week_start = 0;
            $season_weeks = $this_week;
            break;
        default:
        
            $week_start = 0;
            break;
    }


    //echo "<dd>Weeks: $season_weeks</dd>";
    //echo "<dd>This week: $this_week</dd>";
    //echo "<dd>Week start: $week_start</dd>";
    
    if ( $conference_id > 0 )
    {
        $conference_link = "&ConferenceID=$conference_id";
    }
    
    // Loop through the weeks, put the dates in an array.
    $return = array(
                    "day" => "",
                    "week" => "");
    for ( $i = $week_start; $i <= $season_weeks; $i ++ )
    {
        $week_display = $i + 1;
        $timestamp = $season_start + ( $seconds_in_a_week * $i );
        $week[$i] = week_generate($timestamp);
        $week_start_timestamp = $week[$i][0];
        $week_end_timestamp = $week[$i][1];
        

        
        
        
        if ( $week_current == $week_display )
        {
            $return["week"] .= $week_display . " ";
            
            // If we know we're on the current week, we also build
            // the navigation for that particular day.
            for ( $j = 0; $j <= 6; $j ++ )
            {
                $day_display = $j + 1;
                $timestamp = $week_start_timestamp + ( $seconds_in_a_day * $j );
                $link = "/home.html?site=default&tpl=Schedule&Sport=" . $sport_id . "&SearchDate=" . date("m/d/Y", $timestamp) . "&SearchDateEnd=" . date("m/d/Y", $timestamp) . "&start=0&count=250&Week=" . $week_display . "&Day=" . $day_display . $conference_link;
                $return["day"] .= "<a href=" . $link . " class=pageNumberLink>" . date("m/d", $timestamp) . "</a> ";
            }
        }
        else
        {
            $link = "/home.html?site=default&tpl=Schedule&Sport=" . $sport_id . "&SearchDate=" . date("m/d/Y", $week_start_timestamp) . "&SearchDateEnd=" . date("m/d/Y", $week_end_timestamp) . "&start=0&count=250&Week=" . $week_display . $conference_link;
            $return["week"] .= "<a href=" . $link . " class=pageNumberLink>" . $week_display . "</a> ";
        }
        
    }
    return $return;
}
?>
<QUERY name=SeasonSchedule prefix=Season>
<VAR $seasonsort="GameDate DESC">
<QUERY name=SeasonSchedule prefix=SeasonEnd>




<?PHP if ($sportName == "Girls Volleyball") { ?>
<VAR $pointsClause = ",awayteamstats.FinalScore as AwayTeamPoints,hometeamstats.FinalScore  as HomeTeamPoints">
<?PHP } ?>

<?PHP if ($sportName == "Football" || $sportName == "Boys Basketball" || $sportName == "Girls Basketball") { ?>
<VAR $pointsClause = ",awayteamstats.TotalPoints as AwayTeamPoints,hometeamstats.TotalPoints as HomeTeamPoints">
<?PHP } ?>
<?PHP if ($sportName == "Baseball" || $sportName == "Softball") { ?>
<VAR $pointsClause = ",awayteamstats.Runs as AwayTeamPoints,hometeamstats.Runs as HomeTeamPoints">
<?PHP } ?>
<?PHP if ($sportName == "Field Hockey" || $sportName == "Boys Hockey" || $sportName == "Ice Hockey" || $sportName == "Girls Soccer"  || $sportName == "Girls Lacrosse" || $sportName == "Boys Lacrosse") { ?>
<VAR $pointsClause = ",awayteamstats.TotalGoals AS AwayTeamPoints,hometeamstats.TotalGoals as HomeTeamPoints">
<?PHP } ?>
</IFNOTEMPTY>


<VAR $sort = "Sport.SportName,hometeam.TeamClassID,hometeam.TeamConferenceID,GameDate,GameTime">
<VAR $SportIDCurrent = 0>
<VAR $ClassIDCurrent = 0>
<VAR $ConferenceIDCurrent = 0>
<VAR $DayCurrent = 0>
<VAR $TimeCurrent = 0>

### In case we need the schedule for a particular conference ###
<IFNOTEMPTY $form_ConferenceID>
    <QUERY name=Schedule POINTSCLAUSE=$pointsClause SPORTNAME=$sqlSportName CONFERENCEID=$form_ConferenceID count=$form_count>
<ELSE>
    <QUERY name=Schedule POINTSCLAUSE=$pointsClause SPORTNAME=$sqlSportName count=$form_count>
</IFNOTEMPTY>


<VAR $gameCount = count($Schedule_rows)>
<RUN setPreviousNextPageLinks($form_start,$form_count,$gameCount,$total_Schedule) >
<RUN $beginPrevNextURL = $externalURL."site=default&tpl=Schedule">
<RUN $beginPrevNextURL .= "&Sport=".$form_Sport>
<RUN $beginPrevNextURL .= "&SearchDate=".$form_SearchDate>
<RUN $beginPrevNextURL .= "&SearchDateEnd=".$form_SearchDateEnd>
<h3>
    <span class="color grey">{$total_Schedule} prep <?PHP echo strtolower($sportName) ?> game<IFNOTEQUAL $total_Schedule 1>s</IFNOTEQUAL> for</span> <IFNOTEMPTY $form_Week> Week {$form_Week}, </IFNOTEMPTY>{$strDateDisplay}
    ### <IFNOTEQUAL $total_Schedule $form_count>( <a href="{$externalURL}site=default&tpl=Schedule">view all games</a> )</IFNOTEQUAL> ###
</h3>




### ------------------------------------------------------------------------ ###
### Schedule Nav - Top ###
### ------------------------------------------------------------------------ ###
### If we have a sport, we display links to the week-by-week schedule ###
<IFNOTEMPTY $form_Sport>
<h4>
Week: 
<?PHP
$nav = season_by_week($Season_GameDate, $SeasonEnd_GameDate, $schedule_type, $form_Sport, $form_Week, $form_ConferenceID);
echo $nav["week"];
?>
</h4>
<ELSE>
<h4>
<IFGREATER $gameCount 0>
<IFGREATER 501 $total_Schedule>
Pages:
</IFGREATER>

<IFTRUE $showPrevPageLink>
<a href="{$beginPrevNextURL}
&start={$form_start-$form_count}
&count={$form_count}
&sort={$form_sort}" class="pageNumberLink">Previous</a>
</IFTRUE>

<IFGREATER 501 $total_Schedule>
<LOOP counter=i start=0 end=$totalPages-1 incr=1>
<IFEQUAL $i*$form_count $form_start>
<span>{$i+1}</span>
<ELSE>
<a href="{$beginPrevNextURL}
&start={$i*$form_count}
&count={$form_count}
&sort={$strReqSort}" class="pageNumberLink">{$i+1}</a>
</IFEQUAL>
</LOOP>
</IFGREATER>

<IFTRUE $showNextPageLink>
<a href="{$beginPrevNextURL}
&start={$form_start+$form_count}
&count={$form_count}
&sort={$form_sort}" class="pageNumberLink">Next</a>
</IFTRUE>

</IFGREATER>
</h4>
</IFNOTEMPTY>


### If we are displaying a week's worth of games, we display links to each day's schedule ###
<IFNOTEMPTY $form_Week>
<h4>Day:
<?PHP
echo $nav["day"];
?>
</h4>
</IFNOTEMPTY>


### ------------------------------------------------------------------------ ###
### ------------------------------------------------------------------------ ###
###                                                                          ###
### Schedule ###
###                                                                          ###
### ------------------------------------------------------------------------ ###
### ------------------------------------------------------------------------ ###



###
<VAR $SportIDCurrent = 0>
<VAR $ClassIDCurrent = 0>
<VAR $ConferenceIDCurrent = 0>
<VAR $DayCurrent = 0>
<VAR $TimeCurrent = 0>
###

<div class="schedule">
<RESULTS list=Schedule_rows prefix=Game>
### ------------------------------------------------------------------------ ###
### Sport ###
### ------------------------------------------------------------------------ ###
<IFEMPTY $form_Sport>
    <IFNOTEQUAL $SportIDCurrent $Game_SportID>
    <h3>Sport: {$Sport_SportName}</h3>
    <VAR $SportIDCurrent = $Game_SportID>
    </IFNOTEQUAL>
<IFEMPTY $form_Sport>            <td valign="top"><a href="{$externalURL}site=default&tpl=Sport&Sport={$Game_SportID}">{$Game_SportName}</a></td></IFEMPTY>
</IFEMPTY>

### ------------------------------------------------------------------------ ###
### Class ###
### ------------------------------------------------------------------------ ###
<IFEMPTY $form_ConferenceID>
    <IFNOTEQUAL $ClassIDCurrent $Game_TeamClassID>
        <QUERY name=Class prefix=Class CLASSID=$Game_TeamClassID>
        <h3><a href="{$externalURL}site=default&tpl=Class&ClassID={$Class_ClassID}&Sport={$Sport_SportID}" title="{$Class_ClassName} Prep {$Sport_SportName}">Class {$Class_ClassName} {$Sport_SportName}</a></h3>
        <VAR $ClassIDCurrent = $Game_TeamClassID>
        <VAR $DayCurrent = 0>
    </IFNOTEQUAL>
</IFEMPTY>

### ------------------------------------------------------------------------ ###
### Conference ###
### ------------------------------------------------------------------------ ###
<IFEMPTY $form_ConferenceID>
    <IFGREATER $Game_TeamConferenceID 0>
        <IFNOTEQUAL $ConferenceIDCurrent $Game_TeamConferenceID>
            <QUERY name=Conference prefix=Conference CONFERENCEID=$Game_TeamConferenceID>
            <h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}" title="{$Conference_ConferenceName} Conference">{$Conference_ConferenceName} Conference</a></h4>
            <VAR $ConferenceIDCurrent = $Game_TeamConferenceID>
            <VAR $DayCurrent = 0>
        </IFNOTEQUAL>
    </IFGREATER>
</IFEMPTY>

### ------------------------------------------------------------------------ ###
### Day ###
### ------------------------------------------------------------------------ ###
<IFNOTEQUAL $singleDay 1>
    <VAR $Day = date("j", strtotime($Game_GameDate))>
    <IFNOTEQUAL $DayCurrent $Day>
        <h5><?PHP echo date("l F j", strtotime($Game_GameDate)); ?></h5>
        <VAR $DayCurrent = $Day>
    </IFNOTEQUAL>
</IFNOTEQUAL>

### ------------------------------------------------------------------------ ###
### Time ###
### ------------------------------------------------------------------------ ###
###
<VAR $Time = date("Gi",strtotime($Game_GameTime))>
<IFNOTEQUAL $TimeCurrent $Time>
    <h5><strong><?PHP echo date("l F j", strtotime($Game_GameDate)); ?></strong></h5>
    <VAR $DayCurrent = $Day>
</IFNOTEQUAL>
###

### {$Game_SportName}|{$Game_SportID}|{$Game_TeamConferenceName}|{$Game_TeamConferenceID}|{$Game_TeamClassName}|{$Game_TeamClassID} ###



### ------------------------------------------------------------------------ ###
### Time, Teams, Results ###
### ------------------------------------------------------------------------ ###
<VAR $gameTime = date("g:ia",strtotime($Game_GameTime))>
<h6>{$gameTime}: 
<?PHP if ($sportType == "1") { ?>
                <a href="{$externalURL}site=default&tpl=Boxscore&ID={$Game_GameID}">{$Game_GameMeetName}</a>
<IFNOTEQUAL $Game_GameLocation $Game_HomeTeamID>
<IFNOTEMPTY $Game_SchoolName>
<?PHP
$Map_Address = str_replace(" ", "+", trim($Game_SchoolAddress) . "&csz=" . trim($Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip));
?>
                <span>(at <a href="http://maps.yahoo.com/py/maps.py?addr={$Map_Address}" title="Get a map and directions to the field">{$Game_SchoolName}</a>)</span>
</IFNOTEMPTY>
</IFNOTEQUAL>
<?PHP } ?>

### Logic for the meet events not already accounted for ###
<?PHP if ($sportType != "1") { ?>
<IFNOTEMPTY $Game_GameMeetName>
                <a href="{$externalURL}site=default&tpl=Boxscore&ID={$Game_GameID}">{$Game_GameMeetName}</a>
<IFNOTEMPTY $Game_SchoolName>
<IFNOTEMPTY $Game_SchoolAddress>
<?PHP
$Map_Address = str_replace(" ", "+", trim($Game_SchoolAddress) . "&csz=" . trim($Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip));
//$Map_Address = str_replace(" ", "+", $Game_SchoolAddress . "&csz=" . $Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip);
?>
                <span>(at <a href="http://maps.yahoo.com/py/maps.py?addr={$Map_Address}" title="Get a map and directions to the field">{$Game_SchoolName}</a>)</span>
</IFNOTEMPTY>
</IFNOTEMPTY>


<ELSE>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Game_AwayTeamID}">
                {$Game_AwayTeamName}
                </a>
<IFGREATER $Game_GameStatStatus 2>
                : {$Game_AwayTeamPoints}
</IFGREATER>
                at
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Game_HomeTeamID}">
                {$Game_HomeTeamName}
                </a>
<IFGREATER $Game_GameStatStatus 2>
                : {$Game_HomeTeamPoints}
</IFGREATER>
<IFNOTEQUAL $Game_GameLocation $Game_HomeTeamID>
<IFNOTEMPTY $Game_SchoolName>
<IFNOTEMPTY $Game_SchoolAddress>
<?PHP
$Map_Address = str_replace(" ", "+", trim($Game_SchoolAddress) . "&csz=" . trim($Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip));
//$Map_Address = str_replace(" ", "+", $Game_SchoolAddress . "&csz=" . $Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip);
?>
                <span>(at <a href="http://maps.yahoo.com/py/maps.py?addr={$Map_Address}" title="Get a map and directions to the field">{$Game_SchoolName}</a>)</span>
</IFNOTEMPTY>
</IFNOTEMPTY>
</IFNOTEQUAL>


</IFNOTEMPTY>### Close out the logic for a gentler display of meet events ###
<?PHP } ?>

<?PHP if ($Game_GameStatStatus > 2 ) { ?>
                <a href="{$externalURL}site=default&tpl=Boxscore&ID={$Game_GameID}">Boxscore</a>
<?PHP } ?>

</RESULTS>
</div>

### ------------------------------------------------------------------------ ###
### Schedule Nav - Bottom ###
### ------------------------------------------------------------------------ ###
### If we have a sport, we display links to the week-by-week schedule ###
<IFNOTEMPTY $form_Sport>
<h4>
Week: 
<?PHP
echo $nav["week"];
?>
</h4>
<ELSE>
<h4>
<IFGREATER $gameCount 0>
<IFGREATER 501 $total_Schedule>
Pages:
</IFGREATER>

<IFTRUE $showPrevPageLink>
<a href="{$beginPrevNextURL}
&start={$form_start-$form_count}
&count={$form_count}
&sort={$form_sort}" class="pageNumberLink">Previous</a>
</IFTRUE>

<IFGREATER 501 $total_Schedule>
<LOOP counter=i start=0 end=$totalPages-1 incr=1>
<IFEQUAL $i*$form_count $form_start>
<span>{$i+1}</span>
<ELSE>
<a href="{$beginPrevNextURL}
&start={$i*$form_count}
&count={$form_count}
&sort={$strReqSort}" class="pageNumberLink">{$i+1}</a>
</IFEQUAL>
</LOOP>
</IFGREATER>

<IFTRUE $showNextPageLink>
<a href="{$beginPrevNextURL}
&start={$form_start+$form_count}
&count={$form_count}
&sort={$form_sort}" class="pageNumberLink">Next</a>
</IFTRUE>

</IFGREATER>
</h4>
</IFNOTEMPTY>

### END ###




<a name="leaders"></a>
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<QUERY name=Sport SPORTID=$form_Sport>
<VAR $sportName=$Sport_SportName>
<VAR $sqlSportName=strtolower(convertForSQL($sportName))>
<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=Leaders_Football>
</IFEQUAL>
<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=Leaders_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Wrestling">
<INCLUDE site=default tpl=Leaders_Wrestling>
</IFEQUAL>
<IFTRUE $sportName == "Boys Swimming and Diving" || $sportName == "Girls Swimming and Diving">
<INCLUDE site=default tpl=Leaders_Swimming>
</IFTRUE>

<IFTRUE $sportName == "Football" || $sportName == "Boys Basketball" || $sportName == "Wrestling" || $sportName == "Boys Swimming and Diving" || $sportName == "Girls Swimming and Diving">
<h3>{$Sport_SportName} Leaders, By Class</h3>
<QUERY name=ClassesForSport SPORTID=$form_Sport>
<ul>
<RESULTS list=ClassesForSport_rows prefix=Class>
<li><a href="{$externalURL}site=default&tpl=Class&Sport={$form_Sport}&ClassID={$Class_ClassID}">{$Class_ClassName} {$Sport_SportName} leaders</a></li></RESULTS>
</ul>
</IFTRUE>

<div style="width:200px; float:left;">
<a name="conference"></a>
<h2>{$Sport_SportName}, By Conference</h2>
<ul class="namelist">	<!-- Tier 3 -->
	<VAR $IndexLetter = "">
	<VAR $newIndexLetter = "">
	<QUERY name=ConferencesForSport SPORTID=$form_Sport>
		<IFGREATER count($ConferencesForSport_rows) 0>

		<li>{$ConfInitialCharacter}
			<ul>	<!-- Tier 4 -->
			<RESULTS list=ConferencesForSport_rows prefix=Conf>
				

				<VAR $IndexLetter = $newIndexLetter>
				<VAR $newIndexLetter = strtoupper(substr($Conf_ConferenceName, 0, 1))>
				<IFNOTEQUAL $newIndexLetter "">
				<IFNOTEQUAL $newIndexLetter $ConfInitialCharacter>
					<IFNOTEQUAL $newIndexLetter $IndexLetter>
		</ul></li>	<!-- /Tier 4 -->
		<li><a name="conferences-{$newIndexLetter}" href="#conferences-{$newIndexLetter}" title="Prep {$Sport_SportName} conferences in Colorado with names that start with the letter {$newIndexLetter}">{$newIndexLetter}</a>
			<ul>	<!-- Tier 4 -->
					</IFNOTEQUAL>
				</IFNOTEQUAL>
				</IFNOTEQUAL>
				
				
				<li><a href="{$externalURL}site=default&tpl=Conference&Sport={$Sport_SportID}&ConferenceID={$Conf_ConferenceID}" title="{$Conf_ConferenceName} conference results and standings for prep {$Sport_SportName} (Colorado)">{$Conf_ConferenceName}</a></li>
			</RESULTS>

	</ul></li>	<!-- /Tier 4 -->
	</IFGREATER>
</ul>	<!-- /Tier 3 -->
</div>

<div style="width:400px; float:left;">
<a name="school"></a>
<h2>{$Sport_SportName}, By School</h2>
<div class="" style="width:200px; float:left;">
<ul class="namelist">	<!-- Tier 3 -->
	<VAR $IndexLetter = "">
	<VAR $newIndexLetter = "">
	<QUERY name=SportTeams_dev SPORTID=$form_Sport>
		<IFGREATER count($SportTeams_dev_rows) 1>

		<li>{$TeamInitialCharacter}
			<ul>	<!-- Tier 4 -->
			<RESULTS list=SportTeams_dev_rows prefix=Team>
				

				<VAR $IndexLetter = $newIndexLetter>
				<VAR $newIndexLetter = strtoupper(substr($Team_TeamName, 0, 1))>
				<IFNOTEQUAL $newIndexLetter "">
				<IFNOTEQUAL $newIndexLetter $TeamInitialCharacter>
					<IFNOTEQUAL $newIndexLetter $IndexLetter>
                        ### This logic allows for two columns on the list. ###
                        <IFEQUAL $newIndexLetter "L">
		</ul></li>	<!-- /Tier 4 -->
</ul>	<!-- /Tier 3 -->
</div>
<div class="" style="width:200px; float:left;">
<ul class="namelist">	<!-- Tier 3 -->
		<li><a name="teams-{$newIndexLetter}" href="#teams-{$newIndexLetter}" title="Prep {$Sport_SportName} teams in Colorado with names that start with the letter {$newIndexLetter}">{$newIndexLetter}</a>
			<ul>	<!-- Tier 4 -->
                        <ELSE>
		</ul></li>	<!-- /Tier 4 -->
		<li><a name="teams-{$newIndexLetter}" href="#teams-{$newIndexLetter}" title="Prep {$Sport_SportName} teams in Colorado with names that start with the letter {$newIndexLetter}">{$newIndexLetter}</a>
			<ul>	<!-- Tier 4 -->
                        </IFEQUAL>
					</IFNOTEQUAL>
				</IFNOTEQUAL>
				</IFNOTEQUAL>
				
				
				<li><a href="{$externalURL}site=default&tpl=Team&Sport={$Sport_SportID}&TeamID={$Team_TeamID}" title="{$Team_TeamName} prep {$Sport_SportName} team and player stats, schedule and standings.">{$Team_TeamName}</a></li>

			</RESULTS>

	</ul></li>	<!-- /Tier 4 -->
	</IFGREATER>
</ul>	<!-- /Tier 3 -->
</div>
</div>


</IFEMPTY>
