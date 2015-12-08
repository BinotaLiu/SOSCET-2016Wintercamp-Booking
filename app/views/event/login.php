<div class="col-sm-12 col-md-6 col-md-offset-3">
  <h3 class="text-center">請輸入密碼</h3>
  <?php if($error) { ?>
  <div class="alert alert-danger">
    <p>密碼錯誤或報名資料網址錯誤</p>
  </div>
  <?php } else { ?>
  <?php } ?>
  <div class="alert alert-notice">
    <p>若您未設定密碼，則請使用預設密碼 123456</p>
  </div>
  <?php echo form_open(); ?>
    <input type="password" name="password" placeholder="請輸入密碼">
    <button type="submit">送出</button>
  </form>
</div>

