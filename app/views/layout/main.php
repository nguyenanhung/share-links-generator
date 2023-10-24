<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @var array $data
 */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title><?= $data['title'] ?></title>
    <script type="text/javascript">
        var BASE_URL_AJAX = '<?= site_url(); ?>';
    </script>
    <link rel="stylesheet" href="<?= assets_url('bootstrap/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= assets_url('css/style.css'); ?>">
    <link rel="stylesheet" href="<?= assets_url('font-awesome/css/font-awesome.css'); ?>">
    <script src="<?= assets_url('jquery-3.7.1.min.js'); ?>"></script>
    <script src="<?= assets_url('js-cookie/js.cookie.js'); ?>"></script>
    <script src="<?= assets_url('bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?= assets_url('main.js'); ?>"></script>
</head>
<body>
<?php
if (isset($sub)) {
    if (isset($data)) {
        $this->load->view($sub, $data);
    } else {
        $this->load->view($sub);
    }
}
?>
</body>
</html>
<!--
Page generation time: {elapsed_time} - Memory usage: {memory_usage}
Powered by Hung Nguyen - dev@nguyenanhung.com
-->