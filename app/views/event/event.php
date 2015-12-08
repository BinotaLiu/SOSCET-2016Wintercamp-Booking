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
                <input type="phone" class="form-control" name="phone" placeholder="聯絡電話" pattern="^(09\d{8}|0[1-8]\d{7,8})$" title="請填寫台灣地區的手機或含區碼之市內電話" required>
            </div>
            <div class="form-group">
                <label for="email">電子郵件</label>
                <input type="email" class="form-control" name="email" placeholder="電子郵件" pattern="^.+?@([^\.]+\.)+[^\.]+$" title="請填寫有效之電子郵件信箱" required>
            </div>
            <div class="form-group">
                <label for="personal_id">身份證字號</label>
                <input type="text" class="form-control" name="personal_id" placeholder="身份證字號" pattern="^\w\d+$" title="請填寫台灣地區之身份證字號" required>
            </div>
            <div class="form-group">
                <label for="birthday">出生年月日 <small>(yyyy-mm-dd)</small></label>
                <input type="text" class="form-control" name="birthday" placeholder="出生年月日（如 1999-01-01）" pattern="^((20|19)([02468][1235679]|[13579][01345789])\-(((0[13578]|1[02])\-(0[1-9]|[12]\d|3[01]))|((0[469]|11)\-(0[1-9]|[12]\d|3[0]))|(02\-(0[1-9]|1\d|2[1-8])))|(20|19)([02468][048]|[13579][26])\-(((0[13578]|1[02])\-(0[1-9]|[12]\d|3[01]))|((0[469]|11)\-(0[1-9]|[12]\d|3[0]))|(02\-(0[1-9]|1\d|2[1-9]))))$" title="請填寫格式如 1999-01-01 格式的日期" required>
            </div>
            <div class="form-group">
                <label for="school">就讀學校</label>
                <input type="text" class="form-control" name="school" placeholder="就讀學校" title="請填寫您就讀的學校" required>
            </div>
            <div class="form-group">
                <label for="sex">現在的生理性別<small>（用於住宿分房）</small></label>
                <div>
                    <label><input type="radio" name="sex" value="1" required> 男性</label>
                    <label><input type="radio" name="sex" value="2" required> 女性</label>
                </div>
            </div>
            <div class="form-group">
                <label for="garment_size">衣服尺寸<small>（<a href="#">尺寸對照表</a>）</small></label>
                <div>
                    <label><input type="radio" name="garment_size" value="0" required> S</label>
                    <label><input type="radio" name="garment_size" value="1" required> M</label>
                    <label><input type="radio" name="garment_size" value="2" required> L</label>
                    <label><input type="radio" name="garment_size" value="3" required> XL</label>
                    <label><input type="radio" name="garment_size" value="4" required> XXL</label>
                </div>
            </div>
            <div class="form-group">
                <label for="eating">飲食習慣</label>
                <div id="eating-checkbox-group">
                    <label><input type="checkbox" name="eating[0]"> 葷食</label>
                    <label><input type="checkbox" name="eating[1]"> 純素</label>
                    <label><input type="checkbox" name="eating[2]"> 蛋奶素</label>
                    <label><input type="checkbox" name="eating[3]"> 不吃雞</label>
                    <label><input type="checkbox" name="eating[4]"> 不吃豬</label>
                    <label><input type="checkbox" name="eating[5]"> 不吃牛</label>
                    <label><input type="checkbox" name="eating[6]"> 不吃海鮮</label>
                    <label><input type="checkbox" name="eating[7]"> 其它（請填寫）</label>
                    <input type="text" class="form-control" name="eating_other" placeholder="其它飲食習慣">
                </div>
            </div>
            <div class="form-group">
                <label for="password">密碼 <small>（檢視報名資料時需要）</small></label>
                <input type="password" class="form-control" name="password" placeholder="密碼">
            </div>
            <div class="form-group">
                <label for="invite_code">邀請碼 <small>（若無則可留空）</small></label>
                <input type="text" class="form-control" name="invite_code" placeholder="邀請碼" title="請填寫可用之邀請碼">
            </div>
            <div class="form-group">
                <label for="other_details">其它注意事項<small>（非必填）</small></label>
                <textarea class="form-control" rows="10" name="other_details" placeholder="其它注意事項（非必填）"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="emergency_contact">緊急聯絡人</label>
                <input type="text" class="form-control" name="emergency_contact" placeholder="緊急聯絡人" title="請填寫緊急聯絡人姓名" required>
            </div>
            <div class="form-group">
                <label for="emergency_relationship">緊急聯絡人與您的關係</label>
                <input type="text" class="form-control" name="emergency_relationship" placeholder="與緊急聯絡人之關係" title="請填寫您與緊急聯絡人之關係（如父子等）" required>
            </div>
            <div class="form-group">
                <label for="emergency_phone">緊急聯絡人聯絡電話</label>
                <input type="phone" class="form-control" name="emergency_phone" placeholder="緊急聯絡人聯絡電話" pattern="^(09\d{8}|0\d[1-8]{7,8})$" title="請填寫緊急聯絡人之聯絡電話，限填入台灣地區之手機號碼或含區碼之市內電話" required>
            </div>
            <div class="form-group">
                <label for="same_as_emergency"><input type="checkbox" name="same_as_emergency"> 緊急聯絡人同保險受益人</label>
            </div>
            <div class="form-group">
                <label for="beneficiary">保險受益人</label>
                <input type="text" class="form-control" name="beneficiary" placeholder="保險受益人" title="請填寫保險受益人姓名" required>
            </div>
            <div class="form-group">
                <label for="beneficiary_relationship">保險受益人與您的關係</label>
                <input type="text" class="form-control" name="beneficiary_relationship" placeholder="與保險受益人之關係" title="請填寫您與保險受益人之關係（如父子等）" required>
            </div>
            <div class="form-group">
                <label for="beneficiary_relationship">保險受益人聯絡電話</label>
                <input type="phone" class="form-control" name="beneficiary_phone" placeholder="保險受益人聯絡電話" pattern="^(09\d{8}|0\d[1-8]{7,8})$" title="請填寫保險受益人之聯絡電話，限填入臺灣地區之手機號碼或含區碼之市內電話" required>
            </div>
            <div class="alert alert-warning" role="alert">
                <p><b>注意！</b> 若您未滿 20 歲，緊急聯絡人與保險受益人需為您的監護人！</p>
            </div>
            <p class="text-right">送出報名表格即代表您同意<a href="#" data-toggle="modal" data-target="#modal-pi">《個人資料蒐集與利用條款》</a>與<a href="#" data-toggle="modal" data-target="#modal-tos">《報名須知》</a></p>
            <div class="pull-right">
                <button type="submit" class="btn btn-lg btn-success">確認無誤，立即報名！</button>
           </div>
        </div>
    </form>
</section>

<div class="modal fade" id="modal-pi" tabindex="-1" role="dialog" aria-labelledby="modal-pi-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-pi-label">個人資料蒐集與利用條款</h4>
            </div>
            <div class="modal-body">
<h4>前言</h4><br>
  本條款係針對主辦單位（國立東華大學資訊工程學系與東部開源學生社群，下簡稱甲方）利用報名者（下簡稱乙方）之個人資料（下簡稱個資）時之說明，乙方報名時應詳閱並同意本條款之內容。<br>
  本條款之訂定符合我國《個人資料保護法》，如有未盡事宜，以該法律為主。<br>
  依照我國《民法》規定，若乙方為未滿二十歲之人則視為限制行為能力人，則參與甲方提供之活動時應經乙方法定監護人之同意，且乙方法定監護人需詳閱並同意本條款之內容。<br>
<br>
<h4>條款期間與條款之終止</h4><br>
  甲方於條款期間若因作業需要則可使用乙方個資。<br>
  甲方若於條款期間因作業需要提供第三方乙方之個人資料，亦遵守本條款，請參閱本條款之「提供第三方之個人資料」節。<br>
  本活動作業結束即視為本條款之終止<br>
  依照我國《個人資料保護法》之規定，活動期間乙方有權隨時要求甲方停止蒐集、利用乙方個資之權利，乙方要求甲方刪除個人資料的同時，亦視為本條款之終止，同時也視為放棄參與甲方所舉辦之活動。<br>
  如遇乙方死亡則視為本契約終止。<br>
<br>
<h4>提供第三方之個人資料</h4><br>
  甲方因活動需要需提供下列個資給予特定之第三方單位：<br>
    教育部補助扎根高中職資訊科學教育計畫：姓名、所屬學校、學生證影本<br>
    教育部資訊志工計畫東華大學學習科技資訊志工團隊：姓名、東華大學會館、姓名<br>
    保險公司：姓名、身份證字號、出生年月日、、保險受益人、保險受益人關係<br>
<br>
<h4>免責事項</h4><br>
  若因不可抗因素導致甲方存有之乙方之個人資料遭不法之第三者非法存取，甲方將全力協助乙方通過法律途徑索取賠償。<br>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tos" tabindex="-1" role="dialog" aria-labelledby="modal-tos-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-tos-label">報名須知</h4>
            </div>
            <div class="modal-body">
哈囉！花蓮高工、花蓮高商、花蓮高農的同學們大家好！東華大學資訊扎根計畫為了鼓勵花蓮的高職生們積極參與資訊冬令營，<br>
所以我們推出了只有三校學生獨享的優惠方案哦！<br>
<br>
4人一起報名，每人可減免400元<br>
6人一起報名，每人可減免600元<br>
8人一起報名，每人可減免800元<br>
（小提醒：這個優惠可以和一般團體報名方案一起使用不衝突，但是只有三校學生才有減免哦！）<br>
例如：<br>
2 名花商學生 + 2 其他校學生 = 4人團體報名 + 2 人三校方案 （也就是他校學生報名費為 3000，花商學生報名費為 2600 哦！）<br>
<br>
<h4>取消報名</h4><br>
哈囉，臨時有事沒辦法參加營隊的朋友，請參照下列的說明進行退費喔！<br>
<br>
<h5>信箱取消報名</h5><br>
寄信至 contact@soscet.org<br>
標題請用「我要取消報名開源！資訊萌芽營！」<br>
註明  **學員姓名**、**身分證字號末五碼**、**我要取消報名**、**退費匯款戶頭**<br>
<br>
並靜待一至二個工作天工作人員就會回信跟您確認退費手續之後就完成囉！<br>
匯款成功後我們會寄一封確認信至您的信箱，也請關注我們的回信、確認匯款成功哦！<br>
<br>
歡迎在信中寫下對我們的任何意見，非常感謝。<br>
<br>
<h5>電話取消報名</h5><br>
連絡人： <br>
傅柏軒 0975-383-086<br>
林育慈 0953-381-533<br>
周孟潔 0931-111-127<br>
<br>
請在電話一開始就說明來意「我要取消報名開源！資訊萌芽營！」<br>
並且告知 **學員姓名**、**身分證字號末五碼**、**退費匯款戶頭**、**如何通知已經匯款**<br>
這樣就可以了喔！<br>
            </div>
        </div>
    </div>
</div>

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

    //Submit
    $('button[type="submit"]').click(function() {
      //Check form validation
      if (!$('form')[0].checkValidity()) return;

      //Preparing for post data.
      var postData = {};
      postData['name'] = $('input[name="name"]').val();
      postData['phone'] = $('input[name="phone"]').val();
      postData['email'] = $('input[name="email"]').val();
      postData['personal_id'] = $('input[name="personal_id"]').val();
      postData['birthday'] = $('input[name="birthday"]').val();
      postData['school'] = $('input[name="school"]').val();
      postData['sex'] = $('input[name="sex"]:checked').val();
      postData['garment_size'] = $('input[name="garment_size"]:checked').val();
      postData['password'] = $('input[name="password"]').val();
      postData['invite_code'] = $('input[name="invite_code"]').val();
      postData['other_details'] = $('textarea[name="other_details"]').val();
      postData['emergency_contact'] = $('input[name="emergency_contact"]').val();
      postData['emergency_phone'] = $('input[name="emergency_phone"]').val();
      postData['emergency_relationship'] = $('input[name="emergency_relationship"]').val();
      postData['beneficiary'] = $('input[name="beneficiary"]').val();
      postData['beneficiary_phone'] = $('input[name="beneficiary_phone"]').val();
      postData['beneficiary_relationship'] = $('input[name="beneficiary_relationship"]').val();
      //(for eating[])
      postData['eating'] = {};
      postData['eating'][0] = $('input[name="eating[0]"]').prop('checked') ? 1 : 0;
      postData['eating'][1] = $('input[name="eating[1]"]').prop('checked') ? 1 : 0;
      postData['eating'][2] = $('input[name="eating[2]"]').prop('checked') ? 1 : 0;
      postData['eating'][3] = $('input[name="eating[3]"]').prop('checked') ? 1 : 0;
      postData['eating'][4] = $('input[name="eating[4]"]').prop('checked') ? 1 : 0;
      postData['eating'][5] = $('input[name="eating[5]"]').prop('checked') ? 1 : 0;
      postData['eating'][6] = $('input[name="eating[6]"]').prop('checked') ? 1 : 0;
      postData['eating'][7] = $('input[name="eating[7]"]').prop('checked') ? 1 : 0;
      postData['eating_other'] = $('input[name="eating_other"]').val();

      //Post
      $.post('<?php echo site_url('event/booking'); ?>', postData, function(data) {
        //If success
        if (data.success) {
          return window.location = data.redirect;
        }

        //Otherwise, show errors.
        if (data.error) {
          alert(data.error);
        }
      });

      return false;
    });
  });
</script>

