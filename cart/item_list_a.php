<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>CouleurChase</title>
    <meta name="description" content="This site is a test site." />
    <link rel="icon" href="../images/11062b_9ae7fb3109b3466fba8485c4224af5c7.svg" />
    <link rel="stylesheet" href="../styles/loader.css" />
    <script src="../scripts/vendors/pace.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Kameron:wght@400;700&family=Noto+Sans+JP:wght@500&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="../styles/vendors/bootstrap-reboot.css" />
    <link rel="stylesheet" href="../styles/vendors/swiper.min.css" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/lineup.css" />

    <!-- three.jsを読み込む -->
    <script src="../js/three/three.min.js"></script>
    <script src="../js/three/OrbitControls.js"></script>
    <script src="../js/three/GLTFLoader.js"></script>

    <!-- script.jsを読み込む -->
    <script src="../js/script.js"></script>
    <script src="../js/script02.js"></script>
    <script src="../js/script03.js"></script>
    <script src="../js/script04.js"></script>
    <script src="../js/script05.js"></script>
    <script src="../js/script06.js"></script>
    <script src="../js/script07.js"></script>
    <script src="../js/script08.js"></script>
    <script src="../js/script09.js"></script>
    <script src="../js/script10.js"></script>
    
    
    <script>
      function openModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
        var iframe = document.getElementById("myIframe");
        iframe.src = "../cart/item_cart_main.php";
      }
      function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
        var iframe = document.getElementById("myIframe");
        iframe.src = "";
      }
    </script>
    

  </head>
  <body>
    <div id="global-container">
      <div id="container">
        <div class="mobile-menu__cover"></div>
        <div class="nav-trigger"></div>
        <header class="header">
          <div class="header__inner appear up">
            <div class="logo item">
            <a class="logo__transition" href="../index.html">
                <img src="../images/11062b_9ae7fb3109b3466fba8485c4224af5c7.svg" alt="" class="logo__img" />
                <span class="logo__stay">Couleur</span>
                <span class="logo__world">Chase</span>
              </a>
            </div>
            <nav class="header__nav">
              <ul class="header__ul">
                <li class="header__li item"><a href="">Service</a></li>
                <li class="header__li item"><a href="./item_list_a.php">Lineup</a></li>
                <li class="header__li item">
                  <a class="btn filled" href="../contact_us/contact.php">Contact</a>
                </li>
              </ul>
            </nav>

            <div class="header__icon">
              <div class="header__icon__user">
                <a href="../login/login_form.php"
                  ><i class="fa-solid fa-user"></i
                ></a>
              </div>
              <!-- <div class="header__icon__cart">
                <a href="item_cart_a.php"
                  ><i class="fa-solid fa-cart-shopping"></i
                ></a>
              </div> -->
              
              
              <div
                class="header__icon__cart bounce-in-right"
                onclick="openModal()"
              >
                <i class="fa-solid fa-cart-shopping"></i>
              </div>
              <div id="myModal" class="modal">
                <div class="modal-content">
                  <span class="close" onclick="closeModal()">&times;</span>
                  <iframe
                    id="myIframe"
                    src=""
                    width="100%"
                    height="100%"
                  ></iframe>
                </div>
                <a href="../tofome/form.html" class="tobu">購入手続きへ</a>
              </div>
            </div>
            <button class="mobile-menu__btn">
              <span></span>
              <span></span>
              <span></span>
            </button>
          </div>
        </header>
        <div id="content">

          <div id="main-content">
            <aside class="side left">
              <div class="side__inner">
                <a class="twitter icon tween-animate-title" href="#">Twitter</a>
                <a class="fb icon tween-animate-title" href="#">Facebook</a>
              </div>
            </aside>

            <aside class="side right">
              <div class="side__inner">
                <span class="tween-animate-title">&copy;ec site</span>
              </div>
            </aside>
          </div>
        </div>

        
        <div class="box__title">
          <div class="sub__title">Gaming chair</div>
        </div>

        <ul class="slider">
          <li class="slider-item slider-item01"><div class="item_introduction"><span class="products__name">Classic</span><span class="description">誰にでもお勧めできる普通のゲーミングチェア</span><span class="price">￥13,000+</span><a class="item__cart" href="./item_list_1.php"><input type="submit" value="もっと＋"></a></div></li>
          <li class="slider-item slider-item02"><div class="item_introduction"><span class="products__name">	Light</span><span class="description">大人しくスタイリッシュな形状をしたゲーミングチェア</span><span class="price">￥16,000+</span><a class="item__cart" href="./item_list_2.php"><input type="submit" value="もっと＋"></a></div></li>
          <li class="slider-item slider-item03"><div class="item_introduction"><span class="products__name">Heavy</span><span class="description">一度座ったら立ち上がれない至高のゲーミングチェア</span><span class="price">￥64,000+</span><a class="item__cart" href="./item_list_3.php"><input type="submit" value="もっと＋"></a></div></li>
        </ul>
        
        
        <div class="box__title">
          <div class="sub__title">Office chair</div>
        </div>

        <ul class="slider02">
          <li class="slider-item slider-item04"><div class="item_introduction"><span class="products__name">Normal</span><span class="description">万人受けでとてもスリムな形状置く場所を問わない人気オフィスチェア</span><span class="price">￥5,000+</span><a class="item__cart" href="./item_list_4.php"><input type="submit" value="もっと＋"></a></div></li>
          <li class="slider-item slider-item05"><div class="item_introduction"><span class="products__name">High</span><span class="description">人体の構造にやさしい洗練されたオフィスチェア</span><span class="price">￥110,000+</span><a class="item__cart" href="./item_list_5.php"><input type="submit" value="もっと＋"></a></div></li>
          <li class="slider-item slider-item06"><div class="item_introduction"><span class="products__name">Low</span><span class="description">小学校のパソコン教室にあった懐かしいオフィスチェア</span><span class="price">￥1,500+</span><a class="item__cart" href="./item_list_6.php"><input type="submit" value="もっと＋"></a></div></li>
        </ul> 
        
        
        
        
       
<?php

// try
// {
// require("../dbconnect.php");

// $sql = 'SELECT product_id,product_name,explanation,price FROM products';
// $stmt = $db->prepare($sql);
// $stmt->execute();

// $db = null;

// }
// catch(Exception $e)
// {
//   print ' エラーが発生しました。';
//   exit();
// }

// print '<h3>商品一覧</h3>';
// print '商品を選択してください。<br>';
// print '<table><tr>';
// print '<td>商品名</td><td>価格</td><td>詳細</td></tr>';

// while(true)
// {
//   $rec = $stmt->fetch(PDO::FETCH_ASSOC);
//   if($rec == false){break;}
//   $product_id = $rec['product_id'];
//   $product_name = $rec['product_name'];
//   $explanation = $rec['explanation'];
//   $price = $rec['price'];
//   print '<tr>';
//   print '<form method="post" action="item_list.php">';
//   print '<input type="hidden" name="product_id" value="'.$product_id.'">';
//   print '<td><input type="hidden" name="product_name" value="'.$product_name.'">'.$product_name.'</td>';
//   print '<input type="hidden" name="explanation" value="'.$explanation.'">';
//   print '<td class="right"><input type="hidden" name="price" value="'.$price.'">'.number_format($price).'</td>';
//   print '<td><input type="submit" value="詳細"></td></form>';

// }
// print '</tr></table>';
?>

<!-- ここにトップページのファイル名を入れる -->
<!-- <button class="btn" onclick="location.href='../index.html'">トップページへ</button>  -->
        
        
        
        
        
        
        <!-- <div class="lineup__box">
        <h2>ゲーミングチェア</h2>
          <div class="a__box">
            <div id="photo_canvas_id">
              <canvas id="photo_canvas01" width="246px" height="335px"></canvas>
            </div>

            <div id="photo_canvas_id">
              <canvas id="photo_canvas02" width="246px" height="335px"></canvas>
            </div>
            <div id="photo_canvas_id">
              <canvas id="photo_canvas03" width="246px" height="335px"></canvas>
            </div>
          </div>
          <h2>オフィスチェア</h2>
          <div class="b__box">
            <div id="photo_canvas_id">
              <canvas id="photo_canvas04" width="246px" height="335px"></canvas>
            </div>
            <div id="photo_canvas_id">
              <canvas id="photo_canvas05" width="246px" height="335px"></canvas>
            </div>

            <div id="photo_canvas_id">
              <canvas id="photo_canvas06" width="246px" height="335px"></canvas>
            </div>
          </div>
        </div> -->

        <footer class="footer appear up">
          <div class="logo item">
            <img src="../11062b_9ae7fb3109b3466fba8485c4224af5c7.svg" alt="" class="logo__img" />
            <span class="logo__stay">Couleur</span>
            <span class="logo__world">Chase</span>
          </div>
          <nav class="footer__nav">
            <ul class="footer__ul">
              <li class="footer__li item"><a href="#">Service</a></li>
              <li class="footer__li item"><a href="#">Lineup</a></li>
              <li class="footer__li item"><a href="#">Company</a></li>
              <li class="footer__li item"><a href="#">Sitemap</a></li>
            </ul>
            <div class="footer__copyright item">&copy; ec site</div>
          </nav>
        </footer>
      </div>
      <nav class="mobile-menu">
        <!-- <div class="logo">
          <img src="../images/logo.svg" alt="" class="logo__img" />
          <span class="logo__stay">Stay</span>
          <span class="logo__world">World</span>
        </div> -->
        <ul class="mobile-menu__main">
          <li class="mobile-menu__item">
            <a class="mobile-menu__link" href="#">
              <span class="main-title">Our Service</span>
              <span class="sub-title">サービスについて</span>
            </a>
          </li>
          <li class="mobile-menu__item">
            <a class="mobile-menu__link" href="#">
              <span class="main-title">About Us</span>
              <span class="sub-title">私たちについて</span>
            </a>
          </li>
          <li class="mobile-menu__item">
            <a class="mobile-menu__link" href="#">
              <span class="main-title">Contact Us</span>
              <span class="sub-title">コンタクト方法</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <script src="../scripts/vendors/swiper.min.js"></script>
    <script src="../scripts/vendors/TweenMax.min.js"></script>
    <script src="../scripts/vendors/scroll-polyfill.js"></script>
    <script src="../scripts/libs/scroll.js"></script>
    <script src="../scripts/libs/text-animation.js"></script>
    <script src="../scripts/libs/hero-slider.js"></script>
    <script src="../scripts/libs/mobile-menu.js"></script>
    <script src="../scripts/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../js/slider.js"></script>
  </body>
</html>
