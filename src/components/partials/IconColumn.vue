<template>
	<div class="relative h-full mx-2">

		<header class="h-12 w-24 mb-2 font-bold mx-auto text-center">
			<template v-if="title">
				<template v-if="icons.length < 2">{{ title }}</template>
				<template v-else>{{ pluralTitle }}</template>
			</template>
		</header>

		<draggable v-model="icons" item-key="id" class="h-full flex flex-col justify-center mx-auto space-y-4"
		           :sort="sortable">

			<template #footer>
				<div class="hide-from-image flex-initial tooltip ico-tt" :tool-tips="'Click to add'">
					<div class="icon-add group relative" @click="showDrawer()">
						<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
						     class="fill-current w-full h-full" viewBox="0 0 16 16">
							<path
							    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
						</svg>
					</div>
				</div>
			</template>

			<!-- Loop over icons -->
			<template #item="{element}">

				<div v-if="element.svg" class="flex-initial tooltip ico-tt" :tool-tips="element.name">
					<div class="icon group relative"
					     :class="{ 'icon-large': largeIcon, 'icon-larger': largerIcon, 'icon-no-style': element.style === false }">
						<span
						    v-if="!element.locked"
						    class="icon-delete"
						    v-on:click="doDelete(element.id)">
							<svg xmlns="http://www.w3.org/2000/svg"
							     class="fill-current w-3 h-3" viewBox="0 0 16 16">
								<path
								    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
							</svg>
						</span>

						<span v-html="element.svg"></span>
					</div>
				</div>

				<div v-else-if="element.svgName" class="flex-initial tooltip ico-tt"
				     :tool-tips="element.name">
					<div class="icon group relative"
					     :class="{ 'icon-large': largeIcon, 'icon-larger': largerIcon, 'icon-no-style': element.style === false }">
						<span
						    v-if="!element.locked"
						    class="icon-delete"
						    v-on:click="doDelete(element.id)">
							<svg xmlns="http://www.w3.org/2000/svg"
							     class="fill-current w-3 h-3" viewBox="0 0 16 16">
								<path
								    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
							</svg>
						</span>

						<img
						    class="fill-current w-full h-full"
						    :src="element.svgName"/>

					</div>
				</div>

				<div v-else-if="element.raw" class="flex-initial tooltip ico-tt"
				     :tool-tips="element.name">
					<div class="icon group relative"
					     :class="{ 'icon-large': largeIcon, 'icon-larger': largerIcon, 'icon-no-style': element.style === false }">
						<span
						    v-if="!element.locked"
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
				     class="annotation group relative w-auto tooltip ico-tt" tool-tips="Annotation">
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
				     class="spacer group relative w-auto cursor-row-resize tooltip ico-tt"
				     tool-tips="Invisible Spacer">
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

		<div
		    v-if="isDrawerShown()"
		    class="absolute group z-50 top-2/4 left-28 icon-drawer hide-from-image w-40 mx-auto bg-white border border-gray-200 rounded shadow"
		    :class="{ 'left-36': largeIcon, 'left-20 w-16': availableIcons.length < 2  }">
			<div class="relative w-auto">
				<p v-if="title" class="text-xs text-center grow mb-2 text-gray-600 bg-gray-100 py-2"
				   v-html="'Add ' + title"></p>
				<span
				    class="absolute z-50 transition-opacity ease-in-out delay-75 -top-4 -left-4 opacity-0 group-hover:opacity-100 cursor-pointer rounded-full bg-gray-600 text-white p-0.5 pointer-events-auto"
				    v-on:click="activeDrawer = false">
					<svg xmlns="http://www.w3.org/2000/svg"
					     class="fill-current w-4 h-4" viewBox="0 0 16 16">
						<path
						    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
					</svg>
				</span>

				<div class="flex flex-row flex-wrap gap-x-2 p-2">
					<div v-for="icon in availableIcons" class="icon-small tooltip"
					     :tool-tips="'Add ' + icon.name"
					     @click="add(icon.id)"
					     :class="{ 'opacity-25': !canAdd(icon.id) }">
						<template v-if="icon.svg">
							<svg xmlns="http://www.w3.org/2000/svg"
							     class="fill-current w-full h-full"
							     viewBox="0 0 16 16" v-html="icon.svg"></svg>
						</template>
						<template v-else-if="icon.svgName">
							<img :src="icon.svgName" class="fill-current w-full h-full"
							     alt="SVG Icon"/>
						</template>
						<template v-else-if="icon.smallRaw">
						<span
						    v-html="icon.smallRaw" class="w-auto"></span>
						</template>


					</div>
					<div v-if="annotate" class="icon-small tooltip" tool-tips="Add Annotation"
					     @click="annotation()">
						<img :src="'svgs/icon-addBlank.svg'" class="fill-current w-full h-full"
						     alt="SVG Icon"/>
					</div>
					<div v-if="spacer" class="icon-small tooltip" tool-tips="Add Spacer"
					     @click="addSpacer()">
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
		storageId: {
			type: String,
			default: 'error'
		},
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
		largerIcon: {
			type: Boolean,
			default: false
		},
		limit: {
			type: Number,
			default: 10
		},
		sortable: {
			type: Boolean,
			default: true
		},
		spacer: {
			type: Boolean,
			default: true
		},
		title: {
			type: String,
			default: false
		},
		pluralTitle: {
			type: String,
			default: false
		},
	},
	data() {
		return {
			activeDrawer: false,
			icons: [...this.defaultIcons]
		};
	},
	methods: {
		isDrawerShown: function () {
			return this.activeDrawer;
		},
		showDrawer: function () {
			this.activeDrawer = true;
		},
		add: function (id) {
			if (!this.canAdd(id)) {
				console.log('method says no!')
				return false;
			}

			let index = this.availableIcons.findIndex(item => item.id === id);
			this.icons.push(
			    this.availableIcons[index]
			);
			this.activeDrawer = false;
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
				    'id': this.icons + 1,
				    'text': "Click Here to Edit."
			    }
			);
			this.activeDrawer = false;
		},
		addSpacer() {
			this.icons.push(
			    {
				    'id': this.icons + 1,
				    'spacer': 16
			    }
			);
			this.activeDrawer = false;
		},
	},
	mounted() {
		let storageId = 'dme_' + this.storageId;
		console.log(storageId);
		if (localStorage.getItem(storageId)) {
			this.icons = JSON.parse(localStorage.getItem(storageId)) || [];
		}
	},
	watch: {
		icons: {
			handler(icons) {
				let storageId = 'dme_' + this.storageId;
				console.log(storageId);
				console.log(icons)
				localStorage.setItem(storageId, JSON.stringify(icons));
			},
			deep: true
		}
	}
}
</script>


