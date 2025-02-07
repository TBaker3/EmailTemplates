<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Email Templates') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
				<form action="{{ route('email-templates.store') }}" method="POST">
					<div>
						<h1 class="text-2xl m-3">{{ $emailTemplate->name }}</h1>
						<div class="mt-4  w-full">
							<div class="w-full">
								{!! $emailTemplate->html !!}
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-app-layout>
