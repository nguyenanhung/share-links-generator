<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @var array  $data
 * @var object $item
 */
?>
<div class="container">
    <h2>Thêm mới link game casual</h2>
    <p>Link game casual mới lên hệ thống</p>

    <!-- form action="home/create" method="post" -->
    <?php echo form_open_multipart('home/create'); ?>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">slugs:</label>
                <input name="slugs" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">ios_url:</label>
                <input name="ios_url" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">android_url:</label>
                <input name="android_url" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">windows_url:</label>
                <input name="windows_url" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">website_url:</label>
                <input name="website_url" class="form-control">
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12">
            <div class="form-group">
                <label for="name">Trạng thái:</label>
                <select name="status" class="form-control" id="">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Khóa</option>
                </select>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success">Thêm mới</button>
    <a href="<?php echo site_url(); ?>" class="btn btn-default">Hủy</a>
    </form>
</div>
