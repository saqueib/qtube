<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Trending in Category
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li v-for="cat in categories"><a href="#">{{ cat.name }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                               <h5>Category Name</h5>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <video-thumb :list="videos.data"></video-thumb>

                        <p class="text-center pager">
                            <a class="btn btn-default" href="#" role="button">Load More</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                videos: {
                    data: []
                },
                categories: []
            }
        },

        mounted() {
            this.$Progress.start();
            // change the title of page
            window.document.title = 'Trending on QTube';

            axios.get('/api/videos?trending=true&categories=true').then((res) => {
                this.$Progress.finish();
                this.videos = res.data;
                this.categories = res.data.categories;
            }).catch((err) => {
                this.$Progress.finish();
                console.log(err);
            });

            console.log('Trending Component mounted.')
        }
    }
</script>