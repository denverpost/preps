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
<?PHP if ($sportName == "Field Hockey" || $sportName == "Boys Hockey" || $sportName == "Ice Hockey" || $sportName == "Girls Soccer"  || $sportName == "Boys Soccer" || $sportName == "Girls Lacrosse" || $sportName == "Boys Lacrosse") { ?>
<VAR $pointsClause = ",awayteamstats.TotalGoals AS AwayTeamPoints,hometeamstats.TotalGoals as HomeTeamPoints">
<?PHP } ?>
</IFNOTEMPTY>



<VAR $SportIDCurrent = 0>
<VAR $ClassIDCurrent = 0>
<VAR $ConferenceIDCurrent = 0>
<VAR $DayCurrent = 0>
<VAR $TimeCurrent = 0>

### In case we need the schedule for a particular conference ###
<IFNOTEMPTY $form_ConferenceID>
    <VAR $sort = "GameDate,GameTime">
    <QUERY name=Schedule POINTSCLAUSE=$pointsClause SPORTNAME=$sqlSportName CONFERENCEID=$form_ConferenceID count=$form_count>
<ELSE>
    <VAR $sort = "Sport.SportName,hometeam.TeamClassID,hometeam.TeamConferenceID,GameDate,GameTime">
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


### ------------------------------------------------------------------------ ###
### Sport SubNav ###
### ------------------------------------------------------------------------ ###
<IFEMPTY $form_Sport>
<p>Skip down to schedules by sport:</p>
<RESULTS list=Schedule_rows prefix=Subnav>
    <ul id="subnav">
    <IFNOTEQUAL $SportIDCurrent $Subnav_SportID>
        <li><a href="#sport{$Subnav_SportID}">{$Subnav_SportName} Schedule</a></li>
        <VAR $SportIDCurrent = $Subnav_SportID>
    </IFNOTEQUAL>
    </ul>
</RESULTS>
</IFEMPTY>
### ------------------------------------------------------------------------ ###
### Class SubNav ###
### ------------------------------------------------------------------------ ###
<IFNOTEMPTY $form_Sport>
<IFEMPTY $form_ConferenceID>
<p>Skip down to schedules by class:</p>
<RESULTS list=Schedule_rows prefix=Subnav>
    <ul id="subnav">
    <IFGREATER $Subnav_TeamClassID 0>
    <IFNOTEQUAL $ClassIDCurrent $Subnav_TeamClassID>
        <QUERY name=Class prefix=Class CLASSID=$Subnav_TeamClassID>
        <li><a href="#class{$Class_ClassName}">Class {$Class_ClassName} Schedule</a></li>
        <VAR $ClassIDCurrent = $Subnav_TeamClassID>
    </IFNOTEQUAL>
    </IFGREATER>
    </ul>
</RESULTS>
</IFEMPTY>
</IFNOTEMPTY>


<div class="schedule">
<RESULTS list=Schedule_rows prefix=Game>
    <!-- Query: {$Schedule_query} -->
### ------------------------------------------------------------------------ ###
### Sport ###
### ------------------------------------------------------------------------ ###
<IFEMPTY $form_Sport>
    <IFNOTEQUAL $SportIDCurrent $Game_SportID>
        <div class="clear"></div>
        <a name="sport{$Game_SportID}"></a>
        <h3 style="margin-top:25px; font-size:36px; border-top:10px solid #ccc;"><a href="{$externalURL}site=default&tpl=Sport&Sport={$Game_SportID}">{$Game_SportName}</a></h3>
        <VAR $SportIDCurrent = $Game_SportID>
    </IFNOTEQUAL>
</IFEMPTY>

### ------------------------------------------------------------------------ ###
### Class ###
### ------------------------------------------------------------------------ ###
<IFEMPTY $form_ConferenceID>
    <IFGREATER $Game_TeamClassID 0>
        <IFNOTEQUAL $ClassIDCurrent $Game_TeamClassID>
            <QUERY name=Class prefix=Class CLASSID=$Game_TeamClassID>
            <div class="clear"></div>
            <a name="class{$Class_ClassName}"></a>
             <IFNOTEMPTY $form_Sport><h3 class="sub sublarge">
             <ELSE><h3 class="sub">
             </IFNOTEMPTY>
            <a href="{$externalURL}site=default&tpl=Class&ClassID={$Class_ClassID}&Sport={$Sport_SportID}" title="{$Class_ClassName} Prep {$Sport_SportName}">Class {$Class_ClassName} {$Sport_SportName}</a></h3>
            <VAR $ClassIDCurrent = $Game_TeamClassID>
            <VAR $DayCurrent = 0>
        </IFNOTEQUAL>
    </IFGREATER>
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
</h6>
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