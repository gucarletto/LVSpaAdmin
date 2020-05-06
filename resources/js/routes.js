import VueRouter from 'vue-router';

let routes = [
  {
      path: '/dashboard',
      component: require('./views/Dashboard').default
  }
];

export default new VueRouter({
  mode: 'history',
  routes,
  linkActiveClass: 'active'
});