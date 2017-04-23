<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
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
    $twitter->setGetfield($getfield);
    
    $oauth = $twitter->buildOauth($url, $requestMethod);
    
    
    
    $tweets = $oauth->performRequest();
    
    if(!empty($tweets)) {
        
        $decodedTweets = json_decode($tweets,true);
        
        foreach($decodedTweets as $tweet) {
            
            # Access as an object
            $tweetText = $tweet['text'];

            $input = preg_replace_callback("
                                           #((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#i",
                                           create_function ('$matches','return "<a href=\"$matches[1]\" target=\"_blank\">$matches[3]</a>$matches[4]";'),  $tweetText);

   
            
            $input = preg_replace('/(^|\s)@([a-z0-9_]+)/i',
                                  '$1<a href="http://www.twitter.com/$2">@$2</a>',
                                  $input);
            ?><p class="tweet dark-grey"><em class="tweetd blue">&lsaquo;tweet&rsaquo;</em>
<?php
    echo char($input);
    
    ?>
<em class="tweetd blue">&lsaquo;/tweet&rsaquo;</em></p>
<?php
    }
    }
    
    ?>