import { createApp } from 'vue';
import Antd from 'ant-design-vue';

// import components here
import MasterLayout from "./components/layout/master.vue";
import Project from "./components/project/index.vue";
import Users from "./components/user/index.vue";

const app = createApp({
    data: () => ({ name: '' }),
    components: {
        'master-layout': MasterLayout,
        'the-projects' : Project,
        'the-users' : Users
    }
});

app.use(Antd);
app.mount('#app_codinlab');
