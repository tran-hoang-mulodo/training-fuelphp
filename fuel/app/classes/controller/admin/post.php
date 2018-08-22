<?php
Session_start();
class Controller_Admin_Post extends Controller_Template
{
    public $template = 'admin/template';
    public function action_index()
	{
        $username = Session::get('user');
        if (empty($username)) {
            Response::redirect('admin/login', 'location');
        } else {
            $posts = Model_Posts::find('all');
            $data = array('posts' => $posts, 'user' => $username, 'title_page' => 'ShopOnline Admin');
            $this->template->title = 'ShopOnline Admin';
            $this->template->content = View::forge('admin/post/index', $data);
            $this->template->header = View::forge('admin/page/header', $data);
        }
	}

    public function action_add()
	{
        $username = Session::get('user');
        if (empty($username)) {
            Response::redirect('admin/login', 'location');
        }
        if (isset($_POST['add'])) {
            if (empty($_POST['status'])) {
                $_POST['status'] = 0;
            } else {
                $_POST['status'] = 1;
            }
            $post = array(
                'title' => $_POST['title'],
                'description_short' => $_POST['description_short'],
                'description' => $_POST['description'],
                'author' => $_POST['author'],
                'image' => $_POST['image'],
                'created_at' => $_POST['created_at'],
                'category_id' => $_POST['category_id'],
                'status' => $_POST['status']
            );
            $db = new Model_Posts($post);
            $db->save();
            Response::redirect('admin/post/index', 'location');
        }
        $data = array('user' => $username, 'title_page' => 'ShopOnline Admin');
        $this->template->title = 'ShopOnline Admin';
        $this->template->content = View::forge('admin/post/add');
        $this->template->header = View::forge('admin/page/header', $data);
	}
}
