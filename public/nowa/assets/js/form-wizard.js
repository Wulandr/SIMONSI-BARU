(function ($) {
    "use strict";

    $('#wizard1').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>'
    });
    $('#wizard2').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex < newIndex) {
                // Step 1 form validation
                if (currentIndex === 0) {
                    var jenis_ajuan = $('#jenis_ajuan').parsley();
                    var id_unit = $('#id_unit').parsley();
                    var id_subK = $('#id_subK').parsley();
                    var realisasi_IKU = $('#realisasi_IKU').parsley();
                    var target_IKU = $('#target_IKU').parsley();
                    var realisasi_IK = $('#realisasi_IK').parsley();
                    var target_IK = $('#target_IK').parsley();
                    var nama_kegiatan = $('#nama_kegiatan').parsley();
                    if (jenis_ajuan.isValid() && id_unit.isValid() && id_subK.isValid() &&
                        realisasi_IKU.isValid() && target_IKU.isValid() && realisasi_IK.isValid() &&
                        target_IK.isValid() && nama_kegiatan.isValid()
                    ) {
                        return true;
                    } else {
                        jenis_ajuan.validate();
                        id_unit.validate();
                        id_subK.validate();
                        realisasi_IKU.validate();
                        target_IKU.validate();
                        realisasi_IK.validate();
                        target_IK.validate();
                        nama_kegiatan.validate();
                    }
                }
                // Step 2 form validation
                if (currentIndex === 1) {
                    var latar_belakang = $('#latar_belakang').parsley();
                    var rasionalisasi = $('#rasionalisasi').parsley();
                    var tujuan = $('#tujuan').parsley();
                    var mekanisme = $('#mekanisme').parsley();
                    var keberlanjutan = $('#keberlanjutan').parsley();
                    if (latar_belakang.isValid() && rasionalisasi.isValid() &&
                        tujuan.isValid() && mekanisme.isValid() &&
                        keberlanjutan.isValid()) {
                        return true;
                    } else {
                        latar_belakang.validate();
                        rasionalisasi.validate();
                        tujuan.validate();
                        mekanisme.validate();
                        keberlanjutan.validate();
                    }
                }
                // Always allow step back to the previous step even if the current step is not valid.
            }
            // Step 3
            if (currentIndex === 2) {
                nama_pic
                email_pic
                kontak_pic
                tgl_mulai_pelaksanaan
                tgl_akhir_pelaksanaan
                jumlah_anggaran
                id_tw
                var nama_pic = $('#nama_pic').parsley();
                var email_pic = $('#email_pic').parsley();
                var kontak_pic = $('#kontak_pic').parsley();
                var tgl_mulai_pelaksanaan = $('#tgl_mulai_pelaksanaan').parsley();
                var tgl_akhir_pelaksanaan = $('#tgl_akhir_pelaksanaan').parsley();
                var jumlah_anggaran = $('#jumlah_anggaran').parsley();
                var id_tw = $('#id_tw').parsley();
                if (nama_pic.isValid() && email_pic.isValid() &&
                    kontak_pic.isValid() && tgl_mulai_pelaksanaan.isValid() &&
                    tgl_akhir_pelaksanaan.isValid() && jumlah_anggaran.isValid() &&
                    id_tw.isValid()) {
                    return true;
                } else {
                    nama_pic.validate();
                    email_pic.validate();
                    kontak_pic.validate();
                    tgl_mulai_pelaksanaan.validate();
                    tgl_akhir_pelaksanaan.validate();
                    jumlah_anggaran.validate();
                    id_tw.validate();
                }
            }
            // Always allow step back to the previous step even if the current step is not valid.
            else {
                return true;
            }
        }
    });

    $('#wizard3').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
        stepsOrientation: 1
    });

    $('#wizard4').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex < newIndex) {
                // Step 1 form validation
                if (currentIndex === 0) {
                    var jenis_ajuan = $('#jenis_ajuan').parsley();
                    var id_unit = $('#id_unit').parsley();
                    var id_subK = $('#id_subK').parsley();
                    var realisasi_IKU = $('#realisasi_IKU').parsley();
                    var target_IKU = $('#target_IKU').parsley();
                    var realisasi_IK = $('#realisasi_IK').parsley();
                    var target_IK = $('#target_IK').parsley();
                    var nama_kegiatan = $('#nama_kegiatan').parsley();
                    if (jenis_ajuan.isValid() && id_unit.isValid() && id_subK.isValid() &&
                        realisasi_IKU.isValid() && target_IKU.isValid() && realisasi_IK.isValid() &&
                        target_IK.isValid() && nama_kegiatan.isValid()
                    ) {
                        return true;
                    } else {
                        jenis_ajuan.validate();
                        id_unit.validate();
                        id_subK.validate();
                        realisasi_IKU.validate();
                        target_IKU.validate();
                        realisasi_IK.validate();
                        target_IK.validate();
                        nama_kegiatan.validate();
                    }
                }
                // Step 2 form validation
                if (currentIndex === 1) {
                    var latar_belakang = $('#latar_belakang').parsley();
                    var rasionalisasi = $('#rasionalisasi').parsley();
                    var tujuan = $('#tujuan').parsley();
                    var mekanisme = $('#mekanisme').parsley();
                    var keberlanjutan = $('#keberlanjutan').parsley();
                    if (latar_belakang.isValid() && rasionalisasi.isValid() &&
                        tujuan.isValid() && mekanisme.isValid() &&
                        keberlanjutan.isValid()) {
                        return true;
                    } else {
                        latar_belakang.validate();
                        rasionalisasi.validate();
                        tujuan.validate();
                        mekanisme.validate();
                        keberlanjutan.validate();
                    }
                }
                // Always allow step back to the previous step even if the current step is not valid.
            }
            // Step 3
            if (currentIndex === 2) {
                nama_pic
                email_pic
                kontak_pic
                tgl_mulai_pelaksanaan
                tgl_akhir_pelaksanaan
                jumlah_anggaran
                id_tw
                var nama_pic = $('#nama_pic').parsley();
                var email_pic = $('#email_pic').parsley();
                var kontak_pic = $('#kontak_pic').parsley();
                var tgl_mulai_pelaksanaan = $('#tgl_mulai_pelaksanaan').parsley();
                var tgl_akhir_pelaksanaan = $('#tgl_akhir_pelaksanaan').parsley();
                var jumlah_anggaran = $('#jumlah_anggaran').parsley();
                var id_tw = $('#id_tw').parsley();
                if (nama_pic.isValid() && email_pic.isValid() &&
                    kontak_pic.isValid() && tgl_mulai_pelaksanaan.isValid() &&
                    tgl_akhir_pelaksanaan.isValid() && jumlah_anggaran.isValid() &&
                    id_tw.isValid()) {
                    return true;
                } else {
                    nama_pic.validate();
                    email_pic.validate();
                    kontak_pic.validate();
                    tgl_mulai_pelaksanaan.validate();
                    tgl_akhir_pelaksanaan.validate();
                    jumlah_anggaran.validate();
                    id_tw.validate();
                }
            }
            // Always allow step back to the previous step even if the current step is not valid.
            else {
                return true;
            }
        }
    });
    $('.dropify-clear').click(function () {
        $('.dropify-render img').remove();
        $(".dropify-preview").css("display", "none");
        $(".dropify-clear").css("display", "none");
    });

    //_________accordion-wizard
    var options = {
        mode: 'wizard',
        autoButtonsNextClass: 'btn btn-primary float-end',
        autoButtonsPrevClass: 'btn btn-light',
        stepNumberClass: 'badge rounded-pill bg-primary me-1',
        onSubmit: function () {
            alert('Form submitted!');
            return true;
        }
    }

})(jQuery);

//Function to show image before upload

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.dropify-render img').remove();
            var img = $('<img id="dropify-img">'); //Equivalent: $(document.createElement('img'))
            img.attr('src', e.target.result);
            img.appendTo('.dropify-render');
            $(".dropify-preview").css("display", "block");
            $(".dropify-clear").css("display", "block");
        };
        reader.readAsDataURL(input.files[0]);
    }
}