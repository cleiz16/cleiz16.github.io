function set_up_table_lora(){
    $("#table_1").html("");
    $("#table_2").html("");
    $("#table_3").html("");
    $("#table_4").html("<table id=\"table4\" class=\"cell-border compact stripe\"><caption>Nồng độ bụi PM10 trong không khí</caption><thead><tr><th>Thời gian</th><th>Giá trị</th></tr></thead></table>");
    $("#table_5").html("<table id=\"table5\" class=\"cell-border compact stripe\"><caption>Nồng độ bụi PM2.5 trong không khí</caption><thead><tr><th>Thời gian</th><th>Giá trị</th></tr></thead></table>");
    $('.table_row_2').addClass("shadow_box");
    $('.table_row_1').removeClass("shadow_box");
}

function lora_draw_table(data){
    set_up_table_lora();
    $("#table4").dataTable({
        data: data.pm10,
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
    $("#table5").dataTable({
        data: data.pm25,
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