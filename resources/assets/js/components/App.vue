<template>
	<div id="app">
		<transition name="fade">
			<component :is="layout"></component>
		</transition>
	</div>
</template>

<script>
// Load layout components dynamically
const requireContext = require.context('../layouts', false, /.*\.vue$/);

const layouts = requireContext.keys()
	.map(file =>
		[file.replace(/(^.\/)|(\.vue$)/g, ''), requireContext(file)]
	).reduce((components, [name, component]) => {
		components[name] = component;
		return components;
	}, {});

export default {

	data: () => ({
		layout: 'app',
		defaultLayout: 'default'
	}),

	components: {
		home: require('../layouts/Default.vue'),
		app: require('../layouts/App.vue')
	},

	mounted() {
		console.log('app mounted');
	},

	methods: {

		/**
		 * Set the application layout
		 *
		 * @param String layout
		 */
		setLayout(layout) {
			if (!layout || !layouts[layout]) {
				layout = this.defaultLayout;
			}

			this.layout = layouts[layout];
		}
	}
}
</script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to {
  opacity: 0
}
</style>