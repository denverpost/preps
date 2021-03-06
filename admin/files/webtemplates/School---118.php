<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<INCLUDE site=default tpl=SportSeasons>
<VAR $dateToCheck = date("n/j")>
<IFEMPTY $form_Season>
  <VAR $form_Season = $currentSeason>
</IFEMPTY>
### Set default values for start and count ###
<?PHP if ( intval($form_School) <= 0 ) { $form_School = False; } ?>



<IFEMPTY $form_School>
<QUERY name=Schools>
<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
</div>
<h1>High Schools</h1>
<p>A list of the high schools we have prep sports scores and stats for.</p>

<div style="width:300px; float:left;">
<h2>By High School Name</h2>
<p>
    <a href="#schools-A">A</a> <a href="#schools-B">B</a> <a href="#schools-C">C</a> <a href="#schools-D">D</a> <a href="#schools-E">E</a> <a href="#schools-F">F</a> <a href="#schools-G">G</a> <a href="#schools-H">H</a> <a href="#schools-I">I</a> <a href="#schools-J">J</a> <a href="#schools-K">K</a> <a href="#schools-L">L</a><br> <a href="#schools-M">M</a> <a href="#schools-N">N</a>  <a href="#schools-O">O</a>  <a href="#schools-P">P</a>  <a href="#schools-R">R</a>  <a href="#schools-S">S</a>  <a href="#schools-T">T</a>  <a href="#schools-U">U</a> <a href="#schools-V">V</a>  <a href="#schools-W">W</a>  <a href="#schools-Y">Y</a>
</p>
<RESULTS list=Schools_rows prefix=School>
    <VAR $IndexLetter = $newIndexLetter>
    <VAR $newIndexLetter = strtoupper(substr($School_SchoolName, 0, 1))>
    <IFNOTEQUAL $newIndexLetter "">
        <IFNOTEQUAL $newIndexLetter $IndexLetter><h2 id="schools-{$newIndexLetter}">{$newIndexLetter}</h2>
        </IFNOTEQUAL>
    </IFNOTEQUAL>
<?PHP $slug = slugify($School_SchoolName); ?>

    <h3 class="list"><a href="/schools/{$slug}/{$School_SchoolID}/" title="{$School_SchoolName} School in {$School_SchoolCity} {$School_SchoolState}">{$School_SchoolName} <IFNOTEMPTY $School_SchoolCity><IFNOTEQUAL $School_SchoolName $School_SchoolCity>({$School_SchoolCity})</IFNOTEQUAL></IFNOTEMPTY></a></h3>
</RESULTS>
</div>

<div style="width:250px; float:left;">
<h2>By City</h2>
<VAR $Index = "">
<VAR $newIndex = "">
<QUERY name=Schools SORT=SchoolCity>
<RESULTS list=Schools_rows prefix=School>
    <VAR $Index = $newIndex>
    <VAR $newIndex = $School_SchoolCity>
<IFEQUAL $School_SchoolState "CO">
    <IFNOTEQUAL $newIndex "">
        <IFNOTEQUAL $newIndex $Index>
    <h2>{$School_SchoolCity}<span>, {$School_SchoolState}</span></h2>
        </IFNOTEQUAL>
    </IFNOTEQUAL>

<?PHP $slug = slugify($School_SchoolName); ?>

    <h3 class="list"><a href="/schools/{$slug}/{$School_SchoolID}/" title="{$School_SchoolName} School in {$School_SchoolCity} {$School_SchoolState}">{$School_SchoolName}</a></h3>
###    <h3 class="list"><a href="{$externalURL}site=default&tpl=School&School={$School_SchoolID}" title="{$School_SchoolName} School in {$School_SchoolCity} {$School_SchoolState}">{$School_SchoolName}</a></h3>###
</IFEQUAL>
</RESULTS>
</div>


<ELSE>
<QUERY name=School prefix=School SCHOOLID=$form_School ARCHIVETAG=$archiveTag SEASON=$form_Season>

<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    � <a href="{$domainURL}/schools/">Schools</a>
</div>
<h1>
    {$School_SchoolName}
    <IFNOTEMPTY $School_SchoolCity>
    <IFNOTEQUAL $School_SchoolName $School_SchoolCity>({$School_SchoolCity}<IFNOTEMPTY $School_SchoolState>, {$School_SchoolState}</IFNOTEMPTY>)
    <ELSE>
    ({$School_SchoolCity}<IFNOTEMPTY $School_SchoolState>, {$School_SchoolState}</IFNOTEMPTY>) 
    </IFNOTEQUAL>
    </IFNOTEMPTY>
    Sports
</h1>

<h2>{$School_SchoolName} address<IFNOTEMPTY $School_SchoolPhone> and contact info</IFNOTEMPTY></h2>
<QUERY name=SchoolTeams SCHOOLID=$form_School>
<RESULTS list=SchoolTeams_rows prefix=Team></RESULTS>

<QUERY name=TeamPhoto prefix=TeamLogo ID=$Team_TeamID PATHID=2>
<IFNOTEMPTY $TeamLogo_UploadFile>
<div style="float:left; margin-right:5px;">
<img src="http://denver-tpweb.newsengin.com/web/graphics/team/{$TeamLogo_UploadFile}" alt="{$Team_TeamName} {$Team_TeamNickname} Logo" />
</div>
</IFNOTEMPTY>

<h3>Address</h3>
<p>
{$School_SchoolAddress}<IFNOTEMPTY $School_SchoolAddress><br></IFNOTEMPTY>
<IFNOTEMPTY $School_SchoolAddressLine2>{$School_SchoolAddressLine2}<br></IFNOTEMPTY>
{$School_SchoolCity}<IFNOTEMPTY $School_SchoolState>,</IFNOTEMPTY> {$School_SchoolState} {$School_SchoolZip}
</p>

<IFNOTEMPTY $School_SchoolPhone>
<h3>Contact</h3>
<dl>
<IFNOTEMPTY $School_SchoolPhone>
    <dt>School Phone:</dt>
    <dd>{$School_SchoolPhone}</dd>
</IFNOTEMPTY>
<IFNOTEMPTY $School_SchoolFax>
    <dt>School Fax:</dt>
    <dd>{$School_SchoolFax}</dd>
</IFNOTEMPTY>
<IFNOTEMPTY $School_SchoolContactName>
    <dt>Contact Name:</dt>
    <dd>{$School_SchoolContactName}</dd>
    <dd>{$School_SchoolContactPhone}</dd>
    <dd>{$School_SchoolEmailAddress}</dd>
</IFNOTEMPTY>
<IFNOTEMPTY $School_SchoolURL>
    <dt>School Website:</dt>
    <dd><a href="{$School_SchoolURL}"><?PHP echo str_replace("http://", "", $School_SchoolURL); ?></a></dd>
</IFNOTEMPTY>
<IFNOTEMPTY $School_SchoolCapacity>
    <dt>School Capacity:</dt>
    <dd>{$School_SchoolCapacity}</dd>
</IFNOTEMPTY>
</dl>
</IFNOTEMPTY>


<h2>{$School_SchoolName} team links</h2>
<p>(Click on a link below to see that team's schedule, stats and roster)</p>
<VAR $whereClause = "TeamActive = 1 AND (SportName LIKE \"Boys%\" OR SportID IN(1,25,29,23,34))">
<QUERY name=SportBySeasonAndGender SCHOOLID=$form_School WHERECLAUSE = $whereClause>


<table cellpadding="0" cellspacing="0" class="schedTable deluxe wide300" style="float:left;">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">{$School_SchoolName} Boys</th>
<VAR $priorSeason = "">
<VAR $seasonCheck = "">
<RESULTS list=SportBySeasonAndGender_rows prefix=Sport>

<VAR $seasonCheck = $Sport_SportSeason>
<?PHP $schoolslug = slugify($School_SchoolName); ?>
<?PHP $sportslug = slugify($Sport_SportName); ?>
<IFNOTEQUAL $seasonCheck $priorSeason>
  <tr class= "schedRowAlternate trAlt">
  <td><strong>{$Sport_SportSeason} Sports</strong></td>
</IFEQUAL>
  <tr class = "schedRow trRow">
  <td> &nbsp; <a href="{$domainURL}/schools/{$schoolslug}/{$sportslug}/{$Sport_TeamID}/" title="{$School_SchoolName} Prep {$Sport_SportName}">{$Sport_SportName}</a></td>
<VAR $priorSeason = $Sport_SportSeason>
</RESULTS>
    </tbody>
</table>


<VAR $whereClause = "TeamActive = 1 AND (SportName LIKE \"Girls%\" OR SportID IN(28,30,32))">
<QUERY name=SportBySeasonAndGender SCHOOLID=$form_School WHERECLAUSE = $whereClause>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe wide300" >
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">{$School_SchoolName} Girls</th>
<VAR $priorSeason = "">
<VAR $seasonCheck = "">
<RESULTS list=SportBySeasonAndGender_rows prefix=Sport>

<VAR $seasonCheck = $Sport_SportSeason>
<?PHP $schoolslug = slugify($School_SchoolName); ?>
<?PHP $sportslug = slugify($Sport_SportName); ?>
<IFNOTEQUAL $seasonCheck $priorSeason>
  <tr class= "schedRowAlternate trAlt">
  <td><strong>{$Sport_SportSeason} Sports</strong></td>
</IFEQUAL>
  <tr class = "schedRow trRow">
  <td> &nbsp; <a href="{$domainURL}/schools/{$schoolslug}/{$sportslug}/{$Sport_TeamID}/" title="{$School_SchoolName} Prep {$Sport_SportName}">{$Sport_SportName} </a></td>
<VAR $priorSeason = $Sport_SportSeason>
</RESULTS>
    </tbody>
</table>





</IFEMPTY>
