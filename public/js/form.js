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

var startTime = new Date();
var durationInput = document.getElementById('durationInput');

function updateDuration() {
    var currentTime = new Date();
    var duration = currentTime - startTime;
    var seconds = Math.floor(duration / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);

    // Format durasi menjadi HH:MM:SS
    var formattedDuration = hours.toString().padStart(2, '0') + ':' +
                            (minutes % 60).toString().padStart(2, '0') + ':' +
                            (seconds % 60).toString().padStart(2, '0');

    durationInput.value = formattedDuration;

    setTimeout(updateDuration, 1000); // Memperbarui durasi setiap detik
}

updateDuration();

window.onload = function() {
    document.getElementById('myForm').reset();
  };

  function kirimForm() {
    Swal.fire({
      title: "Apakah Anda yakin?",
      text: "Formulir akan dikirim!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Kirim",
      cancelButtonText: "Batal",
      dangerMode: true,
    }).then((result) => {
      if (result.isConfirmed) {
        // Lakukan tindakan pengiriman formulir di sini
        // Contoh: document.getElementById("myForm").submit();
        Swal.fire("Formulir terkirim!", "", "success");
        document.getElementById("myform").submit();
      } else {
        Swal.fire("Pengiriman dibatalkan.", "", "info");
      }
    });
  }