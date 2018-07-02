<div class="post_form">
    <form method="POST" action='{{url("new_post")}}' enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <textarea id="post" name="post" class="form-control post-input" rows="1" placeholder="What's on your mind?"></textarea>
                </div>
            </div>
            <div class="col-xs-8">
                <div class="form-group">
                    <input type="file" id='img' name="img" class="addphoto input" style="display: none"></input>
                    <p class="file-name"></p>
                    <label for="img" class="add_photobutton"><span class="upload_icon"><i class="fas fa-camera"></i></span><span class="upload_text">Upload a photo</span></label>
                </div>
            </div> 
            <div class="col-xs-4 button">
                <div class="form-group">
                    <input type="submit" id='addpost' name="addpost" value="Post" class="btn btn-sm" onclick="addPost()"></input>
                </div>
            </div>    
        </div>  
    </form>
</div>