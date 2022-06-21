<script setup>
import DigitalSensingProductsColumn from "./components/DigitalSensingProductsColumn.vue";
import AppsHubsColumn from "./components/AppsHubsColumn.vue";
import CentralizedColumn from "./components/CentralizedColumn.vue";
import ManufacturersColumn from "./components/ManufacturersColumn.vue";
import FilteringStorageColumn from "./components/FilteringStorageColumn.vue";
import AnalyticsQueryingColumn from "./components/AnalyticsQueryingColumn.vue";
import DividerArrow from "./components/partials/DividerArrow.vue";
import NavigationStep from "./components/partials/NavigationStep.vue";</script>
<template>

	<main id="app-wrap" class="relative min-h-screen">

		<header>
			<div class="flex gap-4 my-8">
				<div class="flex-none">
					<img src="public/icons/sensor-logo.webp" alt="Sensor Data Integrations Logo"
					     class="w-14 h-auto">
				</div>
				<div
				    class="grow flex items-center justify-center text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
					Sensor Data Flow Design Tool
				</div>
				<div
				    class="flex-none">
					<img src="public/icons/logo.webp" alt="Digital Medicine Society Logo"
					     class="w-14 h-auto">
				</div>
			</div>
		</header>

		<div class="h-full relative">
			<nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
				<ol role="list"
				    class="overflow-hidden lg:flex">

					<NavigationStep :status="stepStatus(1)" title="Introduction"
					                desc="Welcome to the DiMe Sensor Data Flow Design Tool. "
					                :sep="false"
					                :step="1" @click="stepNav(1)"/>
					<NavigationStep :status="stepStatus(2)" title="Getting Started"
					                desc="A few questions to get you started mapping your sensor data flow."
					                :sep="false"
					                :step="2" @click="stepNav(2)"/>
					<NavigationStep :status="stepStatus(3)" title="Design"
					                desc="Complete the mapping of you sensor data flow." :step="3"
					                @click="stepNav(3)"/>
					<NavigationStep :status="stepStatus(4)" title="Finish"
					                desc="Download your customized slide." :step="4"
					                @click="stepNav(4)"/>

				</ol>
			</nav>
		</div>


		<div class="fixed bottom-0 left-0 w-full z-50 opacity-80 hover:opacity-100">
			<div class="hide-from-image bg-white py-4 h-full shadow">
				<div class="flex flex-initial gap-4 justify-center">
					<button @click="stepNav(this.currentStep-1)" :disabled="currentStep === 1"
					        class="bg-brand border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-brand-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand disabled:opacity-50 disabled:bg-gray-300">
						Back
					</button>
					<template v-if="currentStep === 4">
						<a href="https://www.google.com/forms/about/" target="_blank"
						   class="bg-brand border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-brand-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand disabled:opacity-50 disabled:bg-gray-300">
							Submit Case Study
						</a>
					</template>
					<template v-else>
						<button @click="stepNav(this.currentStep+1)"
						        class="bg-brand border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-brand-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand disabled:opacity-50 disabled:bg-gray-300">
							Continue
						</button>
					</template>
				</div>
			</div>
		</div>

		<div class="h-full" style="min-height:100vh">

			<div class="py-16 px-12 bg-gray-50" v-if="currentStep === 1">
				<h1>
					<span
					    class="block text-base text-center text-brand font-semibold tracking-wide uppercase">Introducing</span>
					<span
					    class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">DiMe Sensor Data Flow Design Tool</span>
				</h1>
				<p class="my-8 text-xl text-gray-500 leading-8">
					Using this tool you can map
					the flow of sensor data from any connected sensor technology you choose through
					to a final data set for analytics and querying, whether within a care delivery
					or research setting. After you answer a few questions to build out the right
					steps, you have the option to use a user friendly design tool to build and
					annotate your bespoke sensor data flow for documentation and collaboration with
					your team and partners.</p>
				<div class="flex gap-12">
					<div class="flex grow items-center justify-center">
						<img src="public/icons/sensor-logo.webp"
						     alt="Sensor Data Integrations Logo"
						     class="w-32 h-auto">
					</div>
					<div
					    class="flex grow items-center justify-center">
						<img src="public/icons/logo.webp" alt="Digital Medicine Society Logo"
						     class="w-32 h-auto">
					</div>
				</div>
			</div>

			<fieldset class="h-full bg-gray-50" v-if="currentStep === 2">
				<div class="w-3/6 py-16 px-12 flex flex-col justify-center mx-auto">

					<div class="flex items-start py-6 mb-2 border-b border-gray-200">
						<div class="mr-4 text-sm">
						<span class="font-medium text-gray-700">
							Does your digital sensing product require an App or Hub to
							transmit data from the measurement tool to you?
						</span>
							<p>
								<button @click="showInfo(1)"
								        class="font-normal text-gray-400 underline hover:text-brand-dark hover:no-underline"
								        v-if="!isInfoShown(1)">I don't know...
								</button>
							</p>
							<div v-if="isInfoShown(1)" class="mt-3 text-gray-500">
								<p>
									To map your sensor data flow, you need to know
									whether
									an App or Hub is required to transmit data.
								</p>
								<ul role="list" class="list-disc ml-4">
									<li>Contact your vendor partner to determine if
										an App
										or Hub is required
									</li>
									<li>Learn more about the sensor data measurement
										system
										starting <a
										    href="https://docs.google.com/presentation/d/1vBEa_ZBhutOCAVVZ2z5Qq8xG2uQ3y2B61LwMUQPJnmw/edit#slide=id.gccf2994462_0_1265"
										    target="_blank">here</a> in <a
										    href="https://playbook.dimesociety.org/"
										    target="_blank" class="italic">The
											Playbook</a>.
									</li>
								</ul>
							</div>
						</div>
						<div class="flex mt-0.5">
							<div class="space-y-2">
								<div class="flex items-center">
									<input id="apphubtrue"
									       type="radio"
									       aria-describedby="Add App and Hub Column"
									       :checked="isColumnShown('apphub')"
									       @click="addColumn('apphub')"
									       class="h-4 w-4 accent-brand-dark border-gray-300">
									<label for="apphubtrue"
									       class="ml-1 block text-sm font-medium text-gray-700">
										Yes </label>
								</div>
								<div class="flex items-center">
									<input id="apphubfalse"
									       type="radio"
									       :checked="!isColumnShown('apphub')"
									       @click="removeColumn('apphub')"
									       class="h-4 w-4 accent-brand-dark border-gray-300">
									<label for="apphubfalse"
									       class="ml-1 block text-sm font-medium text-gray-700">
										No </label>
								</div>
							</div>
						</div>
					</div>
					<div class="flex items-start py-6 mb-2  border-b border-gray-200">
						<div class="mr-4 text-sm">
						<span class="font-medium text-gray-700">
							Does data generated by your digital sensing product flow through
							servers belonging to the manufacturer of the measurement tool?
						</span>
							<p>
								<button @click="showInfo(2)"
								        class="font-normal text-gray-400 underline hover:text-brand-dark hover:no-underline"
								        v-if="!isInfoShown(2)">I don't know...
								</button>
							</p>
							<div v-if="isInfoShown(2)" class="mt-3 text-gray-500">
								<p>
									To map your sensor data flow, you need to know
									whether
									the manufacturer of your digital sensing product
									requires that the data flows through their
									servers.
								</p>
								<ul role="list" class="list-disc ml-4">
									<li>
										Contact your vendor partner to determine
										if the
										sensor generated data must flow through
										the
										manufacturers’ servers
									</li>
									<li>
										Learn more about the sensor data
										measurement
										system
										starting <a
									    href="https://docs.google.com/presentation/d/1vBEa_ZBhutOCAVVZ2z5Qq8xG2uQ3y2B61LwMUQPJnmw/edit#slide=id.gccf2994462_0_1265"
									    target="_blank">here</a> in <a
									    href="https://playbook.dimesociety.org/"
									    target="_blank" class="italic">The
										Playbook</a>.
									</li>
								</ul>
							</div>
						</div>
						<div class="flex mt-0.5">
							<div class="space-y-2">
								<div class="flex items-center">
									<input id="manufacturertrue" name="manufacturer"
									       type="radio"
									       aria-describedby="Add Manufacturer's Servers"
									       :checked="isColumnShown('manufacturer')"
									       @click="addColumn('manufacturer')"
									       class="h-4 w-4 accent-brand-dark border-gray-300">
									<label for="manufacturertrue"
									       class="ml-1 block text-sm font-medium text-gray-700">
										Yes </label>
								</div>
								<div class="flex items-center">
									<input id="manufacturerfalse"
									       name="manufacturer"
									       type="radio"
									       :checked="!isColumnShown('manufacturer')"
									       @click="removeColumn('manufacturer')"
									       class="h-4 w-4 accent-brand-dark border-gray-300">
									<label for="manufacturerfalse"
									       class="ml-1 block text-sm font-medium text-gray-700">
										No </label>
								</div>
							</div>
						</div>
					</div>
					<div class="flex items-start py-4 mb-4">
						<div class="mr-4 text-sm">
						<span class="font-medium text-gray-700">
							Does the data consumer perform filtering on the sensor generated
							data and store the data internally prior to performing analytics
							on the data and querying it?
						</span>
							<p>
								<button @click="showInfo(3)"
								        class="font-normal text-gray-400 underline hover:text-brand-dark hover:no-underline"
								        v-if="!isInfoShown(3)">I don't know...
								</button>
							</p>
							<div v-if="isInfoShown(3)" class="mt-3 text-gray-500">
								<p>
									To map your sensor data flow, you need to know
									whether
									the data consumer will perform filtering on the
									sensor
									generated data and store the data locally.
								</p>
								<ul role="list" class="list-disc ml-4">
									<li>Contact your vendor partner to determine if
										the
										sensor generated data must flow through
										the
										manufacturers’ servers
									</li>
									<li>Learn more about the sensor data measurement
										system
										starting <a
										    href="https://docs.google.com/presentation/d/1vBEa_ZBhutOCAVVZ2z5Qq8xG2uQ3y2B61LwMUQPJnmw/edit#slide=id.gccf2994462_0_1265"
										    target="_blank">here</a> in <a
										    href="https://playbook.dimesociety.org/"
										    target="_blank">The Playbook</a>.
									</li>
								</ul>
							</div>
						</div>
						<div class="flex mt-0.5">
							<div class="space-y-2">
								<div class="flex items-center">
									<input id="analyticstrue" name="analytics"
									       type="radio"
									       aria-describedby="Add Manufacturer's Servers"
									       :checked="isColumnShown('analytics')"
									       @click="addColumn('analytics')"
									       class="h-4 w-4 accent-brand-dark border-gray-300">
									<label for="analyticstrue"
									       class="ml-1 block text-sm font-medium text-gray-700">
										Yes </label>
								</div>
								<div class="flex items-center">
									<input id="analyticsfalse" name="analytics"
									       type="radio"
									       :checked="!isColumnShown('analytics')"
									       @click="removeColumn('analytics')"
									       class="h-4 w-4 accent-brand-dark border-gray-300">
									<label for="analyticsfalse"
									       class="ml-1 block text-sm font-medium text-gray-700">
										No </label>
								</div>
							</div>
						</div>
					</div>
				</div>

			</fieldset>

			<div id="slide-design" class="h-full px-12 bg-gray-50" v-if="currentStep === 3">
				<div class="flex gap-4 py-8">
					<div class="flex-end">
						<img src="public/icons/sensor-logo.webp"
						     alt="Sensor Data Integrations Logo"
						     class="w-10 h-auto">
					</div>
					<div class="grow flex"></div>
					<div
					    class="flex-end">
						<img src="public/icons/logo.webp" alt="Digital Medicine Society Logo"
						     class="w-10 h-auto">
					</div>
				</div>
				<div
				    class="grid grid-flow-col auto-cols-max justify-evenly gap-0">
					<DigitalSensingProductsColumn/>
					<DividerArrow v-if="isColumnShown('apphub')"/>
					<AppsHubsColumn v-if="isColumnShown('apphub')"/>
					<DividerArrow v-if="isColumnShown('manufacturer')"/>
					<ManufacturersColumn class="col-span-2" v-if="isColumnShown('manufacturer')"/>
					<DividerArrow/>
					<CentralizedColumn class="col-span-2"/>
					<DividerArrow/>
					<FilteringStorageColumn/>
					<DividerArrow v-if="isColumnShown('analytics')"/>
					<AnalyticsQueryingColumn v-if="isColumnShown('analytics')"/>
				</div>
				<p class="pt-8 pb-8 text-sm text-right">Sensor data flow designed using DiMe’s Sensor
					Data Design Flow Tool</p>
			</div>

			<div v-if="currentStep === 4" class="py-16 px-12">
				<div class="text-right">

					<a
					    :href="generatedImage"
					    download="DiMe-Sensor-Data-Design-Flow.png"
					    class="mb-6 no-underline bg-brand border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-brand-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand">
						Download your sensor data flow
					</a>

					<img :src="generatedImage" alt="Your DME Image" class="border
					     border-gray-200 rounded-sm shadow-sm ring-4 ring-offset-2
					     ring-offset-gray-50 ring-gray-100">

				</div>
				<p>
					Testing Info:
				</p>
				<p>

					{{ currentStep }}
					{{ shownInfo }}
					{{ columnOptions }}

				</p>
			</div>
		</div>

	</main>


</template>

<script>

import * as htmlToImage from 'html-to-image';
import {toPng, toJpeg, toBlob, toPixelData, toSvg} from 'html-to-image';

export default {
	name: 'DME App',
	data() {
		return {
			currentStep: 1,
			shownInfo: 0,
			columnOptions: [],
			generatedImage: '',
			capturing: false,
		};
	},
	props: {},
	methods: {
		isInfoShown: function (step) {
			return this.shownInfo === step;
		},
		showInfo: function (step) {
			this.shownInfo = step;
		},
		setImage: function (dataUrl) {
			this.generatedImage = dataUrl;
		},
		filterForDomImage: function (node) {
			if (node.classList) return !node.classList.contains("hide-from-image");
			return true;
		},
		stepNav: function (step) {
			if (step === 4) {
				if (this.currentStep === 1) {
					return this.currentStep = 2;
				}
				if (this.currentStep === 2) {
					return this.currentStep = 3;
				}
				this.capturing = true;
				htmlToImage
				    .toPng(document.getElementById('slide-design'), {filter: this.filterForDomImage})
				    .then((dataUrl) => {
					    this.setImage(dataUrl);
					    this.capturing = false;
					    this.currentStep = 4;
				    })
				    .catch(function (error) {
					    console.error('oops, something went wrong!', error);
				    });
				return;
			}
			this.currentStep = step
		},
		isColumnShown: function (columnKey) {
			console.log(this.columnOptions.includes(columnKey))
			return this.columnOptions.includes(columnKey);
		},
		addColumn: function (columnKey) {
			if (this.columnOptions.includes(columnKey)) {
				return true;
			}
			this.columnOptions.push(columnKey);
		},
		removeColumn: function (columnKey) {
			if (!this.columnOptions.includes(columnKey)) {
				return false;
			}
			let i = this.columnOptions.indexOf(columnKey);
			if (i > -1) {
				this.columnOptions.splice(i, 1);
			}
		},
		stepStatus: function (step) {

			if (step === this.currentStep) {
				return 'current'
			}

			// check if completed
			if (this.currentStep > step) {
				return 'completed'
			}

			return 'upcoming'
		}
	},
}
</script>
