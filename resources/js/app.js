require("./bootstrap");

window.Vue = require("vue").default;

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component("posts", require("./components/Posts.vue").default);
Vue.component("posts-create", require("./components/PostsCreate.vue").default);
Vue.component("posts-item", require("./components/PostsItem.vue").default);

const app = new Vue({
    el: "#app"
});
