<div class="jumbotron" style="height:auto;">
  <div class="container" style="color:#fff;">
    <?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
    <div class="row">
      <a class="wallet-link col-xs-12" href="?a=home">
        <img src="../assets/img/btn-back.svg" />
        <span>Go back to wallet</span>
      </a>
    </div>

    <?php
    if (!empty($info) && is_array($info))
    {
    ?>
    <div class="row">
      <div class="col-xs-12">
        <p>User <strong><?php echo $info['username']; ?></strong>:</p>
        <table id="userInfoTable" class="table table-bordered table-striped">
          <thead>
             <tr>
                <td nowrap>Key</td>
                <td nowrap>Value</td>
             </tr>
          </thead>
          <tbody>
          <?php
          foreach($info as $key => $value) {
            echo '<tr>
                     <td>' . $key . '</td>
                     <td>' . $value . '</td>
                  </tr>';
          }
          ?>
        </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="userinfo-wrap col-md-5 col-sm-6 col-xs-12">
        <p>Set new password:</p>
        <form action="<?php echo '?a=info&i=' . $info['id']; ?>" method="POST" class="clearfix" id="pwdform">
          <input type="hidden" name="action" value="password" />
          <div class="col-xs-12 pl-pr-none">
            <input type="password" class="form-control" name="password" placeholder="New password">
          </div>
          <div class="col-xs-12 pl-pr-none">
            <button type="submit" class="active-button btn_cyan">Change password</button>
          </div>
        </form>
        <p id="pwdmsg"></p>
      </div>

      <div class="userinfo-wrap col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
        <p>Withdraw funds:</p>
        <form action="<?php echo '?a=info&i=' . $info['id']; ?>" method="POST" class="clearfix" id="withdrawform">
          <input type="hidden" name="action" value="withdraw" />
          <div class="col-xs-12 pl-pr-none">
            <input type="text" class="form-control" name="address" placeholder="Address">
          </div>
          <div class="col-xs-12 pl-pr-none">
            <input type="text" class="form-control" name="amount" placeholder="Amount">
          </div>
          <div class="col-xs-12 pl-pr-none">
            <button type="submit" class="active-button btn_orange">Withdraw</button>
          </div>
        </form>
        <p id="withdrawmsg"></p>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 pl-pr-none">
        <div class="userinfo-wrap col-md-5 col-sm-6 col-xs-12">
          <p>Addresses:</p>
          <form action="<?php echo '?a=info&i=' . $info['id']; ?>" method="POST" id="newaddressform">
            <input type="hidden" name="action" value="new_address" />
            <button type="submit" class="active-button btn_cyan" style="margin-top: 0;">Get a new address</button>
          </form>
          <p id="newaddressmsg"></p>
        </div>

        <div class="col-xs-12">
          <table class="table table-bordered table-striped" id="alist">
            <thead>
              <tr>
              <td>Address:</td>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($addressList as $address)
              {
              echo "<tr><td>".$address."</td></tr>\n";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="userinfo-wrap col-xs-12" style="margin-bottom: 64px;">
        <p>Last 10 transactions:</p>
        <table class="table table-bordered table-striped" id="txlist">
          <thead>
            <tr>
              <td nowrap>Date</td>
              <td nowrap>Address</td>
              <td nowrap>Type</td>
              <td nowrap>Amount</td>
              <td nowrap>Fee</td>
              <td nowrap>Confs</td>
              <td nowrap>Info</td>
             </tr>
          </thead>
          <tbody>
            <?php
            $bold_txxs = "";
            foreach($transactionList as $transaction) {
              if($transaction['category']=="send") { $tx_type = '<strong style="color: rgba(255, 131, 0, 1);">Sent</strong>'; } else { $tx_type = '<strong style="color: rgba(77, 208, 225, 1);">Received</strong>'; }
              echo '<tr>
                       <td>'.date('n/j/Y h:i a',$transaction['time']).'</td>
                       <td>'.$transaction['address'].'</td>
                       <td>'.$tx_type.'</td>
                       <td>'.abs($transaction['amount']).'</td>
                       <td>'.$transaction['fee'].'</td>
                       <td>'.$transaction['confirmations'].'</td>
                       <td><a href="' . $blockchain_url, $transaction['txid'] . '" target="_blank">Info</a></td>
                    </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>


  </div>
</div>
</div>
<?php
} else {
   ?>
   <p style='font-weight: bold; color: rgba(255, 131, 0, 1);'>User not found</p>
   <?php
}
?>
<script type="text/javascript">
var blockchain_url = "<?=$blockchain_url?>";
$("#withdrawform input[name='action']").first().attr("name", "jsaction");
$("#newaddressform input[name='action']").first().attr("name", "jsaction");
$("#pwdform input[name='action']").first().attr("name", "jsaction");
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
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //ugh, gtfo
        }
    });
    e.preventDefault();
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
