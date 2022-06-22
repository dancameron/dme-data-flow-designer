<template>
	<li class="relative overflow-hidden lg:flex-1">
		<div class="overflow-hidden">
			<!-- Current Step -->
			<span aria-current="step" class="cursor-pointer group">
				<span
				    class="absolute top-0 left-0 w-1 h-full lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
				    :class="{
					'bg-transparent group-hover:bg-gray-200': status === ('upcoming' || 'completed' ),
					'bg-brand': status === 'current', 'animate-pulse': spinner
					}"
				    aria-hidden="true"></span>
				<span
				    class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
					<span class="flex-shrink-0">
						<span
							v-if="spinner"
							class="w-10 h-10 flex items-center justify-center rounded-full">
							<svg
							     class="w-10 h-10 text-gray-200 animate-spin fill-brand"
							     viewBox="0 0 100 101" fill="none"
							     xmlns="http://www.w3.org/2000/svg">
							    <path
							        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
							        fill="currentColor"/>
							    <path
							        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
							        fill="currentFill"/>
							</svg>
						</span>
						<span
						    v-else-if="status === 'current'"
						    class="w-10 h-10 flex items-center justify-center border-4 border-brand rounded-full">
							<span class="text-brand">{{ step }}</span>
						</span>
						<span
						    v-else-if="status === 'completed'"
						    class="w-10 h-10 flex items-center justify-center bg-brand rounded-full">
							<svg class="w-6 h-6 text-white"
							     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
							     fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd"
								      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
								      clip-rule="evenodd"/>
							</svg>
				                </span>
						<span
						    v-else-if="status === 'upcoming'"
						    class="w-10 h-10 flex items-center justify-center border-4 border-gray-200 rounded-full">
							<span class="text-gray-500">{{ step }}</span>
						</span>
					</span>
					<span class="mt-0.5 ml-4 min-w-0 flex flex-col">
						<span
						    class="text-xs font-semibold tracking-wide uppercase"
						    :class="{
							'': status === 'completed',
							'text-brand': status === 'current',
							'text-gray-500': status === 'upcoming'
							}">{{ title }}</span>
						<span
						    class="text-xs font-normal text-gray-400">{{ desc }}</span>
					</span>
				</span>
			</span>

			<!-- Separator -->
			<div
			    v-if="sep"
			    class="hidden absolute top-0 left-0 w-3 inset-0 lg:block"
			    aria-hidden="true">
				<svg class="h-full w-full text-gray-100"
				     viewBox="0 0 12 82" fill="none"
				     preserveAspectRatio="none">
					<path d="M0.5 0V31L10.5 41L0.5 51V82"
					      stroke="currentcolor"
					      vector-effect="non-scaling-stroke"/>
				</svg>
			</div>
		</div>
	</li>
</template>
<script>
export default {
	name: 'NavigationStep',

	props: {
		status: {
			type: String,
			default: 'current'
		},
		spinner: {
			type: Boolean,
			default: false
		},
		title: {
			type: String,
			default: 'Getting Started'
		},
		desc: {
			type: String,
			default: 'A few questions to help you get started.'
		},
		sep: {
			type: Boolean,
			default: true
		},
		step: {
			type: Number,
			default: 1
		},
	}
}
</script>
