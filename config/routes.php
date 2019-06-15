<?php

return array(
    // Товар:
    'todo/edit/([0-9]+)' => 'site/editTodo/$1',
    'todo/add' => 'site/addTodo',
    'todo/done/([0-9]+)' => 'site/markDone/$1',
    'todo/undone/([0-9]+)' => 'site/markUndone/$1',
    'signin' => 'user/login',
    'logout' => 'user/logout',
    '([a-z]+)/([a-z]+)/page-([0-9]+)' => 'site/index/$1/$2/$3',
    '([a-z]+)/([a-z]+)' => 'site/index/$1/$2',
    'page-([0-9]+)' => 'site/index/false/false/$1',
    '404' => 'site/404',
    '' => 'site/index', // actionIndex в SiteController
);
