<?php
class Controller_Admin_Login extends Controller_Template
{
    public function action_index()
	{
        //$posts = Model_Posts::find('all');
        return Response::forge(View::forge('admin/login'));
	}
}
