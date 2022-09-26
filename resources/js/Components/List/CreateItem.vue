<script>
import { Inertia } from '@inertiajs/inertia'
/* import { reactive } from 'vue'

export default {
  setup () {
    const form = reactive({
      text: null,
    })

    function submit() {
      Inertia.post('/api/item', form)
    }

    return { form, submit }
  },
} */
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
			Inertia.post('/api/item', this.form)
			this.$emit('closeModal')
		}
	}
}
</script>

<template>
<div>
	<div class="modal" >
		<div class="modal-container">
			<form @submit.prevent="createItem" class="fcc">
				<label for="item_text">First name:</label>
				<input id="item_text" v-model="form.text"
				class="border-solid border-2 border-sky-700 my-2"/>
				<button type="submit" class="bg-sky-700 px-4 py-1 text-white">SUBMIT</button>
			</form>
		</div>
	</div>
</div>
</template>

