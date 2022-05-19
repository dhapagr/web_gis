<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function cek_login()
    {
        $email_user     = set_value('email_user');
        $password       = set_value('password_user');

        $this->input->post('email_user', $email_user);
        $this->input->post('password_user', $password);

        $cek  = $this->db->get_where('tb_user', ['email_user' => $email_user]);

        if ($cek->num_rows() > 0) {
            $hasil = $cek->row();
            if (password_verify($password, $hasil->password_user)) {

                return $hasil;
            } else {

                return array();
            }
        } else {

            $this->session->set_flashdata('pesan',
                '<script>
                    var isRtl = $("html").attr("data-textdirection") === "rtl";
                    $(document).ready(function(){
                        toastr["error"]("Email Tidak Ditemukan!", "INVALID EMAIL", {
                            positionClass: "toast-top-center",
                            rtl: isRtl
                        });
                    });
                </script>'
            );
            redirect('admin/welcome');
        }
    }
}