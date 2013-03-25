      </div><!-- close .grid_12 -->
    </div><!-- close .row -->
  </div><!-- close #mainwrapper -->

</div><!-- close #masterwrapper -->


<div id="comments_wrap">
  <div class="row">
    <div class="grid_12">
      <!-- ------------------------------------------------------------------------- -->
      <?php comments_template(); ?>
    </div>
  </div>
</div>


<footer id="mainfooter">
  <div class="row">
    <div class="grid_4">asdf
      <?php if (!dynamic_sidebar('footer1')); ?>
    </div>
    <div class="grid_4">&nbsp;
      <?php if (!dynamic_sidebar('footer2')); ?>
    </div>
    <div class="grid_2">&nbsp;
      <?php if (!dynamic_sidebar('footer3')); ?>
    </div>
    <div class="grid_2">
      &copy; 2012 Cru<br/>
      Summer Projects<br/>
      Orlando, FL 32832<br/><br/>
      
      1.800.690.0911
    </div>
  </div>
</footer>

<!-- WP FOOTER INFO -->
<?php wp_footer(); ?>
<!-- END WP FOOTER INFO -->

</body>

</html>