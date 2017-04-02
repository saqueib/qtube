<template>
    <div class="col-xs-6 col-sm-4 col-md-3">
        <div class="video">
            <div class="thumbnail">
                <img src="{{ asset('img/video-thumb-placeholder.png')  }}" alt="...">
            </div>
            <div class="caption">
                <h3><a href="">Title of the video {{ $i  }}</a></h3>
                <p><a href="">Channel Name</a> <br>
                    67,{{$i}}73 views &bull; 1 week ago</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['list'],
        data() {
            return {
                video: this.list
            }
        },
        mounted() {
            console.log('Video Thumb mounted.')
        }
    }
</script>