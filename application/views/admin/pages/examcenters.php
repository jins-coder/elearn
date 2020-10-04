<main class="h-full pb-16 overflow-y-auto">
	<div class="container px-6 mx-auto grid">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Exam Centers
		</h2>
		<!-- CTA -->
		<div class="mb-5">
			<?= $alert ?>
		</div>

		<!-- General elements -->

		<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
			<div class="md:flex md:justify-center mb-6">

				<form class="w-full max-w-xl place-items-center" action="<?=base_url('admin/examcenters/addcenters')?>" method="post">
					<div class="flex flex-wrap -mx-3 mb-6">
						<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
							<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
								District
							</label>
							<div class="relative">
								<select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state"
								name="district">
									<option value="1">New Mexico</option>
									<option value="2">Missouri</option>
									<option value="3">Texas</option>
								</select>
								<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
									<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
								</div>
							</div>
						</div>
						<div class="w-full md:w-1/2 px-3">
							<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
								Place
							</label>
							<div class="relative">
								<select name="place"
										class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
									<option value="1">New Mexico</option>
									<option value="2">Missouri</option>
									<option value="3">Texas</option>
								</select>
								<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
									<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
								</div>
							</div>
						</div>
					</div>
					<div class="flex flex-wrap -mx-3 mb-6">
						<div class="w-full px-3">
							<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
								Centre Name
							</label>
							<input name="center_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password"
								   type="text"
								   placeholder="Centers">

						</div>
					</div>
					<div class="flex flex-wrap -mx-3 mb-2">
						<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
							<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
								Contact No
							</label>
							<input name="contact" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city"
								   type="text"
								   placeholder="1234567">
						</div>
						<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
							<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
								Email
							</label>
							<input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" type="email" placeholder="Jane">


						</div>

					</div>
					<div class="flex items-center justify-between">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
							Save
						</button>
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="reset">
							Cancel
						</button>
					</div>
				</form>
			</div>

		</div>
		<!-- Exam center list-->
		<div class="w-full overflow-x-auto">
			<table class="w-full whitespace-wrap">
				<thead>
				<tr
						class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
				>
					<th class="px-3 py-3">#</th>
					<th class="px-6 py-3">Center Name</th>
					<th class="px-6 py-3">District</th>
					<th class="px-6 py-3">Place</th>
					<th class="px-6 py-3">Contact</th>
					<th class="px-6 py-3">Email</th>
					<th class="px-3 py-3">Actions</th>
				</tr>
				</thead>
				<tbody
						class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
				>
				<?php if($examcenters): $index=1;
					foreach ($examcenters as $centers):

						?>
						<tr class="text-gray-700 dark:text-gray-400">
							<td class="px-3 py-3 text-sm">
								<p class="font-semibold"><?=$index?></p>
							</td>
							<td class="px-6 py-3 text-sm">
								<p class="font-semibold"><?=$centers->cname?></p>
							</td>
							<td class="px-6 py-3 text-sm">
								<p class="font-semibold"><?=$centers->dis?></p>
							</td>
							<td class="px-6 py-3 text-sm">
								<p class="font-semibold"><?=$centers->place?></p>
							</td>
							<td class="px-6 py-3 text-sm">
								<p class="font-semibold"><?=$centers->contact?></p>
							</td>
							<td class="px-6 py-3 text-sm">
								<p class="font-semibold"><?=$centers->email?></p>
							</td>
							<td class="px-3 py-3">
								<div class="flex items-center space-x-4 text-sm">
									<button onclick="location.href='<?=base_url('admin/examcenters/editcenter/'.$centers->cid)?>'"
											class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
										<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
											<path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
										</svg>
									</button>
									<button onclick="location.href='<?=base_url('admin/examcenters/removecenter/'.$centers->cid)?>'"
											class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
										<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
											<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
										</svg>
									</button>
								</div>
							</td>
						</tr>
						<?php $index++; endforeach; endif;?>
				</tbody>
			</table>
		</div>
    </div>
</main>


