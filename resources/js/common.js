export default {
    data() {
        return {

        }
    },

    methods: {

        async callApi(method, url, dataObj){

            try {
              return await axios({
                    method: method,
                    url: url,
                    data:dataObj
                  });
    
            } catch (e) {
                return e.response
    
            }
            },

        i(desc, title = 'Hey') {
            this.$Notice.info({
                title: title,
                desc: desc,
                duration: 9
            });

        },
        s(desc, title = 'Trés bien') {
            this.$Notice.success({
                title: title,
                desc: desc,
                duration: 10
            });
        },
        w(desc, title = 'Alert') {
            this.$Notice.warning({
                title: title,
                desc: desc,
                duration: 10
            });
        },
        e(desc, title = 'Erreur') {
            this.$Notice.error({
                title: title,
                desc: desc,
                duration: 6
            })


        },

        swr(desc = "Some thing went wrong ! Pleasetry again ", title = 'Hey') {
            this.$Notice.error({
                title: title,
                desc: desc,
                duration: 10
            });
        },

    }
}



