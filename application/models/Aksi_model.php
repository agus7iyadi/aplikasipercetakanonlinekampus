<?php

class aksi_model extends CI_model{
    
    public function getAlluser()
    {
        return $this->db->get('user')->result_array();
    }
    public function hitung()
    {
        // // select sum(price) from (select items.price from items order by items.price desc limit 3) as subt;
        // $sql ="SELECT sum(jumlahtotal) as jumlahtotal from tbl_file LIMIT 5"; 
        // $result = $this->db->query($sql);
        // return $result->row()->jumlahtotal;
        // return $data->result_array();
       $this->db->select_sum('jumlahtotal');
        $query = $this->db->get('tbl_file'); 
        return $query;
    }

    public function getUserid($id)
    {
        return $this->db->get_where('user',['id'=>$id])->row_array();
    }
    public function getUserfileid($id)
    {
        return $this->db->get_where('tbl_file',['id'=>$id])->row_array();
    }
    public function ubahDatatransaksi()
    {
        $data =[
            "status"=>$this->input->post('status',true),
        ];
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('tbl_file',$data);
    }
    public function ubahDataAktif()
    {
        $data =[
            "is_active"=>$this->input->post('is_active',true),
        ];
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('user',$data);
    }
    public function insert($data)
	{
		$this->db->insert('tbl_file',$data);
    }
    public function hapusdata($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('user');
    }
    public function hapusdatatransaksi($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_file');
    }

}