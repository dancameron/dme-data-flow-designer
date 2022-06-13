<template>
	<div class="h-full mx-2">

		<header class="w-16 h-20 font-bold mx-auto text-center" :class="{ 'w-32': largeIcon }">
			<template v-if="icons.length < 2">{{ title }}</template>
			<template v-else>{{ pluralTitle }}</template>
		</header>

		<draggable v-model="icons" item-key="id" class="h-full flex flex-col justify-center mx-auto space-y-4">
			<template #item="{element}">

				<div v-if="element.svg" class="flex-initial">
					<div class="icon group relative" :class="{ 'icon-large': largeIcon, 'icon-no-style': element.style === false }">
						<span
						    class="icon-delete"
						    v-on:click="doDelete(element.id)">
							<svg xmlns="http://www.w3.org/2000/svg"
							     class="fill-current w-3 h-3" viewBox="0 0 16 16">
								<path
								    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
							</svg>
						</span>

						<svg xmlns="http://www.w3.org/2000/svg"
						     class="fill-current w-full h-full" viewBox="0 0 16 16"
						     v-html="element.svg"></svg>
					</div>
				</div>

				<div v-else-if="element.raw" class="flex-initial">
					<div class="group relative">
						<span
						    class="icon-delete"
						    v-on:click="doDelete(element.id)">
							<svg xmlns="http://www.w3.org/2000/svg"
							     class="fill-current w-3 h-3" viewBox="0 0 16 16">
								<path
								    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
							</svg>
						</span>

						<span
						     v-html="element.raw"></span>
					</div>
				</div>

				<div v-else-if="element.text"
				     class="annotation group relative w-auto">
					<span
					    class="absolute -top-2 -left-2 invisible group-hover:visible cursor-pointer rounded-full bg-red-500 text-red-50 p-1"
					    v-on:click="doDelete(element.id)">
						<svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-3 h-3"
						     viewBox="0 0 16 16">
							<path
							    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
						</svg>
		                        </span>
					<div
					    class="cursor-text rounded-sm p-px focus:outline-none focus:ring-1 focus:border-sky-500 focus:ring-sky-500 focus:ring-2"
					    contenteditable
					    v-html="element.text"/>
				</div>

				<div v-else-if="element.spacer"
				     class="spacer group relative w-auto cursor-row-resize">
					<span
					    class="absolute -top-2 -left-2 invisible group-hover:visible cursor-pointer rounded-full bg-red-500 text-red-50 p-1"
					    v-on:click="doDelete(element.id)">
						<svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-3 h-3"
						     viewBox="0 0 16 16">
							<path
							    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
						</svg>
		                        </span>
				</div>
			</template>
		</draggable>

		<div class="w-16 mx-auto" :class="{ 'w-32': largeIcon }">
			<div class="w-auto flex flex-row flex-wrap gap-x-2">
				<div v-for="icon in availableIcons" class="icon-small tooltip" :tool-tips="'Add ' + icon.name"
				     @click="add(icon.id)"
				     :class="{ 'opacity-25': !canAdd(icon.id) }">
					<svg xmlns="http://www.w3.org/2000/svg"
					     class="fill-current w-full h-full"
					     viewBox="0 0 16 16" v-html="icon.svg"></svg>
				</div>
				<div v-if="annotate" class="icon-small tooltip" tool-tips="Add Annotation" @click="annotation()">
					<svg xmlns="http://www.w3.org/2000/svg"
					     class="fill-current w-full h-full"
					     viewBox="0 0 16 16">
						<path
						    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
						<path fill-rule="evenodd"
						      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
					</svg>
				</div>
				<div v-if="spacer" class="icon-small tooltip" tool-tips="Add Spacer" @click="addSpacer()">
					<svg xmlns="http://www.w3.org/2000/svg"
					     class="fill-current w-full h-full"
					     viewBox="0 0 16 16">
						<path fill-rule="evenodd"
						      d="M1 1.5a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 0-1h-13a.5.5 0 0 0-.5.5zm0 13a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 0-1h-13a.5.5 0 0 0-.5.5z"/>
						<path
						    d="M2 7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7z"/>
					</svg>
				</div>

			</div>
		</div>

	</div>
</template>

<script>
import draggable from "vuedraggable";

export default {
	name: 'IconColumn',
	components: {
		draggable
	},
	props: {
		annotate: {
			type: Boolean,
			default: true
		},
		availableIcons: {
			type: Array,
			default: []
		},
		defaultIcons: {
			type: Array,
			default: []
		},
		largeIcon: {
			type: Boolean,
			default: false
		},
		limit: {
			type: Number,
			default: 10
		},
		spacer: {
			type: Boolean,
			default: true
		},
		title: {
			type: String,
			default: 'ERROR: NO TITLE'
		},
		pluralTitle: {
			type: String,
			default: 'ERROR: NO PLURAL TITLE'
		},
	},
	data() {
		return {
			icons: [...this.defaultIcons]
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
			console.log(this.icons.length)
			console.log(this.limit)
			if (this.limit <= this.icons.filter((obj) => obj.svg).length) {
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
				    'id': this.icons+1,
				    'text': "Click Here to Edit."
			    }
			);
			console.log(this.icons);
		},
		addSpacer() {
			this.icons.push(
			    {
				    'id': this.icons+1,
				    'spacer': 16
			    }
			);
		},
	},
	computed: {

	}
}
</script>


