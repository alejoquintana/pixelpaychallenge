<script>
import { Inertia } from '@inertiajs/inertia'
export default{
	data(){
		return{
			form:{
				text:''
			}
		}
	},
	methods:{
		createItem(){
			if(!this.form.text)return
			axios.post('/api/item', this.form)
				.then(res => {
					Inertia.reload()
				})
			this.$emit('closeModal')
		}
	},
	mounted(){
		document.getElementById('item_text').focus()
	}
}
</script>

<template>
<div>
	<div class="modal" >
		<div class="modal-container">
			<form @submit.prevent="createItem" class="fcc">
				<label for="item_text">Tarea:</label>
				<input id="item_text" v-model="form.text" autofocus
				class="border-solid border-2 border-sky-700 my-2"/>
				<button type="submit" class="bg-sky-700 px-4 py-1 text-white">CREAR</button>
			</form>
		</div>
	</div>
</div>
</template>

