<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?php echo __('Bright Side of Life')?></title>
    <?php $this->Html->charset()?>
    <link rel="stylesheet" href="images/BrightSide.css" type="text/css" />
    <?php
    echo $this->Html->css('../frontend/css/BrightSide');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');

    echo $this->Html->script('global.js');
    ?>
</head>
<body>
<div id="wrap">
    <div id="header">
        <h1 id="logo">bright<span class="green">side</span>of<span class="gray">life</span></h1>
        <h2 id="slogan">Put your company slogan here...</h2>
        <form method="post" class="searchform" action="#">
            <p>
                <input type="text" name="search_query" class="textbox" />
                <input type="submit" name="search" class="button" value="Search" />
            </p>
        </form>
        <ul>
            <li id="current"><a href="#"><span>Home</span></a></li>
            <li><a href="#"><span>News</span></a></li>
            <li><a href="#"><span>Downloads</span></a></li>
            <li><a href="#"><span>Services</span></a></li>
            <li><a href="#"><span>Support</span></a></li>
            <li><a href="#"><span>About</span></a></li>
        </ul>
    </div>
    <div id="content-wrap"> <?php echo $this->Html->image('../frontend/images/headerphoto.jpg',array('class'=>'no-border', 'width' => 820, 'height' => '120'))?>
        <?php echo $this->Element('frontend/sidebar')?>
        <div id="main">
        <!--center start-->
        <?php
        echo $this->Session->flash();
        echo $this->fetch('content');
        ?>
        <!--center end-->
        </div>
        <?php echo $this->Element('frontend/rightbar')?>
    </div>
    <?php echo $this->Element('frontend/footer')?>
</div>
</body>
</html>