<template>
    <div class="panel panel-default">
        <div class="panel-heading comment-box">
            Comment
        </div>
        <div class="panel-body">
            <form action="">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img width="48" class="media-object" src="{{ asset('img/avatar-placeholder.jpg')  }}" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="form-group">
                            <textarea name="comment" class="form-control" placeholder="Commenting as Saqueib"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="reset" class="btn btn-sm btn-default">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-info">Comment</button>
                        </div>
                    </div>
                </div>
            </form>

            <hr>
        </div>

        <div class="panel-body">
            <div class="comment-thread">

                <div class="discussions">
                    <div class="form-group">
                        <select name="" id="" class="form-control">
                            <option value="">Top Comment</option>
                            <option value="">Newest First</option>
                        </select>
                    </div>

                    <div class="media">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img width="48" class="media-object" src="{{ asset('img/avatar-placeholder.jpg')  }}" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="">Loqman kurdi</a> 6 hours ago</h4>
                            <p>please listen to my recitation
                                            Allah reward u
                                            😊😊😊😊﻿</p>
                        </div>
                    </div>

                    <div class="media">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img width="48" class="media-object" src="{{ asset('img/avatar-placeholder.jpg')  }}" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="">Loqman kurdi</a> 6 hours ago</h4>
                            <p>please listen to my recitation
                                            Allah reward u
                                            😊😊😊😊﻿</p>
                        </div>
                    </div>
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