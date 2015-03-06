<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Raison D'Être <?php echo ENVIRONMENT == "production" ? "" : ": " . ENVIRONMENT; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- icons -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url(); ?>icons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url(); ?>icons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url(); ?>icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>icons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url(); ?>icons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url(); ?>icons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url(); ?>icons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url(); ?>icons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>icons/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="<?= base_url(); ?>icons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="<?= base_url(); ?>icons/android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="<?= base_url(); ?>icons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="<?= base_url(); ?>icons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="<?= base_url(); ?>icons/manifest.json">
        <link rel="shortcut icon" href="<?= base_url(); ?>icons/favicon.ico">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= base_url(); ?>icons/mstile-144x144.png">
        <meta name="msapplication-config" content="<?= base_url(); ?>icons/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
        <!-- end icons -->

        <link rel="stylesheet" href="<?= base_url(); ?>css/main.css">

        <script src="<?= base_url(); ?>js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="<?= base_url(); ?>js/master.js"></script>
        <script type="text/javascript">
            var base_url    = "<?= base_url(); ?>";
            var root_dir    = "<?= $this->config->item('root_directory'); ?>";
            var debug       = "<?= $this->config->item('debug'); ?>";
        </script>
        <!--[if (lt IE 9)]><!--><script src="<?= base_url(); ?>js/vendor/respond.min.js"></script><!--<![endif]-->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaTC6YnzPequMZihfh2Cbdr6CjcrhvE_k"></script>
    </head>
        <!--[if IE 8 ]><body class="ie8"><![endif]-->
        <!--[if (gt IE 9)|!(IE)]><!--><body><!--<![endif]-->

        <div id="site-wrapper" class="site-wrapper">
            <div id="header-container">
                <div class="header-inner">
                    <div id="logo" class="logo"><a href="<?= base_url(); ?>"></a></div>
                    <div id="hamburger" class="hamburger">
                        <div class="hamburger-inner">
                            <a>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                    <div id="page-labels"><ul><li data-page-id="casestudies">CASE STUDIES</li><li data-page-id="casestudy">CASE STUDY</li><li data-page-id="projects">PROJECTS</li><li data-page-id="project">PROJECT</li><li data-page-id="about">ABOUT</li><li data-page-id="clients">CLIENTS</li><li data-page-id="contact">CONTACT</li></ul></div>
                </div>
            </div>

            <div id="page-container">
                <div id="page-content">
                    <?php $this->load->view( "pages/".$page_id."_view" ); ?>
                </div>
            </div>

            <div id="footer-container">
                <div class="cfm-project-gallery social-navigation">
                    <ul>
                        <li id="p1" class="facebook-btn">
                            <div class="project-inner">
                                <a href="#">
                                    <div class="project-label"><div class="project-label-inner"></div></div>
                                </a>
                            </div>
                        </li>
                        <li id="p2" class="twitter-btn">
                            <div class="project-inner">
                                <a href="#">
                                    <div class="project-label"><div class="project-label-inner"></div></div>
                                </a>
                            </div>
                        </li>
                        <li id="p3" class="instagram-btn">
                            <div class="project-inner">
                                <a href="#">
                                    <div class="project-label"><div class="project-label-inner"></div></div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <p>16 W 22nd Street, New York, NY 07302<br /><a href="mailto:info@reason2be.com">info@reason2be.com</a></p>
                <div id="mobile-menu" class="cfm-navigation mobile-menu">
                    <div class="mobile-menu-inner">
                        <ul>
                            <li><a data-navigate-to="home" href="<?= base_url(); ?>home"><h1>HOME</h1></a></li>
                            <li><a data-navigate-to="casestudies" href="<?= base_url(); ?>casestudies"><h1>CASE STUDIES</h1></a></li>
                            <li><a data-navigate-to="projects" href="<?= base_url(); ?>projects"><h1>PROJECTS</h1></a></li>
                            <li><a data-navigate-to="about" href="<?= base_url(); ?>home"><h1>ABOUT</h1></a></li>
                            <li><a data-navigate-to="clients" href="<?= base_url(); ?>clients"><h1>CLIENTS</h1></a></li>
                            <li><a data-navigate-to="contact" href="<?= base_url(); ?>contact"><h1>CONTACT</h1></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script data-main="<?= base_url();?>js/main" src="<?= base_url();?>js/vendor/require.min.js"></script>
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create',"<?= $this->config->item('ga_account');?>");ga('send','pageview');
        </script>
    </body>
</html>
