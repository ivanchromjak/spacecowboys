<div class="row not-found">
	<h3>
		<?php _e('Sorry, but the page you were trying to view does not exist.', 'processpress'); ?>
	</h3>
	<div class="col-lg-8 col-lg-offset-2">
              <form role="search" method="get" id="searchform" class="form-search" action="<?php echo home_url('/'); ?>">
                <div class="form-group">
                  <div class="input-group input-group-hg input-group-rounded">              
                    <input type="search" class="form-control" placeholder="<?php _e('Find help! Enter search term here.', 'processpress'); ?>" name="s" id="s">
                    <span class="input-group-btn">
                      <button type="submit" class="btn"><span class="fui-search"></span></button>
                    </span>
                  </div>
                </div>
              </form>
	</div>
</div>
