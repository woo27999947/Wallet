$(document).ready(function() {
  // home.php
  $("#QRCodeBtn").click(function() {
    if ($('#QR-Code').hasClass('popup')) {
      $('#QR-Code').removeClass('popup');
    } else {
      $('#QR-Code').addClass('popup');
    }
  });
});
