var navigation = new Vue({
    el: '#navigation',
    data: {
        navList: 'No data'
    },
    methods: {
        getNavigation: function () {
            var mainData = this;
            axios.get('api/getNavigation.php')
                .then(function (response) {
                    mainData.navList = response.data;
                    console.log(mainData.navList);
                }).catch(function (error) {
                // Error handling
            });
        },
        testing: function () {

        }
    },
    created: function () {
        this.getNavigation()
    }
});