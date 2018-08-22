<?php
class Controller_Posts extends Controller_Template
{
    public function action_index()
	{
        $posts = Model_Posts::find('all');
        $data = array('posts' => $posts);
        $this->template->title = 'ShopOnline Posts';
        $this->template->content = View::forge('posts/index', $data, false);
	}

    public function action_view($id)
    {
        $post = Model_Posts::find('first', array(
            'where' => array(
                'id' => $id
            )
        ));
        $data = array('post' => $post);
        $this->template->title = "Post view";
        $this->template->content = View::forge('posts/view', $data, false);
    }
}
