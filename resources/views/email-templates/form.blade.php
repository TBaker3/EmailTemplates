@props(['emailTemplate' => null])

<div>
	@csrf
	<div class="grid grid-cols-2 gap-4">
		<div class="m-3">
			<input type="text" name="name" value="{{ $emailTemplate?->name }}">
		</div>
	</div>
	<div id="email-builder-react" name="builder" type="both" value="{{ $emailTemplate?->json }}"></div>
	<hr>
	<div class="flex justify-end py-3">
		<button type="submit"
			class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
			Save Email Template
		</button>
	</div>
</div>
