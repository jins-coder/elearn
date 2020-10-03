<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>E--LEARN</title>
	<?php $this->load->view('admin/common/styles'); ?>

</head>
<body>
<div
		class="flex h-screen bg-gray-50 dark:bg-gray-900"
		:class="{ 'overflow-hidden': isSideMenuOpen }"
>
	<!-- Desktop sidebar -->

	<?php
	if($this->session->userdata('admin_username')) {
		$this->load->view('admin/common/sidebar');
	}?>
	<!-- Mobile sidebar -->
	<!-- Backdrop -->
	<div
			x-show="isSideMenuOpen"
			x-transition:enter="transition ease-in-out duration-150"
			x-transition:enter-start="opacity-0"
			x-transition:enter-end="opacity-100"
			x-transition:leave="transition ease-in-out duration-150"
			x-transition:leave-start="opacity-100"
			x-transition:leave-end="opacity-0"
			class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
	></div>
	<?php $this->load->view('admin/common/msidebar'); ?>
	<div class="flex flex-col flex-1 w-full">



