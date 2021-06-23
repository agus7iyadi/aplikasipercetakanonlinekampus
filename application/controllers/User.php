<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ceklogin();
    }
    public function index()
    {
        // mengirim nama bar atas page
        $data['title'] = 'My Profile';
        //ambil data dari sesion
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])
            ->row_array();

        //mengarahkan ke dashboard admin
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer',$data);

        // echo 'selamat datang ' . $data['user']['nama'];
        // $data['user'] = $this
    }

    // method edit profile
    public function edit()
    {
        // mengirim nama bar atas page
        $data['title'] = 'Edit Profile';
        //ambil data dari sesion
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])
            ->row_array();
        // var_dump($data['user']);
        // die;

        $this->form_validation->set_rules('nama','Nama','required|trim|min_length[5]',[
            'required' => 'Nama Tidak Boleh Kosong',
            'min_length' => 'Nama terlalu pendek'
        ]);

        if($this->form_validation->run()==false){

            //mengarahkan ke dashboard admin
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer',$data);
        }else {
            $name =$this->input->post('nama');
            $email = $this->input->post('email');

            //jika ada gambar yang diupload
            $upload_image = $_FILES['image']['name'];
            // var_dump($upload_image);
            // die;

            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/admin/img/profil';

                $this->load->library('upload',$config);

                if($this->upload->do_upload('image')){
                    $old_image =$data['user'] ['image'];
                    if($old_image !='default.jpg'){
                        unlink(FCPATH.'assets/admin/img/profil/'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image',$new_image);
                }else{
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert 
                    alert-danger" role="alert">Update gagal ! </div>');
                    redirect('user');
                }
            }



            $this->db->set('nama',$name);
            $this->db->where('email',$email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Update Sukses !</div>');
            redirect('user');
        }
    }

    public function gantipassword()
    {
        // mengirim nama bar atas page
        $data['title'] = 'Ganti Password';
        //ambil data dari sesion
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])
            ->row_array();
        $this->form_validation->set_rules('password_saat_ini','Password Sekarang',
        'required|trim');
        $this->form_validation->set_rules('password_baru1','Password Baru',
        'required|trim|min_length[3]|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2','Ulangi Password Baru',
        'required|trim|min_length[3]|matches[password_baru1]');

            if($this->form_validation->run()==false){

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('user/gantipassword', $data);
                $this->load->view('templates/footer',$data);
            }else {
                $datapassword =$this->input->post('password_saat_ini');
                $passwordbaru =$this->input->post('password_baru1');
                if(!password_verify($datapassword, $data['user']['password'])){
                    $this->session->set_flashdata('message', '<div class="alert 
                    alert-danger" role="alert">Password Salah !</div>');
                    redirect('user/gantipassword');
                }else {
                    if($datapassword == $passwordbaru){
                        $this->session->set_flashdata('message', '<div class="alert 
                        alert-danger" role="alert">Password Baru sama dengan Password lama</div>');
                        redirect('user/gantipassword');
                    }else {
                        $password_hash = password_hash($passwordbaru, PASSWORD_DEFAULT);
                        
                        $this->db->set('password',$password_hash);
                        $this->db->where('email',$this->session->userdata('email'));
                        $this->db->update('user');

                        $this->session->set_flashdata('message', '<div class="alert 
                        alert-success" role="alert">Password Berhasil DiPerbaharui !</div>');
                        redirect('user/gantipassword');


                    }
                }
            }


        

       
    }
    
    public function upload()
    {
          // mengirim nama bar atas page
          $data['title'] = 'Upload';
          //ambil data dari sesion
          $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])
              ->row_array();
  
          $this->form_validation->set_rules('email','email ','required');
          $this->form_validation->set_rules('fjudulorderan','fjudulorderan ','required|trim|min_length[5]|max_length[25]',[
              'required'=>'Judul Order Tidak Boleh Kosong',
              'min_length' => 'judul terlalu pendek',
              'max_length' => 'judul terlalu panjang maximal 25 karakter'
          ]);
          $this->form_validation->set_rules('fpilihan','fpilihan ','required');
          $this->form_validation->set_rules('fpaket','fpaket ','required');
        //   $this->form_validation->set_rules('fkertaswarna','fkertaswarna','required');
        //   $this->form_validation->set_rules('fkertaswarnahitam','fkertaswarnahitam','required');
          $this->form_validation->set_rules('fdeskripsi','fdeskripsi ','required|trim|min_length[5]|max_length[200]',[
            'required'=>'deskripsi Order Tidak Boleh Kosong',
            'min_length' => 'deskripsi Order terlalu pendek',
            'max_length' => 'deskripsi Order terlalu panjang maximal 200 karakter'
        ]);
          if($this->form_validation->run()==false)
          {
              $this->load->view('templates/header', $data);
              $this->load->view('templates/sidebar', $data);
              $this->load->view('templates/topbar', $data);
              $this->load->view('user/upload', $data);
              $this->load->view('templates/footer',$data);
          }else{
  
  
  
          //Untuk Upload File
          $config['allowed_types'] = 'pdf';
          $config['upload_path']   = './assets/file_upload';
          $config['max_size']      = 2048;
          $config['encrypt_name'] = TRUE;
  
          $this->load->library('upload',$config);
          $warnahitam = $this->input->post('fkertaswarnahitam');
          $warnah = $this->input->post('fkertaswarna');
  
  
              if( ! $this->upload->do_upload('filename'))
              {
                $this->session->set_flashdata('message', '<div class="alert 
                alert-danger" role="alert">File Gagal di Upload, gunakan Format Pdf !</div>');
                redirect('user/upload');
                //   $error = array('error' => $this->upload->display_errors());
                  
              }elseif (($warnah<=0 && $warnahitam<=0)){
                $this->session->set_flashdata('message', '<div class="alert 
                alert-danger" role="alert">File Gagal di Upload, cek kembali form jumlah kertas !</div>');
                redirect('user/upload');
              }
              else{
                  $email = $this->input->post('email');
                  $judulorder = $this->input->post('fjudulorderan');
                  $pilihan = $this->input->post('fpilihan');
                  $paket = $this->input->post('fpaket');
                  $warnahitam = $this->input->post('fkertaswarnahitam');
                  $warnah = $this->input->post('fkertaswarna');
                  $deskripsi = $this->input->post('fdeskripsi');                  

                  if($paket==1){
                      if($pilihan==1){
                        $harga = ($warnahitam*500)+($warnah*1000);
                      }else{
                        $harga = ($warnahitam*500)+($warnah*1000)+2000;  
                      }
                  }else{
                      if($pilihan==1){
                        $harga = ($warnahitam*500)+($warnah*1000)+2000;
                      }else{
                        $harga = ($warnahitam*500)+($warnah*1000)+2000+2000;
                      }
                  }
                  
                  
                  $jumlahtotal = $harga;
                  

                  $upload_data = $this->upload->data();
                  
  
                  $data = array(
                  'email'=>$email,
                  'namafiletampil'=>$judulorder,
                  'pengambilan'=>$pilihan,
                  'paket' => $paket,
                  'jwarna' => $warnah,
                  'jhitamputih' => $warnahitam,
                  'deskripsi' => $deskripsi,
                  'jumlahtotal' => $jumlahtotal,
                  'filename' => $upload_data['file_name'],
                  'status'=>1,
                
                );
  
                  $this->aksi_model->insert($data);
                  $this->session->set_flashdata('message', '<div class="alert 
                        alert-success" role="alert">File Berhasil Di Upload !</div>');
                  redirect('user/upload');
  }
  }
    

}

public function transaksiuser()
{
    // mengirim nama bar atas page
    $data['title'] = 'Transaksi User';
    //ambil data dari sesion
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])
        ->row_array();
    $this->db->where('status =',1);
    $data['transaksiuser'] = $this->db->get_where('tbl_file', ['email' =>
        $this->session->userdata('email')])
            ->result_array();
    // $data['transaksiuser'] = $this->db->get('tbl_file')->result_array();
    

    //mengarahkan ke dashboard admin
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/transaksiuser', $data);
    $this->load->view('templates/footer',$data);

}

public function prosesorder()
{
    // mengirim nama bar atas page
    $data['title'] = 'Proses Order';
    //ambil data dari sesion
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])
        ->row_array();
    $this->db->where('status =',2);
    $data['transaksiuser'] = $this->db->get_where('tbl_file', ['email' =>
        $this->session->userdata('email')])
            ->result_array();
    // $data['transaksiuser'] = $this->db->get('tbl_file')->result_array();
    

    //mengarahkan ke dashboard admin
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/prosesorder', $data);
    $this->load->view('templates/footer',$data);

}


public function historitransaksi()
{
    // mengirim nama bar atas page
    $data['title'] = 'Proses Order';
    //ambil data dari sesion
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])
        ->row_array();
    $this->db->where('status !=',1);
    $this->db->where('status !=',2);
    $data['transaksiuser'] = $this->db->get_where('tbl_file', ['email' =>
        $this->session->userdata('email')])
            ->result_array();
    // $data['transaksiuser'] = $this->db->get('tbl_file')->result_array();
    

    //mengarahkan ke dashboard admin
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/historitansaksi', $data);
    $this->load->view('templates/footer',$data);

}





public function edittransaksiuser($id)
{
     // mengirim nama bar atas page
     $data['title'] = 'Transaksi User';
     $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])
        ->row_array();
     $data['userid'] = $this->aksi_model->getUserfileid($id);
     $this->form_validation->set_rules('namafiletampil','namafiletampil','required');
    
     
    if($this->form_validation->run()==false){

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edittransaksiuser', $data);
        $this->load->view('templates/footer',$data);
    } else {
    $this->aksi_model->ubahDatatransaksi();
    $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Status Transaksi Sudah Dirubah
            </div>');
    redirect('user/transaksiuser');
}
}


}