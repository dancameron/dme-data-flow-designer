<script setup>
import IconColumn from "./partials/IconColumn.vue";
</script>
<template>
	<div>
		<IconColumn :availableIcons="availableIcons" :annotate="true"  :title="title" :pluralTitle="pluralTitle" storageId="ah" />
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
					name: "App",
					id: 0,
					single: true,
					svgName: 'svgs/icon-app.svg',
				},
				{
					name: "Smart Hub",
					id: 1,
					single: true,
					svgName: 'svgs/icon-smartHub.svg',
				},
			]
		};
	}
}
</script>


