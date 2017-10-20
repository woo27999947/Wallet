

<div class="jumbotron">
  <div class="container container-padding">
    <style>
    @media screen and (max-width:400px) {
      .table.table-bordered.table-striped.table-margin {
        margin-left: -16px;
        margin-right: -16px;
      }
    }
    #alist tr {
      display: none;
    }
    #alist tr:nth-last-child(1), #alist tr:nth-last-child(2) {
      display: table-row;
    }
    </style>
    <?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
    <?php
    if (!empty($error))
    {
      echo "<p class='alert-txt'>" . $error['message']; "</p>";
    }
    ?>
    <div class="row onlymobile-profile">
      <div class="col-md-12">
        <div class="profile-border">
          <div class="col-md-5 col-sm-12 col-xs-10">
          <p class="profile">
            <img src="../assets/img/ico-profile.svg">
            <?php echo $lang['WALLET_HELLO']; ?>, <strong><?php echo $user_session; ?></strong>.  <?php if ($admin) {?><strong><font color="#18FFFF">[Admin]</font><?php }?></strong>
          </p>
        </div>

        <div class="col-md-7 col-sm-12 col-xs-2 wallet-index-wrap">
          <div class="btn-profileset">
            <img src="../assets/img/btn-setting.svg" />
          </div>
          <div class="wallet-index">
            <div class="wallet-index-close">
              <img src="../assets/img/btn-close.svg">
            </div>
            <form action="index.php" method="POST">
            <?php
            if ($admin)
            {
              ?>
      <!--      <p><strong class="wallet-category-index">Admin Links:</strong></p> -->
              <a href="?a=home" class="btn btn-default admin-wallet-btn">Admin Dashboard</a>
      <!--      <p><strong class="wallet-category-index"><?php echo $lang['WALLET_USERLINKS']; ?></strong></p> -->
              <?php
            }
            ?>
            <form>
              <input type="hidden" name="action" value="logout" />
              <button type="submit" class="btn btn-default wallet-btn"><?php echo $lang['WALLET_LOGOUT']; ?></button>
            </form>
      <!--  <form action="index.php" method="POST">
              <input type="hidden" name="action" value="support" action="index.php"/>
              <button type="submit" class="btn btn-default wallet-btn"><?php echo $lang['WALLET_SUPPORT']; ?></button>
            </form> -->
            <form>
              <input type="hidden" name="action" value="disauth" />
              <button type="submit" class="btn btn-default wallet-btn"><?php echo $lang['WALLET_2FAOFF']; ?></button>
            </form>
            <form action="index.php" method="POST">
            <form>
              <input type="hidden" name="action" value="authgen" />
              <button type="submit" class="btn btn-default wallet-btn"><?php echo $lang['WALLET_2FAON']; ?></button>
            </form>
      <!--        <p>
            <form action="index.php" method="post"> -->
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="row onlymobile-balance">
      <div class="col-md-12">
        <div class="balance-section">
          <p style="font-size:15px;"><?php echo $lang['WALLET_BALANCE']; ?><br>
            <div class="balance-section-line"></div>
            <strong id="balance" style="font-size:24px;"><?php echo satoshitize($balance);?></strong> <?=$short?>
          </p>
        </div>
      </div>
    </div>

    <div class="row onlymobile-walletindex ">
      <div class="col-xs-6 gutter-r">
        <div id="pwdform-call">
          <section>
            <img src="../assets/img/ico-uppw.svg" />
            <span>Update Your Password</span>
          </section>
        </div>
      </div>
      <div class="col-xs-6 gutter-l">
        <div id="withform-call">
          <section>
            <img src="../assets/img/ico-send.svg" />
            <span>Send Funds</span>
          </section>
        </div>
      </div>
      <div class="col-xs-6 gutter-r">
        <div id="newaddr-call">
          <section>
            <img src="../assets/img/ico-withd.svg" />
            <span>New Address</span>
          </section>
        </div>
      </div>
      <div class="col-xs-6 gutter-l">
        <div id="trans-call">
          <section>
            <img src="../assets/img/ico-trans.svg" />
            <span>Last 10 Transaction</span>
          </section>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 pl-pr-none">
        <div id="pwdformWrap" class="col-md-5 col-sm-6 col-xs-12">
          <section>
            <p>
              <strong style="font-size:18px;"><?php echo $lang['WALLET_PASSUPDATE']; ?></strong>
              <img class="btn-back" src="../assets/img/btn-back.svg" />
            </p>
            <form action="index.php" method="POST" class="clearfix" id="pwdform">
              <input type="hidden" name="action" value="password" />
              <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
              <div class="col-md-12" style="padding:0;">
                <input type="password" class="form-control" name="oldpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATEOLD']; ?>">
              </div>
              <div class="col-md-12" style="padding:0;">
                <input type="password" class="form-control" name="newpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATENEW']; ?>">
              </div>
              <div class="col-md-12" style="padding:0;">
                <input type="password" class="form-control" name="confirmpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATENEWCONF']; ?>">
              </div>
              <p id="pwdmsg"></p>
              <p style="font-size:1em;"><?php echo $lang['WALLET_SUPPORTNOTE']; ?></p>
              <div class="col-md-12" style="padding:0;">
                <button type="submit" class="active-button btn_cyan" style="margin-top:16px;"><?php echo $lang['WALLET_PASSUPDATECONF']; ?></button>
              </div>
            </form>
          </section>
        </div>

        <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12 fund-margin">
          <div id="withdrawWrap">
            <?php include 'qrcode.php';?>
            <section>
              <p>
                <strong style="font-size:18px;"><?php echo $lang['WALLET_SEND']; ?></strong>
                <img class="btn-back" src="../assets/img/btn-back.svg" />
              </p>
              <!-- <button type="button" class="active-button btn_orange" id="donate">Donate to <?=$fullname?> wallet's owner!</button>
              <p id="donateinfo" style="display: none;">Type the amount you want to donate and click <strong>Withdraw</strong></p> -->
              <form action="index.php" method="POST" class="clearfix" id="withdrawform">
                <input type="hidden" name="action" value="withdraw" />
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                <div class="col-md-12" style="padding:0;" >
                  <img width="100%" height="240" class="hide" id="scanned-img" src="">
                  <!-- <span id="scanned-QR"></span> -->
                  <input type="text" class="form-control" id="scanned-QR" name="address" placeholder="<?php echo $lang['WALLET_ADDRESS']; ?>">
                </div>
                <div class="col-md-12" style="padding:0;">
                  <input type="text" class="form-control" name="amount" placeholder="<?php echo $lang['WALLET_AMOUNT']; ?>">
                </div>
                <div class="col-md-12" style="padding:0;">
                  <button type="submit" class="active-button btn_orange" style="margin-top:32px;"><?php echo $lang['WALLET_SENDCONF']; ?></button>
                </div>
              </form>
              <p id="withdrawmsg"></p>
            </section>
          </div>

          <div id="newaddressWrap">
            <section>
              <p class="address-margin">
                <strong style="font-size:18px;"><?php echo $lang['WALLET_USERADDRESSES']; ?></strong>
                <img class="btn-back" src="../assets/img/btn-back.svg" />
              </p>
              <form action="index.php" method="POST" id="newaddressform">
              	<input type="hidden" name="action" value="new_address" />
              	<button type="submit" id="newaddress" class="active-button btn_orange" style="margin-top:1px;"><?php echo $lang['WALLET_NEWADDRESS']; ?></button>
              </form>
            </section>

            <section>
              <p>
                <img class="btn-back btn-back-qr hide" src="../assets/img/btn-back.svg" />
              </p>
              <p id="newaddressmsg"></p>
              <table class="table table-bordered table-striped table-margin" id="alist" style="margin-left:0; margin-right:0;">
                <thead>
                <!-- <tr>
                <td><?php //echo $lang['WALLET_ADDRESS']; ?>:</td>
                <td><?php //echo $lang['WALLET_QRCODE']; ?>:</td>
                </tr> -->
                </thead>
                <tbody>
                <?php
                foreach ($addressList as $address)
                {
                echo "<tr><td>".$address."</td></tr>";?>

                <tr>
                  <td>
                    <a href="<?php echo $server_url;?>qrgen/?address=<?php echo $address;?>">
                    <img src="<?php echo $server_url;?>qrgen/?address=<?php echo $address;?>" alt="QR Code" style="width:200px;height:200px;border:0;">
                  </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div id="transWrap" class="col-xs-12">
        <p style="font-size: 18px; font-weight:800;"><?php echo $lang['WALLET_LAST10']; ?>
          <img class="btn-back" src="../assets/img/btn-back.svg" />
        </p>
        <table class="table table-bordered table-striped" id="txlist">
          <thead>
            <tr>
              <td nowrap><?php echo $lang['WALLET_DATE']; ?></td>
              <td nowrap><?php echo $lang['WALLET_ADDRESS']; ?></td>
              <td nowrap><?php echo $lang['WALLET_TYPE']; ?></td>
              <td nowrap><?php echo $lang['WALLET_AMOUNT']; ?></td>
              <td nowrap><?php echo $lang['WALLET_FEE']; ?></td>
              <td nowrap><?php echo $lang['WALLET_CONFS']; ?></td>
              <td nowrap><?php echo $lang['WALLET_INFO']; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php
            $bold_txxs = "";
            foreach($transactionList as $transaction) {
              if($transaction['category']=="send") { $tx_type = '<b style="color: rgba(255, 131, 0, 1);">Sent</b>'; } else { $tx_type = '<b style="color: rgba(77, 208, 225, 1);">Received</b>'; }
              echo '<tr>
                      <td>'.date('n/j/Y h:i a',$transaction['time']).'</td>
                      <td>'.$transaction['address'].'</td>
                      <td>'.$tx_type.'</td>
                      <td>'.abs($transaction['amount']).'</td>
                      <td>'.$transaction['fee'].'</td>
                      <td>'.$transaction['confirmations'].'</td>
                      <td><a href="' . $blockchain_url,  $transaction['txid'] . '" target="_blank">Info</a></td>
                    </tr>';
             }
             ?>
          </tbody>
        </table>
      </div>
    </div>

<script type="text/javascript" src="view/qrcode/js/filereader.js"></script>
<script type="text/javascript" src="view/qrcode/js/qrcodelib.js"></script>
<script type="text/javascript" src="view/qrcode/js/webcodecamjs.js"></script>
<script type="text/javascript" src="view/qrcode/js/main.js"></script>
<script type="text/javascript">

$("#newaddress").click( function (){
  setTimeout(function() {
        window.location.reload();
    }, 300);
});

var tt = $("#alist tr:nth-last-child(2) td").html();
if (($.trim(tt)) != "") {
  $("#newaddress").addClass("hide")
  $(".address-margin").addClass("hide")
  $(".btn-back-qr").removeClass("hide")
};


var blockchain_url = "<?=$blockchain_url?>";
$("#withdrawform input[name='action']").first().attr("name", "jsaction");
$("#newaddressform input[name='action']").first().attr("name", "jsaction");
$("#pwdform input[name='action']").first().attr("name", "jsaction");
$("#donate").click(function (e){
  $("#donateinfo").show();
  $("#withdrawform input[name='address']").val("<?=$donation_address?>");
  $("#withdrawform input[name='amount']").val("0.01");
});
$("#withdrawform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR)
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
              $("#withdrawform input.form-control").val("");
            	$("#withdrawmsg").text(json.message);
            	$("#withdrawmsg").css("color", "green");
            	$("#withdrawmsg").show();
            	updateTables(json);
            } else {
            	$("#withdrawmsg").text(json.message);
            	$("#withdrawmsg").css("color", "red");
            	$("#withdrawmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //ugh, gtfo
        }
    });
    e.preventDefault();
});
$("#newaddressform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR)
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
            	$("#newaddressmsg").text(json.message);
            	$("#newaddressmsg").css("color", "green");
            	$("#newaddressmsg").show();
            	updateTables(json);
            } else {
            	$("#newaddressmsg").text(json.message);
            	$("#newaddressmsg").css("color", "red");
            	$("#newaddressmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //ugh, gtfo
        }
    });
    e.preventDefault();
});
$("#pwdform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR)
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
               $("#pwdform input.form-control").val("");
               $("#pwdmsg").text(json.message);
               $("#pwdmsg").css("color", "green");
               $("#pwdmsg").show();
            } else {
               $("#pwdmsg").text(json.message);
               $("#pwdmsg").css("color", "red");
               $("#pwdmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //ugh, gtfo
        }
    });
    e.preventDefault();
});

function updateTables(json)
{
	$("#balance").text(json.balance.toFixed(8));
	$("#alist tbody tr").remove();
	for (var i = json.addressList.length - 1; i >= 0; i--) {
		$("#alist tbody").prepend("<tr><td>" + json.addressList[i] + "</td></tr>");
	}
	$("#txlist tbody tr").remove();
	for (var i = json.transactionList.length - 1; i >= 0; i--) {
		var tx_type = '<b style="color: rgba(77, 208, 225, 1);">Received</b>';
		if(json.transactionList[i]['category']=="send")
		{
			tx_type = '<b style="color: rgba(255, 131, 0, 1);">Sent</b>';

		}
		$("#txlist tbody").prepend('<tr> \
               <td>' + moment(json.transactionList[i]['time'], "X").format('l hh:mm a') + '</td> \
               <td>' + json.transactionList[i]['address'] + '</td> \
               <td>' + tx_type + '</td> \
               <td>' + Math.abs(json.transactionList[i]['amount']) + '</td> \
               <td>' + json.transactionList[i]['fee'] + '</td> \
               <td>' + json.transactionList[i]['confirmations'] + '</td> \
               <td><a href="' + blockchain_url.replace("%s", json.transactionList[i]['txid']) + '" target="_blank">Info</a></td> \
            </tr>');
	}
}
</script>
