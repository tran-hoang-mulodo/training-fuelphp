<?php
Session_start();
class Controller_Admin_Login extends Controller_Template
{
    protected $errors = array();
    public function action_index()
	{
        if (isset($_POST['login']) && $_POST['login'] == "login") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (empty($username)) {
                //array_push($errors, "Username is required");
                Session::set_flash('error', 'Username is required');
            }
            if (empty($password)) {
                //array_push($errors, "Password is required");
                Session::set_flash('error', 'Username is required');
            }
            if (empty(Session::get_flash('error'))) {
                $query = Model_User::find('first', array(
                            'where' => array(
                                'user_name' => $username,
                                'password' => $password
                            ),
                        ));
                if (count($query) == 1) {
                    Session::set('user', $username);
                    Response::redirect('admin/index');
                } else {
                    //die('xxx');
                    //array_push($errors, "Wrong username or password is combination");
                    Session::set_flash('error', 'Wrong username/password combination');
                }
            }
        }
        return Response::forge(View::forge('admin/login'));
	}

    public function action_logout()
    {
        if (isset($_POST['logout'])) {
            //die($_POST['logout']);
            Session::delete('user');
            Response::redirect('admin/login');
        }
    }
}
