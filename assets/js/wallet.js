$(document).ready(function() {
  // home.php
  $(".swap-registerform").click(function() {
    if ($('#indexLoginFrame').hasClass('swap-regi')) {
      $('#indexLoginFrame').removeClass('swap-regi');
      $('#indexRegisterFrame').removeClass('swap-log');
    } else {
      $('#indexLoginFrame').addClass('swap-regi');
      $('#indexRegisterFrame').addClass('swap-log');
    }
  });

  $(".swap-loginform").click(function() {
    if ($('#indexRegisterFrame').hasClass('swap-log')) {
      $('#indexLoginFrame').removeClass('swap-regi');
      $('#indexRegisterFrame').removeClass('swap-log');
    }
  });

  // wallet.php

  // twofa popup
  // $(".btn-twofa-close").click(function() {
  //   $('.twofa_bar').addClass('open-twofa');
  // });

  $(".btn-profileset").click(function() {
    $('.wallet-index').addClass('open-inb');
  });

  $(".wallet-index-close").click(function() {
    $('.wallet-index').removeClass('open-inb');
  });

  // wallet.php page slice

  $("#pwdform-call").click(function() {
    $('#pwdformWrap').addClass('call-slice');
  });

  $("#withform-call").click(function() {
    $('#withdrawWrap').addClass('call-slice');
  });

  $("#newaddr-call").click(function() {
    $('#newaddressWrap').addClass('call-slice');
  });

  $("#trans-call").click(function() {
    $('#transWrap').addClass('call-slice');
  });
  // close page slice
  $(".btn-back").click(function() {
    $('#pwdformWrap').removeClass('call-slice');
    $('#withdrawWrap').removeClass('call-slice');
    $('#newaddressWrap').removeClass('call-slice');
    $('#transWrap').removeClass('call-slice');
  });


  $("#QRCodeBtn").click(function() {
    if ($('#QR-Code').hasClass('popup')) {
      $('#QR-Code').removeClass('popup');
    } else {
      $('#QR-Code').addClass('popup');
    }
  });
});
