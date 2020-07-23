<template>
	<transition name="fade">
		<div id="flash-component" v-show="visible">
			<span class="hide" @click="hide()">X</span>
			{{message.message}}
		</div>
	</transition>
</template>

<script>
	export default {
		mounted: function() {
			console.log('VUE component mounted.')
		},

		created: function()
		{
			this.show();
		},

		props: [
			'message'
		],

		data: function() {
			return {
				visible: true
			}
		},

		methods: {
			show: function()
			{
				this.visible = true;
				setTimeout(() => this.hide(), 15000);
			},
			hide: function()
			{
				this.visible = false;
			}
		}
	}
</script>