<style type="text/css">
                .message{position: fixed; top: 100px; right:10px; float: right; z-index: 1000; opacity: 0.8;}
              </style>
<?php
if(isset($msg)){
              ?>
              
              <div class="alert alert-success alert-dismissible fade show message" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-inner--text"><strong>Success!</strong> <?php echo $msg; ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php
                }elseif(isset($error)){
              ?>

              <div class="alert alert-warning alert-dismissible fade show message" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-notification-70"></i></span>
                <span class="alert-inner--text"><strong>Warning!</strong> <?php echo $error; ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <?php
                }
                ?>