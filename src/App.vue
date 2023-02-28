<script setup>
import DigitalSensingProductsColumn from "./components/DigitalSensingProductsColumn.vue";
import AppsHubsColumn from "./components/AppsHubsColumn.vue";
import CentralizedColumn from "./components/CentralizedColumn.vue";
import ManufacturersColumn from "./components/ManufacturersColumn.vue";
import FilteringStorageColumn from "./components/FilteringStorageColumn.vue";
import AnalyticsQueryingColumn from "./components/AnalyticsQueryingColumn.vue";
import DividerArrow from "./components/partials/DividerArrow.vue";
import NavigationStep from "./components/partials/NavigationStep.vue";
import logo from './assets/icons/logo.webp'
import sensorLogo from './assets/icons/sensor-logo.webp'</script>
<template>

	<main id="app-wrap" class="relative min-h-screen">

		<header>
			<div class="flex gap-4 my-8">
				<div class="flex-none">
					<a href="https://www.dimesociety.org/tours-of-duty/sensor-data-integrations/data-architecture/#data-flow-design-tool"><img
					    :src="sensorLogo" alt="Sensor Data Integrations Logo"
					    class="h-14 w-auto"></a>
				</div>
				<div
				    class="grow flex items-center justify-center text-2xl font-bold leading-7 text-gray-900 sm:text-3xl">
					Sensor Data Flow Design Tool
				</div>
				<div
				    class="flex-none">
					<a href="https://www.dimesociety.org/"><img
					    :src="logo" alt="Digital Medicine Society Logo"
					    class="h-14 w-auto"></a>
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
					                @click="stepNav(4)" :spinner="capturing"/>

				</ol>
			</nav>
		</div>


		<div class="fixed bottom-0 left-0 w-full z-50">
			<div class="hide-from-image bg-gray-100 py-4 h-full shadow border-t-2 border-gray-200">

				<div class="absolute left-2 h-8 py-1 px-4">
					<svg xmlns="http://www.w3.org/2000/svg"
					     fill="currentColor" class="h-4 w-auto inline text-gray-300 pr-1"
					     viewBox="0 0 16 16">
						<path
						    d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
					</svg>
					<a href="https://www.dimesociety.org/tours-of-duty/sensor-data-integrations/data-architecture/#data-flow-design-tool"
					   target="_blank"
					   class="no-underline text-sm font-medium text-gray-300 hover:underline hover:text-gray-400">Return
						to DiMe SDI Page</a>
				</div>

				<div class="absolute right-2 h-8 py-2 px-4">
					<div class="flex flex-row-reverse gap-6">
						<img :src="logo" alt="Digital Medicine Society Logo"
						     class="h-6 w-auto">
						<img :src="sensorLogo"
						     alt="Sensor Data Integrations Logo"
						     class="h-6 w-auto">
					</div>
				</div>

				<div class="flex flex-initial gap-4 justify-center">

					<template v-if="currentStep === 4">
						<button @click="clearCache()"
						        class="text-gray-300 hover:text-red-500 text-xs tooltip"
						        :tool-tips="'Click to restart design'">
							<svg xmlns="http://www.w3.org/2000/svg"
							     fill="currentColor" class="w-4 h-4"
							     viewBox="0 0 16 16">
								<path
								    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
								<path fill-rule="evenodd"
								      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
							</svg>
						</button>
					</template>

					<button @click="stepNav('back')" :disabled="currentStep === 1"
					        class="bg-gray-300 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-400 focus:outline-none ring-gray-300 ring-2 ring-offset-2 ring-offset-white disabled:opacity-50 disabled:bg-gray-100 disabled:ring-0">
						Back
					</button>

					<template v-if="currentStep === 4">
						<a href="https://docs.google.com/forms/d/e/1FAIpQLSf6RMacsftNEyic0ui0soUn36-reIUKlr9wOcaYb5mmHdgH8Q/viewform?usp=sf_link"
						   target="_blank"
						   class="bg-brand no-underline border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-brand-light focus:outline-none ring-2 ring-brand-light">
							Tell us how you used the tool
						</a>
					</template>
					<template v-else>
						<button @click="stepNav('forward')"
						        class="bg-brand border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-brand-dark focus:outline-none ring-2 ring-offset-2 ring-offset-brand-light ring-brand-dark disabled:opacity-50 disabled:bg-gray-300">
							Continue
						</button>
					</template>

				</div>
			</div>
		</div>

		<div class="h-full mb-20 border-t border-gray-50">

			<div class="py-16 px-12 bg-gray-50" v-if="currentStep === 1">
				<h1>
					<span
					    class="block text-base text-center text-brand font-semibold tracking-wide uppercase">Introducing</span>
					<span
					    class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">DiMe Sensor Data Flow Design Tool</span>
				</h1>
				<p class="my-12 text-xl text-gray-500 leading-8">
					Using this tool you can map
					the flow of sensor data from any connected sensor technology you choose through
					to a final data set for analytics and querying, whether within a care delivery
					or research setting. After you answer a few questions to build out the right
					steps, you have the option to use a user friendly design tool to build and
					annotate your bespoke sensor data flow for documentation and collaboration with
					your team and partners.</p>
				<div class="flex gap-12">
					<div class="flex grow items-center justify-center">
						<img :src="sensorLogo"
						     alt="Sensor Data Integrations Logo"
						     class="h-32 w-auto">
					</div>
					<div
					    class="flex grow items-center justify-center">
						<img :src="logo" alt="Digital Medicine Society Logo"
						     class="h-32 w-auto">
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
								        v-if="!isInfoShown(1) && !isInfoShown(1.1)">I’m
									not sure…
								</button>
							</p>
							<div v-if="isInfoShown(1) || isInfoShown(1.1)"
							     class="mt-3 text-gray-500">
								<ul role="list" class="list-disc ml-4">
									<li>Do you need a smartphone, tablet to make
										your digital sensing product work? Or,
										do you need a second device connected to
										the internet in the home? If so, you
										probably <b>do
											require</b> an App or a Hub to
										transmit data
									</li>
									<li>If you don’t need these things to make your
										digital sensing product work, you
										probably <b>don’t require</b> an App or
										a Hub to transmit data
									</li>
								</ul>
								<p class="ml-4 py-2">
									<button @click="showInfo(1.1)"
									        class="font-normal text-gray-400 underline hover:text-brand-dark hover:no-underline"
									        v-if="!isInfoShown(1.1)">I still don't
										know...
									</button>
								</p>
								<div v-if="isInfoShown(1.1)"
								     class="ml-4 text-gray-500">
									<p class="mb-2">
										To map your sensor data flow, you need
										to know whether an App or Hub is
										required to transmit data.
									</p>
									<ul role="list" class="list-disc ml-4">
										<li>Contact your vendor partner to
											determine if an App or Hub is
											required
										</li>
										<li>Learn more about the sensor
											data measurement
											system
											starting <a
											    href="https://docs.google.com/presentation/d/1vBEa_ZBhutOCAVVZ2z5Qq8xG2uQ3y2B61LwMUQPJnmw/edit#slide=id.gccf2994462_0_1265"
											    target="_blank">here</a>
											in <a
											    href="https://playbook.dimesociety.org/"
											    target="_blank"
											    class="italic">The
												Playbook</a>.
										</li>
									</ul>
								</div>
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
					<div class="flex items-start py-6">
						<div class="mr-4 text-sm">
							<span class="font-medium text-gray-700">
								Does data generated by your digital sensing product flow through
								servers belonging to the manufacturer of the measurement tool?
							</span>
							<p>
								<button @click="showInfo(2)"
								        class="font-normal text-gray-400 underline hover:text-brand-dark hover:no-underline"
								        v-if="!isInfoShown(2) && !isInfoShown(2.1)">I’m
									not sure…
								</button>
							</p>
							<div v-if="isInfoShown(2) || isInfoShown(2.1)"
							     class="mt-3 text-gray-500">
								<ul role="list" class="list-disc ml-4">
									<li>Do you need to log into the manufacturer’s
										website to access the data from the
										digital sensing product? If so, data
										probably <b>does</b> flow through the
										manufacturer’s servers

									</li>
									<li>If you can access data directly from the
										digital sensing product, the data
										probably <b>does not</b> flow through
										the manufacturer’s servers
									</li>
								</ul>
								<p class="ml-4 py-2">
									<button @click="showInfo(2.1)"
									        class="font-normal text-gray-400 underline hover:text-brand-dark hover:no-underline"
									        v-if="!isInfoShown(1.1)">I still don't
										know...
									</button>
								</p>
								<div v-if="isInfoShown(2.1)"
								     class="ml-4 text-gray-500">
									<p class="mb-2">
										To map your sensor data flow, you need
										to know whether the manufacturer of your
										digital sensing product requires that
										the data flows through their servers.
									</p>
									<ul role="list" class="list-disc ml-4">
										<li>
											Contact your vendor partner to
											determine if the sensor
											generated data must flow through
											the manufacturers’ servers
										</li>
										<li>
											Learn more about the sensor data
											measurement system starting <a
										    href="https://docs.google.com/presentation/d/1vBEa_ZBhutOCAVVZ2z5Qq8xG2uQ3y2B61LwMUQPJnmw/edit#slide=id.gccf2994462_0_1265"
										    target="_blank">here</a> in <a
										    href="https://playbook.dimesociety.org/"
										    target="_blank" class="italic">The
											Playbook</a>.
										</li>
									</ul>
								</div>


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
				</div>

			</fieldset>

			<div id="slide-design" class="h-full px-12 bg-gray-50 min-w-fit" v-if="currentStep === 3">
				<div class="flex flex-row-reverse gap-6 py-8">
					<img :src="logo" alt="Digital Medicine Society Logo"
					     class="h-10 w-auto">
					<img :src="sensorLogo"
					     alt="Sensor Data Integrations Logo"
					     class="h-10 w-auto">
				</div>
				<div
				    class="grid grid-flow-col auto-cols-max justify-evenly gap-0">
					<DigitalSensingProductsColumn/>
					<DividerArrow v-if="isColumnShown('apphub')" storageId="arrow-1"/>
					<AppsHubsColumn v-if="isColumnShown('apphub')"/>
					<DividerArrow v-if="isColumnShown('manufacturer')" storageId="arrow-2"/>
					<ManufacturersColumn class="col-span-2" v-if="isColumnShown('manufacturer')"/>
					<DividerArrow storageId="arrow-3"/>
					<CentralizedColumn class="col-span-2"/>
					<DividerArrow storageId="arrow-4"/>
					<FilteringStorageColumn/>
					<DividerArrow storageId="arrow-5"/>
					<AnalyticsQueryingColumn/>
				</div>

				<p class="pt-8 text-sm text-right">Sensor data flow designed using DiMe’s Sensor
					Data Design Flow Tool</p>
				<p class="pt-1 pb-8 text-xs text-right text-gray-300">Disclaimer: This is a
					representative rendering only</p>

			</div>

			<div v-if="currentStep === 4" class="py-4 px-12">
				<div class="flex flex-row-reverse gap-2 items-center mb-6">


					<button @click="stepNav(4)" class="text-gray-400 text-xs tooltip"
					        :tool-tips="'Click to refresh image'">
						<svg xmlns="http://www.w3.org/2000/svg"
						     fill="currentColor" class="w-6 h-6"
						     :class="{'animate-spin': capturing}"
						     viewBox="0 0 16 16">
							<path fill-rule="evenodd"
							      d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
							<path
							    d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
						</svg>
					</button>

					<a
					    @click="track(5)"
					    :href="generatedImage"
					    download="DiMe-Sensor-Data-Design-Flow.png"
					    class="bg-brand no-underline border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-brand-light focus:outline-none ring-2 ring-brand-light">
						Download your sensor data flow
					</a>

				</div>

				<img :src="generatedImage" alt="Your DME Image" class="border
					     border-gray-200 rounded-sm shadow-sm ring-4 ring-offset-2
					     ring-offset-gray-50 ring-gray-100">
			</div>
		</div>

	</main>


</template>

<script>
import * as htmlToImage from 'html-to-image';
import {toPng} from 'html-to-image';
import {screenview} from 'vue-gtag'

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
		track: function (currentStep) {
			if (currentStep === 2) {
				console.log('Getting Started')
				screenview({
					app_name: 'DiMe Sensor Data Flow Design Tool',
					screen_name: 'Getting Started',
				})
				// if converting to pageview make sure to import the callback above
				//pageview("/tours-of-duty/sensor-data-integrations/data-architecture/getting-started");
			} else if (currentStep === 3) {
				console.log('Design')
				screenview({
					app_name: 'DiMe Sensor Data Flow Design Tool',
					screen_name: 'Design',
				})
				//pageview("/tours-of-duty/sensor-data-integrations/data-architecture/design");
			} else if (currentStep === 4) {
				console.log('Finish')
				screenview({
					app_name: 'DiMe Sensor Data Flow Design Tool',
					screen_name: 'Finish',
				})
				//pageview("/tours-of-duty/sensor-data-integrations/data-architecture/finish");
			} else if (currentStep === 5) {
				console.log('Download')
				screenview({
					app_name: 'DiMe Sensor Data Flow Design Tool',
					screen_name: 'Downloaded Image',
				})
				//pageview("/tours-of-duty/sensor-data-integrations/data-architecture/downloaded");
			} else {
				console.log('Introduction')
				screenview({
					app_name: 'DiMe Sensor Data Flow Design Tool',
					screen_name: 'Introduction',
				})
				//pageview("/tours-of-duty/sensor-data-integrations/data-architecture");
			}
		},
		stepNav: function (step, reRun = true) {
			if (step === 'back') {
				step = this.currentStep - 1;
			}
			if (step === 'forward') {
				step = this.currentStep + 1;
			}
			if (step === 4) {
				if (this.currentStep === 1) {
					return this.currentStep = 2;
				}
				if (this.currentStep === 2) {
					return this.currentStep = 3;
				}
				this.currentStep = 3;
				this.capturing = true;
				setTimeout(function () {
					htmlToImage
					    .toPng(document.getElementById('slide-design'), {
						    filter: this.filterForDomImage,
						    cacheBust: true
					    })
					    .then((dataUrl) => {
						    this.setImage(dataUrl);
						    this.capturing = false;
						    this.currentStep = 4;
						    // for safari?!!?
						    if (reRun) {
							    this.stepNav(4, false)
						    }
					    })
					    .catch(function (error) {
						    console.error('oops, something went wrong!', error);
					    });
				}.bind(this), 500)
			} else {
				this.currentStep = step
			}
		},
		clearCache: function () {
			localStorage.clear();
			this.currentStep = 2
		},
		isColumnShown: function (columnKey) {
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

			// check if current
			if (step === this.currentStep) {
				// last step is complete, not current.
				if (step === 4) {
					return 'completed'
				}
				return 'current'
			}

			// check if completed
			if (this.currentStep > step) {
				return 'completed'
			}

			return 'upcoming'
		}
	},
	mounted() {
		this.track(1)
		let storageId = 'dme_columns';
		if (localStorage.getItem(storageId)) {
			this.columnOptions = JSON.parse(localStorage.getItem(storageId)) || [];
		}
	},
	watch: {
		currentStep: {
			handler(step) {
				this.track(step);
			}
		},
		columnOptions: {
			handler(icons) {
				let storageId = 'dme_columns';
				localStorage.setItem(storageId, JSON.stringify(icons));
			},
			deep: true
		}
	}
}
</script>
