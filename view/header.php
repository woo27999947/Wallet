<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<!DOCTYPE HTML>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap include stuff -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- <link href="assets/css/wallet.css" rel="stylesheet"> -->
	  <link href="assets/css/languages.min.css" rel="stylesheet">
		<link href="assets/css/main.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.6.0/moment.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="assets/js/wallet.js"></script>
    <!-- <script src="qrcode/js/qrpopupAdd.js"></script> -->
    <!-- End Bootstrap include stuff-->
    <title><?=$fullname?> Wallet</title>
    <link rel="shortcut icon" href="favicon.ico">
  </head>


  <body>
    <nav class="navbar navbar-default" role="navigation">
	    <!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
        <img src="../assets/img/logo.png" />
				<a class="navbar-brand" href="index.php"><?=$fullname?> Wallet</a>
			</div>
			<div class="nav navbar-nav navbar-right">
				<div class="dropdown">
					<button class="lan-btn navbar-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						Language
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li>
							<a href="index.php?lang=en">
								<span class="lang-sm lang-lbl" lang="en"></span>
							</a>
						</li>
						<li>
							<a href="index.php?lang=zho">
								<span class="lang-sm lang-lbl" lang="zh"></span>
							</a>
						</li>
						<li>
							<a href="index.php?lang=jpn">
								<span class="lang-sm lang-lbl" lang="ja"></span>
							</a>
						</li>
						<li>
							<a href="index.php?lang=kor">
								<span class="lang-sm lang-lbl" lang="ko"></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
  	</nav>
