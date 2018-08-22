<?php
class Controller_Admin_Index extends Controller_Template
{
    public $template = 'admin/template';
    public function action_index()
	{
        //$posts = Model_Posts::find('all');
        $this->template->title = 'ShopOnline Admin';
        $this->template->content = View::forge('admin/index');
        //return Response::forge(View::forge('admin/index'));
	}

    public function action_login()
	{
        //$posts = Model_Posts::find('all');
        $this->template->title = 'ShopOnline Admin';
        $this->template->content = View::forge('admin/login');
        //return Response::forge(View::forge('admin/index'));
	}
}
