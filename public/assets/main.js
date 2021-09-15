function getToken(xhr, settings) {
    if (settings.data.indexOf('csrf_test_name') === -1) {
        settings.data += '&csrf_test_name=' + encodeURIComponent(Cookies.get('csrf_cookie_name'));
    }
}

function deleteItem(id) {

    if (confirm('Xác nhận xóa !!! ')) {

        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX + "dashboard/deleteItem",
            data: {
                id: id
            },
            dataType: "text",
            beforeSend: function(xhr, settings) {
                getToken(xhr, settings);
            },
            success: function(data) {
                if (data) {
                    $("#artice-" + id).css('background-color:', 'red');
                    $("#artice-" + id).fadeOut();
                }
            }
        }); // you have missed this bracket
    }

    return false;

}

function change_redirect_id(id, obj) {
    var redirect_id = $(obj).val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX + "dashboard/changeRedirectId",
        data: {
            id: id,
            redirect_id: redirect_id
        },
        dataType: "text",
        cache: false,
        beforeSend: function(xhr, settings) {
            getToken(xhr, settings);
        },
        success: function(data) {

        }
    });
    return false;
}

function changeStatus(id, obj) {
    var status = $(obj).attr('data-status');
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX + "dashboard/changeStatus",
        data: {
            id: id,
            status: status
        },
        dataType: "text",
        cache: false,
        beforeSend: function(xhr, settings) {
            getToken(xhr, settings);
        },
        success: function(data) {
            console.log(data);
            $(obj).attr('data-status', data);
            if (data == 'Active') {
                $(obj).removeClass('btn-warning');
                $(obj).addClass('btn-success');
                $(obj).html('active');
            } else {
                $(obj).removeClass('btn-success');
                $(obj).addClass('btn-warning');
                $(obj).html('disible');
            }
        }
    });
    return false;
}

function ajaxLoadItem(id) {

    if (id == 0) {
        $('#UpdateForm .modal-title').html("Thêm mới game <img src='assets/images/loading.gif' class='loading' alt=''>");
    } else {
        $('#UpdateForm .modal-title').html("Cập nhật <img src='assets/images/loading.gif' class='loading' alt=''>");
    }

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX + "dashboard/ajaxLoadItem",
        data: {
            id: id
        },
        dataType: "json",
        cache: false,
        beforeSend: function(xhr, settings) {
            getToken(xhr, settings);
        },
        success: function(data) {
            var flag = data.flag;
            var value = data.result;

            if (id != 0) {
                if (flag == 1) {

                    $("#UpdateForm input[name=id]").val(value.id);
                    $("#UpdateForm input[name=name]").val(value.name);
                    $("#UpdateForm input[name=name]").attr('id', value.id);
                    $("#UpdateForm input[name=website_url]").val(value.website_url);
                    $("#UpdateForm input[name=fake_domain]").val(value.fake_domain);

                    if (value.status == 'Active') {
                        $("#UpdateForm input[name=status]").attr('checked', 'checked');
                    } else {
                        $("#UpdateForm input[name=status]").removeAttr('checked');
                    }
                }

            } else {
                $("#UpdateForm input[name=id]").val(0);
                $("#UpdateForm input[name=name]").val('');
                $("#UpdateForm input[name=name]").attr('id', 0);

                $("#UpdateForm input[name=website_url]").val('');
                $("#UpdateForm input[name=fake_domain]").val('');
                $("#UpdateForm input[name=status]").removeAttr('checked');
                $('input#slugs').removeClass('input_error');
                $("#error-slug").html("");

            }



        }
    });
    return false;
}

function saveChangeArt() {
    var data = {};

    data.id = $("#UpdateForm input[name=id]").val();
    data.name = $("#UpdateForm input[name=name]").val();
    data.website_url = $("#UpdateForm input[name=website_url]").val();
    data.fake_domain = $("#UpdateForm input[name=fake_domain]").val();

    data.status = $("#UpdateForm input[name=status]").is(':checked') == true ? 'Active' : 'Inactive';

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX + "dashboard/ajaxUpdateItem",
        data: {
            data: data
        },
        dataType: "json",
        cache: false,
        beforeSend: function(xhr, settings) {
            getToken(xhr, settings);
            $("#UpdateForm .loading").fadeIn(0);
            $("#UpdateForm").addClass('cursor-wait');
        },
        success: function(data) {
            /*$("#UpdateForm .loading").fadeOut(300);
             $("#UpdateForm").removeClass('cursor-wait');*/
            window.setTimeout(function() {
                location.reload()
            }, 1000)
        }
    });
    return false;

}

function ChangeUrl(value, obj, id = null) {

    var str = get_alias(value);

    if (id) {

        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX + "dashboard/ajaxCheckSlugs",
            data: {
                'slug': str
            },
            dataType: "json",
            cache: false,
            beforeSend: function(xhr, settings) {
                getToken(xhr, settings);
                $("#UpdateForm .loading").fadeIn(0);
                $("#UpdateForm").addClass('cursor-wait');
            },
            success: function(data) {
                $("#UpdateForm .loading").fadeOut(0);
                $("#UpdateForm").removeClass('cursor-wait');

                if (data != "") {
                    if (data != id) {
                        $(obj).addClass('error');
                        $("button.addLink").attr('disabled', 'disabled');
                        $("#error-slug").html("Slug đã tồn tại");
                        $("#slugs").addClass('input_error');
                    } else {
                        $(obj).removeClass('error');
                        $("button.addLink").removeAttr("disabled");
                        $("#error-slug").html("");
                        $("#slugs").removeClass('input_error');
                    }
                } else {
                    $(obj).removeClass('error');
                    $("button.addLink").removeAttr("disabled");
                    $("#error-slug").html("");
                    $("#slugs").removeClass('input_error');
                }
            }
        });

    }

    $(obj).val(str);
}

function get_alias(str) {
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(
        /!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,
        "-");
    str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1-
    str = str.replace(/^\-+|\-+$/g, ""); //cắt bỏ ký tự - ở đầu và cuối chuỗi
    str = str.replace(/“/, "");
    str = str.replace(/”/, "");

    return str;
}