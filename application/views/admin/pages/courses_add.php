<main class="h-full pb-16 overflow-y-auto">
	<div class="container px-6 mx-auto grid">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Course Add
		</h2>
		<!-- CTA -->


		<!-- General elements -->

		<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
			<div class="flex flex-col overflow-y-auto md:flex-row">

				<div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">

					<div class="w-full">
						<form method="post" action="<?=base_url('admin/courses/addcourses')?>">
						<label class="block text-sm">
							<span class="text-gray-700 dark:text-gray-400">Course name</span>
							<input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Course name"
							name="course_name">
						</label>


						<!-- You should use a button here, as the anchor is only used for the example  -->

							<button type="submit"
							class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
								Submit
							</button>
						</form>
					</div>

				</div>
			</div>

         </div>



	</div>
</main>
