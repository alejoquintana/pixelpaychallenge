<script>
	import { Inertia } from '@inertiajs/inertia'
	import Create from './CreateItem.vue';
	import Item from './Item.vue';
	//defineProps(['items']);
	export default{
		props:{items:Array},
		components:{Create,Item},
		data(){return{
			createModal:false
		}},
		methods:{
			deleteAll(){
				axios.delete('/api/item/all')
				.then(res => {
					Inertia.reload()
				})
			},
		}
	}
</script>

<template>
	<div class="grid grid-cols-2 gap-2">
		<button class="col-span-1 bg-sky-700 rounded-md text-white py-1" @click="createModal = !createModal">
			CREAR ITEM
		</button>
		<button class="col-span-1 bg-red-700 rounded-md text-white py-1" @click="deleteAll()">
			BORRAR TODOS
		</button>
		<div class="px-4 col-span-2">
			<Item v-for="item in items" :key="item.id"
			:item="item" />
		</div>
		<Create v-if="createModal" @closeModal="createModal = false"/>
	</div>
</template>
