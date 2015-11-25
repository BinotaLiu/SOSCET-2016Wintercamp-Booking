<section id="booking-review" class="col-sm-12 col-md-7">
    <h2>報名資料</h2>
    <style>
        #info-table th { text-align: right; width: 17rem; }
    </style>
    <table id="info-table" class="table table-bordered">
        <tbody>
            <tr><th>姓名：</th>
                <td><?php echo mb_substr($booking->name, 0, 1) . str_repeat('○', mb_strlen($booking->name) - 1); ?></tr>
            <tr><th>聯絡電話：</th>
                <td><?php echo substr($booking->phone, 0, 4) . str_repeat('*', strlen($booking->phone) - 4); ?></tr>
            <tr><th>身份證字號：</th>
                <td><?php echo substr($booking->personal_id, 0, 4) . str_repeat('*', strlen($booking->personal_id) - 4); ?></tr>
            <tr><th>出生年月日：</th>
                <td><?php echo substr($booking->birthday, 0, 8) . '**'; ?></tr>
            <tr><th>就讀學校：</th>
                <td><?php echo substr($booking->school, 0, 3) . str_repeat('△', mb_strlen($booking->school) - 3); ?></tr>
            <tr><th>生理性別：</th>
                <td><?php
                      switch($booking->sex) {
                          case '1':
                              echo '男性';
                              break;
                          case '2':
                              echo '女性';
                              break;
                      }
                    ?></tr>
            <tr><th>衣服尺寸：</th>
                <td><?php
                        switch($booking->garment_size) {
                          case '0':
                              echo 'SSS';
                              break;
                          case '1':
                              echo 'SS';
                              break;
                          case '2':
                              echo 'S';
                              break;
                          case '3':
                              echo 'M';
                              break;
                          case '4':
                              echo 'L';
                              break;
                          case '5':
                              echo 'XL';
                              break;
                          case '6':
                              echo 'XXL';
                              break;
                        }
                    ?></tr>
            <tr><th>緊急聯絡人：</th>
                <td><?php echo mb_substr($booking->emergency_contact, 0, 1) . str_repeat('○', mb_strlen($booking->emergency_contact) - 1); ?></tr>
            <tr><th>緊急聯絡人關係：</th>
                <td><?php echo $booking->emergency_relationship; ?></tr>
            <tr><th>緊急聯絡人聯絡電話：</th>
                <td><?php echo substr($booking->emergency_phone, 0, 4) . str_repeat('*', strlen($booking->emergency_phone) - 4); ?></tr>
            <tr><th>飲食習慣：</th>
                <td><?php
                      $eating = unserialize($booking->eating);
                      $eating_chinese = ['葷食', '純素', '蛋奶素', '不吃雞', '不吃豬', '不吃牛', '不吃海鮮', '其它'];
                      foreach($eating as $i => $v) {
                          if($v) echo $eating_chinese[$i] . '<br>';
                      }
                      if($eating[7]) echo $booking->eating_other;
                    ?></tr>
            <tr><th>特殊注意事項：</th>
                <td><?php echo $booking->other_details; ?></tr>
            <tr><th>保險受益人：</th>
                <td><?php echo mb_substr($booking->beneficiary, 0, 1) . str_repeat('○', mb_strlen($booking->beneficiary) - 1); ?></tr>
            <tr><th>保險受益人關係：</th>
                <td><?php echo $booking->beneficiary_relationship; ?></tr>
            <tr><th>保險受益人聯絡電話：</th>
                <td><?php echo substr($booking->beneficiary_phone, 0, 4) . str_repeat('*', strlen($booking->beneficiary_phone) - 4); ?></tr>
        </tbody>
    </table>
</section>
<section id="booking-payment" class="col-sm-12 col-md-5">
    <h2>上傳學生證</h2>
    <?php if(empty($booking->card_image)) {
          echo form_open_multipart("event/upload_card/{$booking->id}/{$booking->token}"); ?>
        <input type="file" name="card">
        <button type="submit" class="btn btn-primary">上傳</button>
    </form>
    <?php } else { ?>
    <div class="alert alert-success">
        <p>您已上傳學生證！無需重複上傳！</p>
    </div>
    <?php } ?>
</section>
<section id="booking-payment" class="col-sm-12 col-md-5">
    <h2>付款資料</h2>
    <div class="col-sm-12">
        <p><a href="<?php echo site_url("event/payment/credit/{$booking->id}/{$booking->token}"); ?>" class="btn btn-default">使用 信用卡 付款（一次付清）</a></p>
        <p><a href="<?php echo site_url("event/payment/barcode/{$booking->id}/{$booking->token}"); ?>" class="btn btn-default">使用 超商條碼 付款</a></p>
        <p><a href="<?php echo site_url("event/payment/cvs/{$booking->id}/{$booking->token}"); ?>" class="btn btn-default">使用 超商代碼 付款</a></p>
        <p><a href="<?php echo site_url("event/payment/atm/{$booking->id}/{$booking->token}"); ?>" class="btn btn-default">使用 ATM轉賬 付款</a></p>
        <p><a href="<?php echo site_url("event/payment/webatm/{$booking->id}/{$booking->token}"); ?>" class="btn btn-default">使用 WebATM 付款</a></p>
        <h4>費用說明</h4>
        <b>費用為 <?php echo $price; ?> + 金流手續費，各付款方式手續費如下</b>
        <table class="table table-bordered">
            <thead><tr>
                <th>付款方式</th>
                <th>手續費</th>
                <th>總金額</th>
            </tr></thead>
            <tbody>
                <tr><td>信用卡</td>
                    <td><?php echo round(($price / 0.972) - $price); ?></td>
                    <td><?php echo round(($price / 0.972)); ?></td></tr>
                <tr><td>超商條碼</td>
                    <td>25</td>
                    <td><?php echo $price + 25; ?></td></tr>
                <tr><td>超商代碼</td>
                    <td>30</td>
                    <td><?php echo $price + 30; ?></td></tr>
                <tr><td>ATM 轉賬</td>
                    <td><?php echo round(($price / 0.99) - $price); ?></td>
                    <td><?php echo round(($price / 0.99)); ?></td></tr>
                <tr><td>WebATM</td>
                    <td><?php echo round(($price / 0.99) - $price); ?></td>
                    <td><?php echo round(($price / 0.99)); ?></td></tr>
            </tbody>
        </table>
    </div>
</section>


