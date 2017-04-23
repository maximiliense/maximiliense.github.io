
<?php
    
    function char($text)
    {
        $text = htmlentities($text, ENT_NOQUOTES, "UTF-8");
        $text = htmlspecialchars_decode($text);
        return $text;
    }
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "1451001637-ZrtJCaBHUUsuJJpVVo1jZN19D8i9tXMYbVCASyq",
    'oauth_access_token_secret' => "76C1misw9rJOae3MFSeb7SpF7XiY9BsdFpct7xo4ZPDYF",
    'consumer_key' => "IRNMdu3EmJqQx1VPpxCaTX7tN",
    'consumer_secret' => "rSKrflFvArmOD8v0cbSYAIxWc5duemCjOHajAawlAtIzG6V21A"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/


/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=maximilienserva&count=3';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$tweets = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
    if(!empty($tweets)) {

        $decodedTweets = json_decode($tweets,true);

        foreach($decodedTweets as $tweet) {
            
            # Access as an object
            $tweetText = $tweet['text'];

            $input = preg_replace("
                                  #((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie",
                                  "'<a href=\"$1\" target=\"_blank\">$3</a>$4'",
                                  $tweetText
                                  );
            
            $input = preg_replace('/(^|\s)@([a-z0-9_]+)/i',
                                  '$1<a href="http://www.twitter.com/$2">@$2</a>',
                                  $input);
            
            echo char($input);
    }
    }