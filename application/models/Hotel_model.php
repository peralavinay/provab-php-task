<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_model extends CI_Model {

	public function fetch_hotels()
    {
        return $this->db->get('hotel')->result_array();
    }

    public function get_hotel($id)
    {
        return $this->db->where('hotel_id',$id)->get('hotel')->result_array();
    }
}

?>