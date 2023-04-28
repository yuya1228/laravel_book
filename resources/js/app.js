import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

(function () {
    'use strict';

    // フラッシュメッセージのフィードアウト
    $(function () {
        $(`.message`).feedOut(3000);
    });
})

(function () {
    'use strict';

    $(function () {
        $(`.cart_message`).feedOut(3000);
    });
})

var app = new Vue({
    el: '#app',
    data: {
        open: false,
    }
})


