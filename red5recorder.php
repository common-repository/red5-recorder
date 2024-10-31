<?php
/*
Plugin Name: Red5 Recorder Player
Plugin URI: http://red5.svnlabs.com/
Description: Red5 Recorder allows wordpress users to easily use Red5 Recorder Player on their website to record Video / Audio Streams as response and embed to website. 
Date: 2012, May, 28
Author: Sandeep Verma
Author URI: http://www.svnlabs.com/
Version: 1.10
*/

/*
Author: Sandeep Verma
Website: http://www.svnlabs.com
Copyright 2012 SVN Labs Softwares, Jaipur, India All Rights Reserved.

*/



function red5recorder_add_admin()
{
    add_options_page('Red5Recorder', 'red5recorder', 8, 'red5recorder', 'red5recorder_options');
}


$red5recorder_sizes = array(
                        1 =>array(
                            "name"    =>"Default",
                            "w"        =>"566",
                            "h"        =>"207"
                        )
                    );
                    



 
function red5recorder_content($content) {
    global $red5recorder_sizes;
     
    $size     = intval(get_option('red5recorder_size'));
    
     
	$regex = '/\[red5recorder:(.*?)]/i';
    preg_match_all( $regex, $content, $matches );
	//echo "<pre>";
	//print_r($matches);
     
	
	$replace = '<iframe src="http://red5.svnlabs.com/flex/index.php?key='.$matches[1][0].'" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" width="350" height="350"></iframe>';	
	
	
    $content = str_replace($matches[0][0], $replace, $content);
    
    
    return $content;
}




/*
 * The Options page
 */
function red5recorder_options()
{    
    global $red5recorder_sizes;
    
    $options = array("");
    
    if($_POST['action'] == 'save')
    {
        update_option('red5recorder_size', $_POST['red5recorder_size']);
         
        foreach($options as $o)
        {    
            
            $val = !empty($_POST[$o]);
            update_option($o, $val);
        }
    }
    
     
    $size     = get_option('red5recorder_size');
     
     
    
     
    
    
?>

 <div class="wrap">
     
    <h2>Red5 Redorder Player Options</h2>
    
    
    
    <table width="90%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td valign="top">
    
    
       A Red5 Recorder Player can be embedded in a post using a tag of the following form: <strong>[red5recorder:key]</strong> <br />

   <iframe src="http://red5.svnlabs.com/form/index.php?host=<?php echo $_SERVER['HTTP_HOST'];?>&key=" frameborder="0" marginheight="0" marginwidth="0" width="350" height="350"></iframe> 
    
    </td>
    <td valign="top">
    
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=181968385196620";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like-box" data-href="https://www.facebook.com/Red5streaming" data-width="292" data-show-faces="true" data-stream="true" data-header="true"></div>
    
    </td>
    <td valign="top">
    
    <div style="float: right; width: 300px; padding: 10px; text-align:center; background-color: #FFFFCC; border: 1px solid #000">
    <h3 style="text-align:center">Do you like this plugin? </h3>
    
    
 
<br />

<a href="http://red5.svnlabs.com/" target="_blank">Get fully customized Red5 Recorder for Website</a>

<p>

We do provide Paid HELP ABOUT RED5, JAVA, installation or configuration.<br />

we will be happy to develop it for you.<br />

<a href="http://www.svnlabs.com/contact/" title="Request a Quote for Red5 Recorder"><img src="http://html5.svnlabs.com/wp-content/uploads/2012/05/request-quote1.png" alt="" title="Request a Quote for Red5 Recorder" width="221" height="101" class="alignnone size-full wp-image-1087"></a><br />


</p>     


<p><strong>Email: <a href="mailto:info@svnlabs.com" rel="nofollow">info [at] svnlabs.com</a></strong><br>

<strong>Skype: <a href="skype:svnlabs?chat" rel="nofollow">svnlabs</a></strong></p>

<p>Twitter: <a href="http://twitter.com/svnlabs" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://twitter.com']);" target="_blank" rel="nofollow">http://twitter.com/svnlabs</a><br>
FaceBook: <a href="http://www.facebook.com/svnlab" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://www.facebook.com']);" target="_blank" rel="nofollow">http://www.facebook.com/svnlabs</a><br>
Linkedin: <a href="http://www.linkedin.com/in/svnlabs" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://www.linkedin.com']);" target="_blank" rel="nofollow">http://www.linkedin.com/in/svnlabs</a></p>

    
    <p><a href="http://www.svnlabs.com/concentrate" title="concentrate"><strong>Concentrate</strong></a> <strong>&gt;</strong> <a href="http://www.svnlabs.com/observe" title="observe"><strong>Observe</strong></a> <strong>&gt;</strong> <a href="http://www.svnlabs.com/imagine" title="imagine"><strong>Imagine</strong></a> <strong>&gt;</strong> <a href="http://www.svnlabs.com/launch" title="launch"><strong>Launch</strong></a></p>
    </div>
    
    </td>
  </tr>
</table>

     
   
  
   
</div>
<?php    
}

/*
 * Install options
 */
function red5recorder_install()
{ 
     
    add_option('red5recorder_size',7, "Defines video size");
    
    
     
     
}


add_filter('the_content','red5recorder_content');
//add_filter('the_excerpt','red5recorder_content');
add_action('admin_menu', 'red5recorder_add_admin');

register_activation_hook(__FILE__,"red5recorder_install");

?>