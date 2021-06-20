import Vue from 'vue';
import App from './Old_App.vue';
// import router from "./router";
import vuetify from './plugins/vuetify';
import './plugins'
import "./assets/css/styles.scss";

Vue.config.productionTip = false

new Vue({
  vuetify,
  render: h => h(App)
}).$mount('#app')
