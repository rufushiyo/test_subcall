<!DOCTYPE html>

<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/js/jquery.validate.js"></script>
  <script src="/js/jquery.validate.min.js"></script>
  <script src="/js/register.js"></script>

  <title>会員登録 - Stable </title>
  <?php include '../header.php'; ?>
  </head>
  <body>
    <?php include '../nav.php'; ?>

    <div id="index-banner" class="parallax-container">
      <div class="container">
        <div class="section no-pad-bot">
          <br><br>
          <div class="row">
            <div class="col col s10 offset-m1 m8 offset-m2 center">
              <form method="post" name="regiser_form" action="register_check.php" id="check" class="pw-form-container">
                <div id="empty_error" class="alert error" style="display:none;">必要な情報が入力されていません。</div>
                <div id="missmatch_error" class="alert error" style="display:none;">パスワードが一致していないか、条件を満たしていません。</div>
                <div id="mailaddress_error" class="alert error" style="display:none;">メールアドレスが正しくありません。</div>
                  <h2 style="color:black !important;">会員登録</h2><br/>
                  <div class="form_title">
                    <label for="name" class="form_name">ユーザ名</label>
                    <a class="form_required_mark">必須</a>
                  <input type="text" name="name" id="name" data-length="20" placeholder="例:たろう" autocomplete="off">
                  </div>
                  <br/>
                  <div class="form_title">
                    <label for="pass" class="form_name">パスワード</label>
                    <a class="form_required_mark">必須</a>
                    <input type="password" name="pass" id="pass" data-length="30" placeholder="パスワード" autocomplete="off">
                    <input type="password" name="pass2" id="pass2" data-length="30" placeholder="パスワード(確認)" autocomplete="off">
                  </div>
                  <br>
                  <div class="form_title">
                    <label for="address" class="form_name">メールアドレス</label>
                    <a class="form_required_mark">必須</a>
                    <input type="email" name="address" id="address" data-length="50" placeholder="例:Stable@example.com" autocomplete="off">
                  </div>
                  <div id="button_box" style="margin: 20px;">
                    <a class="waves-effect waves-light btn-large grey darken-1" href="../index.php">戻る</a>
                    <a class="waves-effect waves-light btn-large" href="javascript:regiser_form.submit()">確認</a>
                  </div>
              </form>
            </div>
          </div>
          <br><br>
        </div>
      </div>
      <div class="parallax" style="background:white;"></div>
    </div>
    <?php include '../footer.php'; ?>
  </body>
  <?php
  try{
    $check='';
    if (isset($_GET['check'])){
      $check=htmlspecialchars($_GET['check']);
    }
    if($check == 'empty_error'){
      ?>
      <script>
        document.getElementById("empty_error").style.display="inline";
      </script>
      <?php
    }
    if($check == 'missmatch_error'){
      ?>
      <script>
        document.getElementById("missmatch_error").style.display="inline";
      </script>
      <?php
    }
    if($check == 'mailaddress_error'){
      ?>
      <script>
        document.getElementById("mailaddress_error").style.display="inline";
      </script>
      <?php
    }
  } catch(Exception $e) {
    print '';
  }
  ?>
  <script>
  $(document).ready(function() {
   $('input#name, input#pass, input#pass2, input#address').characterCounter();
 });
  </script>
</html>
