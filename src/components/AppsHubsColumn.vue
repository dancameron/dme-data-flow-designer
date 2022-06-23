<script setup>
import IconColumn from "./partials/IconColumn.vue";
</script>
<template>
	<div>
		<IconColumn :availableIcons="availableIcons" :annotate="true"  :title="title" :pluralTitle="pluralTitle" storageId="ah" />
	</div>
</template>

<script>
import svg1  from './../assets/svgs/icon-app.svg?raw';
import svg2  from './../assets/svgs/icon-smartHub.svg?raw';
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
					svg: svg1
				},
				{
					name: "Smart Hub",
					id: 1,
					single: true,
					svg: svg2
				},
			]
		};
	}
}
</script>


