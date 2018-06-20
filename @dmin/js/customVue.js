var navigation = new Vue({
    el: '#navigation',
    data: {
        navList: 'No data',
        editList: ''
    },
    methods: {
        getNavigation: function () {
            var mainData = this;
            axios.get('api/getNavigation.php')
                .then(function (response) {
                    mainData.navList = response.data;
                    // console.log(mainData.navList);
                }).catch(function (error) {
                // Error handling
            });
        },
        testing: function () {

        },
        navEdit: function (value) {
            var mainData = this;
            axios.get('api/getEditNavigation.php?id=' + value)
                .then(function (response) {
                    mainData.editList = response.data;
                    $('.navform').show();
                }).catch(function (error) {
                // Error handling
            });
        },
        closeEditForm: function () {
            $('.navform').hide();
        },
        submitEdit: function () {
            var mainData = this;
            axios.post('api/updateNavigation.php', mainData.editList)
                .then(function (response) {
                    console.log(response);
                    mainData.getNavigation();
                    $('.navform').hide();
                    alert('Data Successfully Updated !');
                }).catch(function (error) {
                // Error handling
            });
        },
        navDelete: function (value) {
            console.log(value)
        }
    },
    created: function () {
        this.getNavigation()
    }
});