(function () {
    'use strict';

    // フラッシュメッセージのフィードアウト
    $(function () {
        $(`.message`).feedOut(3000);
    });
})

var app = new Vue({
    el: '#app',
    data: {
        open:false,
    }
})
