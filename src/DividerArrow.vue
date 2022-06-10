<template>
	<div class="h-full flex flex-col justify-evenly mx-auto space-y-4">
		<div class="h-10 w-10 text-gray-400">
			<svg xmlns="http://www.w3.org/2000/svg"
			     class="h-full w-full fill-current" viewBox="0 0 16 16">
				<path fill-rule="evenodd"
				      d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z"/>
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
