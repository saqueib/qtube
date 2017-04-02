<template>
    <div class="row">
        <div v-for="video in list"  class="video-grid col-xs-6 col-sm-4 col-md-3">
            <div class="video">

                <div class="thumbnail">
                    <router-link :to="{ name: 'VideoDetailPage', params: { id: video.id, slug: $root.slug(video.title) }}">
                        <img :src="video.thumbnail" :alt="video.title">
                    </router-link>
                </div>

                <div class="caption">
                    <h3>
                        <router-link :to="{ name: 'VideoDetailPage', params: { id: video.id, slug: $root.slug(video.title) }}">
                            {{ video.title }}
                        </router-link>
                    </h3>
                    <p>
                        <router-link :to="{ name: 'ChannelPage', params: {id: video.channel_id, slug: $root.slug(video.channel.name)}}">
                            {{ video.channel.name }}
                        </router-link>
                        <br>
                        {{ video.views }} views &bull; {{ video.created_at }}</p>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['list'],

        mounted() {
            console.log('Video Thumb mounted.')
        }
    }
</script>