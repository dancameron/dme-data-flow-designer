<template>
	<div class="h-full flex flex-col justify-evenly mx-auto mt-20 space-y-4">
		<div class="h-10 w-10 text-gray-200">
			<svg xmlns="http://www.w3.org/2000/svg"
			     class="h-full w-full fill-current" viewBox="0 0 16 16">
                                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
			</svg>
		</div>
	</div>
</template>
<script>
export default {
	name: 'DividerArrow'
}
</script>
<style #scoped>
.arrow {
	border: solid #BBBBBB;
	border-width: 0 10px 10px 0;
	display: inline-block;
	padding: 10px;
	transform: rotate(-45deg);
	-webkit-transform: rotate(-45deg);
}
</style>
