<script setup>
import IconColumn from "./partials/IconColumn.vue";
</script>
<template>
	<div>
		<IconColumn :defaultIcons="defaultIcons" :availableIcons="defaultIcons" :largerIcon="true" :limit="1"  :title="title" :pluralTitle="pluralTitle" storageId="aq" />
	</div>
</template>

<script>
import draggable from "vuedraggable";
import svg1  from './../assets/svgs/analytics.svg?raw';

export default {
	name: 'AnalyticsQuerying',
	components: {
		draggable
	},
	data() {
		return {
			title: 'Analytics & Querying',
			pluralTitle: 'Analytics & Querying',
			defaultIcons: [
				{
					name: "CPU",
					id: 0,
					single: true,
					svg:svg1
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

			if ( this.limit <= this.iconsCount ) {
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


