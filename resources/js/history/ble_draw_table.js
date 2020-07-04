function set_up_table_ble(){
    $("#table_1").html("<table id=\"table1\" class=\"cell-border compact stripe\"><caption>Nhiệt độ dung dịch</caption><thead><tr><th>Thời gian</th><th>Giá trị</th></tr></thead></table>");
    $("#table_2").html("<table id=\"table2\" class=\"cell-border compact stripe\"><caption>Độ pH dung dịch</caption><thead><tr><th>Thời gian</th><th>Giá trị</th></tr></thead></table>");
    $("#table_3").html("<table id=\"table3\" class=\"cell-border compact stripe\"><caption>Tổng lượng chất rắn hòa tan trong dung dịch</caption><thead><tr><th>Thời gian</th><th>Giá trị</th></tr></thead></table>");
    $("#table_4").html("");
    $("#table_5").html("");
    $('.table_row_1').addClass("shadow_box");
    $('.table_row_2').removeClass("shadow_box");
}

function ble_draw_table(data){
    set_up_table_ble();
    $("#table1").dataTable({
        data: data.temperature,
        columns: [
            { data: 'ts' },
            { data: 'value' },
        ],
        searching: false,
        "iDisplayLength": 6,
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         true,
        "language": {
            "info": "Hiển thị từ _START_ đến _END_ trên _TOTAL_ giá trị",
            "infoEmpty": "Không có giá trị",
            "emptyTable": "Không có giá trị nào trong khoảng thời gian này",
            "lengthMenu": "Lấy _MENU_ giá trị",
            paginate: {
                first:    '«',
                previous: '‹',
                next:     '›',
                last:     '»'
            }
        },
       });
        $("#table2").dataTable({
        data: data.ph,
        columns: [
            { data: 'ts' },
            { data: 'value' }
        ],
        searching: false,
        "iDisplayLength": 6,
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         true,
        "language": {
            "info": "Hiển thị từ _START_ đến _END_ trên _TOTAL_ giá trị",
            "infoEmpty": "Không có giá trị",
            "emptyTable": "Không có giá trị nào trong khoảng thời gian này",
            "lengthMenu": "Lấy _MENU_ giá trị",
            paginate: {
                first:    '«',
                previous: '‹',
                next:     '›',
                last:     '»'
            }
        },
        });
        $("#table3").dataTable({
        data: data.tds,
        columns: [
            { data: 'ts' },
            { data: 'value' }
        ],
        searching: false,
        "iDisplayLength": 6,
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         true,
        "language": {
            "info": "Hiển thị từ _START_ đến _END_ trên _TOTAL_ giá trị",
            "infoEmpty": "Không có giá trị",
            "emptyTable": "Không có giá trị nào trong khoảng thời gian này",
            "lengthMenu": "Lấy _MENU_ giá trị",
            paginate: {
                first:    '«',
                previous: '‹',
                next:     '›',
                last:     '»'
            }
        },
       });
}