<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="/css/join.css" type="text/css" rel="stylesheet">
      <?php
      $room = $_POST['room_id'];
      $guestName=$_POST['guest_name'];
      if($room!=null && $guestName!=null){
      }else{
        header('Location: index.php');
      }
      ?>
      <title>会議室 - Stable</title>
  </head>
  <body>
    <div id="loading">
      <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1">S</div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4">T</div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6">E</div>
        <div class="sk-cube sk-cube7">A</div>
        <div class="sk-cube sk-cube8">B</div>
        <div class="sk-cube sk-cube9">L</div>
      </div>
    </div>
</div>
    </div>
    <div id="main">
        <video id="js-local-stream"></video>
        <div class="remote-streams" id="js-remote-streams"></div>

    </div>
    <div id="sub">
      <div id="chatbox">
        <h1 class="heading">
          <?php print $room;?>
        </h1>
        <p class="note">
          Change Room mode (before join in a room):
          <a href="#">mesh</a> / <a href="#sfu">sfu</a>
        </p>
        <div>
          <span id="js-room-mode"></span>:
          <?php
            print '<input type="text" placeholder="Room Name" id="js-room-id" value="'.$room.'">';
            print '<div id="js-guest-name">'.$guestName.'</div>';
          ?>
        </div>
        <pre class="messages" id="js-messages"></pre>

        </div>
        <input type="text" id="js-local-text">
        <button id="js-send-trigger">Send</button>
      </div>

      <p class="meta" id="js-meta" style="display:none;"></p>
      <div id="test"></div>
    </div>
    <script>
    window.setTimeout(async () => {
        const speech = new webkitSpeechRecognition();
        speech.lang = 'ja-JP';

          const content = document.getElementById('videoSub');

        // 音声認識をスタート
        speech.start();

        //音声自動文字起こし機能
        speech.onresult = function (e) {
            speech.stop();
            if (e.results[0].isFinal) {
                content.innerHTML = '';
                var autotext = e.results[0][0].transcript
                content.innerHTML += '<div>' + autotext + '</div>';
            }
        }

        speech.onend = () =>
        {
            speech.start()
        };
      },5000);

    </script>
    <script>
    window.setTimeout(() => {
        const loading = document.getElementById('loading');
        loading.classList.add('loaded');
      },2000);
    </script>
  </body>
  <script src="//cdn.webrtc.ecl.ntt.com/skyway-latest.js"></script>
  <script src="/js/script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </html>
