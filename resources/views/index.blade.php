<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Me KH</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script defer src="./js/index.js"></script>
    <script defer src="./js/header.js"></script>
</head>
<body style="margin: 0; padding: 0;">
    <div class='header'>
        <div class="header-left">
            <div>
                <h3>BM</h3>
            </div>
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search Facebook"/>
            </div>
        </div>
        <div class="header-center">
            <div class="header-option header-option-active"><i class="fas fa-home"></i></div>
            <div class="header-option"><i class="fas fa-flag"></i></div>
            <div class="header-option"><i class="fas fa-heart"></i></div>
            <div class="header-option"><i class="fas fa-store"></i></div>
            <div class="header-option"><i class="fas fa-archive"></i></div>
        </div>
        <div class="header-right">
            <div class="account">
                <div class="header-right-profile">
                    <img id="post-area-top-img" src="./img/IMG_6116.JPEG" alt="">
                    <h4>Lorn</h4>
                </div>
            </div>
            <div class="header-right-option"><i class="fas fa-bars"></i></div>
            <div class="header-right-option"><i class="fab fa-facebook-messenger"></i></div>
            <div class="header-right-option"><i class="fas fa-bell"></i></div>
            <div class="header-right-option"><i class="fas fa-caret-down"></i></div>
        </div>
    </div>
    {{-- End Header --}}

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
                                        <p style="margin: -2px 0 0 0;">{{ $post -> user_post_name }}</p>
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
                                    <input type="text" name="post_id" hidden value="{{ $post -> id }}">
                                    <input type="text" name="user_comment_name" hidden value="Lorn Sovannra">
                                    <input type="text" name="user_comment_content" placeholder="Add a comment...">
                                    <input type="text" name="user_comment_profile_image" hidden value="IMG_6116.JPEG">
                                    <input type="text" name="user_comment_date" hidden value="{{ $date }}">
                                    <button type="submit" style="background: none; border: none; cursor: pointer;" class="post_submit_btn">Post</button>
                                </div>
                            </form>
                        </div>

                        @foreach ($comments as $comment)
                            <div style="display: flex; margin: 15px 0 0 15px;">
                                @if ($comment -> post_id == $post -> id)    
                                    <img class="profile_image_img" src="img/IMG_6116.JPEG" alt="">
                                    <div style="margin: 10px 0 0 0;">
                                        <div style="display: flex; margin: 0 0 0 5px;">
                                            <p style="margin: -2px 0 0 0;">{{ $comment -> user_comment_name }}</p>
                                            <p style="color: gray; font-size: 10px; margin: 3px 0 0 10px;">{{ $comment -> user_comment_date}}</p>
                                        </div>
                                        <p style="margin: 0 0 10px 5px; padding: 10px 0 0 0;">{{ $comment -> user_comment_content }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <!-- End Content -->
                @endforeach
            </div>
        </div>
    </section>

    <!-- Post Pop Up -->
    <div class="post-pop-up-wrapper">
        <div class="post-pop-up">
            
            <div class="post-pop-up-top">
                <h3>Create Post</h3>
                <div class="close-post-pop-up"><i class="far fa-times-circle"></i></div>
            </div>
            
            @if ($errors->any())
                <ul style="list-style: none; color: red; margin: 0 0 1em 0;">
                    @foreach ($errors -> all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route("post") }}" enctype="multipart/form-data" class="post-pop-up-bottom">
                @csrf
                <div>
                    <textarea name="user_post_caption" placeholder="What's on your mind, Lorn?"></textarea>
                </div>
                <input name="user_post_name" type="text" hidden value="Lorn Sovannra">
                <input name="user_post_image" class="input_post_upload_photo" type="file" hidden>
                <input name="user_post_profile_image" type="text" hidden value="IMG_6116.JPEG">
                <input name="user_post_date" type="text" hidden value="{{ $date }}">
                <div class="post_upload_photo">
                    <i class="fas fa-photo-video"></i>
                    <i class="far fa-smile-beam"></i>
                    <i class="fas fa-map-marker-alt"></i>
                    <i class="fas fa-user-tag"></i>
                </div>
                <button type="submit" name="btn_users_posts">Post</button>
            </form>
        </div>
    </div>
    <!-- End Post Pop Up -->

    <!-- Post Details -->
    <div class="post-details-wrapper">
        <div class="post-details">
            <div><p>Delete</p></div>
            <div><p>Unfollow</p></div>
            <div><p>Go to post</p></div>
            <div><p>Share to...</p></div>
            <div><p>Copy Link</p></div>
            <div><p>Emblem</p></div>
            <div class="post-details-cancel"><p>Cancel</p></div>
        </div>
    </div>
    <!-- End Post Detaails -->
</body>
</html>