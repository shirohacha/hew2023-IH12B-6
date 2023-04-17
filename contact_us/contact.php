<?php

define( "FILE_DIR", "./images/test/");

// 変数の初期化
$page_flag = 0;
$clean = array();
$error = array();

// サニタイズ
if( !empty($_POST) ) {

	foreach( $_POST as $key => $value ) {
		$clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
	} 
}

if( !empty($clean['btn_confirm']) ) {

	$error = validation($clean);

	// ファイルのアップロード
	if( !empty($_FILES['attachment_file']['tmp_name']) ) {

		$upload_res = move_uploaded_file( $_FILES['attachment_file']['tmp_name'], FILE_DIR.$_FILES['attachment_file']['name']);

		if( $upload_res !== true ) {
			$error[] = 'ファイルのアップロードに失敗しました。';
		} else {
			$clean['attachment_file'] = $_FILES['attachment_file']['name'];
		}
	}

	if( empty($error) ) {

		$page_flag = 1;

		// セッションの書き込み
		session_start();
		$_SESSION['page'] = true;		
	}

} elseif( !empty($clean['btn_submit']) ) {

	session_start();
	if( !empty($_SESSION['page']) && $_SESSION['page'] === true ) {

		// セッションの削除
		unset($_SESSION['page']);

		$page_flag = 2;

		// 変数とタイムゾーンを初期化
		$header = null;
		$body = null;
		$admin_body = null;
		$auto_reply_subject = null;
		$auto_reply_text = null;
		$admin_reply_subject = null;
		$admin_reply_text = null;
		date_default_timezone_set('Asia/Tokyo');
		
		//日本語の使用宣言
		mb_language("ja");
		mb_internal_encoding("UTF-8");
	
		$header = "MIME-Version: 1.0\n";
		$header = "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
		$header .= "From: 椅子専門店 Chaise <noreply@chaise.com>\n";
		$header .= "Reply-To: Chaise <noreply@chaise.com>\n";
	
		// 件名を設定
		$auto_reply_subject = 'お問い合わせありがとうございます。';
	
		// 本文を設定
		$auto_reply_text = "この度は、お問い合わせ頂き誠にありがとうございます。\n下記の内容でお問い合わせを受け付けました。\n\n";
		$auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
		$auto_reply_text .= "氏名：" . $clean['your_name'] . "\n";
		$auto_reply_text .= "メールアドレス：" . $clean['email'] . "\n";
	
	
		$auto_reply_text .= "お問い合わせ内容：" . nl2br($clean['contact']) . "\n\n";
		$auto_reply_text .= "chaise"; //サービス名
		
		// テキストメッセージをセット
		$body = "--__BOUNDARY__\n";
		$body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
		$body .= $auto_reply_text . "\n";
		$body .= "--__BOUNDARY__\n";
	
		// ファイルを添付
		if( !empty($clean['attachment_file']) ) {
			$body .= "Content-Type: application/octet-stream; name=\"{$clean['attachment_file']}\"\n";
			$body .= "Content-Disposition: attachment; filename=\"{$clean['attachment_file']}\"\n";
			$body .= "Content-Transfer-Encoding: base64\n";
			$body .= "\n";
			$body .= chunk_split(base64_encode(file_get_contents(FILE_DIR.$clean['attachment_file'])));
			$body .= "--__BOUNDARY__\n";
		}
	
		// 自動返信メール送信
		mb_send_mail( $clean['email'], $auto_reply_subject, $body, $header);
	
		// 運営側へ送るメールの件名
		$admin_reply_subject = "お問い合わせを受け付けました";
	
		// 本文を設定
		$admin_reply_text = "下記の内容でお問い合わせがありました。\n\n";
		$admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
		$admin_reply_text .= "氏名：" . $clean['your_name'] . "\n";
		$admin_reply_text .= "メールアドレス：" . $clean['email'] . "\n";
	
		
		$admin_reply_text .= "お問い合わせ内容：" . nl2br($clean['contact']) . "\n\n";
		
		// テキストメッセージをセット
		$body = "--__BOUNDARY__\n";
		$body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
		$body .= $admin_reply_text . "\n";
		$body .= "--__BOUNDARY__\n";
	
		// ファイルを添付
		if( !empty($clean['attachment_file']) ) {		
			$body .= "Content-Type: application/octet-stream; name=\"{$clean['attachment_file']}\"\n";
			$body .= "Content-Disposition: attachment; filename=\"{$clean['attachment_file']}\"\n";
			$body .= "Content-Transfer-Encoding: base64\n";
			$body .= "\n";
			$body .= chunk_split(base64_encode(file_get_contents(FILE_DIR.$clean['attachment_file'])));
			$body .= "--__BOUNDARY__\n";
		}
	
		// 管理者へメール送信
		mb_send_mail( 'chaise.hal@gmail.com', $admin_reply_subject, $body, $header);
		
	} else {
		$page_flag = 0;
	}	
}

function validation($data) {

	$error = array();

	// 氏名のバリデーション
	if( empty($data['your_name']) ) {
		$error[] = "「氏名」は必ず入力してください。";

	} elseif( 20 < mb_strlen($data['your_name']) ) {
		$error[] = "「氏名」は20文字以内で入力してください。";
	}

	// メールアドレスのバリデーション
	if( empty($data['email']) ) {
		$error[] = "「メールアドレス」は必ず入力してください。";

	} elseif( !preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email']) ) {
		$error[] = "「メールアドレス」は正しい形式で入力してください。";
	}

	// お問い合わせ内容のバリデーション
	if( empty($data['contact']) ) {
		$error[] = "「お問い合わせ内容」は必ず入力してください。";
	}


	return $error;
}
?>




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
    <link rel="stylesheet" href="./contact.css" />
    
    

    
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
                <li class="header__li item"><a href="../cart./item_list_a.php">Lineup</a></li>
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
                <a href="../cart./item_cart_a.php"
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

        
        
        <div class="main__form">
		<h1>お問い合わせフォーム</h1>
<?php if( $page_flag === 1 ): ?>

<form method="post" action="">
	<div class="element_wrap">
		<label>氏名</label>
		<p><?php echo $clean['your_name']; ?></p>
	</div>
	<div class="element_wrap">
		<label>メールアドレス</label>
		<p><?php echo $clean['email']; ?></p>
	</div>
	<div class="element_wrap">
		<label>お問い合わせ内容</label>
		<p><?php echo nl2br($clean['contact']); ?></p>
	</div>
	<?php if( !empty($clean['attachment_file']) ): ?>
	<div class="element_wrap">
		<label>画像ファイルの添付</label>
		<p><img src="<?php echo FILE_DIR.$clean['attachment_file']; ?>"></p>
	</div>
	<?php endif; ?>
	<input type="submit" name="btn_back" value="戻る">
	<input type="submit" name="btn_submit" value="送信">
	<input type="hidden" name="your_name" value="<?php echo $clean['your_name']; ?>">
	<input type="hidden" name="email" value="<?php echo $clean['email']; ?>">
	<input type="hidden" name="contact" value="<?php echo $clean['contact']; ?>">
	<?php if( !empty($clean['attachment_file']) ): ?>
		<input type="hidden" name="attachment_file" value="<?php echo $clean['attachment_file']; ?>">
	<?php endif; ?>
</form>

<?php elseif( $page_flag === 2 ): ?>

<p>送信が完了しました。</p>

<?php else: ?>

<?php if( !empty($error) ): ?>
	<ul class="error_list">
	<?php foreach( $error as $value ): ?>
		<li><?php echo $value; ?></li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

<form method="post" action="" enctype="multipart/form-data">
	<div class="element_wrap">
		<label>氏名</label>
		<input type="text" name="your_name" value="<?php if( !empty($clean['your_name']) ){ echo $clean['your_name']; } ?>">
	</div>
	<div class="element_wrap">
		<label>メールアドレス</label>
		<input type="text" name="email" value="<?php if( !empty($clean['email']) ){ echo $clean['email']; } ?>">
	</div>

	<div class="element_wrap">
		<label>お問い合わせ内容</label>
		<textarea name="contact"><?php if( !empty($clean['contact']) ){ echo $clean['contact']; } ?></textarea>
	</div>
	<div class="element_wrap">
		<label>画像ファイルの添付</label>
		<input type="file" name="attachment_file">
	</div>
	<input type="submit" name="btn_confirm" value="入力内容を確認する">
</form>

<?php endif; ?>
		</div>

		
		
		
		
<!-- 		
        <footer class="footer appear up">
          <div class="logo item">
            <img src="../images/logo.svg" alt="" class="logo__img" />
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
        </footer> -->
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
  </body>
</html>
