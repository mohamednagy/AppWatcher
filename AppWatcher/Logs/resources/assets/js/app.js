$(document).ready(function(){
       $('.tag-container a').selectedTag({container: '.tag-container'});
});

Vue.component('logs', require('./components/Logs.vue'));
