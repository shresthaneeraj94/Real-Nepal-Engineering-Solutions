//NAVIGATION VUE JS
var navigation = new Vue({
    el: '#navigation',
    data: {
        navList: 'No data',
        editList: '',
        imageData: '',
        search: 'all',
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
        },
        getCategory: function () {
            var mainData = this;
            if (this.search === 'all') {
                this.getNavigation();
            } else {
                axios.get('api/getByCategory.php?category=' + mainData.search)
                    .then(function (response) {
                        mainData.navList = response.data;
                        // console.log(mainData.navList);
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


//GALLERY VUE JS

var gallery = new Vue({
    el: '#gallery',
    data: {
        message: 'hello',
        galleryList: '',
        editGallery: '',
        featuredImg: ''
    },
    methods: {
        getGallery: function () {
            var mainData = this;
            axios.get('api/getGallery.php')
                .then(function (response) {
                    mainData.galleryList = response.data;
                    // console.log(mainData.navList);
                }).catch(function (error) {
                // Error handling
            });
        },
        galleryEdit: function (value) {
            console.log(value)
            var mainData = this;
            axios.get('api/getEditGallery.php?id=' + value)
                .then(function (response) {
                    mainData.editGallery = response.data;
                    $('.galleryform').show();
                }).catch(function (error) {
                // Error handling
            });
        },
        closeGalleryEditForm: function () {
            $('.galleryform').hide();
        },
        handleGalleryFileUpload: function () {
            this.featuredImg = this.$refs.file.files[0];
        },
        submitGallery: function () {
            var mainData = this;

            var formData = new FormData();
            formData.append('id', this.editGallery.id);
            formData.append('title', this.editGallery.title);
            formData.append('detail', this.editGallery.detail);
            formData.append('navigation_id', this.editGallery.navigation_id);
            formData.append('image', this.featuredImg);

            axios.post('api/updateGallery.php', formData, {headers: {'Content-Type': 'multipart/form-data'}})
                .then(function (response) {
                    // console.log(response);
                    mainData.getGallery();
                    $('.galleryform').hide();
                    alert('Data Successfully Updated !');
                }).catch(function (error) {
                // Error handling
            });
        },
        galleryDelete: function (value) {
            var mainData = this;
            if (confirm('Are you sure you want to delete this data ?')) {
                axios.get('api/deleteGallery.php?id=' + value)
                    .then(function (response) {
                        mainData.getGallery();
                        alert('Gallery data deleted !');
                    }).catch(function (error) {
                    // Error handling
                });
            }
        },
        addDetail: function (value) {
            console.log(value);
            window.location.replace('/@dmin/AddDetailGallery?id=' + value);
        }
    },
    created: function () {
        this.getGallery()
    }
});