<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>報名系統 - 開源！資訊萌芽營！ - SOSCET</title>
    <base href="<?php echo base_url(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-param" content="<?php echo $this->security->get_csrf_token_name(); ?>">
    <meta name="csrf-token" content="<?php echo $this->security->get_csrf_hash(); ?>">

    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapse-1" data-target="#menu" aria-expanded="false" aria-controls="menus" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">開源！資訊萌芽營 報名系統</a>
            </div>
            <div id="menu" class="navbar-collapse collapse" aria-expanded="false">
                <ul class="nav navbar-nav navbar-right ">
                    <li><a class="nav-item" href="//soscet.org/wintercamp">活動首頁</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="wrapper" class="container">
        <?php echo $content; ?>
    </div>
    <footer>
        <h5>Students' Open Source Community of Eastern Taiwan</h5>
        <div class="md-col-12">
            <a title="SOSCET Facebook" href="https://facebook.com/soscet"><i class="fa fa-2x fa-facebook"></i></a>
            <a title="SOSCET Slack" href="http://invite.soscet.org"><i class="fa fa-2x fa-slack"></i></a>
            <a title="SOSCET Homepage" href="http://soscet.org"><i class="fa fa-2x fa-home"></i></a>
            <a title="contact At soscet.org" href="mailto:contact@soscet.org"><i class="fa fa-2x fa-envelope"></i></a>
        </div>
    </footer>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-58966007-3', 'auto');
      ga('send', 'pageview');

    </script>
</body>
</html>

