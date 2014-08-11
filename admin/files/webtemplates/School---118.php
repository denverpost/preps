<VAR $externalURL = "http://preps.denverpost.com/home.html?">
### Set default values for start and count ###
<?PHP if ( intval($form_School) <= 0 ) { $form_School = False; } ?>



<IFEMPTY $form_School>
<QUERY name=Schools>
<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
</div>
<h1>Schools in Colorado</h1>
<div style="width:300px; float:left;">
<h2>By School Name</h2>
<p>
    <a href="#schools-A">A</a> &bull; <a href="#schools-B">B</a> &bull; <a href="#schools-C">C</a> &bull; <a href="#schools-D">D</a> &bull; <a href="#schools-E">E</a> &bull; <a href="#schools-F">F</a> &bull; <a href="#schools-G">G</a> &bull; <a href="#schools-H">H</a> &bull; <a href="#schools-I">I</a> &bull; <a href="#schools-J">J</a> &bull; <a href="#schools-K">K</a> &bull; <a href="#schools-L">L</a> &bull; <a href="#schools-M">M</a> &bull; <a href="#schools-N">N</a> &bull; <a href="#schools-O">O</a> &bull; <a href="#schools-P">P</a> &bull; <a href="#schools-R">R</a> &bull; <a href="#schools-S">S</a> &bull; <a href="#schools-T">T</a> &bull; <a href="#schools-U">U</a> &bull; <a href="#schools-V">V</a> &bull; <a href="#schools-W">W</a> &bull; <a href="#schools-Y">Y</a>
</p>
<RESULTS list=Schools_rows prefix=School>
    <VAR $IndexLetter = $newIndexLetter>
    <VAR $newIndexLetter = strtoupper(substr($School_SchoolName, 0, 1))>
    <IFNOTEQUAL $newIndexLetter "">
        <IFNOTEQUAL $newIndexLetter $IndexLetter><h2 id="schools-{$newIndexLetter}">{$newIndexLetter}</h2>
        </IFNOTEQUAL>
    </IFNOTEQUAL>
    <h3 class="list"><a href="{$externalURL}site=default&tpl=School&School={$School_SchoolID}" title="{$School_SchoolName} School in {$School_SchoolCity} Colorado">{$School_SchoolName} <IFNOTEMPTY $School_SchoolCity><IFNOTEQUAL $School_SchoolName $School_SchoolCity>({$School_SchoolCity})</IFNOTEQUAL></IFNOTEMPTY></a></h3>
</RESULTS>
</div>

<div style="width:250px; float:left;">
<h2>By School City</h2>
<VAR $Index = "">
<VAR $newIndex = "">
<QUERY name=Schools SORT=SchoolCity>
<RESULTS list=Schools_rows prefix=School>
    <VAR $Index = $newIndex>
    <VAR $newIndex = $School_SchoolCity>
    <IFNOTEQUAL $newIndex "">
        <IFNOTEQUAL $newIndex $Index>
    <h2>{$School_SchoolCity}<span>, Colorado</span></h2>
        </IFNOTEQUAL>
    </IFNOTEQUAL>
    <h3 class="list"><a href="{$externalURL}site=default&tpl=School&School={$School_SchoolID}" title="{$School_SchoolName} School in {$School_SchoolCity} Colorado">{$School_SchoolName}</a></h3>
</RESULTS>
</div>


<ELSE>
<QUERY name=School prefix=School SCHOOLID=$form_School>

<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    &rsaquo; <a href="{$externalURL}site=default&tpl=School&School">Schools</a>
</div>
<h1>
    {$School_SchoolName}
    <IFNOTEMPTY $School_SchoolCity>
    <IFNOTEQUAL $School_SchoolName $School_SchoolCity>({$School_SchoolCity}, Colorado)
    </IFNOTEQUAL>
    </IFNOTEMPTY>
    Prep Sports
</h1>

<h2>{$School_SchoolName} location and contact info</h2>
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
{$School_SchoolAddress}<br>
<IFNOTEMPTY $School_SchoolAddressLine2>{$School_SchoolAddressLine2}<br></IFNOTEMPTY>
{$School_SchoolCity}, {$School_SchoolState} {$School_SchoolZip}<br>
</p>
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



<RESULTS list=SchoolTeams_rows prefix=Team>
<h2 class="list twocolumns"><a href="{$externalURL}site=default&tpl=Team&Sport={$Team_SportID}&TeamID={$Team_TeamID}" title="{$Team_TeamName} Prep {$Team_SportName}"><span>{$Team_TeamName} Prep</span> {$Team_SportName}</a></h2>
</RESULTS>

<!--
<li>{$School_SchoolTickets}</li>
<li>{$School_SchoolComments}</li>
<li>{$School_SchoolClass}</li>
<li>{$School_SchoolConference}</li>
<li>{$School_SchoolCoursePar}</li>
<li>{$School_SchoolCourseLength}</li>
<li>{$School_SchoolPrimaryColor}</li>
<li>{$School_SchoolSecondaryColor}</li>
<li>{$School_SchoolBackgroundImage}</li>
-->
</IFEMPTY>