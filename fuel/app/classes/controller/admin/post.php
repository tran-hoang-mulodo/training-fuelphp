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
            $pagination = \Pagination::forge('pagination', array(
                'pagination_url' => \Uri::base(false) . 'admin/post/index/',
                'total_items' => Model_Posts::count(),
                'per_page' => 5,
                'uri_segment' => 4,
                'num_links' => 5,
            ));
            $posts = Model_Posts::query()
                ->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();
            $categories = Model_Categories::find('all');
            $data = array(
                'posts' => $posts,
                'user' => $username,
                'title_page' => 'ShopOnline Admin',
                'pagination' => $pagination,
                'categories' => $categories
            );
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
            if (isset($_FILES['file'])) {
                $this->uploadImage();
            }
            $post = array(
                'title' => $_POST['title'],
                'description_short' => $_POST['description_short'],
                'description' => $_POST['description'],
                'author' => $_POST['author'],
                'image' => $_FILES['file']['name'],
                'created_at' => $_POST['created_at'],
                'category_id' => $_POST['category_id'],
                'status' => $_POST['status']
            );
            $db = new Model_Posts($post);
            $db->save();
            Session::set_flash('success', 'Post detail added successfully');
            Response::redirect('admin/post/index', 'location');
        }
        $categories = Model_Categories::find('all');
        $data = array('user' => $username, 'title_page' => 'ShopOnline Admin', 'categories' => $categories);
        $this->template->title = 'ShopOnline Admin';
        $this->template->content = View::forge('admin/post/add', $data);
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
            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != null) {
                $this->uploadImage();
                $image = $_FILES['file']['name'];
            } else {
                $image = $_POST['image'];
            }
            $post = Model_Posts::find('first', array(
                'where' => array(
                    'id' => $id
                )
            ));
            $post->title = $_POST['title'];
            $post->description_short = $_POST['description_short'];
            $post->description = $_POST['description'];
            $post->author = $_POST['author'];
            $post->image = $image;
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

    public function action_delete($id)
    {
        $post = Model_Posts::find($id);
        $post->delete();
        Session::set_flash('success', 'Post detail deleted successfully');
        Response::redirect('admin/post/index', 'location');
    }

    public function uploadImage()
    {
        $currentDir = getcwd();
        $uploadDirectory = "/assets/img/";
        $errors = [];
        $fileExtensions = ['jpeg','jpg','png'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileTmpName  = $_FILES['file']['tmp_name'];
        $fileType = $_FILES['file']['type'];
        $fileExtension = explode('.',$fileName);
        $fileExtensionImg = $fileExtension[1];
        $uploadPath = $currentDir . $uploadDirectory . basename($fileName);
        if (isset($_POST['add']) || isset($_POST['edit'])) {
            if (! in_array($fileExtensionImg,$fileExtensions)) {
                $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
            }
            if ($fileSize > 2000000) {
                $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
            }
            if (empty($errors)) {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                if ($didUpload) {
                    echo "The file " . basename($fileName) . " has been uploaded";
                } else {
                    echo "An error occurred somewhere. Try again or contact the admin";
                }
            } else {
                foreach ($errors as $error) {
                    echo $error . "These are the errors" . "\n";
                }
            }
        }
    }

}
