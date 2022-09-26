<script>
	import Create from './CreateItem.vue';
	//defineProps(['items']);
	export default{
		props:{items:Array},
		components:{Create},
		data(){return{
			createModal:false
		}}
	}
</script>

<template>
	<div>
		<div class="fc">
			<div v-for="item in items" :key="item.id">
				{{item.text}}-{{item.done}}
			</div>
		</div>
		<button @click="createModal = !createModal">
			crear item
		</button>
		<Create v-if="createModal" @closeModal="createModal = false"/>
	</div>
</template>
