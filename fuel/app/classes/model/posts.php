<?php
//namespace Model;

class Model_Posts extends Orm\Model
{
    protected static $_properties = array(
        'id',
        'title',
        'author',
        'image',
        'description_short',
        'description',
        'created_at',
        'category_id',
        'status'
    );
}
