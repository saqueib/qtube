<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-cover" :style="{ 'background-image': 'url('+ channel.cover +')'}">

                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" :src="channel.logo" :alt="channel.name">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{ channel.name }}</h4>
                                <div role="group" aria-label="..." class="btn-group btn-group-sm">
                                    <button class="btn btn-subscribe btn-primary">
                                        <span class="glyphicon glyphicon-play"></span> Subscribe</button>
                                    <button disabled="disabled" class="btn btn-default">56,454</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-heading">
                        Recent Videos
                    </div>

                    <div class="panel-body">
                        <video-thumb :list="channel.videos.data"></video-thumb>
                    </div>

                    <div class="panel-heading">
                        About
                    </div>

                    <div class="panel-body">
                        <p>{{ channel.about }}</p>
                        <p>Author <span class="text-dark">{{ channel.user.name }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id'],

        data() {
            return {
                channel: {
                    cover: '',
                    data: [],
                    videos: { data: [] },
                    user: {}
                }
            }
        },

        mounted() {
            this.getChannel();
            console.log('Component mounted.')
        },

        methods: {
            getChannel() {
                this.$Progress.start();

                axios.get('/api/channels/' + this.id + '?videos=true' ).then((res) => {
                    this.$Progress.finish();
                    this.channel = res.data;

                    // change the title of page
                    window.document.title = this.channel.name;
                }).catch((err) => {
                    this.$Progress.finish();
                });
            }
        }
    }
</script>