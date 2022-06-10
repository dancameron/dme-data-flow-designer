<template>
	<div class="h-full">

		<draggable v-model="icons" item-key="id" class="h-full flex flex-col justify-evenly mx-auto space-y-4">
			<template #item="{element}">
				<div class="group relative cursor-row-resize">
					<span
					    class="absolute top-0 left-0 invisible group-hover:visible cursor-pointer rounded-full bg-red-500 text-red-50 p-1"
					    v-on:click="doDelete(element.id)">
		                                <svg xmlns="http://www.w3.org/2000/svg"
		                                     class="fill-current w-3 h-3" viewBox="0 0 16 16">
	                                                <path
	                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
						</svg>
	                                </span>
					<div class="w-12 h-12">
						<svg xmlns="http://www.w3.org/2000/svg"
						     class="fill-current w-full h-full" viewBox="0 0 16 16"
						     v-html="element.svg"></svg>
					</div>
				</div>
			</template>
		</draggable>

		<div class="w-16">
			<div class="w-auto flex flex-row flex-wrap">
				<div v-for="icon in availableIcons" class="p-px">
					<div class="w-4 h-4 cursor-pointer" @click="add(icon.id)" :class="{ 'opacity-25': !canAdd(icon.id) }">
						<svg xmlns="http://www.w3.org/2000/svg"
						     class="fill-current w-full h-full"
						     viewBox="0 0 16 16" v-html="icon.svg"></svg>
					</div>
				</div>
			</div>
		</div>

	</div>
</template>

<script>
import draggable from "vuedraggable";

let id = 1;
export default {
	name: 'AppsHubs',
	components: {
		draggable
	},
	data() {
		return {
			icons: [],
			annotate: true,
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
			],
			dragging: false,
			componentData: {
				type: "transition",
				name: "flip-list"
			}
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
			console.log(index);
			// if not present it can be added
			if (  index < 0 ) { // if not found, index will be -1
				return true;
			}
			// icon has been added, check if it wants to be single
			let icon = this.icons[index];
			if ( icon.single ) {
				return false;
			}
			return true;
		}
	},

	computed: {
	}
}
</script>


