<?php
class Controller_Admin_Post extends Controller_Template
{
    public $template = 'admin/template';
    public function action_index()
	{
        //$posts = Model_Posts::find('all');
        $this->template->title = 'ShopOnline Admin';
        $this->template->content = View::forge('admin/post/index');
        //return Response::forge(View::forge('admin/index'));
	}

    public function action_add()
	{
        //$posts = Model_Posts::find('all');
        $this->template->title = 'ShopOnline Admin';
        $this->template->content = View::forge('admin/post/add');
        //return Response::forge(View::forge('admin/index'));
	}
}
