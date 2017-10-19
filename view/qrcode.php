
  <!-- <link href="view/qrcode/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <link href="view/qrcode/css/style.css" rel="stylesheet"> -->
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  <style>
    .panel-info>.panel-heading {
      background-color: rgba(0,0,0,0);
      border:none;
    }
    .panel {
      background-color: rgba(0,0,0,0);
    }
    .panel-info {
      background-color: rgba(0,0,0,0);
      border:none;
    }
    .navbar-form {
      border:none;
    }
    .well {
      background-color: rgba(25, 118, 210, 0.54);
      border: none;
    }
  </style>
  <div class="container hidden-lg hidden-md hidden-sm" id="QR-Code">
    <div id="QRCodeBtn">
      <img src="../assets/img/btn-qr.svg" />
      <!-- <span>QR Code<br />Scan</span> -->
    </div>
    <div class="panel panel-info">

      <!-- 재생 / 정지 버튼 (기능 가능하면 QRCodeBtn으로) -->
      <!-- <div class="panel-heading pl-pr-none">
        <div class="navbar-form navbar-right">
          <select class="form-control hide" id="camera-select"></select>
          <div class="form-group">
            <input id="image-url" type="text" class="form-control hide" placeholder="Image url">
            <button title="Decode Image" class="btn btn-default btn-sm hide" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
            <button title="Image shoot" class="btn btn-info btn-sm disabled hide" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
            <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
            <button title="Pause" class="btn btn-warning btn-sm hide" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
            <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
          </div>
        </div>
      </div> -->
      <div class="panel-body text-center" style="padding:0;">
        <div class="col-md-6 pl-pr-none">
          <div class="well" style="position: relative; overflow:hidden; padding:0; margin-bottom:0;">
            <canvas width="288" height="288" id="webcodecam-canvas"></canvas>
            <div class="scanner-laser laser-rightBottom" style="opacity: 0.5; overflow:hidden;"></div>
            <div class="scanner-laser laser-rightTop" style="opacity: 0.5; overflow:hidden;"></div>
            <div class="scanner-laser laser-leftBottom" style="opacity: 0.5; overflow:hidden;"></div>
            <div class="scanner-laser laser-leftTop" style="opacity: 0.5; overflow:hidden;"></div>
          </div>
          <div class="well hide" style="width: 100%;">
            <label id="zoom-value" width="100">Zoom: 2</label>
            <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
            <label id="brightness-value" width="100">Brightness: 0</label>
            <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
            <label id="contrast-value" width="100">Contrast: 0</label>
            <input id="contrast" onchange="Page.changeContrast();" type="range" min="-128" max="128" value="0">
            <label id="threshold-value" width="100">Threshold: 0</label>
            <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
            <label id="sharpness-value" width="100">Sharpness: off</label>
            <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
            <label id="grayscale-value" width="100">grayscale: off</label>
            <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
            <br>
            <label id="flipVertical-value" width="100">Flip Vertical: off</label>
            <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
            <label id="flipHorizontal-value" width="100">Flip Horizontal: off</label>
            <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
          </div>
        </div>
        <!-- <div class="col-md-6">
          <div class="thumbnail" id="result">
            <div class="well">
              <img width="320" height="240" id="scanned-img" src="">
            </div>
            <div class="caption">
              <h3>Scanned result</h3>
              <p id="scanned-QR"></p>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
