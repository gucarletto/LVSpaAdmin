import VueRouter from 'vue-router';

let routes = [
  {
      path: '/dashboard',
      component: require('./views/dashboard').default
  },
  {
    path: '/usuarios',
    component: require('./views/usuarios').default
  }
];

export default new VueRouter({
  base: '/admin/',
  mode: 'history',
  routes,
  linkActiveClass: 'active'
});