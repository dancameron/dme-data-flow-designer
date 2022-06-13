<script setup>
import IconColumn from "./partials/IconColumn.vue";
</script>
<template>
	<div>
		<IconColumn :availableIcons="availableIcons" :annotate="true"  :title="title" :pluralTitle="pluralTitle" />
	</div>
</template>

<script>
export default {
	name: 'AppsHubs',
	data() {
		return {
			title: 'App or Hub',
			pluralTitle: 'Apps or Hubs',
			availableIcons: [
				{
					name: "Tablet",
					id: 0,
					single: true,
					svg: '<path d="M1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4zm-1 8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8z"/><path d="M14 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0z"/>'
				},
				{
					name: "Phone",
					id: 1,
					single: true,
					svg: ' <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/><path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>'
				},
				{
					name: "Computer",
					id: 2,
					single: true,
					svg: '<path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>'
				},
			]
		};
	}
}
</script>


