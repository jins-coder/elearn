<?php
$active = '<span
				  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
				  aria-hidden="true"
			  ></span>';
$activeSegment = $this->uri->segment(2);
if($activeSegment == $this->router->fetch_class()){
	$font= 'semi-fontbold';
}else{
	$font ='';
}

?>

<aside
	class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
>
	<div class="py-4 text-gray-500 dark:text-gray-400">
		<a
			class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
			href="#"
		>
			<span class="text-xl">E</span>-<span class="text-xs">Learn</span>
		</a>
		<ul class="mt-6">
			<li class="relative px-6 py-3">
               <?php if($activeSegment =='dashboard') echo $active;?>
				<a
					class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
					href="<?=base_url('admin/dashboard')?>"
				>
					<svg
						class="w-5 h-5"
						aria-hidden="true"
						fill="none"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						viewBox="0 0 24 24"
						stroke="currentColor"
					>
						<path
							d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
						></path>
					</svg>
					<span class="ml-4">Dashboard</span>
				</a>
			</li>
		</ul>
		<ul>
			<li class="relative px-6 py-3">
				<?php if($activeSegment =='university'||$activeSegment =='student') echo $active;?>
				<button
						class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
						@click="togglePagesMenu"
						aria-haspopup="true"
				>
                <span class="inline-flex items-center">
                  <svg
						  class="w-5 h-5"
						  aria-hidden="true"
						  fill="none"
						  stroke-linecap="round"
						  stroke-linejoin="round"
						  stroke-width="2"
						  viewBox="0 0 24 24"
						  stroke="currentColor"
				  >
                    <path
							d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
					></path>
                  </svg>
                  <span class="ml-4">University</span>
                </span>
					<svg
							class="w-4 h-4"
							aria-hidden="true"
							fill="currentColor"
							viewBox="0 0 20 20"
					>
						<path
								fill-rule="evenodd"
								d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
								clip-rule="evenodd"
						></path>
					</svg>
				</button>
				<template x-if="isPagesMenuOpen">
					<ul
							x-transition:enter="transition-all ease-in-out duration-300"
							x-transition:enter-start="opacity-25 max-h-0"
							x-transition:enter-end="opacity-100 max-h-xl"
							x-transition:leave="transition-all ease-in-out duration-300"
							x-transition:leave-start="opacity-100 max-h-xl"
							x-transition:leave-end="opacity-0 max-h-0"
							class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
							aria-label="submenu"
					>
						<li
								class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
						>
							<a class="w-full" href="<?=base_url('admin/university')?>">University Approval</a>
						</li>
						<li
								class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
						>
							<a class="w-full" href="<?=base_url('admin/university/universitylist')?>">
								List Universities
							</a>
						</li>
						<li
								class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
						>
							<a class="w-full" href="<?=base_url('admin/student')?>">
								View Students
							</a>
						</li>
                     </ul>
				</template>
			</li>
			<li class="relative px-6 py-3">
				<?php if($activeSegment =='courses') echo $active;?>
				<a
					class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
					href="<?=base_url('admin/courses')?>"
				>
					<svg
						class="w-5 h-5"
						aria-hidden="true"
						fill="none"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						viewBox="0 0 24 24"
						stroke="currentColor"
					>
						<path
							d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
						></path>
					</svg>
					<span class="ml-4">Courses</span>
				</a>
			</li>
			<li class="relative px-6 py-3">
				<?php if($activeSegment =='examcenters') echo $active;?>
				<a
					class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
					href="<?=base_url('admin/examcenters')?>"
				>
					<svg
						class="w-5 h-5"
						aria-hidden="true"
						fill="none"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						viewBox="0 0 24 24"
						stroke="currentColor"
					>
						<path
							d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
						></path>
					</svg>
					<span class="ml-4">Exam Centers</span>
				</a>
			</li>
			<li class="relative px-6 py-3">
				<a
					class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
					href="<?=base_url('admin/courses/request')?>"
				>
					<svg
						class="w-5 h-5"
						aria-hidden="true"
						fill="none"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						viewBox="0 0 24 24"
						stroke="currentColor"
					>
						<path
							d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"
						></path>
						<path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
					</svg>
					<span class="ml-4">Course Requests</span>
				</a>
			</li>
			<li class="relative px-6 py-3">
				<a
					class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
					href="<?=base_url('admin/exam/register')?>"
				>
					<svg
						class="w-5 h-5"
						aria-hidden="true"
						fill="none"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						viewBox="0 0 24 24"
						stroke="currentColor"
					>
						<path
							d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
						></path>
					</svg>
					<span class="ml-4">Exam Registration</span>
				</a>
			</li>
			<li class="relative px-6 py-3">
				<a
						class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
						href="<?=base_url('admin/university/courses')?>"
				>
					<svg
							class="w-5 h-5"
							aria-hidden="true"
							fill="none"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							viewBox="0 0 24 24"
							stroke="currentColor"
					>
						<path
								d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
						></path>
					</svg>
					<span class="ml-4">University Courses</span>
				</a>
			</li>
		</ul>
	</div>
</aside>
