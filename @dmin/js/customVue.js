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
    },
    filters: {
        strlimit: function (text) {
            return text.slice(0, 50) + (50 < text.length ? '...' : '')
        }

    }
});


//GALLERY VUE JS
var gallery = new Vue({
    el: '#gallery',
    data: {
        message: 'hello',
        galleryList: '',
        editGallery: '',
        featuredImg: '',
        searchTerm: ''
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
            console.log(value);
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
        },
        search: function () {
            var mainData = this;
            var term = this.searchTerm;
            axios.get('api/searchGallery.php?search='+term)
                .then(function (response) {
                    mainData.galleryList = response.data;
                    // console.log(mainData.navList);
                }).catch(function (error) {
                // Error handling
            });
        }
    },
    created: function () {
        this.getGallery()
    },
    filters: {
        strlimit: function (text) {
            return text.slice(0, 50) + (50 < text.length ? '...' : '')
        }

    }
});


//ADD DETAIL GALLERY
var addDetail = new Vue({
    el: '#addDetail',
    data: {
        img: 25,
        vid: 25
    },
    methods: {
        addImage: function () {
            var imageBlock = "<div id='img-block-" + this.img + "'><i class=\"fa fa-image text-success\"> Image : </i><input type=\"file\" name=\"images[]\"><input type=\"text\" name=\"capImg[]\" placeholder=\"Image Caption\" required><hr></div>";
            $('#img-vid-form').append(imageBlock);
            this.img++;
        },
        addVideo: function () {
            var videoBlock = "<div id='vid-block-" + this.vid + "'><i class=\"fa fa-video-camera text-success\"> Video : </i><input type=\"text\" name=\"videos[]\" placeholder=\"Video URL\"><input type=\"text\" name=\"capVideo[]\" placeholder=\"Video Caption\" required><hr></div>";
            $('#img-vid-form').append(videoBlock);
            this.vid++;
        },
        test: function () {
        },
        minusImage: function () {
            this.img--;
            $('#img-block-' + this.img).remove();
        },
        minusVideo: function () {
            this.vid--;
            $('#vid-block-' + this.vid).remove();
        }
    },
    created: function () {
        this.addImage();
    }
});


//IMAGE LIST
var image = new Vue({
    el: '#image',
    data: {
        imageList: '',
        caption: '',
        editId: ''
    },
    methods: {
        getImage: function () {
            var mainData = this;
            axios.get('api/getImage.php')
                .then(function (response) {
                    mainData.imageList = response.data;
                    // console.log(mainData.navList);
                }).catch(function (error) {
                // Error handling
            });

        },
        deleteImage: function (value) {
            var mainData = this;
            if (confirm('Are you sure you want to delete this image ?')) {
                axios.get('api/deleteImage.php?id=' + value)
                    .then(function (response) {
                        mainData.getImage();
                        alert('Image data deleted !');
                    }).catch(function (error) {
                    // Error handling
                });
            }
        },
        editImage: function (value) {
            $('.caption').show();
            this.editId = value;
        },
        submitCap: function () {
            var mainData = this;
            var formData = new FormData();
            formData.append('id', this.editId);
            formData.append('caption', this.caption);

            axios.post('api/updateImage.php', formData)
                .then(function (response) {
                    console.log(response);
                    mainData.getImage();
                }).catch(function (error) {
                // Error handling
            });
            this.closeCap();
        },
        closeCap: function () {
            $('.caption').hide();
            this.caption = '';
            this.editId = '';
        }
    },
    created: function () {
        this.getImage();
    },
    filters: {
        strlimit: function (text) {
            return text.slice(0, 50) + (50 < text.length ? '...' : '')
        }

    }
});


//VIDEO LIST
var video = new Vue({
    el: '#video',
    data: {
        videoList: '',
        caption: '',
        editId: ''
    },
    methods: {
        getVideo: function () {
            var mainData = this;
            axios.get('api/getVideo.php')
                .then(function (response) {
                    mainData.videoList = response.data;
                    // console.log(mainData.navList);
                }).catch(function (error) {
                // Error handling
            });

        },
        deleteVideo: function (value) {
            var mainData = this;
            if (confirm('Are you sure you want to delete this video ?')) {
                axios.get('api/deleteVideo.php?id=' + value)
                    .then(function (response) {
                        window.location.replace('/@dmin/Video');
                        alert('Video data deleted !');
                    }).catch(function (error) {
                    // Error handling
                });
            }
        },
        editVideo: function (value) {
            $('.caption').show();
            this.editId = value;
        },
        submitCap: function () {
            var mainData = this;
            var formData = new FormData();
            formData.append('id', this.editId);
            formData.append('caption', this.caption);

            axios.post('api/updateVideo.php', formData)
                .then(function (response) {
                    console.log(response);
                    mainData.getVideo();
                }).catch(function (error) {
                // Error handling
            });
            this.closeCap();
        },
        closeCap: function () {
            $('.caption').hide();
            this.caption = '';
            this.editId = '';
        }

    },
    created:

        function () {
            this.getVideo();
        }

    ,
    filters: {
        strlimit: function (text) {
            return text.slice(0, 50) + (50 < text.length ? '...' : '')
        }

    }
});