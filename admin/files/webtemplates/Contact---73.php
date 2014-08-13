<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">

<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
</div>

<h1>Contact the Denver Post Preps Team</h1>
<form action="http://www.denverpostplus.com/app/mailer/" method="post" name="tipmail">
	<textarea style="margin: 3px 0 0 0 ;" name="comments" rows="<IFNOTEMPTY $form_notify>2<ELSE>10</IFNOTEMPTY>" cols="80">
<IFNOTEMPTY $form_suggestions>What's your idea?</IFNOTEMPTY><IFNOTEMPTY $form_suggestions>What's your idea?</IFNOTEMPTY>
<IFNOTEMPTY $form_notify>Let me know when {$form_notify} is online.</IFNOTEMPTY>
<IFNOTEMPTY $form_referer>What you saw:
 
 
Was it an inaccuracy? A problem with site functionality?
 
 
 
 
 
 
Submitted from: {$form_referer}</IFNOTEMPTY>
<?PHP echo "</text" . "area>"; ?>
	<input type="hidden" value="goof111" name="keebler" />
	<input type="hidden" name="goof111" value="TRUE" />
	<input type="hidden" name="redirect" value="http://www.denverpost.com/preps/ci_13207187" />
	<input type="hidden" name="id" value="prepscontact" />
	<input type="text" name="name_first" value="Humans: Do Not Use" style="display:none;" />
	<p><strong>If you would like a reply, please include your email address.</strong>
	<input type="text" name="email_address" value="" maxlength="50" />
	</p>
	<input type="IMAGE" style="margin: 3px 0 0 0;" name="submit" src="http://extras.mnginteractive.com/live/media/site36/2008/0530/20080530_062035_btn_submit_red.gif" />
</form>
    
<h2>Denver Post Prep Contact Details</h2>
<p><strong>Coaches, we need your scores and statistics.</strong> There are multiple ways to ensure your team's information gets in The Denver Post and online at denverpost.com.</p>

<p>All athletic directors in Colorado have been sent information outlining how to input your team's information directly into The Post's Team Player software. In addition, you may call The Post's prep desk ( 303-954-1980, -1981, -1982 or 1-800-DENPOST ), or designate someone to give us the information.</p>

<p><strong>We need you or your designated statistician to complete each game/event summary, or call us with the information, as soon as possible after your game is over.</strong> For your information to appear in the newspaper, please contact us by no later than 10:45 p.m. Also, please make sure you have inputted your schedule and roster into our system.</p>

<p><strong>To contact us, call 303-954-1980, -1981, -1982 or 1-800-DENPOST in evenings; fax 303-866-9004; or <a href="mailto:postpreps@denverpost.com">e-mail postpreps@denverpost.com</a>.</strong></p>

<p><em>Neil Devlin, Preps Editor</em></p>
