<?php
return array(
	'index.php' => 'faqs/index', // вывод всего массива вопросов-ответов из базы / actionIndex in FaqsController

	'faqs' => 'faqs/index', // вывод всего массива вопросов-ответов из базы / actionIndex in FaqsController
	'add' => 'faqs/add', // вывод страницы для занесения в базу нового вопроса / actionAdd in FaqsController

	'login' => 'admins/login', // actionLogin in AdminsController
	'logout' => 'admins/logout', // actionLogout in AdminsController

	'admins' => 'admins/index', // actionIndex in AdminsController	

	'user/list' => 'user/list', // actionUserList in UserController
	'user/delete/([0-9]+)' => 'user/delete/$1', // actionDelete in UserController
	'user/create' => 'user/create', // actionCreate in UserController
	'user/update/([0-9]+)' => 'user/update/$1', // actionUpdate in UserController

	'categories/list' => 'categories/list', // вывод всего массива категорий из базы / actionList in CategoriesController
	'categories/create' => 'categories/create', // создание новой категории / actionCreate in CategoriesController
	'categories/delete/([0-9]+)' => 'categories/delete/$1', // удаление категории вместе с вопросами в ней / actionDelete in CategoriesController

	'topics/list' => 'topics/list', // вывод всех вопросов-ответов в админке
	'topics/update/([0-9]+)' => 'topics/update/$1', // админка: редактирование конкретного вопроса-ответов
	'topics/delete/([0-9]+)' => 'topics/delete/$1', // админка: удаление конкретного вопроса-ответа
);
