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
    <link rel="stylesheet" href="../styles/vendors/bootstrap-reboot.css" />
    <link rel="stylesheet" href="../styles/vendors/swiper.min.css" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/lineup.css" />
    <link rel="stylesheet" href="./item_list.css" />

    <!-- three.jsを読み込む -->
    <script src="../js/three/three.min.js"></script>
    <script src="../js/three/OrbitControls.js"></script>
    <script src="../js/three/GLTFLoader.js"></script>

    <!-- script.jsを読み込む -->
    <script src="../js/script_03_ffd6ff.js"></script>
    <script src="../js/script02_03_d6d6ff.js"></script>
    <script src="../js/script03_03_d6ffff.js"></script>
    <script src="../js/script04_03_d6ffd6.js"></script>
    <script src="../js/script05_03_ffffd6.js"></script>
    <script src="../js/script06_03_ffd6d6.js"></script>
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
                <li class="header__li item"><a href="../cart/item_list_a.php">Lineup</a></li>
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
                <a href="../cart/item_cart_a.php"
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
                <a href="../tofome/form.html" class="tobu2">購入手続きへ</a>
              </div>
            </div>
            <button class="mobile-menu__btn">
              <span></span>
              <span></span>
              <span></span>
            </button>
          </div>
        </header>
        
        <img src="../images/bg_22.png"></img>
        
        
        
        <div class="item_introduction"><span class="products__name02">Heavy</span><span class="description02">一度座ったら立ち上がれない至高のゲーミングチェア</span><span class="price02">￥64,000+</span></div>
        
        

                
        <div class="box_pop">
          <button class="show_pop1">1</button>
          <button class="show_pop2">2</button>
          <button class="show_pop3">3</button>
          <button class="show_pop4">4</button>
          <button class="show_pop5">5</button>
          <button class="show_pop6">6</button>
        </div>

        
        
        
        
        
        <form action="./item_cart_a.php" method="post">
        

          <div class="modal_pop1">
              <div class="bg1 js-modal-close1"></div>
            <div class="modal_pop_main1">
            <div id="photo_canvas_id">
                        <canvas id="photo_canvas01_01"></canvas>
                  </div>
                  
                  <!-- <label><input type="radio" name="chair1" value="1" checked><p class="p_text">商品を選択</p></label> -->
                  <input type="hidden" name="product_id" value="5">
                  <input type="hidden" name="product_name" value="Heavy">
                  <input type="hidden" name="explanation" value="一度座ったら立ち上がれない至高のゲーミングチェア大人しくスタイリッシュな形状をしたゲーミングチェア">
                  <input type="hidden" name="price" value="64000">
                  <input type="hidden" name="num" value="1" style="width:30px;">
                  <!-- <input type="text" name="color" value="1"> -->
                  <input type="submit" value="カートに追加">
                  <a href="../tofome/form.html" class="tobu">購入手続きへ</a>
                  
            </div>
          </div>

          <div class="modal_pop2">
              <div class="bg2 js-modal-close2"></div>
            <div class="modal_pop_main2">
            <div id="photo_canvas_id">
                        <canvas id="photo_canvas01_02"></canvas>
                  </div>
                  
                  <!-- <label><input type="radio" name="chair1" value="2" ><p class="p_text">商品を選択</p></label> -->
                  <input type="hidden" name="product_id" value="5">
                  <input type="hidden" name="product_name" value="Heavy">
                  <input type="hidden" name="explanation" value="一度座ったら立ち上がれない至高のゲーミングチェア大人しくスタイリッシュな形状をしたゲーミングチェア">
                  <input type="hidden" name="price" value="64000">
                  <input type="hidden" name="num" value="1" style="width:30px;">
                  <!-- <input type="text" name="color" value="1"> -->
                  <input type="submit" value="カートに追加">
                  <a href="../tofome/form.html" class="tobu">購入手続きへ</a>
                  
            </div>
          </div>

          <div class="modal_pop3">
              <div class="bg3 js-modal-close3"></div>
            <div class="modal_pop_main3">
            <div id="photo_canvas_id">
                        <canvas id="photo_canvas01_03"></canvas>
                  </div>
                  
                  <!-- <label><input type="radio" name="chair1" value="3" ><p class="p_text">商品を選択</p></label> -->
                  <input type="hidden" name="product_id" value="5">
                  <input type="hidden" name="product_name" value="Heavy">
                  <input type="hidden" name="explanation" value="一度座ったら立ち上がれない至高のゲーミングチェア大人しくスタイリッシュな形状をしたゲーミングチェア">
                  <input type="hidden" name="price" value="64000">
                  <input type="hidden" name="num" value="1" style="width:30px;">
                  <!-- <input type="text" name="color" value="1"> -->
                  <input type="submit" value="カートに追加">
                  <a href="../tofome/form.html" class="tobu">購入手続きへ</a>
                  
            </div>
          </div>

          <div class="modal_pop4">
              <div class="bg4 js-modal-close4"></div>
            <div class="modal_pop_main4">
            <div id="photo_canvas_id">
                        <canvas id="photo_canvas01_04"></canvas>
                  </div>
                  
                  <!-- <label><input type="radio" name="chair1" value="4" ><p class="p_text">商品を選択</p></label> -->
                  <input type="hidden" name="product_id" value="5">
                  <input type="hidden" name="product_name" value="Heavy">
                  <input type="hidden" name="explanation" value="一度座ったら立ち上がれない至高のゲーミングチェア大人しくスタイリッシュな形状をしたゲーミングチェア">
                  <input type="hidden" name="price" value="64000">
                  <input type="hidden" name="num" value="1" style="width:30px;">
                  <!-- <input type="text" name="color" value="1"> -->
                  <input type="submit" value="カートに追加">
                  <a href="../tofome/form.html" class="tobu">購入手続きへ</a>
                  
            </div>
          </div>

          <div class="modal_pop5">
              <div class="bg5 js-modal-close5"></div>
            <div class="modal_pop_main5">
            <div id="photo_canvas_id">
                        <canvas id="photo_canvas01_05"></canvas>
                  </div>
                  
                  <!-- <label><input type="radio" name="chair1" value="5" ><p class="p_text">商品を選択</p></label> -->
                  <input type="hidden" name="product_id" value="5">
                  <input type="hidden" name="product_name" value="Heavy">
                  <input type="hidden" name="explanation" value="一度座ったら立ち上がれない至高のゲーミングチェア大人しくスタイリッシュな形状をしたゲーミングチェア">
                  <input type="hidden" name="price" value="64000">
                  <input type="hidden" name="num" value="1" style="width:30px;">
                  <!-- <input type="text" name="color" value="1"> -->
                  <input type="submit" value="カートに追加">
                  <a href="../tofome/form.html" class="tobu">購入手続きへ</a>
                  
            </div>
          </div>

          <div class="modal_pop6">
              <div class="bg6 js-modal-close6"></div>
            <div class="modal_pop_main6">
            <div id="photo_canvas_id">
                        <canvas id="photo_canvas01_06"></canvas>
                  </div>
                  
                  <!-- <label><input type="radio" name="chair1" value="6" ><p class="p_text">商品を選択</p></label> -->
                  <input type="hidden" name="product_id" value="5">
                  <input type="hidden" name="product_name" value="Heavy">
                  <input type="hidden" name="explanation" value="一度座ったら立ち上がれない至高のゲーミングチェア大人しくスタイリッシュな形状をしたゲーミングチェア">
                  <input type="hidden" name="price" value="64000">
                  <input type="hidden" name="num" value="1" style="width:30px;">
                  <!-- <input type="text" name="color" value="1"> -->
                  <input type="submit" value="カートに追加">
                  <a href="../tofome/form.html" class="tobu">購入手続きへ</a>
                  
            </div>
          </div>
    </form>


        
        
        
        
        
        
        
        
        
        
        
        
        

        <footer class="footer appear up">
          <div class="logo item">
            <img src="../images/11062b_9ae7fb3109b3466fba8485c4224af5c7.svg" alt="" class="logo__img" />
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
          <img src="images/logo.svg" alt="" class="logo__img" />
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
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $('.modal_pop1').hide();
  $('.show_pop1').on('click',function(){
    $('.modal_pop1').fadeIn();
  })
  $('.js-modal-close1').on('click',function(){
    $('.modal_pop1').fadeOut();
  })
  
  $('.modal_pop2').hide();
  $('.show_pop2').on('click',function(){
    $('.modal_pop2').fadeIn();
  })
  $('.js-modal-close2').on('click',function(){
    $('.modal_pop2').fadeOut();
  })
  
  $('.modal_pop3').hide();
  $('.show_pop3').on('click',function(){
    $('.modal_pop3').fadeIn();
  })
  $('.js-modal-close3').on('click',function(){
    $('.modal_pop3').fadeOut();
  })
  
  $('.modal_pop4').hide();
  $('.show_pop4').on('click',function(){
    $('.modal_pop4').fadeIn();
  })
  $('.js-modal-close4').on('click',function(){
    $('.modal_pop4').fadeOut();
  })
  
  $('.modal_pop5').hide();
  $('.show_pop5').on('click',function(){
    $('.modal_pop5').fadeIn();
  })
  $('.js-modal-close5').on('click',function(){
    $('.modal_pop5').fadeOut();
  })
  
  $('.modal_pop6').hide();
  $('.show_pop6').on('click',function(){
    $('.modal_pop6').fadeIn();
  })
  $('.js-modal-close6').on('click',function(){
    $('.modal_pop6').fadeOut();
  })
</script>
  </body>
</html>
