define([
    "vue",
    "jquery",
    "Macademy_JsFun/js/jquery-log"
], function(Vue, $) {
    "use strict";

    $.log("Testing jquery-log shimming");

    return function(config, element) {
        new Vue({
            el: "#" + element.id,
            data: {
                message: config.message
            }
        })
    }
})
