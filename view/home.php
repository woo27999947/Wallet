<div class="jumbotron jumbotron-bg">
  <div class="container container-middle">
    <?php if (!defined("IN_WALLET")) { die("Auth Error"); } ?>
      <?php
      if (!empty($error))
      {
      echo "<p class='col-md-offset-1 col-md-10 col-xs-12 pl-pr-none alert-txt'>" . $error['message']; "</p>";
      }
      ?>

      <div class="row">
        <div id="indexLoginFrame" class="col-md-4 col-md-offset-1 col-sm-6 col-xs-offset-0 col-xs-12 ">
          <p class="col-xs-12 form-index pl-pr-none"><?php echo $lang['FORM_LOGIN']; ?></p>
          <form action="index.php" method="POST" class="clearfix">
            <input type="hidden" name="action" value="login" />
            <div class="login-border">
              <div class="col-md-12">
                <input type="text" class="form-control" name="username" placeholder="<?php echo $lang['FORM_USER']; ?>">
              </div>
              <div class="col-md-12">
                <input type="password" class="form-control" name="password" placeholder="<?php echo $lang['FORM_PASS']; ?>">
              </div>
              <div class="col-md-12">
                <input type "text" class="form-control" name="auth" placeholder="<?php echo $lang['FORM_2FA']; ?>">
              </div>
            </div>
            <div class="swap-registerform col-xs-12 pl-pr-none">
              <p>
                <span>
                  <?php echo $lang['REGISTER_TO'];?>
                </span>
                </p>
            </div>
            <div class="col-md-12 pl-pr-none">
              <button type="submit" class="active-button btn_orange">
                <?php echo $lang['FORM_LOGIN']; ?>
              </button>
            </div>
          </form>
        </div>

        <div id="indexRegisterFrame" class="col-md-4 col-md-offset-2 col-sm-6 col-xs-12 ">
          <p class="col-xs-12 form-index"><?php echo $lang['FORM_CREATE']; ?></p>
          <form action="index.php" method="POST" class="clearfix">
            <input type="hidden" name="action" value="register" />
            <div class="login-border">
            <div class="col-md-12">
              <input type="text" class="form-control" name="username" placeholder="<?php echo $lang['FORM_USER']; ?>">
            </div>
            <div class="col-md-12">
              <input type="password" class="form-control" name="password" placeholder="<?php echo $lang['FORM_PASS']; ?>">
            </div>
            <div class="col-md-12">
              <input type="password" class="form-control" name="confirmPassword" placeholder="<?php echo $lang['FORM_PASSCONF']; ?>">
            </div>
                        </div>
            <div class="swap-loginform col-xs-12 pl-pr-none">
              <p>
                <span>
                  <?php echo $lang['LOGIN_TO'];?>
                </span>
              </p>
            </div>
            <div class="col-md-12 pl-pr-none">
              <button type="submit" class="active-button btn_cyan">
                <?php echo $lang['FORM_SIGNUP']; ?>
              </button>
            </div>
          </form>


        </div>
      </div>
    </div>
