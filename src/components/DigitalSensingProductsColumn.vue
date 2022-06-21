<script setup>
import IconColumn from "./partials/IconColumn.vue";
</script>

<template>
	<IconColumn :availableIcons="availableIcons" :annotate="true" :title="title" :pluralTitle="pluralTitle" storageId="dsp"/>
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
				},
				{
					name: "Proprietary Tool",
					id: 11,
					single: false,
					svg: '<path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>',
				}
			]
		};
	}
}
</script>


