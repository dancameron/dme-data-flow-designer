<script setup>
import IconColumn from "./IconColumn.vue";
</script>
<template>
	<div>
		<IconColumn :defaultIcons="defaultIcons" :annotate="true"  :title="title" :pluralTitle="pluralTitle" :storageId="storageId" />
	</div>
</template>

<script>
export default {
	name: 'Arrow',

	props: {
		storageId: {
			type: String,
			default: 'arrow'
		},
	},
	data() {
		return {
			defaultIcons: [
				{
					name: "Arrow",
					id: 1,
					single: true,
					locked: true,
					style: false,
					raw: '<svg xmlns="http://www.w3.org/2000/svg" class="text-gray-200 h-full w-full fill-current" viewBox="0 0 16 16"><path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/></svg>',
				},
			]
		};
	}
}
</script>

<style #scoped>
.arrow {
	border: solid #BBBBBB;
	border-width: 0 10px 10px 0;
	display: inline-block;
	padding: 10px;
	transform: rotate(-45deg);
	-webkit-transform: rotate(-45deg);
}
</style>
