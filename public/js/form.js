function isi_provinsi(){
    var provinsi_id = $('#provinsi_id').val();
    $.ajax({
        url: '/getDataProvinsi/' + provinsi_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var detail = data;
            document.getElementById("provinsi").innerHTML = detail.name;
        }
    });
}

function isi_kabupaten(){
    var kabupaten_id = $('#kabupaten_id').val();
    $.ajax({
        url: '/getDataKabupaten/' + kabupaten_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var detail = data;
            document.getElementById("kabupaten").innerHTML = detail.name;
        }
    });
}

function isi_kecamatan(){
    var kecamatan_id = $('#kecamatan_id').val();
    $.ajax({
        url: '/getDataKecamatan/' + kecamatan_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var detail = data;
            document.getElementById("kecamatan").innerHTML = detail.name;
        }
    });
}

function isi_desa(){
    var desa_id = $('#desa_id').val();
    $.ajax({
        url: '/getDataDesa/' + desa_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var detail = data;
            document.getElementById("desa").innerHTML = detail.name;
        }
    });
}

function isi_kode_sls(){
    var sls_id = $('#kode_sls').val();
    var sub_sls_id = $('#kode_sub_sls').val();
    console.log(sls_id);
    console.log(sub_sls_id);
    $.ajax({
        url: '/getDataSl/' + sls_id + '/' + sub_sls_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var detail = data;
            $('#nama_sls').val(detail.name);
        }
    });
}

function isi_ppl(){
    var ppl_id = $('#kode_ppl').val();
    $.ajax({
        url: '/getDataPpl/' + ppl_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var detail = data;
            $('#ppl_nama').val(detail.name);
        }
    });
}

function isi_pml(){
    var pml_id = $('#kode_pml').val();
    $.ajax({
        url: '/getDataPml/' + pml_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var detail = data;
            $('#pml_nama').val(detail.name);
        }
    });
}