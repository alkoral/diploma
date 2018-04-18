<?php
return array(
	'^([^\/]+)?$' => 'faqs/faqs/index/', // вывод всего массива вопросов-ответов из базы с главной страницы / actionIndex in FaqsController
	'index.php' => 'faqs/index', // вывод всего массива вопросов-ответов из базы / actionIndex in FaqsController

	'faqs' => 'faqs/index', // вывод всего массива вопросов-ответов из базы / actionIndex in FaqsController
	'add' => 'faqs/add', // вывод страницы для занесения в базу нового вопроса / actionAdd in FaqsController

	'login' => 'admins/login', // страница для входа в админку / actionLogin in AdminsController
	'logout' => 'admins/logout', // страница для выхода из админки / actionLogout in AdminsController

	'admins' => 'admins/index', // админка: вывод главной страницы / actionIndex in AdminsController	

	'user/list' => 'user/list', // админка: вывод всех админов / actionList in UserController
	'user/delete/([0-9]+)' => 'user/delete/$1', // админка: удаление админа / actionDelete in UserController
	'user/create' => 'user/create', // админка: создание админа / actionCreate in UserController
	'user/update/([0-9]+)' => 'user/update/$1', // админка: изменение пароля админа / actionUpdate in UserController

	'categories/list' => 'categories/list', // вывод всего массива категорий из базы / actionList in CategoriesController
	'categories/create' => 'categories/create', // админка: создание новой категории / actionCreate in CategoriesController
	'categories/delete/([0-9]+)' => 'categories/delete/$1', // админка: удаление категории вместе с вопросами в ней / actionDelete in CategoriesController

	'topics/list' => 'topics/list', // вывод всех вопросов-ответов в админке / actionList in TopicsController
	'topics/update/([0-9]+)' => 'topics/update/$1', // админка: редактирование конкретного вопроса-ответов / actionUpdate in TopicsController
	'topics/delete/([0-9]+)' => 'topics/delete/$1', // админка: удаление конкретного вопроса-ответа / actionDelete in TopicsController
);
