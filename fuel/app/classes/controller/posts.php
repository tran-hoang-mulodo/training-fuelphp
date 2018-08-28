<?php
class Controller_Posts extends Controller_Template
{
    public function action_index()
	{
        $pagination = Pagination::forge('paginationpost', array(
            'pagination_url' => 'posts/index',
            'total_items' => Model_Posts::count(),
            'per_page' => 3,
            'uri_segment' => 3,
            'num_links' => 5,
        ));
        $posts = Model_Posts::query()
            ->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();
        $categories = Model_Categories::find('all');
        $data = array('posts' => $posts, 'categories' => $categories);
        $this->template->title = 'ShopOnline Posts';
        $this->template->sidebar = View::forge('page/sidebar', $data, false);
        $this->template->content = View::forge('posts/index', $data, false);
	}

    public function action_view($id)
    {
        $post = Model_Posts::find('first', array(
            'where' => array(
                'id' => $id
            )
        ));
        $categories = Model_Categories::find('all');
        $data = array('post' => $post, 'categories' => $categories);
        $this->template->title = "Post view";
        $this->template->sidebar = View::forge('page/sidebar', $data);
        $this->template->content = View::forge('posts/view', $data, false);
    }

    public function action_search()
    {
        if (isset($_GET['search'])) {
            $titleSearch = $_GET['name'];
            $posts = DB::query("SELECT * FROM posts WHERE title LIKE '%$titleSearch%'")->as_object('Model_Posts')->execute();
            $categories = Model_Categories::find('all');
            $data = array('posts' => $posts, 'categories' => $categories);
            $this->template->title = 'ShopOnline Search';
            $this->template->sidebar = View::forge('page/sidebar', $data);
            $this->template->content = View::forge('posts/result', $data);
        }
    }
}
