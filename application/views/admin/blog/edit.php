<style>
#imagePreview {
    margin-top: 7px;
    width: 250px;
    height: 200px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Create New Blog</h4>
                                    <p class="category">Be Awesome!</p>
                                </div>
                                <div class="card-content">
                                    <form action="<?php echo base_url('admin/blog/edit/'.$blog['blog_id']) ?>" method="post" enctype="multipart/form-data">
                                       
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Title</label>
                                                    <input type="text" name="title" class="form-control" value="<?php echo $blog['title'] ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Category</label>
                                                    <select name="category_id" class="form-control">
                                                        <?php foreach($category as $category) { ?>
                                                        <option value="<?php echo $category['category_id'] ?>" <?php if($blog['category_id']==$category['category_id']) { echo "selected"; } ?>>
                                                            <?php echo $category['category_name'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Status</label>
                                                    <select name="status" class="form-control">

                                                      <option value="publish" 
                                                      <?php if($blog['status']=="publish") { echo "selected"; } ?>
                                                      >Publish</option>}

                                                      <option value="draft" 
                                                      <?php if($blog['status']=="draft") { echo "selected"; } ?>
                                                      >Draft</option>}                

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Keywords (For Google Search Engine)</label>
                                                    <input type="text" name="keywords" class="form-control" value="<?php echo $blog['keywords'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Main Content</label>
                                                    <textarea type="text" name="content" class="form-control" id="#"><?php echo $blog['content'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card card-profile">
                                                    <div class="form-group">
                                                        <label class="control-label">Cover Image</label>
                                                        <button type="button" class="btn btn-primary">Choose File</button>
                                                            <input type="file" name="image" class="form-control" id="file">
                                                            <div class="imagePreview"><img src="<?php echo base_url('./upload/image/thumbs/'.$blog['image']) ?>" width="100px" height="50px">
                                                            </div>
                                                    </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Publish</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>