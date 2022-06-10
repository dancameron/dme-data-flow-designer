<script setup>
import DigitalSensingProductsColumn from "./components/DigitalSensingProductsColumn.vue";
import AppsHubsColumn from "./components/AppsHubsColumn.vue";
import ManufacturersColumn from "./components/ManufacturersColumn.vue";
import DividerArrow from "./DividerArrow.vue";</script>
<template>

	<main id="app-wrap" class="aspect-video bg-slate-50 h-full">
		<div class="grid grid-flow-col auto-cols-max justify-evenly gap-px h-full">
			<DigitalSensingProductsColumn/>
			<DividerArrow/>
			<AppsHubsColumn/>
			<DividerArrow/>
			<ManufacturersColumn/>

			<DividerArrow/>
			<DigitalSensingProductsColumn/>
			<DividerArrow/>
			<DigitalSensingProductsColumn/>
			<DividerArrow/>
			<DigitalSensingProductsColumn/>

		</div>
	</main>


</template>
