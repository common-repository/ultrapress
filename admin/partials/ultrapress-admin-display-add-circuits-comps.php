<?php

/**
 * add circuits & comps page
 *
 * @since      1.0.0
 *
 * @package    Ultrapress
 * @subpackage Ultrapress/admin/partials
 */
?>

<div class="container pt-3">
  <h4>
    <?php _e( 'add packages' ); ?>
    <button type="button" id="upload-package-button"  class="btn btn-outline-primary" data-toggle="collapse" data-target="#Upload-package-form"> 
          <?php _e( 'Upload package' ); ?>
    </button>
  </h4>
  <div class="Upload-package border p-5 collapse bg-light" id="Upload-package-form">
    <p class="d-flex justify-content-center mark"><?php _e( 'If you have a package in a .zip format, you may install it by uploading it here.' ); ?>
    </p>

    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
      </div>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="file"
          aria-describedby="inputGroupFileAddon02" accept=".zip">
        <label class="custom-file-label" for="file">Choose zip file</label>
      </div>
    </div>

    <div class="d-flex justify-content-center pt-3">
        <?php $nonce = wp_create_nonce( 'ultrapress_upload_package' ); ?>
        <button type="button" id="meed-send-package" data-nonce="<?php echo $nonce; ?>" data-user_id="<?php echo get_current_user_id(); ?>" class="btn btn-secondary m-2 px-3"> 
          <?php _e( 'install' ); ?>
        </button>
        </button>
    </div>
  </div>

  <form class="m-5 mb-2">
    <div class="input-group mb-3 input-group-sm">
       <div class="input-group-prepend">
         <span class="input-group-text"><?php _e('keywords', 'ultrapress'); ?>:</span>
      </div>
      <input type="text" v-model="keys" placeholder="<?php _e('Search circuits & components', 'ultrapress'); ?>" class="form-control" @change="load_circuits_comps_ajax($event)">
    </div>
  </form>

	<div class="d-flex justify-content-between my-5">


        <div id="primary-2" class="content-area-2">
          <main id="main-2" class="site-main">

            <div class="container bg-white pb-4">
              <div class="container-fluid">
                <div class="row" id="inject-html">
                <br>
                loading ...
                 </div>
              </div>
            </div>
          </main><!-- #main -->
        </div><!-- #primary -->
  
</div>


