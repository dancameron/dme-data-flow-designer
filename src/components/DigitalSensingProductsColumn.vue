<script setup>
import IconColumn from "./partials/IconColumn.vue";
</script>

<template>
	<IconColumn :availableIcons="availableIcons" :annotate="true" :title="title" :pluralTitle="pluralTitle" />
</template>

<script>
export default {
	name: 'DigitalSensing',
	data() {
		return {
			title: 'Digital Sensing Product',
			pluralTitle: 'Digital Sensing Products',
			availableIcons: [
				{
					name: "Smart Watch",
					id: 0,
					single: true,
					svgName: 'svgs/icon-smartwatch.svg'
				},
				{
					name: "Smart Scale",
					id: 1,
					single: true,
					svgName: 'svgs/icon-smartScale.svg'
				},
				{
					name: "Smart Speaker",
					id: 2,
					single: true,
					svgName: 'svgs/icon-smartSpeaker.svg'
				},
				{
					name: "Wearable Patch",
					id: 3,
					single: true,
					svgName: 'svgs/icon-patch.svg'
				},
				{
					name: "Smart Contact Lens",
					id: 4,
					single: true,
					svgName: 'svgs/icon-lens.svg'
				},
				{
					name: "Smart Ring",
					id: 5,
					single: true,
					svgName: 'svgs/icon-smartRing.svg'
				},
				{
					name: "Smart Hearing Aid",
					id: 6,
					single: true,
					svgName: 'svgs/icon-hearingAid.svg'
				},
				{
					name: "Electrocardiogram",
					id: 7,
					single: true,
					svgName: 'svgs/icon-electrocardiogram.svg'
				},
				{
					name: "Continuous Glucose Monitor",
					id: 8,
					single: true,
					svgName: 'svgs/icon-glucoseMonitor.svg'
				},
				{
					name: "Smartphone",
					id: 9,
					single: true,
					svgName: 'svgs/icon-smartPhone.svg'
				},
				{
					name: "Bed Mat",
					id: 10,
					single: true,
					svgName: 'svgs/icon-bedMat.svg'
				}
			]
		};
	}
}
</script>


