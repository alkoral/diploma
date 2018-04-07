<?php
return array(
	'index.php' => 'faqs/index', // вывод всего массива вопросов-ответов из базы / actionIndex in FaqsController

	'faqs/([0-9]+)' => 'faqs/view/$1', // для просмотра вопроса-ответа по id, типа http://localhost/diploma/faqs/2
	'faqs' => 'faqs/index', // вывод всего массива вопросов-ответов из базы / actionIndex in FaqsController
	'add' => 'faqs/add', // вывод страницы для занесения в базу нового вопроса / actionAdd in FaqsController

	'categories' => 'categories/index', // вывод всего массива категорий из базы / actionIndex in CategoriesController
	'categories/([0-9]+)' => 'categories/view/$1', // для просмотра категории по id, типа http://localhost/diploma/categories/2

	'login' => 'admins/login', // actionLogin in AdminsController
	'logout' => 'admins/logout', // actionLogout in AdminsController

	'admins' => 'admins/index', // actionIndex in AdminsController	
	'admins/list' => 'admins/list', // actionList in AdminsController


	'topics' => 'topics/index', // админка: вывод вопросов-ответов 
	'topics/edit/([0-9]+)' => 'topics/edit/$1', // админка: редактирование конкретного вопроса-ответов
	'topics/delete/([0-9]+)' => 'topics/delete/$1', // админка: удаление конкретного вопроса-ответа

);
