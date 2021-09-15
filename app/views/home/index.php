<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @var array  $data
 * @var object $item
 */
?>
<div class="container">
    <h2>Quản lý link</h2>
    <p>Danh sách link có trong hệ thống <a href="<?php echo site_url('login/logout'); ?>" class="pull-right">Đăng xuất</a></p>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th colspan="10">
                    <button class="btn btn-info btn-xs" onclick="ajaxLoadItem(0)" data-toggle="modal" data-target="#UpdateForm">Create new</button>
                </th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Link gốc</th>
                <th>Domain fake</th>
                <th style="min-width: 150px;">Created</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php
            if (!empty($data['result'])) {
                foreach ($data['result'] as $key => $item) {
                    ?>
                    <tr id="artice-<?= $item->id; ?>">
                        <td><?= $item->id; ?></td>
                        <td><a href="<?= site_url('post/' . $item->uuid); ?>" target="_blank"><?= $item->name; ?></a></td>
                        <td><a href="<?= $item->website_url; ?>" target="_blank"><?= $item->website_url; ?></a></td>
                        <td><a href="<?= $item->fake_domain; ?>" target="_blank"><?= $item->fake_domain; ?></a></td>
                        <td><?= $item->updated_at; ?></td>
                        <td style="text-align: center;">
                            <?php
                            if ($item->status == 'Active') {
                                ?>
                                <button class="btn btn-success btn-xs" id="status-<?= $item->id; ?>" data-status="<?= $item->status; ?>" onclick="changeStatus(<?= $item->id; ?>, this)">
                                    active
                                </button>
                            <?php } else { ?>
                                <button class="btn btn-warning btn-xs" id="status-<?= $item->id; ?>" data-status="<?= $item->status; ?>" onclick="changeStatus(<?= $item->id; ?>, this)">
                                    disble
                                </button>
                            <?php } ?>
                            <button class="btn btn-info btn-xs" onclick="ajaxLoadItem(<?= $item->id; ?>)" data-toggle="modal" data-target="#UpdateForm">
                                Update
                            </button>
                            <button class="btn btn-danger btn-xs" onclick="deleteItem(<?= $item->id; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="10">Không có dữ liệu</td>
                </tr>
            <?php } ?>

            </tbody>

        </table>
    </div>

    <ul class="pagination">
        <?= $data['paging'] ?>
    </ul>
</div>


<!-- Modal -->
<div id="UpdateForm" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cập nhập thông tin <img src="assets/images/loading.gif" class="loading" alt=""></h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <!-- <input name="name" class="form-control" oninput="ChangeUrl(this.value, '#slugs', this.id);" id='0'> -->
                                <input name="name" class="form-control" id='0'>
                                <input type="hidden" name="id" value="0">
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">uuid:</label>
                                <input name="uuid" class="form-control" id="slugs">
                                <p class="label label-danger" id="error-slug"></p>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Link gốc:</label>
                                <input name="website_url" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Domain fake:</label>
                                <input name="fake_domain" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="name">Active: </label>
                                <input type="checkbox" name="status">

                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-xs addLink" onclick="saveChangeArt()">Lưu lại</button>
            </div>
        </div>

    </div>
</div>


<style type="text/css">
    .table tbody td {
        max-width: 170px;
        overflow: hidden;
    }

    .input_error {
        border: 1px #f40 solid;
    }
</style>
<script type="text/javascript"></script>