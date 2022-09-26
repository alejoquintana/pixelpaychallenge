<script setup>
	import { Head,Link } from '@inertiajs/inertia-vue3';
	import List from '@/Components/List';
	defineProps({
		Items: Array,
	})
</script>

<template>

	<Head title="Welcome" />
	<div id="app">
		<div class="container">
			<h6 class="header">#PixelPayChallenge</h6>
			<h1 class="font-bold text-center	text-4xl text-sky-700 my-2">Lista de quehaceres</h1>
			<List :items="Items"/>
		</div>
	</div>
</template>

<style scoped>
	#app{
		display: flex;
		justify-content: center;
	}
	.container{
		max-width: 400px;
	}
	.header{
		text-align: center;
		padding: 12px 0;
	}
</style>
