<?php

/*
 * Проект: MVC
 * Файл: /models/home.php
 * Назначение: модель для контрллера home.
 */
namespace Models {

	use MVC\Model\BaseModel;

	class HomeModel extends BaseModel {
		// Данные, передаваемые в представление index
		public function index($id) {
			$this->viewModel->set ( "pageTitle", "MVC" );
			return $this->viewModel;
		}
	}
} 
