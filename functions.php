<?php

function get_content($url)
{
        $url=str_replace('&amp;','&',$url);
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, "http://preps.denverpost.com" . $_SERVER['REQUEST_URI']);
        $xml = curl_exec ($ch);
        curl_close ($ch);
        return $xml;
}

function clean_content($url)
{
    /*
     Takes a URL, ingests whatever's on that page, and cleans it up.
    */
    $content = get_content($url);

    // Get rid of formatting and javascript-oriented characters
    $content = str_replace('\\', '', $content);


    // This regex primarily deals with variations in the argument
    // passed by document.getElementById
    $content = preg_replace("/divJS = document\.getElementById\('[a-zA-Z]+'\);\n.*if \(divJS\) {\n.*divJS.innerHTML='/i", '', $content);

    // Sometimes other javascript-specific commands are written
    $content = preg_replace("/';js = document.createElement\('script'\);\n.*/is", '', $content);//js.setAttribute\('src','http:\/\/denver-tpweb.newsengin.com\/web\/js\/[a-z_]+.js'\);\n.*\}<\/div>

    // Clean up white space and other trailing characters.
    $content = str_replace("\t", '', $content);
    $content = str_replace("\r\n\r\n\r\n", "\n", $content);
    $content = str_replace("\r\n\r\n", "\n", $content);
    $content = preg_replace("/';[ \r\n]+\}/is", '', $content);


    // There's a chance we may be sending output to two separate places.
    //
    // If that's true, there will be a <!-- BEGIN SIDEBAR -->...<!-- END SIDEBAR -->
    // that contains that information, and we should pull that out
    // and put it in its own array field.
    if ( strpos($content, '<!-- BEGIN SIDEBAR -->') == TRUE && strpos($content, '<!-- END SIDEBAR -->') == TRUE )
    {
        $sidebar = preg_replace('/.*<!-- BEGIN SIDEBAR -->(.*)<!-- END SIDEBAR -->.*/is', '\1', $content);
        $content = preg_replace('/<!-- BEGIN SIDEBAR -->.*<!-- END SIDEBAR -->/is', '', $content);
        $return['sidebar'] = $sidebar;

    }
    $return['main'] = $content;

    return $return;
}


function map_sportid($sportid)
{
    /*
     Take a NewsEngin SportID and return an array with related links
    */
    $sportid = intval($sportid);

    switch ( $sportid )
    {
        case 1:
            $related = array(
                'blog_category' => 'football',
                'photo_gallery' => 'football',
                'twitter' => 'prepfootballCO',
                'forum_id' => 156,
                'slug' => 'football',
                'title' => 'Football'
            );
            break;
        case 6:
            $related = array(
                'blog_category' => 'boys-basketball',
                'twitter' => 'prepbasketball',
                'forum_id' => 166,
                'slug' => 'basketball-boys',
                'title' => 'Boys Basketball'
            );
            break;
        case 11:
            $related = array(
                'blog_category' => 'volleyball',
                'photo_gallery' => 'volleyball',
                'twitter' => 'prepvball',
                'forum_id' => 159,
                'slug' => 'volleyball',
                'title' => 'Volleyball'
            );
            break;
        case 12:
        case 15:
            $related = array(
                'blog_category' => '',
                'twitter' => 'prepsoccer',
                'forum_id' => 158,
                'slug' => 'soccer',
                'title' => 'Soccer'
            );
        case 12:
            $related['blog_category'] = 'boys-soccer';
            $related['photo_gallery'] = $related['blog_category'];
            break;
        case 15:
            $related['blog_category'] = '';
            break;
        case 13:
        case 14:
            $related = array(
                'blog_category' => '',
                'twitter' => 'prepxcountry',
                'forum_id' => 163,
                'slug' => 'cross_country',
                'title' => 'Cross Country'
            );
        case 13:
            $related['blog_category'] = 'boys-cross-country';
            break;
        case 14:
            $related['blog_category'] = 'girls-cross-country';
            break;
        case 16:
        case 17:
            $related = array(
                'blog_category' => '',
                'twitter' => '',
                'forum_id' => 200,
                'slug' => 'swimming',
                'title' => 'Swimming'
            );
        case 16:
            $related['blog_category'] = 'boys-swimming';
            break;
        case 17:
            $related['blog_category'] = 'girls-swimming';
            break;
        case 18:
        case 19:
            $related = array(
                'blog_category' => '',
                'twitter' => 'prepgolf',
                'forum_id' => 162,
                'slug' => 'golf',
                'title' => 'Golf'
            );
        case 18:
            $related['blog_category'] = 'boys-golf';
            $related['photo_gallery'] = $related['blog_category'];
            break;
        case 19:
            $related['blog_category'] = 'girls-golf';
            break;
        case 21:
            $related = array(
                'blog_category' => 'girls-basketball',
                'twitter' => 'prepbasketball',
                'forum_id' => 166,
                'slug' => 'basketball-girls',
                'title' => 'Girls Basketball'
            );
            break;
        case 23:
            $related = array(
                'blog_category' => 'wrestling',
                'twitter' => 'prepwrestling',
                'forum_id' => 157,
                'slug' => 'wrestling',
                'title' => 'Wrestling'
            );
            break;
        case 27:
        case 31:
            $related = array(
                'blog_category' => '',
                'twitter' => 'preptennis',
                'forum_id' => 161,
                'slug' => 'tennis',
                'title' => 'Tennis'
            );
        case 27:
            $related['blog_category'] = 'boys-tennis';
            $related['photo_gallery'] = $related['blog_category'];
            break;
        case 31:
            $related['blog_category'] = 'girls-tennis';
            break;
        case 29:
            $related = array(
                'blog_category' => 'baseball',
                'twitter' => 'prepbaseballCO',
                'forum_id' => 199,
                'slug' => 'baseball',
                'title' => 'Baseball'
            );
            break;
        case 30:
            $related = array(
                'blog_category' => 'softball',
                'photo_gallery' => 'softball',
                'twitter' => 'prepsoftball',
                'forum_id' => 160,
                'slug' => 'softball',
                'title' => 'Softball'
            );
            break;
        case 32:
            $related = array(
                'blog_category' => '',
                'photo_gallery' => 'field-hockey',
                'twitter' => 'prephockey',
                'forum_id' => 164,
                'slug' => 'field_hockey',
                'title' => 'Field Hockey'
            );
            break;
        case 33:
            $related = array(
                'blog_category' => '',
                'twitter' => 'prepgymnastics',
                'forum_id' => 165,
                'slug' => 'gymnastics',
                'title' => 'Girls Gymnastics'
            );
            break;
        case 34:
            $related = array(
                'blog_category' => '',
                'twitter' => 'prephockey',
                'forum_id' => 0,
                'slug' => 'icehockey',
                'title' => 'Ice Hockey'
            );
            break;
        case 35:
        case 36:
            $related = array(
                'blog_category' => '',
                'twitter' => '',
                'forum_id' => 167,
                'slug' => 'lacrosse',
                'title' => 'Lacrosse'
            );
        case 35:
            $related['blog_category'] = 'boys-lacrosse';
            break;
        case 36:
            $related['blog_category'] = '';
            break;
        default:
            $related = array(
                'blog_category' => '',
                'twitter' => 'postpreps',
                'forum_id' => 193,
            );
            return false;
    }

    return $related;
}


function determine_cache_time()
{
    /*
        Depending on the hour and the day of the week,
        cache time for content and entire will be 1 second or 1 hour.
    */
    $hour = date('G');
    $day = date('w');
    return 1;
    switch ( $day )
    {
        // If it's Saturday we disable cache from midnight to 2 a.m. and from 2 p.m. on.
        case 6:
            if ( $hour < 3 || $hour > 13 ) return 1;
            break;
        // Otherwise we disable cache from midnight to 2 a.m. and from 7 p.m. on.
        default:
            if ( $hour < 3 || $hour > 18 ) return 1;
            break;
    }
    return 3600;
}

?>
