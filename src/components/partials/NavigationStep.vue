<template>
	<li class="relative overflow-hidden lg:flex-1">
		<div class="overflow-hidden">
			<!-- Current Step -->
			<span  aria-current="step" class="cursor-pointer group">
				<span
				    class="absolute top-0 left-0 w-1 h-full lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
				    :class="{
					'bg-transparent group-hover:bg-gray-200': status === ('upcoming' || 'completed' ),
					'bg-brand': status === 'current'
					}"
				    aria-hidden="true"></span>
				<span
				    class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
					<span class="flex-shrink-0">
						<span
						    v-if="status === 'current'"
						    class="w-10 h-10 flex items-center justify-center border-2 border-brand rounded-full">
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
						    class="w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
							<span class="text-gray-500">{{step}}</span>
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
						    class="text-sm font-normal text-gray-500">{{ desc }}</span>
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
