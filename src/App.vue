<script setup>
import DigitalSensingProductsColumn from "./components/DigitalSensingProductsColumn.vue";
import AppsHubsColumn from "./components/AppsHubsColumn.vue";
import ManufacturersColumn from "./components/ManufacturersColumn.vue";
import FilteringStorageColumn from "./components/FilteringStorageColumn.vue";
import AnalyticsQueryingColumn from "./components/AnalyticsQueryingColumn.vue";
import DividerArrow from "./components/partials/DividerArrow.vue";</script>
<template>

	<main id="app-wrap" class="aspect-video bg-slate-50 h-full">
		<div class="grid grid-flow-col auto-cols-max justify-evenly gap-0 h-full">
			<DigitalSensingProductsColumn/>
			<DividerArrow/>
			<AppsHubsColumn/>
			<DividerArrow/>
			<ManufacturersColumn class="col-span-2"/>
			<DividerArrow/>
			<FilteringStorageColumn />
			<DividerArrow/>
			<AnalyticsQueryingColumn/>

		</div>
	</main>


</template>
