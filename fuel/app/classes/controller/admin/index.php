<?php
Session_start();
class Controller_Admin_Index extends Controller_Template
{
    public $template = 'admin/template';
    public function action_index()
	{
        $username = Session::get('user');
        if (empty($username)) {
            Response::redirect('admin/login', 'location');
        } else {
            $data['user'] = $username;
            $data['title'] = 'ShopOnline Admin';
            $data['title_page'] = 'ShopOnline Admin';
            $this->template->title = 'ShopOnline Admin';
            $this->template->content = View::forge('admin/index');
            $this->template->header = View::forge('admin/page/header', $data);
        }
	}
}
