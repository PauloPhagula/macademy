let config = {
    map: {
        "*": {
            "fadeInElement": "Macademy_JsFun/js/fade-in-element",
        }
    },
    paths: {
        "vue": [
            "https://cdn.jsdelivr.net/npm/vue/dist/vue",
            "Macademy_JsFun/js/vue" // fallback
        ]
    },
    shim: {
        "Macademy_JsFun/js/jquery-log": ["jquery"]
    },
    deps: [
        "Macademy_JsFun/js/every-page"
    ],
    config: {
        "mixins": {
            "Magento_Ui/js/view/messages":  {
                "Macademy_JsFun/js/messages-mixin": true
            }
        }
    }
}
