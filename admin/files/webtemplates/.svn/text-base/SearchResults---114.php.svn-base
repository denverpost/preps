<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<VAR $form_Query = htmlentities($form_Query)>
<IFEMPTY $form_Query><var $form_Query="nothing"></IFEMPTY>

### ------------------------------------------------------------------------ ###
### Fix common misspellings ###
### ------------------------------------------------------------------------ ###
<?PHP

$form_Query = str_replace(",", "", $form_Query);

$form_Query = str_replace(
    array(
          "ffort",
          "fairiew",
          "eire",
          "raslton",
          "buenta",
          "palmnero",
          "mtn",
          "mountian",
          "aurira",
          ),
    array(
          "ffort",
          "fairview",
          "erie",
          "ralston",
          "buena",
          "palmero",
          "mountain",
          "mountain",
          "aurora",
          ),
    $form_Query);
?>
### ------------------------------------------------------------------------ ###
### Set up the variables and special-case handlings ###
### ------------------------------------------------------------------------ ###
### Rewrite the variable that is passed to the query so it can handle spaces in the names ###
<?PHP
if ( strpos($form_Query, " ") == TRUE )
{
    $query_bits = split(" ", $form_Query);
    $query_one = $query_bits[0];
    $query_two = $query_bits[1];
}
?>
### ------------------------------------------------------------------------ ###
### Canned search redirects ###
### ------------------------------------------------------------------------ ###
<?PHP
$canned["sports"] = array(
    "softball",
    "football",
    "volleyball",
    "soccer",
    "golf");

if ( isset($query_one) )
{
    $form_Query_canned = strtolower($query_one);
    $query_two_canned = strtolower($query_two);
}
else
{
    $form_Query_canned = strtolower($form_Query);
    if ( $form_Query_canned == "girls volleyball") $form_Query_canned = "volleyball";
}

// In case they used a word we're looking for later on in their search:
//if ( in_array($canned["sports"], $query_bits) == TRUE ) { }

switch ( $form_Query_canned )
{
    case "softball":
        $sport_id = 30;
        break;
    case "football":
        $sport_id = 1;
        break;
    case "volleyball":
        $sport_id = 11;
        break;
    case "wrestling":
        $sport_id = 23;
        break;
    case "2a":
        if ( $query_two_canned == "football" )
        {
            $class_id = 4;
            $sport_id = 1;
        }
        elseif ( $query_two_canned == "volleyball" )
        {
            $class_id = 4;
            $sport_id = 11;
        }
        elseif ( $query_two_canned == "wrestling" )
        {
            $class_id = 4;
            $sport_id = 23;
        }
        break;
    case "3a":
        if ( $query_two_canned == "football" )
        {
            $class_id = 3;
            $sport_id = 1;
        }
        elseif ( $query_two_canned == "volleyball" )
        {
            $class_id = 3;
            $sport_id = 11;
        }
        elseif ( $query_two_canned == "wrestling" )
        {
            $class_id = 3;
            $sport_id = 23;
        }
        break;
    case "4a":
        if ( $query_two_canned == "football" )
        {
            $class_id = 1;
            $sport_id = 1;
        }
        elseif ( $query_two_canned == "volleyball" )
        {
            $class_id = 1;
            $sport_id = 11;
        }
        elseif ( $query_two_canned == "wrestling" )
        {
            $class_id = 1;
            $sport_id = 23;
        }
        break;
    case "5a":
        if ( $query_two_canned == "football" )
        {
            $class_id = 2;
            $sport_id = 1;
        }
        elseif ( $query_two_canned == "volleyball" )
        {
            $class_id = 2;
            $sport_id = 11;
        }
        elseif ( $query_two_canned == "wrestling" )
        {
            $class_id = 2;
            $sport_id = 23;
        }
        break;
}

if ( isset($sport_id) )
{
    $canned_searches = "<h1>We noticed you're searching for a sport (" . $form_Query . ").</h1><h2 class=\"note\"><a href=" . $externalURL . "site=default&tpl=Sport&Sport=" . $sport_id . ">See our prep " . $form_Query_canned . " information here.</a></h2>";
}
if ( isset($class_id) )
{
    $canned_searches .= "<h2 class=\"note\"><a href=" . $externalURL . "site=default&tpl=Class&Sport=" . $sport_id . "&ClassID=" . $class_id .">Class " . $form_Query_canned . " " . $query_two_canned . " information is here.</a></h2>";
}
?>



<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    &rsaquo; <a href="{$externalURL}site=default&tpl=SearchResults">Search</a>
</div>

<IFNOTEMPTY $canned_searches>
{$canned_searches}
<?PHP die(); ?>
</IFNOTEMPTY>

### ------------------------------------------------------------------------ ###
### Run the queries here ###
### ------------------------------------------------------------------------ ###
<QUERY name=SearchPlayer QUERY=$form_Query>
<VAR $player_count=count($SearchPlayer_rows)>

<QUERY name=SearchSchool QUERY=$form_Query>
<VAR $school_count=count($SearchSchool_rows)>

<QUERY name=SearchTeam QUERY=$form_Query>
<VAR $team_count=count($SearchTeam_rows)>

<?PHP
$total_count = $player_count + $school_count + $team_count;
?>


### ------------------------------------------------------------------------ ###
### If we get zero results and we can refine the query, do so ###
### ------------------------------------------------------------------------ ###
<?PHP
if ( $total_count == 0 && isset($query_one) )
{
    $form_Query_new = $query_one;
    $query_two = "";
?>
<h2 class="note">We noticed your original search turned up 0 results. We are trying this search again, this time just for {$form_Query_new}.</h2>

<QUERY name=SearchPlayer QUERY=$form_Query_new>
<VAR $player_count=count($SearchPlayer_rows)>

<QUERY name=SearchSchool QUERY=$form_Query_new>
<VAR $school_count=count($SearchSchool_rows)>

<QUERY name=SearchTeam QUERY=$form_Query_new>
<VAR $team_count=count($SearchTeam_rows)>
<?
    $total_count_new = $player_count + $school_count + $team_count;
}
?>


<h1>{$total_count} total results for {$form_Query}<IFNOTEMPTY $form_Query_new>, {$total_count_new} for {$form_Query_new}</IFNOTEMPTY></h1>
<h2>Refine your search:</h2>
<form action="#" method="get">
	<input name="Query" value="{$form_Query}" type="text">
	<input name="site" value="default" type="hidden">
	<input name="tpl" value="SearchResults" type="hidden">
	<input type="submit">
</form>

<IFNOTEMPTY $form_Query_new><VAR $form_Query = $form_Query_new></IFNOTEMPTY>

<IFGREATER $player_count 0>
<h2>{$player_count} player name results for {$form_Query}</h2>

<ol>
<RESULTS list=SearchPlayer_rows prefix=Player>
	<li><a href="{$externalURL}site=default&amp;tpl=Player&amp;ID={$Player_PlayerID}">{$Player_PlayerFirstName} {$Player_PlayerLastName}</a> 
<QUERY name=PlayerTeams ID=$Player_PlayerID>
<IFGREATER count($PlayerTeams_rows) 0>
		<span>(
<RESULTS list=PlayerTeams_rows prefix=PlayerTeams>
		<a href="{$externalURL}site=default&amp;tpl=Team&amp;TeamID={$PlayerTeams_TeamRosterTeamID}">{$PlayerTeams_TeamName} {$PlayerTeams_SportName}</a>
</RESULTS>
		)</span>
</IFGREATER>
	</li>

</RESULTS>
</ol>

<ELSE>
<h2>{$form_Query} turned up 0 player name results</h2>
</IFGREATER>






<IFGREATER $school_count 0>
<h2>{$school_count} school name results for {$form_Query}</h2>

<ol>
<RESULTS list=SearchSchool_rows prefix=School>
    <li><a href="{$externalURL}site=default&amp;tpl=School&amp;School={$School_SchoolID}">{$School_SchoolName}</a></li>
</RESULTS>
</ol>
<ELSE>
<h2>{$form_Query} turned up 0 school name results</h2>
</IFGREATER>




<IFGREATER $team_count 0>
<h2>{$team_count} team name results for {$form_Query}</h2>

<ol>
<RESULTS list=SearchTeam_rows prefix=Team>
    <li><a href="{$externalURL}site=default&amp;tpl=Team&amp;TeamID={$Team_TeamID}">{$Team_TeamName} {$Team_TeamNickname} ({$Team_SportName})</a></li>
</RESULTS>
</ol>
<ELSE>
<h2>{$form_Query} turned up 0 team name results</h2>
</IFGREATER>