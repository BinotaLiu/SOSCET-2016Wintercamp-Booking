<?php

class Event extends CI_Controller {
    const FILE_PATH = './storage/uploads/';
    const AMOUNT = 3200;

    public function index() {
        $this->load->helper('form');
        $content = $this->load->view('event/event', null, true);
        $this->load->view('layouts/master', ['content' => $content]);
    }

    public function review($id, $token) {
        $this->load->model('model_booking');
        $booking = $this->model_booking->getBooking($id, $token);
        if (empty($booking)) { return show_404(); }

        $this->load->view('event/review', $booking);
    }

    public function booking() {
        if ($this->input->method() !== 'post') { return; } //This method only allow post method

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', '姓名', 'required');
        $this->form_validation->set_rules('email', '電子郵件', 'required');
        $this->form_validation->set_rules('phone', '電話', 'regex_match[/0[2-9]\d{7,8}/]');
        $this->form_validation->set_rules('personal_id', '身份證字號', 'regex_match[/[A-Z]\d+/]');
        $this->form_validation->set_rules('birthday', '出生年月日', 'regex_match[/(20([02468][1235679]|[13579][01345789])\-(((0[13578]|1[02])\-(0[1-9]|[12]\d|3[01]))|((0[469]|11)\-(0[1-9]|[12]\d|3[0]))|(02\-(0[1-9]|1\d|2[1-8])))|20([02468][048]|[13579][26])\-(((0[13578]|1[02])\-(0[1-9]|[12]\d|3[01]))|((0[469]|11)\-(0[1-9]|[12]\d|3[0]))|(02\-(0[1-9]|1\d|2[1-9]))))/]');
        $this->form_validation->set_rules('school', '就讀學校', 'required');
        $this->form_validation->set_rules('sex', '性別', 'in_list[1,2]');
        $this->form_validation->set_rules('garment_size', '衣服尺寸', 'numeric');
        $this->form_validation->set_rules('emergency_contact', '緊急聯絡人', 'required');
        $this->form_validation->set_rules('emergency_relationship', '緊急聯絡人關係', 'required');
        $this->form_validation->set_rules('emergency_phone', '緊急聯絡人電話', 'required|regex_match[/0[2-9]\d{7,8}/]');
        $this->form_validation->set_rules('eating', '飲食習慣', 'in_list[1,2,9]');
        $this->form_validation->set_rules('beneficiary', '保險受益人', 'required');
        $this->form_validation->set_rules('beneficiary_relationship', '保險受益人關係', 'required');
        $this->form_validation->set_rules('beneficiary_phone', '保險受益人電話', 'require|regex_match[/0[2-9]\d{7,8}/]');
        $this->form_validation->set_rules('invite_code', '邀請代碼', 'alnum');

        if ($this->form_validation->run() === false) {
            $this->output->set_content_type('application/json')
                         ->set_output(json_encode(['error' => validation_errors()]));
            return;
        }

        $data = [];
        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        $data['school'] = $this->input->post('school');
        $data['personal_id'] = $this->input->post('personal_id');
        $data['birthday'] = $this->input->post('birthday');
        $data['school'] = $this->input->post('school');
        $data['sex'] = $this->input->post('sex');
        $data['garment_size'] = $this->input->post('garment_size');
        $data['emergency_contact'] = $this->input->post('emergency_contact');
        $data['emergency_relationship'] = $this->input->post('emergency_relationship');
        $data['emergency_phone'] = $this->input->post('emergency_phone');
        $data['eating'] = $this->input->post('eating');
        $data['eating_other'] = $this->input->post('eating_other');
        $data['other_details'] = $this->input->post('other_details');
        $data['beneficiary'] = $this->input->post('beneficiary');
        $data['beneficiary_relationship'] = $this->input->post('beneficiary_relationship');
        $data['beneficiary_phone'] = $this->input->post('beneficiary_phone');
        $data['invite_code'] = $this->input->post('invite_code');

        $data['paid'] = false;

        $this->load->model('model_booking');
        list($id, $token) = $this->model_booking->addBooking($data);

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode(['success' => '已成功新增報名資料',
                                               'id' => $id,
                                               'token' => $token]));
    }

    public function upload_card($id, $token) {
        $this->load->model('model_booking');
        $booking = $this->model_booking->getBooking($id, $token);
        if (empty($booking)) { return show_404(); }

        $upload_config = [];
        $upload_config['upload_path'] = self::FILE_PATH;
        $upload_config['allowed_types'] = 'jpg|png';
        $upload_config['max_size'] = '2048';
        $upload_config['file_ext_tolower'] = true;
        $upload_config['file_name'] = $id . '_' . $token;

        $this->load->library('upload', $upload_config);

        if (!$this->upload->do_upload('card')) { return; }

        $this->model_booking->editBooking($id, ['card_image' => $this->upload->data('file_name')]);

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode(['success' => '已成功上傳學生證圖檔']));
    }

    public function get_card($id, $token) {
        $this->load->model('model_booking');
        $booking = $this->model_booking->getBooking($id, $token);
        if (empty($booking)) { return show_404(); }

        if (file_exists(FILE_PATH . $booking['card_image'])) { return; }

        $this->load->helper('file');

        $this->output->set_content_type(get_mime_by_extension(FILE_PATH . $booking['card_image']))
                     ->set_output(file_get_contents(FILE_PATH . $booking['card_image']));
    }

    public function payment($method, $id, $token) {
        $this->load->model('model_booking');
        $booking = $this->model_booking->getBooking($id, $token);
        if (empty($booking)) { return show_404(); }

        $this->load->library('user_agent');
        $this->load->helper('allpay_payment');
        $allpay_config = $this->config->item('allpay_payment');

        try {
            $aio = new AllInOne();
            $aio->ServiceURL = $allpay_config['ServiceURL'];
            $aio->HashKey = $allpay_config['HashKey'];
            $aio->HashIV = $allpay_config['HashIV'];
            $aio->MerchantID = $allpay_config['MerchantID'];

            $aio->Send['ReturnURL'] = site_url("event/payment_return/{$id}/{$token}");
            $aio->Send['ClientBackURL'] = site_url("event/review/{$id}/{$token}");
            $aio->Send['OrderResultURL'] = site_url("event/payment_return/{$id}/{$token}") . '?is_browser=true';
            $aio->Send['MerchantTradeNo'] = $booking['created_at'] . $booking['id'];
            $aio->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');
            switch($method) {
                case 'credit':
                    $aio->Send['ChoosePayment'] = PaymentMethod::Credit;
                    $fee = (self::AMOUNT / 0.972) - self::AMOUNT;
                    if ($fee < 5) $fee = 5;
                    $fee = round($fee);
                    break;
                case 'webatm':
                    $aio->Send['ChoosePayment'] = PaymentMethod::WebATM;
                    $fee = (self::AMOUNT / 0.99) - self::AMOUNT;
                    if ($fee > 30) $fee = 30;
                    if ($fee < 1) $fee = 1;
                    $fee = round($fee);
                    break;
                case 'atm':
                    $aio->Send['ChoosePayment'] = PaymentMethod::ATM;
                    $fee = (self::AMOUNT / 0.99) - self::AMOUNT;
                    if ($fee > 30) $fee = 30;
                    if ($fee < 1) $fee = 1;
                    $fee = round($fee);
                    break;
                case 'cvs':
                    $aio->Send['ChoosePayment'] = PaymentMethod::CVS;
                    $fee = 25;
                    break;
                case 'barcode':
                    $aio->Send['ChoosePayment'] = PaymentMethod::BARCODE;
                    $fee = 30;
                    break;
                default:
                    return show_404();
                    break;
            }
            $aio->Send['TotalAmount'] = self::AMOUNT + $fee;
            $aio->Send['TradeDesc'] = '開源！資訊萌芽營！報名費';

            $aio->Send['Remark'] = '';
            $aio->Send['ChooseSubPayment'] = PaymentMethodItem::None;
            $aio->Send['NeedExtraPaidInfo'] = ExtraPaymentInfo::No;
            $aio->Send['DeviceSource'] = ($this->agent->is_mobile() ? DeviceType::Mobile : DeviceType::PC);
            $aio->Send['Items'][] = ['Name' => '報名費',
                                     'Price' => self::AMOUNT,
                                     'Currency' => '元',
                                     'Quantity' => 1,
                                     'URL' => ''];
            $aio->Send['Items'][] = ['Name' => '金流手續費',
                                     'Price' => $fee,
                                     'Currency' => '元',
                                     'Quantity' => 1,
                                     'URL' => ''];

            $aio->SendExtend['PaymentInfoURL'] = site_url("event/payment_return/{$id}/{$token}");

            $this->output->set_output($aio->CheckOutString());
        } catch (Exception $e) {
        }
    }

    public function payment_return($id, $token) {
        $this->load->helper('allpay_payment');
        $this->load->model('model_booking');
        $booking = $this->model_booking->getBooking($id, $token);
        if (empty($booking)) { return show_404(); }

        $this->load->helper('allpay_payment');
        $allpay_config = $this->config->item('allpay_payment');

        try {
            $aio = new AllInOne();
            $aio->ServiceURL = $allpay_config['ServiceURL'];
            $aio->HashKey = $allpay_config['HashKey'];
            $aio->HashIV = $allpay_config['HashIV'];
            $aio->MerchantID = $allpay_config['MerchantID'];

            $aio_feadback = $aio->CheckOutFeedback();
            if (count($aio_feedback > 1)) {
                switch($aio_feedback['RtnCode']) {
                    case 1:
                    case 800:
                        //AIO 付款成功
                        $this->model_booking->editBooking($id, ['paid' => true]);
                        $messages = '付款成功';
                        break;
                    case 2:
                        //ATM 取號成功
                        $messages = "ATM 取號成功：\n繳款銀行代碼：{$aio_feedback['BankCode']}\n繳款虛擬帳號：{$aio_feedback['vAccount']}\n繳費期限：{$aio_feedback['ExpireDate']}";
                        break;
                    case 10100073:
                        //CVS/BARCODE 取號成功
                        switch($aio_feedback['PaymentType']) {
                            case PaymentMethod::CVS:
                                $messages = "超商代碼取號成功：\n超商代碼：{$aio_feedback['PaymentNo']}\n繳費期限：{$aio_feedback['ExpireDate']}";
                                break;
                            case PaymentMethod::BARCODE:
                                $messages = "超商條碼取號成功：\n第一段條碼：{$aio_feedback['Barcode1']}\n第二段條碼：{$aio_feedback['Barcode2']}\n第二段條碼：{$aio_feedback['Barcode2']}\n繳費期限：{$aio_feedback['ExpireDate']}";
                                break;
                            default:
                                throw new Exception('0|Invalid PaymentType');
                                break;
                        }
                        break;
                    default:
                        throw new Exception('0|Invalid RtnCode');
                        break;
                }
                $this->model_booking->addPayment([
                    'booking' => $id,
                    'payment_type' => $aio_feedback['PaymentType'],
                    'amount' => $aio_feedback['TradeAmt'],
                    'allpay' => $aio_feedback['TradeNo'],
                    'payment_at' => strtotime($aio_feedback['PaymentDate']),
                    'created_at' => strtotime($aio_feedback['TradeDate']),
                    'messages' => $message
                ]);

                if($this->input->get['is_browser'] == 1) {
                    redirect("event/review/{$id}/{$token}");
                } else {
                    $this->output->set_output('1|OK');
                }
            } else {
                throw new Exception('Return Value Errors');
            }
        } catch (Exception $e) {
            $this->output->set_output($e);
        }
    }
}
