<?php
//namespace Model;

class Model_User extends Orm\Model
{
    protected static $_properties = array(
        'id',
        'user_name',
        'password'
    );
}
