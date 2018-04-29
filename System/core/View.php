<?php

namespace App\Core\View;

class ViewBased {

		/**
		 * Define directory of template files
		 */
		protected static $ViewDirectory = APP_PATH . '/views';

		/**
		 * Variable extends Twig class
		 */
		public $view;

		/**
		 * Loader modules of Twig
		 */
		private $loader;

		function __construct() {

		}



		
};