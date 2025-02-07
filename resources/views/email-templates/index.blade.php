<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Email Templates') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
				<div class="flex justify-end py-3">
					<a href="{{ route('email-templates.create') }}"
						class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
						Create Email Template
					</a>
				</div>
				<hr>
				<table class="min-w-full divide-y divide-gray-300">
					<thead>
						<tr>
							<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">Name</th>
							<th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">
								<span class="sr-only">Edit</span>
							</th>
						</tr>
					</thead>
					<tbody class="bg-white">
						@forelse ($emailTemplates as $template)
							<tr class="even:bg-gray-50">
								<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
									{{ $template->name }}
								</td>
								<td>
									<a href="{{ route('email-templates.edit', $template) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
									No email templates found.
								</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</x-app-layout>
