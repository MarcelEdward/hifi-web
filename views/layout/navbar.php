<?php
// little hack to check if user is logged in on the metaverse site
$logged_in = true;
if (isset($_REQUEST['logged_in'])) {
    $logged_in = $_REQUEST['logged_in'];
}

$self_uri = 'https://highfidelity.com/';
$docs_url = 'http://docs.highfidelity.com';
$download_url = 'https://highfidelity.com/download/';
$metaverse_url = 'https://metaverse.highfidelity.com/';
$forum_url = 'https://alphas.highfidelity.io';
$team_url = 'https://worklist.net/team';

// get the page to highlight the current page for selected
$page = "home";
switch ($_SERVER['HTTP_HOST']) {
    case 'docs.highfidelity.com':
        $page= 'docs';
        break;    
    case 'worklist.net':
        $page= 'worklist';
        break;    
    case 'alphas.highfidelity.io':
        $page= 'forum';
        break;    
}

$pages = array('directory', 'download', 'marketplace', 'creating', 'blog', 'jobs', 'press', 'team', 'contact', 'friends', 'domains', 'security', 'places', 'signup', 'login', 'logout');
$path = (substr($_SERVER['REQUEST_URI'],-1,1) == "/") ? substr($_SERVER['REQUEST_URI'],0,-1) : $_SERVER['REQUEST_URI'];
$pathFragments = explode('/', $path);
$end = end($pathFragments);

if (in_array($end,$pages)) {
    $page = $end;
}

if (class_exists('View')) {
    $base_path = './';
    $worklist_url = WORKLIST_URL;
} else {
    $base_path = '../';
    $worklist_url = 'https://worklist.net/';
}
?>

<header id="navbar" class="navbar navbar-static-top hifi-web-nav" id="top" role="banner">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".hifi-navbar-collapse">
                <div class="navbar-toggle-off">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
                <div class="navbar-toggle-on">
                    <i class="icon-remove"></i>
                </div>
            </button>
            <a class="logo-home <?php echo ($page == 'home' ? 'selected' : ''); ?>" href="<?php echo $base_path; ?>" title="High Fidelity">
            <div class="logo-img <?php echo ($page == 'home' ? 'selected' : ''); ?>"></div></a>
        </div>
        <nav class="navbar-collapse hifi-navbar-collapse collapse" role="navigation">
            <ul class="nav navbar-nav">
                
                <li id="logo" class="<?php echo ($page == 'home' ? 'selected' : ''); ?>">
                    <a class="logo-home <?php echo ($page == 'home' ? 'selected' : ''); ?>" href="<?php echo $base_path; ?>" title="High Fidelity">
                    <div class="logo-img <?php echo ($page == 'home' ? 'selected' : ''); ?>"></div></a>
                </li>
                <li class="spacer"></li>
                <li class="<?php echo ($page == 'directory' ? 'selected' : ''); ?>">
                    <a href="<?php echo $metaverse_url; ?>directory" title="Direcotry">DIRECTORY</a>
                </li>
                <li class="<?php echo ($page == 'download' ? 'selected' : ''); ?>">
                    <a href="<?php echo $download_url; ?>" title="Download">DOWNLOAD</a>
                </li>
                <li class="<?php echo ($page == 'marketplace' ? 'selected' : ''); ?>">
                    <a href="<?php echo $metaverse_url; ?>marketplace" title="Market">MARKET</a>
                </li>
                <li class="<?php echo ($page == 'forum' ? 'selected' : ''); ?>">
                    <a href="<?php echo $forum_url; ?>" title="Forum">FORUM</a>
                </li>  
                <li class="<?php echo ($page == 'creating' ? 'selected' : ''); ?>">
                    <a href="<?php echo $base_path; ?>creating" title="Code">CODE</a>
                </li>                
                <li class="<?php echo ($page == 'docs' ? 'selected' : ''); ?>">
                    <a href="<?php echo $docs_url; ?>" title="Docs">DOCS</a>
                </li>
                <li class="<?php echo ($page == 'worklist' ? 'selected' : ''); ?>">
                    <a href="<?php echo $worklist_url; ?>" title="Worklist">WORKLIST</a>
                </li>                
                <li class="<?php echo ($page == 'company' ? 'selected' : ''); ?>">
                    <a href="#" title="Company">COMPANY</a>
                    <ul>
                        <li class="<?php echo ($page == 'blog' ? 'selected' : ''); ?>">
                            <a href="<?php echo $base_path; ?>blog" title="Blog">Blog</a>
                        </li>
                        <li class="<?php echo ($page == 'jobs' ? 'selected' : ''); ?>">
                            <a href="<?php echo $base_path; ?>jobs" title="Jobs">Jobs</a>
                        </li>
                        <li class="<?php echo ($page == 'press' ? 'selected' : ''); ?>">
                            <a href="<?php echo $base_path; ?>press" title="Press">Press</a>
                        </li>
                        <li class="<?php echo ($page == 'team' ? 'selected' : ''); ?>">
                            <a href="<?php echo $team_url; ?>" title="Team">Team</a>
                        </li>
                        <li class="<?php echo ($page == 'contact' ? 'selected' : ''); ?>">
                            <a href="mailto:contact@highfidelity.io" title="Contact">Contact</a>
                        </li>
                    </ul>
                </li>
                <li class="spacer"></li>
                <?php if ($logged_in) { ?>
                    <li class="full-screen">  
                        <a href="#" title="Username" class="username"><div class="user_logo <?php echo ($page == 'username' ? 'selected' : ''); ?>"></div>&nbsp;&nbsp;USERNAME &#x25BE;</a>
                        <ul class="user">
                            
                            <li class="<?php echo ($page == 'profile' ? 'selected' : ''); ?>">
                                <a href="<?php echo $metaverse_url; ?>profile/" title="Profile">Edit profile</a>
                            </li>     
                            <li>
                                <hr class="hr-nav">
                            </li>   
                            <li class="<?php echo ($page == 'friends' ? 'selected' : ''); ?>">
                                <a href="<?php echo $metaverse_url; ?>user/friends/" title="Friends">Friends</a>
                            </li>  
                            <li class="<?php echo ($page == 'domains' ? 'selected' : ''); ?>">
                                <a href="<?php echo $metaverse_url; ?>user/domains/" title="Domains">Domains</a>
                            </li>    
                            <li class="<?php echo ($page == 'security' ? 'selected' : ''); ?>">
                                <a href="<?php echo $metaverse_url; ?>user/security/" title="Security">Security</a>
                            </li>   
                            <li class="<?php echo ($page == 'places' ? 'selected' : ''); ?>">
                                <a href="<?php echo $metaverse_url; ?>user/places/" title="Place names">Place names</a>
                            </li>
                            <li>
                                <hr class="hr-nav">
                            </li>
                            <li class="<?php echo ($page == 'logout' ? 'selected' : ''); ?>">
                                <a href="<?php echo $metaverse_url; ?>logout/" title="Logout">Logout</a>
                            </li>                           
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="full-screen">
                       <a class="signup <?php echo ($page == 'signup' ? 'selected' : ''); ?>href="<?php echo $metaverse_url; ?>signup/" title="Sign up">SIGN UP</a> 
                    </li>
                    <li class="<?php echo ($page == 'login' ? 'selected' : ''); ?>">
                        <a href="<?php echo $metaverse_url; ?>login/" title="Login">LOGIN</a>
                    </li>   
                <?php } ?>
            </ul>
            <div class="mobile">
                <hr class="hr-nav">
                <ul class="nav navbar-nav">
               
                    <?php if ($logged_in) { ?>
                            <li>
                                <a href="#" title="Username" class="username" nowrap><div class="user_logo <?php echo ($page == 'username' ? 'selected' : ''); ?>"></div>&nbsp;&nbsp;USERNAME &#x25BE;</a>
                                <ul class="user">
                                    <li class="<?php echo ($page == 'profile' ? 'selected' : ''); ?>">
                                        <a href="<?php echo $metaverse_url; ?>profile/" title="Profile">Edit profile</a>
                                    </li>  
                                    <li class="<?php echo ($page == 'friends' ? 'selected' : ''); ?>">
                                        <a href="<?php echo $metaverse_url; ?>user/friends/" title="Friends">Friends</a>
                                    </li>  
                                    <li class="<?php echo ($page == 'domains' ? 'selected' : ''); ?>">
                                        <a href="<?php echo $metaverse_url; ?>user/domains/" title="Domains">Domains</a>
                                    </li>    
                                    <li class="<?php echo ($page == 'security' ? 'selected' : ''); ?>">
                                        <a href="<?php echo $metaverse_url; ?>user/security/" title="Security">Security</a>
                                    </li>   
                                    <li class="<?php echo ($page == 'places' ? 'selected' : ''); ?>">
                                        <a href="<?php echo $metaverse_url; ?>user/places/" title="Place names">Place names</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo ($page == 'logout' ? 'selected' : ''); ?>">
                                <a href="<?php echo $metaverse_url; ?>logout/" title="Logout">LOGOUT</a>
                            </li>                                
                    <?php } else { ?>
                            <li class="mobile">
                                <a class="signup <?php echo ($page == 'signup' ? 'selected' : ''); ?>href="<?php echo $metaverse_url; ?>signup/" title="Sign up">SIGN UP</a> 
                            </li>
                            <li class="<?php echo ($page == 'login' ? 'selected' : ''); ?>">
                                <a href="<?php echo $metaverse_url; ?>login/" title="Login">LOGIN</a>
                            </li> 
                    <?php } ?>
                </ul>
                <br><br><br>
            </div>
        </nav>

    </div>
</header>
<?php
// Javascript to make sure the head is turned blue when hovered over the username.
// And to change the = to x on the mobile screen.
?>
<script>
    $(document).ready(function(){
        $("#navbar a.username").mouseover(function() {
            
            $("#navbar div.user_logo").css("background", "url(<?php echo $self_uri;?>img/user_logo_blue.svg)");
        });
        $("#navbar a.username").mouseout(function() {
            $("#navbar div.user_logo").css("background", "url(<?php echo $self_uri;?>img/user_logo.svg)");
        });        
        $('#navbar button.navbar-toggle').click(function() {
            $('#navbar div.navbar-toggle-off').toggle();
            $('#navbar div.navbar-toggle-on').toggle();
        });
    
    });
    $("#navbar div.container-fluid").ontouchmove = function(e) {
        e.stopPropagation();
    };
</script>
<?php if ($page != 'home' && $page != 'names') { ?>
    <div id="container">
<?php } ?>

