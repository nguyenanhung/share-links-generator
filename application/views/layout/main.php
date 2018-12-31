<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['title'] ?></title>
    <script type="text/javascript">
        var BASE_URL_AJAX = '<?= site_url(); ?>';
    </script>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.css">
    <script src="<?= base_url(); ?>assets/jquery-3.2.0.min.js"></script>
    <script src="<?= base_url(); ?>assets/js-cookie/js.cookie.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/main.js"></script>
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