<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Aksi_model');
    }

    //method halaman awal

    public function index()
    {
        // $data['test'] = $this->Aksi_model->hitung();
        // var_dump($data['test']);
        // die;
        $this->load->view('auth/index');
    }

    //method login
    public function login()
    {
        if($this->session->userdata('email')){
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'login page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],

                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    }
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert 
                alert-danger" role="alert">Password Anda Salah
              </div>');
                    redirect('auth/login');
                }
            }else if($user['is_active'] == 2){
                $this->session->set_flashdata('message', '<div class="alert 
                alert-danger" role="alert">Akun Anda Telah Di Nonaktifkan
              </div>');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('message', '<div class="alert 
                alert-danger" role="alert">E-mail anda belum Aktif
              </div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">E-mail anda belum terdaftar
          </div>');
            redirect('auth/login');
        }
    }


    //method daftar
    public function registration()
    {
        if($this->session->userdata('email')){
            redirect('user');
        }
        //  $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'email ini sudah digunakan'
        ]);
        $this->form_validation->set_rules('notelp', 'Notelp', 'required|trim|min_length[12]|max_length[15]|is_unique[user.notelp]',[
            'is_unique' => 'No telpon ini sudah digunakan',
            'min_length' => 'No Telpon Tidak Valid',
            'max_length' => 'No Telpon Tidak Valid'
        ]);
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password tidak sama !',
            'min_length' => 'password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Mager Printing Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {

            $email= $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'notelp' => htmlspecialchars($this->input->post('notelp', true)),
                'image' => 'default.jpg',
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()

            ];

            //siapkan token
            $token = hash('gost',base64_encode(random_bytes(32)));
            
            $user_token = [
                'email' => $email, 
                'token' => $token,
                'date_created' => time()
            ];
            // insert data akun baru
            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);


            // verifikasi email
            // $this->_sendEmail($token,'verify' );




            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Selamat Akun anda sudah dibuat, silahkan cek email anda !
          </div>');
            redirect('auth/login');
        }
    }

    // private function _sendEmail($token,$type)
    // {
    //     $config = [
    //         'protocol' =>'smtp',
    //         'smtp_host'  =>'ssl://smtp.googlemail.com',
    //         'smtp_user'  =>'',
    //         'smtp_pass'  =>'initestproject',
    //         'smtp_port'  => 465,
    //         'mailtype'   =>'html',
    //         'charset'    =>'utf-8',
    //         'newline'    =>"\r\n"
    //     ];

    //     // $this->load->library('email',$config);  
    //     $this->email->initialize($config);
    //     // $this->load->library('email', $config);

    //     $this->email->from('test@gmail.com', 'Admin Magers');
    //     $this->email->to($this->input->post('email'));

    //     if($type =='verify'){

    //         $this->email->subject('Akun Verifikasi');
    //         $this->email->message('Klik link Ini untuk verifikasi :
    //             <a href="'.base_url().'auth/verify?email='. $this->input->post('email').'&token='.$token.'">Aktif Akun</a>');
    //             // token='.urlencode($token). '">Aktif Akun</a>');
    //     }else if($type =='forgot'){
    //         $this->email->subject('Reset Password');
    //         $this->email->message('Klik link Ini untuk verifikasi :
    //         <a href="'.base_url().'auth/resetpassakun?email='. $this->input->post('email').'&token='.$token.'">reset Akun</a>');

    //     }
        
    //     if ($this->email->send()){
    //         return true;   
    //     }else {
    //         echo $this->email->print_debugger();
    //         die;
    //     }
    // }

    // public function verify()
    // {
    //     $email=$this->input->get('email');
    //     $token =$this->input->get('token');
    //     $user = $this->db->get_where('user', ['email'=> $email])->row_array();

    //     if($user){
    //         $user_token = $this->db->get_where('user_token',['token'=>$token])->row_array();

    //         if($user_token){
    //             if(time() - $user_token['date_created'] < (60*60*24)){
    //             $this->db->set('is_active',1);
    //             $this->db->where('email',$email);
    //             $this->db->update('user');
    //             $this->db->delete('user_token',['email'=>$email]);                
    //             $this->session->set_flashdata('message', '<div class="alert 
    //             alert-success" role="alert">'.$email.' akun aktif silahkan login
    //                 </div>');
    //                 redirect('auth/login');
                    
    //             }else {
    //                 $this->db->delete('user',['email'=>$email]);
    //                 $this->db->delete('user_token',['email' => $email]);
    //                 $this->session->set_flashdata('message', '<div class="alert 
    //             alert-danger" role="alert">Token Expired
    //                 </div>');
    //                 redirect('auth/login');
    //             }
    //         }else{
    //             $this->session->set_flashdata('message', '<div class="alert 
    //             alert-danger" role="alert">Token Tidak valid'.$token.'
    //         </div>');
    //         redirect('auth/login');
    //         }

    //     }else {
    //         $this->session->set_flashdata('message', '<div class="alert 
    //         alert-success" role="alert">aktifasi Gagal
    //       </div>');
    //         redirect('auth/login');
            
    //     }
    // }

    //method logout

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Akun anda sudah logout
          </div>');
        redirect('auth/login');
    }

    // fungsi untuk block user yang bandel
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    // fungsi untuk lupa password
    public function lupapassword()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        if($this->form_validation->run() == false){

            $data['title'] = 'Reset Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/resetpassword');
            $this->load->view('templates/auth_footer');
        }else{
            $email = $this->input->post('email');
            $user = $this->db->get_where('user',['email' =>$email, 'is_active'=>1])->row_array();

            if($user){
                $token = hash('gost',base64_encode(random_bytes(32)));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                
                $this->_sendEmail($token,'forgot');

                $this->session->set_flashdata('message', '<div class="alert 
                alert-success" role="alert">Cek E-mail untuk reset password
                </div>');
                redirect('auth/lupapassword');

            }else {
                $this->session->set_flashdata('message', '<div class="alert 
                alert-danger" role="alert">E-mail tidak tersedia ! atau Akun belum aktifasi email
                </div>');
                redirect('auth/lupapassword');
                
            }
        }
    }
    // ambil token dari email
    public function resetpassakun()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email'=> $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token',['token' => $token])->row_array();
            if($user_token){
                if(time() - $user_token['date_created'] < (60*60*24)){
                   
                    $this->session->set_userdata('reset_email',$email);
                    
                    // $this->db->delete('user_token',['email'=>$email]);                
                    $this->changePassword();
                }else {
                    $this->db->delete('user',['email'=>$email]);
                    $this->db->delete('user_token',['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert 
                    alert-danger" role="alert">Token Expired
                    </div>');
                    redirect('auth/login');
                }

                
            }else{
                $this->session->set_flashdata('message', '<div class="alert 
                alert-danger" role="alert">Reset Password tidak berhasil, Token Tidak Valid
                </div>');
                redirect('auth/login');

            }

            
        }else {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Reset Password tidak berhasil, E-mail Tidak Valid
            </div>');
            redirect('auth/login');
        }

    }
    public function changePassword(){

        if(!$this->session->userdata('reset_email')){
            redirect('auth/login');
        }

        $this->form_validation->set_rules('password1','Password','trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2','Ulangi Password','trim|required|min_length[3]|matches[password1]');
        if($this->form_validation->run()== false){

            $data['title'] = 'Password Baru';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/passwordbaru');
            $this->load->view('templates/auth_footer');
        }else{
            $password = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password',$password);
            $this->db->where('email',$email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Password Berhasil Di reset
            </div>');
            redirect('auth/login');
        }

    }


}
