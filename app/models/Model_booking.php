<?php

class Model_Booking extends CI_Model {

    public function addBooking($data) {
        if(empty($data['created_at'])) $data['created_at'] = time();
        if(empty($data['modified_at'])) $data['modified_at'] = time();
        if(empty($data['token'])) $data['token'] = strtolower(random_string('alnum', 32));
        if(empty($data['invite_code'])) $data['invite_code'] = strtolower(random_string('alnum', 8));
        $salt = random_string('alnum', 8);
        $data['password'] = $salt . '$' . md5($data['password'] . $salt);

        $this->db->insert('bookings', $data);

        $id = $this->db->insert_id();
        $token = $data['token'];

        return [$id, $token];
    }

    public function getBooking($id, $token, $password, $skipAuthentication = false) {
        $query = $this->db->where(['id' => $id,
                                   'token' => $token])
                          ->get('bookings');
        
        if($skipAuthentication === true) return $query->row();
        $auth = explode('$', $query->row()->password);
        if ($auth[1] == md5($password . $auth[0])) {
            return $query->row();
        } else {
            return;
        }
    }

    public function countBookings($where) {
        return $this->db->where($where)
                        ->count_all_results('bookings');
    }

    public function editBooking($id, $data) {
        if(empty($data['modified_at'])) $data['modified_at'] = time();

        $this->db->where(['id' => $id])
                 ->update('bookings', $data);
    }

    public function getPayments($booking) {
        $this->db->where(['booking' => $booking]);
        $query = $this->db->where(['booking' => $booking])
                          ->get('payments');

        return $query->result();
    }

    public function addPayment($data) {
        if(empty($data['created_at'])) $data['created_at'] = time();
        if(empty($data['modified_at'])) $data['modified_at'] = time();
        $this->db->insert('payments', $data);
        return $this->db->insert_id();
    }

}

