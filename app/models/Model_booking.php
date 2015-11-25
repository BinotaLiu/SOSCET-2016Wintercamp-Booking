<?php

class Model_Booking extends CI_Model {

    public function addBooking($data) {
        if(empty($data['created_at'])) $data['created_at'] = time();
        if(empty($data['modified_at'])) $data['modified_at'] = time();
        if(empty($data['token'])) $data['token'] = strtolower(random_string('alnum', 32));
        if(empty($data['invite_code'])) $data['invite_code'] = strtolower(random_string('alnum', 8));

        $this->db->insert('bookings', $data);

        $id = $this->db->insert_id();
        $token = $data['token'];

        return [$id, $token];
    }

    public function getBooking($id, $token) {
        $query = $this->db->where(['id' => $id,
                                   'token' => $token])
                          ->get('bookings');
        return $query->row();
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

