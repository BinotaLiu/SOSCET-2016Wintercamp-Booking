<div class="col-sm-12 col-md-6 col-md-offset-3">
  <h3 class="text-center">請輸入密碼</h3>
  <?php if($error) { ?>
  <div class="alert alert-danger">
    <p>密碼錯誤或報名資料網址錯誤</p>
  </div>
  <?php } else { ?>
  <?php } ?>
  <div class="alert alert-warning">
    <p>若您未設定密碼，則請使用預設密碼 123456</p>
  </div>
  <?php echo form_open(); ?>
    <div class="form-group">
      <input type="password" class="form-control" name="password" placeholder="請輸入密碼">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">送出</button>
    </div>
  </form>
</div>

