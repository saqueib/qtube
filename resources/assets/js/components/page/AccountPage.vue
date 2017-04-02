<template>
    <div class="container">
        <div class="row mt">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Latest Videos</div>

                    <div class="panel-body">
                        <video-thumb :list="$root.auth.Videos"></video-thumb>
                        <p v-if="!$root.auth.Videos.length" class="text-center">You don't have any video uploaded yet.</p>
                    </div>
                </div>

                <h4>OAuth Management</h4>

                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>

            <div class="col-md-2">
                <div class="text-center mt">
                    <img class="img-circle" :src="$root.auth.avatar" :alt="$root.auth.name">
                    <h4>{{ $root.auth.name }} <br>
                        <small>{{ $root.auth.email  }}</small></h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>