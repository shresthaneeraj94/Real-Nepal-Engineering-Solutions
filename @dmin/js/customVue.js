var navigation = new Vue({
    el: '#navigation',
    data: {
        navList: 'No data',
        editList: '',
        imageData: ''
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
        handleFileUpload: function () {
            this.imageData = this.$refs.file.files[0];
        },
        submitEdit: function () {
            var mainData = this;

            var formData = new FormData();
            formData.append('id', this.editList.id);
            formData.append('title', this.editList.title);
            formData.append('detail', this.editList.detail);
            formData.append('category', this.editList.category);
            formData.append('tab_stat', this.editList.tab_stat);
            formData.append('image', this.imageData);

            axios.post('api/updateNavigation.php', formData, {headers: {'Content-Type': 'multipart/form-data'}})
                .then(function (response) {
                    // console.log(response);
                    mainData.getNavigation();
                    $('.navform').hide();
                    alert('Data Successfully Updated !');
                }).catch(function (error) {
                // Error handling
            });
        },
        navDelete: function (value) {
            var mainData = this;
            if (confirm('Are you sure you want to delete this data ?')) {
                axios.get('api/deleteNavigation.php?id=' + value)
                    .then(function (response) {
                        mainData.getNavigation();
                        alert('Navigation data deleted !');
                    }).catch(function (error) {
                    // Error handling
                });
            }
        }
    },
    created: function () {
        this.getNavigation()
    }
});