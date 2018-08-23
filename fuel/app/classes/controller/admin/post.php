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

    public function action_edit($id)
	{
        $username = Session::get('user');
        if (empty($username)) {
            Response::redirect('admin/login', 'location');
        }
        if (isset($_POST['edit'])) {
            if (empty($_POST['status'])) {
                $_POST['status'] = 0;
            } else {
                $_POST['status'] = 1;
            }
            $post = Model_Posts::find($id);
            $post->title = $_POST['title'];
            $post->description_short = $_POST['description_short'];
            $post->description = $_POST['description'];
            $post->author = $_POST['author'];
            $post->image = $_POST['image'];
            $post->created_at = $_POST['created_at'];
            $post->category_id = $_POST['category_id'];
            $post->status = $_POST['status'];
            $post->save();
            Session::set_flash('success', 'Post detail updated successfully');
            Response::redirect('admin/post/index', 'location');
        }
        $categories = Model_Categories::find('all');
        $post = Model_Posts::find('first', array(
            'where' => array(
                'id' => $id,
            )
        ));
        $data = array(
            'user' => $username,
            'title_page' => 'ShopOnline Admin',
            'categories' => $categories,
            'post' => $post
        );
        $this->template->title = 'ShopOnline Admin';
        $this->template->content = View::forge('admin/post/edit', $data);
        $this->template->header = View::forge('admin/page/header', $data);
	}
}
