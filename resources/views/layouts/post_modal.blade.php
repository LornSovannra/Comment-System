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