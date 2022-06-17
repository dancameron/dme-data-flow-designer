<script setup>
import IconColumn from "./partials/IconColumn.vue";</script>
<template>
	<div>
		<IconColumn :defaultIcons="defaultIcons" :availableIcons="defaultIcons" :limit="1" :title="title" :pluralTitle="pluralTitle" :sortable="false"/>
	</div>
</template>

<script>
import draggable from "vuedraggable";

export default {
	name: 'FilteringStorage',
	components: {
		draggable
	},
	data() {
		return {
			title: 'Filtering and Storage',
			pluralTitle: 'Filtering and Storage',
			defaultIcons: [
				{
					name: "Network Stack",
					id: 0,
					single: true,
					locked: true,
					svgName: 'svgs/icon-serverTraffic.svg'
				},
				{
					name: "Arrow Down",
					id: 1,
					single: true,
					style: false,
					locked: true,
					svg: '<path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>'
				},
				{
					name: "Computer",
					id: 2,
					single: true,
					locked: true,
					svgName: 'svgs/icon-laptop.svg'
				},
			]
		};
	},
	methods: {
		add: function (id) {
			if (!this.canAdd(id)) {
				console.log('method says no!')
				return false;
			}

			let index = this.availableIcons.findIndex(item => item.id === id);
			this.icons.push(
			    this.availableIcons[index]
			);
		},
		doDelete(id) {
			let index = this.icons.findIndex(item => item.id === id);
			this.icons.splice(index, 1);
		},
		clear() {
			this.icons = [];
		},
		canAdd(id) {
			let index = this.icons.findIndex(item => item.id === id);

			if (this.limit <= this.iconsCount) {
				return false;
			}

			// if not present it can be added
			if (index < 0) { // if not found, index will be -1
				return true;
			}
			// icon has been added, check if it wants to be single
			let icon = this.icons[index];
			if (icon.single) {
				return false;
			}
			return true;
		},
		annotation() {
			console.log(this.icons);
			this.icons.push(
			    {
				    'text': "Click Here to Edit."
			    }
			);
			console.log(this.icons);
		},
	},
	computed: {
		iconsCount() {
			return this.icons.length
		}
	}
}
</script>


