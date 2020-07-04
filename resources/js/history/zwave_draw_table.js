function set_up_table_zwave(){
    $("#table_1").html("<table id=\"table1\" class=\"cell-border compact stripe\"><caption>Nhiệt độ</caption><thead><tr><th>Thời gian</th><th>Giá trị</th></tr></thead></table>");
    $("#table_2").html("<table id=\"table2\" class=\"cell-border compact stripe\"><caption>Độ ẩm</caption><thead><tr><th>Thời gian</th><th>Giá trị</th></tr></thead></table>");
    $("#table_3").html("<table id=\"table3\" class=\"cell-border compact stripe\"><caption>Cường độ ánh sáng</caption><thead><tr><th>Thời gian</th><th>Giá trị</th></tr></thead></table>");
    $("#table_4").html("<table id=\"table4\" class=\"cell-border compact stripe\"><caption>Nồng độ CO2</caption><thead><tr><th>Thời gian</th><th>Giá trị</th></tr></thead></table>");
    $("#table_5").html("<table id=\"table5\" class=\"cell-border compact stripe\"><caption>Nồng độ TVOC</caption><thead><tr><th>Thời gian</th><th>Giá trị</th></tr></thead></table>");
    $('.table_row_1,.table_row_2').addClass("shadow_box");
}

function zwave_draw_table(data){
    
    set_up_table_zwave();
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
        data: data.humidity,
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
        data: data.brightness,
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

    $("#table4").dataTable({
        data: data.co2,
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
        data: data.voc,
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