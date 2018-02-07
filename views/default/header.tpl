<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle;?></title>

    <!----css---->
    <link href="<?php echo $templateWebPath;?>css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo $templateWebPath;?>css/style.css" rel='stylesheet' type='text/css' />
    <!----//css---->

    <!----webfonts---->
    <link href='https://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic' rel='stylesheet' type='text/css'>
    <!----//webfonts---->

    <!----js---->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo $templateWebPath;?>js/main.js"></script>
    <!----//js---->
</head>

<body>
<!---Header---->
<div class="header">
    <div class="container">
        <div class="logo">
            <a href="?controller=index&action=index"><img src="<?php echo $templateWebPath;?>images/logo.jpg" title="" /></a>
        </div>

        <!---Top nav---->
        <div class="top-menu">
            <ul>
                <li><a href="?controller=index&action=index">ГЛАВНАЯ</a></li>
                <li><a href="?controller=post&action=add">ДОБАВИТЬ ЗАПИСЬ</a></li>
                <li><a href="?controller=info&action=about">ПРО БЛОГ</a></li>
                <div class="clearfix"> </div>
            </ul>
        </div>
        <div class="clearfix"></div>
        <script>
            $("span.menu").click(function(){
                $(".top-menu ul").slideToggle("slow" , function(){
                });
            });
        </script>
        <!---//Top nav---->

    </div>
</div>
<!--//Header---->