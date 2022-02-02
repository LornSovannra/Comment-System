<section>
    <div id="section-wrapper">
        <div class="content-wrapper">

            <!-- Post Area -->
            <div class="post-area-wrapper">
                <div class="post-area">
                    <div class="post-area-top">
                        <img src="./img/IMG_6116.JPEG" alt="">
                        <p>What's on your mind, Lorn?</p>
                    </div>
                    <div class="post-area-bottom">
                        <div class="post-area-bottom-left">
                            <i class="fas fa-video"></i>
                            <p>Live Video</p>
                        </div>
                        <div class="post-area-bottom-mid">
                            <i class="fas fa-images"></i>
                            <p>Photo/Video</p>
                        </div>
                        <div class="post-area-bottom-right">
                            <i class="far fa-smile"></i>
                            <p>Feeling/Activity</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Post Area -->

            @foreach ($posts as $post)
                <!-- Content -->
                <div class="content">
                    <div class="card-top">
                        <a style="text-decoration: none; color: black;" href="{{-- {{ route("user.post.profile", $post -> user_post_id) }} --}}">
                            <div class="card-top-left">
                                <img src="img/{{ $post -> user_post_profile_image }}" alt="">
                                <div>
                                    <p style="margin: -2px 0 0 0; font-weight: bold;">{{ $post -> user_post_name }}</p>
                                    <p style="color: gray; font-size: 10px; margin: 4px 0 0 0;">{{ $post -> user_post_date}}</p>
                                </div>
                            </div>
                        </a>
                        <div class="card-top-right">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                    </div>
                    <div class="caption-date">
                        <div class="caption" style="padding: 0 0 0 0;">
                            <p>{{ $post -> user_post_caption }}</p>
                        </div>
                    </div>
                    <div class="card-mid">
                        <img src="post_img/{{ $post -> user_post_image }}" alt="">
                    </div>
                    <div class="card-bottom">
                        <div class="card-bottom-left">
                            <div class="like_comment_share">
                                <div class="like_dislike"><i class="far fa-heart"></i></div>
                                <div class="commenting"><i class="far fa-comment"></i></div>
                                <div class="share"><i class="fab fa-telegram-plane"></i></div>
                            </div>
                        </div>
                        <div class="card-bottom-right">
                            <i class="far fa-bookmark"></i>
                        </div>
                    </div>
                    <div class="like">
                        <p>999 likes</p>
                    </div>

                    <div class="comment" style="border-bottom: 1px solid gray">
                        <form action="{{ route("comment") }}" method="POST">
                            @csrf
                            <div class="comment-wrapper">
                                <i class="far fa-smile"></i>
                                <input type="text" name="post_id" hidden value="{{ $post -> id }}" id="post_id">
                                <input type="text" name="user_comment_name" hidden value="Lorn Sovannra" id="user_comment_name">
                                <input type="text" name="user_comment_content" placeholder="Add a comment..." id="user_comment_content">
                                <input type="text" name="user_comment_profile_image" hidden value="IMG_6116.JPEG" id="user_comment_profile_image">
                                <input type="text" name="user_comment_date" hidden value="{{ $date }}" id="post_id" id="user_comment_date">
                                <button type="submit" style="background: none; border: none; cursor: pointer;" class="post_submit_btn" id="post_sumbit_btn">Post</button>
                            </div>
                        </form>
                    </div>

                    @foreach ($comments as $comment)
                        @if ($comment -> post_id == $post -> id)    
                            <div style="display: flex; margin: 10px 0 10px 15px;">
                                <img class="profile_image_img" src="img/IMG_6116.JPEG" alt="">
                                <div style="background: whitesmoke; padding: 10px 10px 0 10px; border-radius: 15px;">
                                    <div style="display: flex; margin: 0 0 0 5px;">
                                        <p style="margin: -2px 0 0 0; font-weight: bold;">{{ $comment -> user_comment_name }}</p>
                                        <p style="color: gray; font-size: 10px; margin: 3px 0 0 10px;">{{ $comment -> user_comment_date}}</p>
                                    </div>
                                    <div class="edit_delete_wrapper">
                                        <p style="margin: 0 0 0 5px; padding: 10px 0 0 0;">{{ $comment -> user_comment_content }}</p>
                                        <div style="display: flex; font-size: 12px; cursor: pointer; justify-content: flex-end;" class="edit_delete">

                                            <p style="padding: 0 8px 0 0; margin: 12px 0 0 0;" id="edit_comment_button">Edit</p>

                                            <form action="{{ route("delete-comment", $comment -> id) }}" method="POST">
                                                @csrf
                                                <button type="submit" style="background: none; border: none; cursor: pointer; padding: 12.2px 0 0 0;" class="show_confirm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="cancel_save_wrapper" style="display: none;">
                                        <form action="{{ route("update-comment", $comment -> id) }}" method="POST">
                                            @csrf
                                            <input style="margin: 10px 0 0 5px; width: 300px; height: 35px" type="text" name="user_comment_content" value="{{ $comment -> user_comment_content }}">
                                            {{-- <textarea type="text" name="user_comment_content">
                                                {{ $comment -> user_comment_content }}
                                            </textarea> --}}
                                            <div style="display: flex; font-size: 12px; cursor: pointer; justify-content: flex-end;" class="edit_delete">
                                                <p style="padding: 5px 8px 0 0; margin: -4px 0 0 0;" id="cancel_save_button">Cancel</p>
                                                <button type="submit" id="save_comment_btn" style="background: none; border: none; cursor: pointer;">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        
                    @endforeach
                </div>
                <!-- End Content -->
            @endforeach
        </div>
    </div>
</section>