<?php
Session_start();
class Controller_Admin_Categories extends Controller_Template
{
    public $template = 'admin/template';
    public function action_index()
	{
        $username = Session::get('user');
        if (empty($username)) {
            Response::redirect('admin/login', 'location');
        } else {
            $categories = Model_Categories::find('all');
            $data = array(
                'user' => $username,
                'title_page' => 'ShopOnline Admin',
                'categories' => $categories
            );
            $this->template->title = 'ShopOnline Admin';
            $this->template->content = View::forge('admin/categories/index', $data);
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
            $category = array('name' => $_POST['name']);
            $db = new Model_Categories($category);
            $db->save();
            Session::set_flash('success', 'Category detail added successfully');
            Response::redirect('admin/categories/index', 'location');
        }
        $data = array('user' => $username, 'title_page' => 'ShopOnline Admin');
        $this->template->title = 'ShopOnline Admin';
        $this->template->content = View::forge('admin/categories/add', $data);
        $this->template->header = View::forge('admin/page/header', $data);
	}

    public function action_edit($id)
	{
        $username = Session::get('user');
        if (empty($username)) {
            Response::redirect('admin/login', 'location');
        }
        if (isset($_POST['edit'])) {
            $category = Model_Categories::find('first', array(
                'where' => array(
                    'id' => $id
                )
            ));
            $category->name = $_POST['name'];
            $category->save();
            Session::set_flash('success', 'Category detail updated successfully');
            Response::redirect('admin/categories/index', 'location');
        }
        $category = Model_Categories::find('first', array(
            'where' => array(
                'id' => $id,
            )
        ));
        $data = array(
            'user' => $username,
            'title_page' => 'ShopOnline Admin',
            'category' => $category,
        );
        $this->template->title = 'ShopOnline Admin';
        $this->template->content = View::forge('admin/categories/edit', $data);
        $this->template->header = View::forge('admin/page/header', $data);
	}

    public function action_delete($id)
    {
        $category = Model_Categories::find($id);
        $category->delete();
        Session::set_flash('success', 'Category detail deleted successfully');
        Response::redirect('admin/categories/index', 'location');
    }
}
