<?php
try{
session_start();
session_regenerate_id(true);

if(isset($_SESSION['bool'])==false){
  print'ログインされていません。<br/>';
  print'<a href="login.php">ログイン画面へ</a>';
  exit();
}

} catch (Exception $e) {
}

?>
<!DOCTYPE html>
<html lang="ja">
        <head>
          <script src="/js/register_update.js"></script>
          <meta charset="utf-8"/>
        </head>
        <body>
          <p>
          Preview:<br/><br/>
          <image id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
          </p>


        <form method='POST' action="register_update_done.php" enctype="multipart/form-data">

              <input type="hidden" name="MAX_FILE_SIZE" id="size_check" value="5242880">
              <input type="file" name="image" id="image" accept='image/*' onchange="previewImage(this);"><br/><br/>
              ユーザ名 : &nbsp;<input type="text" id="name" name="name" contentEditable="true" autocomplete="off" value="<?php print $_SESSION['regist_name'];?>"><br/><br/>
              E-mail : &nbsp;<input type="text" id="address" name="mail_address" contentEditable="true" autocomplete="off" value="<?php print $_SESSION['regist_address'];?>"><br/><br/>

              生年月日 :&nbsp;
              <select name="year" id="year">
                <option value="">-</option>
                <option value="1951">1951</option>
                <option value="1952">1952</option>
                <option value="1953">1953</option>
                <option value="1954">1954</option>
                <option value="1955">1955</option>
                <option value="1956">1956</option>
                <option value="1957">1957</option>
                <option value="1958">1958</option>
                <option value="1959">1959</option>
                <option value="1960">1960</option>
                <option value="1961">1961</option>
                <option value="1962">1962</option>
                <option value="1963">1963</option>
                <option value="1964">1964</option>
                <option value="1965">1965</option>
                <option value="1966">1966</option>
                <option value="1967">1967</option>
                <option value="1968">1968</option>
                <option value="1969">1969</option>
                <option value="1970">1970</option>
                <option value="1971">1971</option>
                <option value="1972">1972</option>
                <option value="1973">1973</option>
                <option value="1974">1974</option>
                <option value="1975">1975</option>
                <option value="1976">1976</option>
                <option value="1977">1977</option>
                <option value="1978">1978</option>
                <option value="1979">1979</option>
                <option value="1980">1980</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
              </select>  年

              <select name="month" id="month">
                <option value="">-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>  月

              <select name="day" id="day">
                <option value="">-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>  日<br/><br/>

              居住国  :
              <select name = "country" id="country">
                <option value="">-</option>
                <option value="アメリカ">アメリカ</option>
                <option value="イギリス">イギリス</option>
                <option value="イタリア">イタリア</option>
                <option value="インド">インド</option>
                <option value="インドネシア">インドネシア</option>
                <option value="韓国">韓国</option>
                <option value="北アフリカ">北アフリカ</option>
                <option value="サウジアラビア">サウジアラビア</option>
                <option value="中国">中国</option>
                <option value="トルコ">トルコ</option>
                <option value="ドイツ">ドイツ</option>
                <option value="日本">日本</option>
                <option value="フランス">フランス</option>
                <option value="ブラジル">ブラジル</option>
                <option value="南アフリカ">南アフリカ</option>
                <option value="メキシコ">メキシコ</option>
                <option value="ロシア">ロシア</option>
              </select><br/><br/>

            性別 :&nbsp;
            <div>
               <input type="radio" id="gender1" name="gender" value="male">
               <label for="gender1">男性</label>

               <input type="radio" id="gender2" name="gender" value="female">
               <label for="gender2">女性</label>

               <input type="radio" id="gender3" name="gender" value="none">
               <label for="gender3">無回答</label>
            </div>
            <div>
               <button type="submit">完了</button>
            </div>
        </form>
        <a href="profile.php"><button type="button">戻る</button></a>
    </body>
</html>
