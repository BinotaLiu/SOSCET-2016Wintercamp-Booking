<section id="booking-form" class="col-sm-12">
    <h2 class="text-center">填寫報名表格</h2>
    <form action="<?php echo site_url('event/booking'); ?>">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">姓名</label>
                <input type="text" class="form-control" name="name" placeholder="姓名" required>
            </div>
            <div class="form-group">
                <label for="phone">聯絡電話</label>
                <input type="phone" class="form-control" name="phone" placeholder="聯絡電話" pattern="^(09\d{8}|0[1-8]\d{7,8})$" required>
            </div>
            <div class="form-group">
                <label for="personal_id">身份證字號</label>
                <input type="text" class="form-control" name="personal_id" placeholder="身份證字號" pattern="^\w\d+$" required>
            </div>
            <div class="form-group">
                <label for="birthday">出生年月日 <small>(yyyy-mm-dd)</small></label>
                <input type="text" class="form-control" name="personal_id" placeholder="身份證字號（如 1999-01-01）" pattern="^((20|19)([02468][1235679]|[13579][01345789])\-(((0[13578]|1[02])\-(0[1-9]|[12]\d|3[01]))|((0[469]|11)\-(0[1-9]|[12]\d|3[0]))|(02\-(0[1-9]|1\d|2[1-8])))|(20|19)([02468][048]|[13579][26])\-(((0[13578]|1[02])\-(0[1-9]|[12]\d|3[01]))|((0[469]|11)\-(0[1-9]|[12]\d|3[0]))|(02\-(0[1-9]|1\d|2[1-9]))))$" required>
            </div>
            <div class="form-group">
                <label for="school">就讀學校</label>
                <input type="text" class="form-control" name="school" placeholder="就讀學校" required>
            </div>
            <div class="form-group">
                <label for="sex">現在的生理性別<small>（用於住宿分房）</small></label>
                <div>
                    <label><input type="radio" name="sex" value="1" required> 男性</label>
                    <label><input type="radio" name="sex" value="2" required> 女性</label>
                </div>
            </div>
            <div class="form-group">
                <label for="eating">飲食習慣</label>
                <div id="eating-checkbox-group">
                    <label><input type="checkbox" name="eating[0]"> 葷食</label>
                    <label><input type="checkbox" name="eating[1]"> 純素</label>
                    <label><input type="checkbox" name="eating[2]"> 蛋奶酥</label>
                    <label><input type="checkbox" name="eating[3]"> 不吃雞</label>
                    <label><input type="checkbox" name="eating[4]"> 不吃豬</label>
                    <label><input type="checkbox" name="eating[5]"> 不吃牛</label>
                    <label><input type="checkbox" name="eating[6]"> 不吃海鮮</label>
                    <label><input type="checkbox" name="eating[7]"> 其它（請填寫）</label>
                    <input type="text" class="form-control" name="eating_other" placeholder="其它飲食習慣">
                </div>
            </div>
            <div class="form-group">
                <label for="other_details">其它注意事項<small>（非必填）</small></label>
                <textarea class="form-control" rows="10" name="other_details" placeholder="其它注意事項（非必填）"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="emergency_contact">緊急聯絡人</label>
                <input type="text" class="form-control" name="emergency_contact" placeholder="緊急聯絡人" required>
            </div>
            <div class="form-group">
                <label for="emergency_relationship">緊急聯絡人與您的關係</label>
                <input type="text" class="form-control" name="emergency_relationship" placeholder="與緊急聯絡人之關係" required>
            </div>
            <div class="form-group">
                <label for="emergency_phone">緊急聯絡人聯絡電話</label>
                <input type="phone" class="form-control" name="emergency_phone" placeholder="緊急聯絡人聯絡電話" pattern="^(09\d{8}|0\d[1-8]{7,8})$" required>
            </div>
            <div class="form-group">
                <label for="same_as_emergency"><input type="checkbox" name="same_as_emergency"> 緊急聯絡人同保險受益人</label>
            </div>
            <div class="form-group">
                <label for="beneficiary">保險受益人</label>
                <input type="text" class="form-control" name="beneficiary" placeholder="保險受益人" required>
            </div>
            <div class="form-group">
                <label for="beneficiary_relationship">保險受益人與您的關係</label>
                <input type="text" class="form-control" name="beneficiary_relationship" placeholder="與保險受益人之關係" required>
            </div>
            <div class="form-group">
                <label for="beneficiary_relationship">保險受益人聯絡電話</label>
                <input type="phone" class="form-control" name="beneficiary_phone" placeholder="保險受益人聯絡電話" pattern="^(09\d{8}|0\d[1-8]{7,8})$" required>
            </div>
            <div class="alert alert-warning" role="alert">
                <p><b>注意！</b> 若您未滿 20 歲，緊急聯絡人與保險受益人需為您的監護人！</p>
            </div>
            <p class="text-right">送出報名表格即代表您同意<a href="#">《個人資料蒐集與利用條款》</a>與<a href="#">《報名須知》</a></p>
            <div class="pull-right">
                <button type="submit" class="btn btn-lg btn-success">確認無誤，立即報名！</button>
           </div>
        </div>
    </form>
</section>

<script>
  $(function() {
    //飲食習慣
    $('input[name="eating[0]"').click(function() {
      $('input[name="eating[1]"]').prop('checked', false);
      $('input[name="eating[2]"]').prop('checked', false);
      $('input[name="eating[3]"]').prop('checked', false);
      $('input[name="eating[4]"]').prop('checked', false);
      $('input[name="eating[5]"]').prop('checked', false);
      $('input[name="eating[6]"]').prop('checked', false);
      $('input[name="eating[7]"]').prop('checked', false);
    });
    $('input[name="eating[1]"').click(function() {
      $('input[name="eating[0]"]').prop('checked', false);
      $('input[name="eating[2]"]').prop('checked', false);
      $('input[name="eating[3]"]').prop('checked', false);
      $('input[name="eating[4]"]').prop('checked', false);
      $('input[name="eating[5]"]').prop('checked', false);
      $('input[name="eating[6]"]').prop('checked', false);
      $('input[name="eating[7]"]').prop('checked', false);
    });
    $('input[name="eating[2]"').click(function() {
      $('input[name="eating[0]"]').prop('checked', false);
      $('input[name="eating[1]"]').prop('checked', false);
      $('input[name="eating[3]"]').prop('checked', false);
      $('input[name="eating[4]"]').prop('checked', false);
      $('input[name="eating[5]"]').prop('checked', false);
      $('input[name="eating[6]"]').prop('checked', false);
      $('input[name="eating[7]"]').prop('checked', false);
    });
    $('input[name="eating[7]"').click(function() {
      if($(this).prop('checked')) {
        $('input[name="eating_other"]').show();
      } else {
        $('input[name="eating_other"]').hide();
      }
    });
    $('input[name="eating[7]"').trigger('click');

    //保險受益人 同 緊急聯絡人
    $('input[name="same_as_emergency"]').click(function() {
      if(!$(this).prop('checked')) return;
      $('input[name="beneficiary"]').val($('input[name="emergency_contact"]').val());
      $('input[name="beneficiary_phone"]').val($('input[name="emergency_phone"]').val());
      $('input[name="beneficiary_relationship"]').val($('input[name="emergency_relationship"]').val());
    });
    $('input[name="emergency_contact"], input[name="emergency_phone"], input[name="emergency_relationship"]').bind('keyup', function() {
      if(!$('input[name="same_as_emergency"]').prop('checked')) return;
      $('input[name="beneficiary"]').val($('input[name="emergency_contact"]').val());
      $('input[name="beneficiary_phone"]').val($('input[name="emergency_phone"]').val());
      $('input[name="beneficiary_relationship"]').val($('input[name="emergency_relationship"]').val());
    });
    $('input[name="beneficiary"], input[name="beneficiary_phone"], input[name="beneficiary_relationship"]').bind('keyup', function() {
      $('input[name="same_as_emergency"]').prop('checked', false);
    });
  });
</script>

