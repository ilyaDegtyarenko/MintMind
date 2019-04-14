import {VueOnline} from 'vue-online';

Vue.prototype.$bus = new Vue();
Vue.prototype.$internetConnection = VueOnline;
Vue.prototype.$translate = translate;
Vue.prototype.$locale = locale;
Vue.prototype.$sendBrowserNotification = (title, {tag, body, icon}) => {
    let permission = Notification.permission.toLowerCase();
    if (permission === 'denied') {
        console.info('%cPermission required for browser notifications.', 'color:orange;font-weight:500;');
    } else if (permission === 'default') {
        Notification.requestPermission();
    } else if (permission === 'granted') {
        if (!title) {
            console.error('Title is required to sending browser notifications.');
        } else {
            if (!tag) tag = new Date().toISOString();
            if (!body) body = 'Mint Notification';

            new Notification(title, {
                tag,
                body,
                icon
            }).onerror = () => {
                console.info('%cCan\'t send notification to browser.\nCheck the permission.', 'color:orange;font-weight:500;');
            };
        }
    }
};
