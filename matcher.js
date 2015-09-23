// Look up proper nouns in an article against a lookup table of proper nouns to URLs.
// If there's a match, link the proper noun to the URL.
// Uses jQuery.

var lookup = {
  'Kanye West': 'http://kanyewest.com/',
  'Cherry Creek': 'http://preps.denverpost.com/schools/cherry-creek/10/',
  'The Denver Post': 'http://www.denverpost.com/'
}

var matcher = {
    'regex': new RegExp(/\b([A-Z][a-z]+)\s(([A-Z][a-z]+)\s?)+\b/gm),
    'init': function () {
        $.getScript("http://extras.denverpost.com/app/preps/prep_lookup.js", function()
        {
            $('#articleBody p').each( function() { 
              var results = $(this).text().match(this.regex);

              if ( results !== null )
              {
                
                var count = results.length;
                for ( var i = 0; i < count; i++ )
                {
                  if ( lookup.hasOwnProperty(results[i]) )
                  {
                    // Replace the first instance of the text with the linked text,
                    // then remove the lookup from the object so we don't link it again.
                    $(this).html($(this).html().replace(results[i], '<a href="' + lookup[results[i]] + '">' + results[i] + '</a>'));
                    delete(lookup[results[i]]);
                  }
                }
              }

            });
        });
    }
}
