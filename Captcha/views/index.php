
<section class="showcase">
  <div class="container">
    <div class="pb-2 mt-4 mb-2 border-bottom">
      <h2>Build Captcha in CodeIgniter using Captcha Helper</h2>
    </div>
    
  <div class="row">       
    <div class="col-md-12 gedf-main">
      <?php if(!empty($msg)) { 
        echo $msg;
      } ?>
      <form method="post">
        <div class="row"> 
          <label class="control-label" style="padding-left: 18px;">Enter captcha code:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" name="captcha" />
          </div>
          <div class="col-sm-3 text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md" value="submit">Submit</button>
          </div>
        </div>
      </form>
      <br>
      <p id="captcha-img"><?php echo $captchaImg; ?></p>
      <p>Can't read the image? click <a href="javascript:void(0);" class="refresh-captcha">here</a> to refresh.</p>
    </div>       
  </div>
  </div>
</section>

<script>
  jQuery(document).ready(function(){
    jQuery('a.refresh-captcha').on('click', function(){
      jQuery.get('<?php print base_url().'index.php/captcha/refresh'; ?>', function(data) {
        jQuery('p#captcha-img').html(data);
    });
    });
  });
</script>