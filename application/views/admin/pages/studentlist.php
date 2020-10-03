<main class="h-full overflow-y-auto">
	<div class="container px-6 mx-auto grid">
		<h2
			class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
		>
			Students List
		</h2>
		<!-- CTA -->

		<!-- Cards -->
		<!-- New Table -->
		<div class="w-full overflow-hidden rounded-lg shadow-xs">
			<div class="w-full overflow-x-auto">
				<table class="w-full whitespace-wrap">
					<thead>
					<tr
						class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
					>
						<th class="px-4 py-3">Name</th>
						<th class="px-4 py-3">Address</th>
						<th class="px-4 py-3">Gender</th>
						<th class="px-4 py-3">DOB</th>
						<th class="px-4 py-3">Contact</th>
						<th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Qualification (YEAR) (%)</th>
						<th class="px-4 py-3">University</th>
						<th class="px-4 py-3">Profile Pic</th>
						<th class="px-4 py-3">Status</th>
					</tr>
					</thead>
					<tbody
						class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
					>
					<?php if($students):
						foreach ($students as $student):
							$class = 'green';
							if($student->status == 0) $class='red';
							?>
							<tr class="text-gray-700 dark:text-gray-400">
								<td class="px-4 py-3 text-sm">
									<p class="font-semibold"><?=$student->name?></p>
								</td>
								<td class="px-4 py-3 text-sm">
									<?=$student->hname .PHP_EOL.$student->district?>
								</td>
								<td class="px-4 py-3 text-sm">
									<?=$student->gender?>
								</td>
								<td class="px-4 py-3 text-sm">
									<?=$student->dob?>
								</td>
								<td class="px-4 py-3 text-sm">
									<?=$student->contact?>
								</td>
								<td class="px-4 py-3 text-sm">
									<?=$student->qual.' ('.$student->year.') ('.$student->per.')'?>
								</td>
								<td class="px-4 py-3 text-sm">
									<?=$student->uname?>
								</td>
								<td class="px-4 py-3 text-sm">
									<?=$student->email?>
								</td>
								<td class="px-4 py-3 text-sm">
									<img src="<?=base_url('assets/upload/'.$student->photo)?>" alt="<?=$student->uname?>">
								</td>
								<td class="px-4 py-3 text-xs">
                        <span
							class="px-2 py-1 font-semibold leading-tight text-<?=$class?>-700 bg-<?=$class?>-100 rounded-full dark:bg-<?=$class?>-700 dark:text-<?=$class?>-100"
						>
                        <?=$student->status == 0?'Pending':'Approved'?>
                        </span>
								</td>

							</tr>
						<?php endforeach; endif;?>
					</tbody>
				</table>
			</div>
			<?php if(FALSE):?>
				<div
					class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
				>
                <span class="flex items-center col-span-3">
                  Showing 21-30 of 100
                </span>
					<span class="col-span-2"></span>
					<!-- Pagination -->
					<span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <li>
                        <button
							class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
							aria-label="Previous"
						>
                          <svg
							  aria-hidden="true"
							  class="w-4 h-4 fill-current"
							  viewBox="0 0 20 20"
						  >
                            <path
								d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
								clip-rule="evenodd"
								fill-rule="evenodd"
							></path>
                          </svg>
                        </button>
                      </li>
                      <li>
                        <button
							class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
						>
                          1
                        </button>
                      </li>
                      <li>
                        <button
							class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
						>
                          2
                        </button>
                      </li>
                      <li>
                        <button
							class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
						>
                          3
                        </button>
                      </li>
                      <li>
                        <button
							class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
						>
                          4
                        </button>
                      </li>
                      <li>
                        <span class="px-3 py-1">...</span>
                      </li>
                      <li>
                        <button
							class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
						>
                          8
                        </button>
                      </li>
                      <li>
                        <button
							class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
						>
                          9
                        </button>
                      </li>
                      <li>
                        <button
							class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
							aria-label="Next"
						>
                          <svg
							  class="w-4 h-4 fill-current"
							  aria-hidden="true"
							  viewBox="0 0 20 20"
						  >
                            <path
								d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
								clip-rule="evenodd"
								fill-rule="evenodd"
							></path>
                          </svg>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
				</div>
			<?php endif;?>
		</div>
	</div>
</main>
</div>
</div>

