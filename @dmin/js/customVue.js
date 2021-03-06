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
            formData.append('quote', this.editList.quote);
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
            if (text == null) {
                return text;
            } else {
                return text.slice(0, 50) + (50 < text.length ? '...' : '')
            }
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
            axios.get('api/searchGallery.php?search=' + term)
                .then(function (response) {
                    mainData.galleryList = response.data;
                    // console.log(mainData.navList);
                }).catch(function (error) {
                // Error handling
            });
        }
    },
    created: function () {
        this.getGallery();
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
        pages: '',
        number: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29],
        caption: '',
        editId: '',
        gallerySearchList: '',
        searchImage: 'all'
    },
    methods: {
        getImage: function () {
            var mainData = this;
            var uri = window.location.href.split('?');
            // console.log(uri[1]);

            axios.get('api/getImage.php?' + uri[1])
                .then(function (response) {
                    mainData.imageList = response.data[0];
                    mainData.pages = response.data[1];
                    // console.log(response.data);
                }).catch(function (error) {
                // Error handling
            });

        },
        deleteImage: function (value) {
            var mainData = this;
            if (confirm('Are you sure you want to delete this image ?')) {
                axios.get('api/deleteImage.php?id=' + value)
                    .then(function (response) {
                        window.location.reload();
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
                    // mainData.getImage();
                    window.location.reload();
                }).catch(function (error) {
                // Error handling
            });
            this.closeCap();
        },
        closeCap: function () {
            $('.caption').hide();
            this.caption = '';
            this.editId = '';
        },
        getGalleryList: function () {
            var mainData = this;
            axios.get('api/getGallery.php')
                .then(function (response) {
                    mainData.gallerySearchList = response.data;
                    // console.log(mainData.gallerySearchList);
                }).catch(function (error) {
                // Error handling
            });
        },
        getByGallery: function () {
            var mainData = this;
            if (this.searchImage === 'all') {
                this.getImage();
            } else {
                axios.get('api/getByGallery.php?type=image&gallery=' + mainData.searchImage)
                    .then(function (response) {
                        mainData.imageList = response.data;
                        mainData.pages = '0';
                        // console.log(mainData.navList);
                    }).catch(function (error) {
                    // Error handling
                });
            }
        }
    },
    created: function () {
        this.getImage();
        this.getGalleryList();
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
        pages: '',
        number: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29],
        caption: '',
        editId: '',
        gallerySearchList: '',
        searchVideo: 'all'
    },
    methods: {
        getVideo: function () {
            var mainData = this;
            var uri = window.location.href.split('?');

            axios.get('api/getVideo.php?' + uri[1])
                .then(function (response) {
                    mainData.videoList = response.data[0];
                    mainData.pages = response.data[1];
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
                    // mainData.getVideo();
                    window.location.reload();
                }).catch(function (error) {
                // Error handling
            });
            this.closeCap();
        },
        closeCap: function () {
            $('.caption').hide();
            this.caption = '';
            this.editId = '';
        },
        getGalleryList: function () {
            var mainData = this;
            axios.get('api/getGallery.php')
                .then(function (response) {
                    mainData.gallerySearchList = response.data;
                    // console.log(mainData.gallerySearchList);
                }).catch(function (error) {
                // Error handling
            });
        },
        getByGallery: function () {
            var mainData = this;
            if (this.searchVideo === 'all') {
                this.getVideo();
            } else {
                axios.get('api/getByGallery.php?type=video&gallery=' + mainData.searchVideo)
                    .then(function (response) {
                        mainData.videoList = response.data;
                        mainData.pages = '0';
                        // console.log(mainData.navList);
                    }).catch(function (error) {
                    // Error handling
                });
            }
        }

    },
    created: function () {
        this.getVideo();
        this.getGalleryList();
    },
    filters: {
        strlimit: function (text) {
            return text.slice(0, 50) + (50 < text.length ? '...' : '')
        }

    }
});


//MAIL VUE JS

var mail = new Vue({
    el: '#mail',
    data: {
        mailData: ''
    },
    methods: {
        mailDetail: function (value) {
            var mainData = this;
            axios.get('api/getMail.php?id=' + value).then(function (response) {
                mainData.mailData = response.data;
                $('.mail').show();
            });
        },
        closeMail: function () {
            this.mailData = '',
                $('.mail').hide();
            location.reload(true);
        }
    }
});

//navigation mail vue js
var navMail = new Vue({
    el: '#navMail',
    data: {
        notification: '',
        count: ''
    },
    methods: {
        getNotification: function () {
            var mainData = this;
            axios.get('api/getNotification.php').then(function (value) {
                mainData.notification = value.data;
                mainData.count = value.data.length;
            });
        }
    },
    created: function () {
        this.getNotification();
    }
});

//CUSTOM JQUERY
$(document).ready(function () {

    $(".mail-table").on({
        mouseenter: function () {
            $(this).children('td').css({'font-size': '1.15em'})
        },
        mouseleave: function () {
            $(this).children('td').css({'font-size': '1em'})
        }
    });
});