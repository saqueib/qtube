<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Recommended
                    </div>
                    <div class="panel-body">
                        <video-thumb :list="videos.data"></video-thumb>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Recently uploaded
                    </div>

                    <div class="panel-body">
                        <video-thumb :list="videos.data"></video-thumb>
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
                }
            }
        },

        mounted() {
            this.$Progress.start();

            axios.get('/api/videos').then((res) => {
                this.$Progress.finish();
                this.videos = res.data;
            }).catch((err) => {
                this.$Progress.finish();
                console.log(err);
            });

            console.log('Home Component mounted.')
        }
    }
</script>