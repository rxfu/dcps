export default [{
	path: '/example',
	name: 'example',
	component: require('./components/Example.vue')
}, {
	path: '/login',
	name: 'login',
	component: require('./pages/auth/Login.vue')
}, {
	path: '*',
	name: 'not-found',
	component: require('./pages/errors/404.vue')
}]