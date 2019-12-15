<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">你的商場名稱</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="./itemList.php">商品一覽</a>
    <a class="p-2 text-dark" href="./myCart.php">我的購物車</a>

    <?php if(isset($_SESSION["username"])) { ?>
    <a class="p-2 text-dark" href="./check.php">我的訂單</a>
    <?php } ?>

  </nav>
  <?php if(!isset($_SESSION["username"])){ ?>
  <a class="btn btn-outline-primary" href="./register.php">註冊</a>
  <?php } else { ?>
  <span><?php echo $_SESSION["name"] ?> 您好</span>
  <?php } ?>
  <?php require_once("./tpl/login.php") ?>
</div>