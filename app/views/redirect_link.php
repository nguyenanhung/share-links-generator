<?php
/**
 * Created by PhpStorm.
 * User: hungna
 * Date: 10/10/2017
 * Time: 9:00 PM
 */
if (empty($data['info']))
{
    redirect('welcome');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="googlebot" content="noarchive"/>
    <meta content="noindex, nofollow" name="robots"/>
    <!-- <meta property="fb:app_id" content="924741577612766" /> -->
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo trim($data['info']->fake_domain); ?>" />
    <meta property="og:description" content="<?php echo trim($data['info']->fake_domain); ?>" />
    <meta property="og:url" content="<?php echo trim($data['info']->fake_domain); ?>"/>
    <?php
    $fileExt = substr(trim($data['info']->fake_domain), strrpos(trim($data['info']->fake_domain), '.') + 1);
    if ($fileExt == 'jpg' OR $fileExt == 'jpeg' OR $fileExt == 'Jpg' OR $fileExt == 'Jpeg' OR $fileExt == 'JPG' OR $fileExt == 'JPEG' OR $fileExt == 'PNG' OR $fileExt == 'png' OR $fileExt == 'gif' OR $fileExt == 'GIF' OR $fileExt == 'BMP' OR $fileExt == 'bmp') {
        ?>
        <!-- Thêm ngày 22/2/2016, chuyển chế độ sử dụng ảnh hiển thị! -->
        <!-- Nếu định dạng là ảnh thì mới sử dụng tùy chọn này -->
        <meta property="og:image" content="<?php echo trim($data['info']->fake_domain); ?>" />
    <?php } ?>
    <title>Loading...! </title>
    <script type="text/javascript" language="javascript">window.location="<?php echo trim($data['info']->website_url); ?>";</script>
</head>
<body>
<p>Đang điều hướng tới vị trí thích hợp</p>
<p>Cảm ơn bạn ghé thăm website.</p>
</body>
</html>
