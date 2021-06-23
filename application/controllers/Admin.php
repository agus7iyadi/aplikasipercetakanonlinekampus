<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ceklogin();
    }

    public function index()
    {
        // mengirim nama bar atas page
        $data['title'] = 'Home';
        //ambil data dari sesion
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])
            ->row_array();

        //mengarahkan ke dashboard admin
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer',$data);

        // echo 'selamat datang ' . $data['user']['nama'];
        // $data['user'] = $this
    }
    public function transaksi()
    {
        // mengirim nama bar atas page
        $data['title'] = 'Order';
        //ambil data dari sesion
        
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])
            ->row_array();
        $this->db->where('status !=',2);
        $this->db->where('status !=',3);
        $this->db->where('status !=',4);
        $this->db->order_by('create_at', 'DESC');
        $data['tblfile'] = $this->db->get('tbl_file')->result_array();
        

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi', $data);
        $this->load->view('templates/footer',$data);
    }

    public function historitransaksi()
    {
        // mengirim nama bar atas page
        $data['title'] = 'Histori Order';
        //ambil data dari sesion
        
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])
            ->row_array();
            
        $this->db->where('status !=',1,2);
        $this->db->order_by('create_at', 'DESC');
        $data['tblfile'] = $this->db->get('tbl_file')->result_array();
        

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/historiorder', $data);
        $this->load->view('templates/footer',$data);
    }

    public function edittransaksi($id)
    {
         // mengirim nama bar atas page
         $data['title'] = 'Edit Aktif';
         $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])
            ->row_array();
         $data['userid'] = $this->aksi_model->getUserfileid($id);
        //  $data['level'] = ['Aktif','Banned'];
        $this->form_validation->set_rules('email','email','required');
        

         
        if($this->form_validation->run()==false){

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edittransaksi', $data);
            $this->load->view('templates/footer',$data);
        } else {
        $this->aksi_model->ubahDatatransaksi();
        $this->session->set_flashdata('message', '<div class="alert 
                alert-success" role="alert">Status Transaksi Sudah Dirubah
                </div>');
        redirect('admin/transaksi');
    }
}
    
    public function hapusdatatransaksi($id)
    {
        // mengirim nama bar atas page
        $data['title'] = 'Edit Aktif';

        $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])
            ->row_array();
            
        $this->aksi_model->hapusdatatransaksi($id);
        $this->session->set_flashdata('message', '<div class="alert 
                alert-success" role="alert">Transaksi Sudah Dihapus
                </div>');
        redirect('admin/transaksi');
    }

    public function listuser()
    {
        // mengirim nama bar atas page
        $data['title'] = 'List User';
        //ambil data dari sesion
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])
            ->row_array();
        $this->db->where('role_id !=',1);
        $data['listuser'] = $this->db->get('user')->result_array();
        

        //mengarahkan ke dashboard admin
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/listuser', $data);
        $this->load->view('templates/footer',$data);

      
    }

    public function editlistuser($id)
    {
         // mengirim nama bar atas page
         $data['title'] = 'Edit Aktif';
         $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])
            ->row_array();
         $data['userid'] = $this->aksi_model->getuserid($id);
        //  $data['level'] = ['Aktif','Banned'];

        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('email','Email','required');
         
        if($this->form_validation->run()==false){

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editlistuser', $data);
            $this->load->view('templates/footer',$data);
        } else {
        $this->aksi_model->ubahDataaktif();
        $this->session->set_flashdata('message', '<div class="alert 
                alert-success" role="alert">Data Sudah Diedit
                </div>');
        redirect('admin/listuser');
    }
}

public function hapuslistuser($id)
{
     // mengirim nama bar atas page
     $data['title'] = 'Edit Aktif';
     $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])
        ->row_array();
     
    $this->aksi_model->hapusdata($id);
    $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Akun Sudah Dihapus
            </div>');
    redirect('admin/listuser');
}





    public function transaksiditerima()
    {
        // mengirim nama bar atas page
        $data['title'] = 'Halaman List User | Admin ';
        //ambil data dari sesion
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])
            ->row_array();

        //mengarahkan ke dashboard admin
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksiditerima', $data);
        $this->load->view('templates/footer',$data);

        // echo 'selamat datang ' . $data['user']['nama'];
        // $data['user'] = $this
    }

    public function transaksiditolak()
    {
        // mengirim nama bar atas page
        $data['title'] = 'Halaman Transaksi ditolak | Admin ';
        //ambil data dari sesion
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])
            ->row_array();

        //mengarahkan ke dashboard admin
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksiditerima', $data);
        $this->load->view('templates/footer',$data);
    }

    public function pengaturanadmin()
    {
        // mengirim nama bar atas page
        $data['title'] = 'Halaman Pengaturan | Admin ';
        //ambil data dari sesion
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])
            ->row_array();
    
        //mengarahkan ke dashboard admin
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengaturanadmin', $data);
        $this->load->view('templates/footer',$data);

      
    }

}
