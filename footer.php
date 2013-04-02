      </div><!-- close .grid_12 -->
    </div><!-- close .row -->
  </div><!-- close #mainwrapper -->

</div><!-- close #masterwrapper -->

<?php if (is_front_page()) { ?>
<?php if(empty($_GET['thanks'])) { ?>
<div id="comments_wrap">
  <div class="row">
    <div class="grid_8">
      <?php comments_template(); ?>
    </div>
    <div class="grid_4">
      &nbsp;
    </div>
  </div>
</div>
<?php } ?>
<?php } ?>

<footer id="mainfooter">
  <div class="row">
    <div class="grid_10">
    
      <div id="footerlinks">
  	    <ul class="links">
  	      <li class="head"><a href="https://sp.campuscrusadeforchrist.com/apply">Apply</a></li>
          <li><a href="https://sp.campuscrusadeforchrist.com/apply">Log In</a></li> 
        </ul>
        <ul class="links">
          <li class="head"><a href="http://www.gosummerproject.com/what-is-a-summer-project">What is a Summer Project</a></li>
          <li><a href="http://www.gosummerproject.com/what-is-a-summer-project/us-summer-projects">US</a></li>
          <li><a href="http://www.gosummerproject.com/what-is-a-summer-project/international-summer-projects">International</a></li>
          <li><a href="http://www.gosummerproject.com/#downloads">Photos</a></li>
          <li><a href="http://www.gosummerproject.com/#stories">Student Stories</a></li>
        </ul>
        <ul class="links">
          <li class="head"><a href="http://www.gosummerproject.com/#decision">Resources</a></li>
          <li><a href="http://www.gosummerproject.com/guide">Guide</a></li>
          <li><a href="http://www.gosummerproject.com/accepted">Raising Funds</a></li>
          <li><a href="http://www.gosummerproject.com/parents">Parents</a></li>
          <li><a href="http://www.gosummerproject.com/faq">FAQ</a></li>
        </ul>
        <ul class="links">
          <li class="head"><a href="http://www.gosummerproject.com/#connect">Social Media</a></li>
          <li><a href="http://www.facebook.com/summerproject">Facebook</a></li>
          <li><a href="https://twitter.com/gosummerproject">Twitter</a></li>
          <li><a href="http://gosummerproject.tumblr.com/">Tumblr</a></li>
        </ul>
        <ul class="links">
          <li class="head"><a href="http://www.gosummerproject.com/contact">Contact</a></li>
          <li><a href="http://www.gosummerproject.com/about-cru">About Cru</a></li>
        </ul>
  	  </div>
    
    </div>
  
    <?php //if (!dynamic_sidebar('footer1')); ?>
    <?php //if (!dynamic_sidebar('footer2')); ?>
    <?php //if (!dynamic_sidebar('footer3')); ?>
  
    <div class="grid_2">
      <div class="meta">
      &copy; 2012 Cru<br/>
      Summer Projects<br/>
      Orlando, FL 32832<br/><br/>
      
      1.800.690.0911
      </div>
    </div>
  </div>
</footer>

<!-- WP FOOTER INFO -->
<?php wp_footer(); ?>
<!-- END WP FOOTER INFO -->

</body>

</html>