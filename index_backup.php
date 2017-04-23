<!DOCTYPE html>
<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" media="all and (min-device-width: 1025px)" href="./css/style.css">
    <link rel="stylesheet" media="all and (max-device-width: 1024px)" href="./css/style-iphone.css">

</head>
<body>
    <div class="top darkerbg ">
        <div class="complete-top-menu">
            <div class="menu blue hello">
                <a class="blue" href="#hello">HELLO</a>
            </div>
            <div class="menu white">
                <a class="white" href="#whatsup">WHAT'S UP?</a>
            </div>
            <div class="menu white">
                <a class="white" href="#publications">PUBLICATIONS</a>
            </div>
            <div class="menu white">
                <a class="white" href="#links">LINKS</a>
            </div>
            <div class="menu white">
                <a class="white" href="#contact">CONTACT</a>
            </div>
        </div>
    </div>

    <div class="hello-sec section">
        <div class="content">
            <h1 class="white"><a NAME ="hello">Hello,</a></h1>
            <h2 class="dark">MY NAME IS MAXIMILIEN SERVAJEAN</h2>
                <p class="dark-grey desc">I'm a Ph.d. student in computer science at LIRMM (i.e. Laboratoire d'Informatique, Robotique et Micro-electronique de Montpellier) in the Zenith Team. My advisors are Pr. Esther Pacitti and Pascal Neveu. I have started my Ph.d. in October 1st, 2011.</p>
                <p class="dark-grey desc"> I work on "decentralized and personnalised protocols for content sharing"  in collaboration with INRA (i.e. Institut Nationnal de Recherche Agranomique).</p>
                <p class="dark-grey interests">
                    My main research interests are:
                </p>
                <p class="dark-grey interests interests-list">
                    Information Retrieval <em class="white">//</em> Personalisation <em class="white">//</em> Diversification <em class="white">//</em> Recommendation <em class="white">//</em> Clouds, decentralized and multi-sites systems
                </p>
        </div>
    </div>
    <div class="whatsup-sec section">
        <div class="content">
            <h1 class="blue"><a NAME ="whatsup">What's up?</a></h1>
            <div class="willbe">
                <h3 class="dark-grey titlellbe">i'll be at</h3>
                <p class="blue wherellbe">dexa'2014</p>
                <h3 class="datemonth dark-grey">SEPTEMBER</h3>
                <p class="dateday dark-grey">1-5</p>

            </div>

            <!-- LOADING TWITTER -->

            <div class="twitter">
                <h2 class="dark-grey"><img src="./img/icon-twitter.png"></img>LATESTS TWEETS</h2>
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
    $twitter->setGetfield($getfield);
    
    $oauth = $twitter->buildOauth($url, $requestMethod);
    
    
    
    $tweets = $oauth->performRequest();

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
            ?><p class="tweet dark-grey"><em class="tweetd blue">&lsaquo;tweet&rsaquo;</em>
            <?php
            echo char($input);
                
            ?>
            <em class="tweetd blue">&lsaquo;/tweet&rsaquo;</em></p>
            <?php
        }
    }

?>
    

            </div>
        </div>
    </div>
    <div class="publications-sec bluebg section">
        <div class="content">
            <h1 class="white"><a NAME ="publications">Publications</a></h1>
            <div class="desc-publi">
			<h2 class="dark">ARTICLES IN REFEREED INTERNATIONAL CONFERENCES OR WORKSHOPS</h2>
            <p>
                M Servajean, E Pacitti, S Amer-Yahia and P Neveu.
                <b><a href="./download/Servajean-SRS2013.pdf">"Profile Diversity in Search and Recommendation"</a></b>
                    WWW Companion, in Rio de Janeiro, Brazil, 2013. <em class="white">//</em>
            </p>
            <p>
            M Servajean, E Pacitti, M Liroz-Gistau, S Amer-Yahia and A El Abbadi.
            <b><a href="./download/Servajean-GLOBE2014.pdf">"Exploiting Diversification in Gossip-Based Recommendation"</a></b>
            Globe, in M&uuml;nchen, Deutschland, 2014. <em class="white">//</em>
            </p>
                <h2 class="dark">ARTICLES IN INTERNATIONAL REFEREED JOURNAL</h2>
                <p>
                    M Servajean, R Akbarinia, E Pacitti and S Amer-Yahia.
                    <b><a href="./download/Servajean-SRS2013.pdf">"Profile Diversity for Query Processing using User Recommendations"</a></b>
                        Information Systems, Elsevier, to appear. <em class="white">//</em>
                </p>
	 	</div>
	 	<div class="desc-publi">

            <h2 class="dark">ARTICLES IN REFEREED NATIONAL CONFERENCES OR WORKSHOP</h2>
                <p>
                    M Servajean, E Pacitti, S Amer-Yahia and P Neveu.
                    <b><a href="./download/Servajean-SRS2013.pdf">"Profile Diversity for Phenotyping Data Search and Recommendation"</a></b>
                        BDA, in Nantes, France, 2013. <em class="white">//</em>
                </p>
                <p>
                    M Servajean, E Pacitti, M Liroz Gistau, S Amer-Yahia and A El Abaddi.
                    <b><a href=".">"Exploiting Diversification in Distributed Recommendation"</a></b>
                        BDA, in Grenoble, France, 2014. <em class="white">//</em>
                </p>
                <p>
                    M Servajean, E Pacitti, M Liroz-Gistau, A Joly and J Champ.
                    <b><a href=".">"PlantRT: Multi-Site Diversified Search and Recommendation for Citizen Sciences"</a></b>
                        BDA, in Grenoble, France, 2014. <em class="white">//</em>
                </p>
	 	</div>
        </div>
    </div>
    <div class="links-sec section">
        <div class="content">
            <h1 class="clear-grey"><a NAME ="links">Links</a></h1>
            <div class="desc-links">
                <h2>POSTERS</h2>
                <p class="clear-grey">
                    A Personalized and Diversified Model for Decentralized Scientific Search and Recommendation
                </p>
                <a href="www.google.com">Download here.</a>
                <p class="clear-grey">
                    A Personalized and Diversified Model for Decentralized Scientific Search and Recommendation
                </p>
                <a href="www.google.com">Download here.</a>
            </div>
            <div class="desc-links">
                <h2>PROTOTYPES</h2>
                <p class="clear-grey">
                    Document Recommendation Tool
                </p>
                <a href="www.google.com">Check here.</a>
                <p class="clear-grey">
                    Plant Recommendation Tool
                </p>
                <a href="www.google.com">Check here.</a>
            </div>
        </div>
    </div>
    <div class="contactme-sec darkbg section">
        <div class="content">
            <h1 class="white"><a NAME ="contact">Contact me</a></h1>
            <h2 class="blue sayhello">SAY HELLO!</h2>
            <div class="error-contactme">
                <div id="error-name"></div>
                <div id="error-email"></div>
                <div id="error-content"></div>
            </div>
            <div class="sent-contactme">
                <div id="sent"></div>

            </div>
            <div class="desc-contactme">
                <div class="inputname"><span>NAME</span><input id="sendername"/></div>
                <div class="inputname">E-MAIL ADDRESS<input id="sendermail" /></div>
                <div class="inputname">
                    <span>TO</span>
                    <span class="perso-email">servajean@lirmm.fr</span>
                </div>
            </div>
            <div class="desc-contactme">


                <textarea id="email" value="">YOUR COMMENT</textarea>
                <button id="send">SEND</button>
            </div>
        </div>
    </div>
    <div class="copyright-sec darkerbg dark-grey section">
        <span>&copy 2014, Maximilien Servajean</span>
    </div>
    <script src="./js/jquery-1.11.1.min.js"></script>
    <script>
      function juizScrollTo(element){			
	$(element).click(function(){
		var goscroll = false;
		var the_hash = $(this).attr("href");
		var regex = new RegExp("\#(.*)","gi");
		var the_element = '';

		if(the_hash.match("\#(.+)")) {
			the_hash = the_hash.replace(regex,"$1");

			if($("#"+the_hash).length>0) {
				the_element = "#" + the_hash;
				goscroll = true;
			}
			else if($("a[name=" + the_hash + "]").length>0) {
				the_element = "a[name=" + the_hash + "]";
				goscroll = true;
			}

			if(goscroll) {
				$('html, body').animate({
					scrollTop:$(the_element).offset().top
				}, 'slow');
				return false;
			}
		}
	});					
};
juizScrollTo('a[href^="#"]');
$("#email").focusin(function(){
                    if($(this).val()=="YOUR COMMENT"){
                        $(this).html("");
                        $(this).val("");
                    }

                   });
$("#email").focusout(function(){
                if($(this).val().match(/^\s+$/)|| $(this).val()=="")
                  $(this).val("YOUR COMMENT");

                  });

$("#send").click(function(){
                $("#sent").html("");
                 if(validateEmail()) {
                 $("#send").html("SENDING...");
                 $.ajax({
                        type: "POST",
                        url: "sendemail.php",
                        data: "name="+$("#sendername").val()+"&email="+$("#sendermail").val()+"&content="+$("#email").val(),
                        error:function(){$("#send").html("SEND");},
                        success: function(data){
                        $("#send").html("SEND");
                        if(data=="error"){
                            alert("an error happened...");
                        } else {
                        $("#sent").html("Your email has been sent!");
                        }
                        }
                        });
                 }
                 
});


function validateEmail(){
    var good = true;
    if($("#sendername").val()==""||$("#sendername").val()==undefined||$("#sendername").val().match(/^\s+$/)) {
                    $("#error-name").html("You forgot to give your name...");
        good=false;
                 } else {
                    $("#error-name").html("");
                 }
    
                 
                 
                 if($("#sendermail").val()==undefined||!$("#sendermail").val().match(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i)){
                    $("#error-email").html("You email is not valid...");
                                                                                     good=false;
                 } else {
                    $("#error-email").html("");
                 }
                                                                                     
                 if($("#email").val()==""||$("#email").val()==undefined||$("#email").val().match(/^\s+$/)||$("#email").val()=="YOUR COMMENT") {
                    $("#error-content").html("You didn't provide any content...");
                                                                                     good=false;
                 } else {
                     $("#error-content").html("");
                 }
                                                                                     return good;
}
</script>
</body>
</html>
