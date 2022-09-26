<script>
	import { Inertia } from '@inertiajs/inertia'
	export default{
		props:{
			item:Object,
			onDelete:Boolean,
		},
		data(){return{
			edit:false,
		}},
		methods:{
			update(field,value){
				console.log('value',value);
				if (value == undefined) {
					value = this.item[field]
				console.log('value',value);
				}
				let data = {
					id:this.item.id,
					field:field,
					value:value,
				}
				axios.put('/api/item',data)
				.then(res => {
					Inertia.reload()
				})
			},
			destroy(){
				axios.delete('/api/item/'+this.item.id)
				.then(res => {
					Inertia.reload()
				})
			},
		}
	}
</script>

<template>
	<div class="grid grid-cols-6 gap-2">
		<div class="col-span-4">
			<p v-if="!edit" @click="edit=true" class="px-4 py-1">
				{{item.text}}
			</p>
			<input v-if="edit" autofocus type="text" class="px-4 py-1" v-model="item.text" @change="update('text')">
		</div>
		<div class="col-span-1 fcc">
			<button v-if="item.done == 0" class="bg-gray-200 text-white rounded-md" @click="update('done',1)">
				<svg class="w-6 h-6 p-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
				</svg>
			</button>
			<button v-if="item.done == 1" class="bg-sky-700 text-white rounded-md" @click="update('done',0)">
				<svg class="w-6 h-6 p-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
				</svg>
			</button>
		</div>
		<div class="col-span-1 fcc">
			<button class="bg-red-700 text-white rounded-md" @click="destroy()">
				<svg class="w-6 h-6 p-1"
				xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
				</svg>
			</button>
		</div>

	</div>
</template>
