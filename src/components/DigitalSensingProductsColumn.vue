<script setup>
import IconColumn from "./partials/IconColumn.vue";
</script>

<template>
	<IconColumn :availableIcons="availableIcons" :annotate="true" :title="title" :pluralTitle="pluralTitle" storageId="dsp"/>
</template>

<script>
import svgsmartwatch  from './../assets/svgs/icon-smartwatch.svg?raw';
import svgsmartScale  from './../assets/svgs/icon-smartScale.svg?raw';
import svgsmartSpeaker  from './../assets/svgs/icon-smartSpeaker.svg?raw';
import svgpatch  from './../assets/svgs/icon-patch.svg?raw';
import svglens  from './../assets/svgs/icon-lens.svg?raw';
import svgsmartRing  from './../assets/svgs/icon-smartRing.svg?raw';
import svghearingAid  from './../assets/svgs/icon-hearingAid.svg?raw';
import svgelectrocardiogram  from './../assets/svgs/icon-electrocardiogram.svg?raw';
import svgglucoseMonitor  from './../assets/svgs/icon-glucoseMonitor.svg?raw';
import svgsmartPhone  from './../assets/svgs/icon-smartPhone.svg?raw';
import svgbedMat  from './../assets/svgs/icon-bedMat.svg?raw';

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
					svg: svgsmartwatch
				},
				{
					name: "Smart Scale",
					id: 1,
					single: true,
					svg: svgsmartScale
				},
				{
					name: "Smart Speaker",
					id: 2,
					single: true,
					svg: svgsmartSpeaker
				},
				{
					name: "Wearable Patch",
					id: 3,
					single: true,
					svg: svgpatch
				},
				{
					name: "Smart Contact Lens",
					id: 4,
					single: true,
					svg: svglens
				},
				{
					name: "Smart Ring",
					id: 5,
					single: true,
					svg: svgsmartRing
				},
				{
					name: "Smart Hearing Aid",
					id: 6,
					single: true,
					svg: svghearingAid
				},
				{
					name: "Electrocardiogram",
					id: 7,
					single: true,
					svg: svgelectrocardiogram
				},
				{
					name: "Continuous Glucose Monitor",
					id: 8,
					single: true,
					svg: svgglucoseMonitor
				},
				{
					name: "Smartphone",
					id: 9,
					single: true,
					svg: svgsmartPhone
				},
				{
					name: "Bed Mat",
					id: 10,
					single: true,
					svg: svgbedMat
				},
				{
					name: "Proprietary Tool",
					id: 11,
					single: false,
					svg: '<svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-full h-full" viewBox="0 0 100 100"><path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/></svg>',
				}
			]
		};
	}
}
</script>


