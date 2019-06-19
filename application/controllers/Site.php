<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	
	public function inscription()
	{
        if ($data = $this->input->post()) {

            $data["secret"] = password_hash($data["secret"], PASSWORD_DEFAULT);

            $this->db->insert("user", $data);

            redirect(site_url("site/login"));
        }
        else {
            $this->load->view('header');
            $this->load->view('inscription');
            $this->load->view('footer');
        }
    }

    public function login()
	{
        if ($data = $this->input->post()) {

            $email = $data["email"];
            $password = $data["secret"];

            $user = $this->db->query("select * from user where email=?", $email)->row();

            if ($user) {
                if (password_verify($password, $user->secret)) {
                    // C'est cool !!!
                    $this->session->user = $user;
                    redirect(site_url("produit/liste"));
                }
                else {
                    $this->session->user = null;
                    redirect(site_url("site/login"));
                }
            }
            else {
                $this->session->user = null;
                redirect(site_url("site/login"));
            }
            
        }
        else {
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        }
    }
    
    public function logout()
	{
        $this->session->user = null;
        redirect(site_url("site/login"));
    }

    public function test()
	{

        $h = password_hash("titi", PASSWORD_DEFAULT);

        echo $h . "<hr>" . password_verify("toto", $h);
    }
    
}
