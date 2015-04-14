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
        <div id="sidebar" >
            <h1>Sidebar Menu</h1>
            <ul class="sidemenu">
                <li><a href="#">Home</a></li>
                <li><a href="#TemplateInfo">Template Info</a></li>
                <li><a href="#SampleTags">Sample Tags</a></li>
                <li><a href="#">More Free Templates</a></li>
                <li><a href="#">Premium Templates</a></li>
            </ul>
            <h1>Site Partners</h1>
            <ul class="sidemenu">
                <li><a href="#">Dreamhost</a></li>
                <li><a href="#">4templates</a></li>
                <li><a href="#">TemplateMonster</a></li>
                <li><a href="#">Fotolia.com</a></li>
                <li><a href="#">Text Link Ads</a></li>
            </ul>
            <h1>Wise Words</h1>
            <p>&quot;Men are disturbed, not by the things that happen, but by their opinion of the things that happen.&quot;</p>
            <p class="align-right">- Epictetus</p>
        </div>
        <div id="main"> <a name="TemplateInfo"></a>
            <h1>Template <span class="green">Info</span></h1>
            <p><strong>Bright Side of Life 1.0</strong> is a free, W3C-compliant, CSS-based website template by <strong><a href="http://www.styleshout.com/">styleshout.com</a></strong>. This work is distributed under the <a rel="license" href="http://creativecommons.org/licenses/by/2.5/"> Creative Commons Attribution 2.5 License</a>, which means that you are free to use and modify it for any purpose. All I ask is that you include a link back to <a href="http://www.styleshout.com/">my website</a> in your credits.</p>
            <p>For more free designs, you can visit <a href="http://www.styleshout.com/">my website</a> to see my other works.</p>
            <p>Good luck and I hope you find my free templates useful!</p>
            <p class="post-footer align-right"> <a href="#" class="readmore">Read more</a> <a href="#" class="comments">Comments (7)</a> <span class="date">Oct 15, 2006</span> </p>
            <a name="SampleTags"></a>
            <h1>Sample <span class="green">tags</span></h1>
            <h3>Code</h3>
            <p><code> code-sample { <br />
                    font-weight: bold;<br />
                    font-style: italic;<br />
                    } </code></p>
            <h3>Example Lists</h3>
            <ol>
                <li><span>example of ordered list</span></li>
                <li><span>uses span to color the numbers</span></li>
            </ol>
            <ul>
                <li><span>example of unordered list</span></li>
                <li><span>uses span to color the bullets</span></li>
            </ul>
            <h3>Blockquote</h3>
            <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat....</p>
            </blockquote>
            <h3>Image and text</h3>
            <p><a href="http://getfirefox.com/"><?php echo $this->Html->image('../frontend/images/firefox-gray.jpg',array('class' => 'float-left', 'width' => 100, 'height' => '120', 'alt' => 'firefox'))?></a> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. In tristique orci porttitor ipsum. Aliquam ornare diam iaculis nibh. Proin luctus, velit pulvinar ullamcorper nonummy, mauris enim eleifend urna, congue egestas elit lectus eu est. </p>
            <h3>Example Form</h3>
            <form action="#">
                <p>
                    <label>Name</label>
                    <input name="dname" value="Your Name" type="text" size="30" />
                    <label>Email</label>
                    <input name="demail" value="Your Email" type="text" size="30" />
                    <label>Your Comments</label>
                    <textarea rows="5" cols="5"></textarea>
                    <br />
                    <input class="button" type="submit" />
                </p>
            </form>
            <br />
        </div>
        <div id="rightbar">
            <h1>Support Styleshout</h1>
            <p>If you are interested in supporting my work and would like to contribute, you are welcome to make a small donation through the <a href="http://www.styleshout.com/">donate link</a> on my website - it will be a great help and will surely be appreciated.</p>
            <h1>Lorem Ipsum</h1>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam.</p>
        </div>
    </div>
    <div id="footer">
        <div class="footer-left">
            <p class="align-left"> &copy; 2006 <strong>Company Name</strong> | Design by <a href="http://www.styleshout.com/">styleshout</a> | Valid <a href="http://validator.w3.org/check/referer">XHTML</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> </p>
        </div>
        <div class="footer-right">
            <p class="align-right"> <a href="#">Home</a>&nbsp;|&nbsp; <a href="#">SiteMap</a>&nbsp;|&nbsp; <a href="#">RSS Feed</a> </p>
        </div>
    </div>
</div>
</body>
</html>