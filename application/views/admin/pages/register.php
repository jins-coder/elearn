<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
	<div
		class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
	>
		<div class="mb-5">
			<?= $alert ?>
		</div>
		<div class="flex flex-col overflow-y-auto md:flex-row">
			<div class="h-32 md:h-auto md:w-1/2">
				<img
					aria-hidden="true"
					class="object-cover w-full h-full dark:hidden"
					src="<?=siteurl('assets/img/create-account-office.jpeg')?>"
					alt="Office"
				/>
				<img
					aria-hidden="true"
					class="hidden object-cover w-full h-full dark:block"
					src="<?=base_url('assets/img/create-account-office-dark.jpeg')?>"
					alt="Office"
				/>
			</div>
			<div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
				<div class="w-full max-w-xs">
					<form method="post" action="<?=base_url('admin/user/register')?>">
						<div class="mb-4">
					<h1
						class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
					>
						Create account
					</h1>
					<label class="block text-sm">
						<span class="text-gray-700 dark:text-gray-400">Username</span>
						<input
							class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
							placeholder="Jane Doe" name="username"
						/>
						<?= form_error('username', '<p class="text-red-500 text-xs">', '</p>') ?>
					</label>
					<label class="block mt-4 text-sm">
						<span class="text-gray-700 dark:text-gray-400">Password</span>
						<input
							class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
							placeholder="***************"
							type="password" name="password"
						/>
						<?= form_error('password', '<p class="text-red-500 text-xs">', '</p>') ?>
					</label>
					<label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Confirm password
                </span>
						<input
							class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
							placeholder="***************"
							type="password" name="cpassword"
						/>
						<?= form_error('cpassword', '<p class="text-red-500 text-xs">', '</p>') ?>
					</label>

					<div class="flex mt-6 text-sm">
						<label class="flex items-center dark:text-gray-400">
							<input
								type="checkbox"
								class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
							/>
							<span class="ml-2">
                    I agree to the
                    <span class="underline">privacy policy</span>
                  </span>
						</label>
					</div>
						</div>

					<!-- You should use a button here, as the anchor is only used for the example  -->
					<button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
						Create account
					</button>
					</form>
					<hr class="my-8" />
                <p class="mt-4">
						<a
							class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
							href="<?=base_url('admin/user/login')?>"
						>
							Already have an account? Login
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
