$(function () {
    $('.tomboltambah').on('click', function () {
        $('#newMenuModalLabel').html('Tambah Data Pegawai');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form')[0].reset();
    });

    $('.tomboledit').on('click', function () {
        $('#newMenuModalLabel').html('Ubah Data Pegawai');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'pegawai/ubah');

        const nip = $(this).data('id');
        $.ajax({
            url: 'pegawai/ambildata',
            data: { nip: nip },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama_pegawai);
                $('#nip').val(data.nip).prop('readonly',true);;
                $('#jabatan').val(data.jabatan);
                $('#no_hp').val(data.no_hp);
                $('#alamat').val(data.alamat);
                $('#jk').val(data.jk);
            }
        });
    });

    $('.tomboltambahdokter').on('click', function () {
        $('#newMenuModalLabel').html('Tambah Data Dokter');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form')[0].reset();
    });

    $('.tomboleditdokter').on('click', function () {
        $('#newMenuModalLabel').html('Ubah Data Dokter');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'dokter/ubah');

        const id = $(this).data('id');
        $.ajax({
            url: 'dokter/ambildata',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama_dokter);
                $('#nip').val(data.id_dokter).prop('readonly',true);
                $('#no_hp').val(data.no_hp);
                $('#alamat').val(data.alamat);
                $('#jk').val(data.jk);
            }
        });
    });

    $('.tomboleditkonseling').on('click', function () {
        $('#edit').show();
        $('#simpan').hide();
        $('#batal').show();
        const id = $(this).data('id');
        $.ajax({
            url: '../../konseling/ambildata',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_kons').val(data.id_konseling).prop('readonly',true);
                $('#catatan').val(data.catatan);
                $('#terapi').val(data.terapi);
            }
        });
    });

    $('#batal').click(function(){
        $('#edit').hide();
        $('#simpan').show();
        $('#batal').hide();
        $('.form')[0].reset();
    });

    $('#edit').on('click', function () {
        $('.form').attr('action', '../../konseling/ubah');
    });

    $('.tomboleditmedis').on('click', function () {
        $('#edit-medis').show();
        $('#simpan').hide();
        $('#batal-medis').show();
        const id = $(this).data('id');
        $.ajax({
            url: '../../medis/ambildata',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_med').val(data.id_medis).prop('readonly',true);
                $('#anamnesa').val(data.anamnesa);
                $('#fisik').val(data.pemeriksaan_fisik);
                $('#terapi').val(data.terapi);
            }
        });
    });

    $('#batal-medis').click(function(){
        $('#edit').hide();
        $('#simpan').show();
        $('#batal').hide();
        $('.form')[0].reset();
    });

    $('#edit-medis').on('click', function () {
        $('.form').attr('action', '../../medis/ubah');
    });

    $('.tomboleditterapi').on('click', function () {
        $('#edit-terapi').show();
        $('#simpan').hide();
        $('#batal-terapi').show();
        const id = $(this).data('id');
        $.ajax({
            url: '../../terapi/ambildata',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_ter').val(data.id_grup).prop('readonly',true);
                $('#catatan').val(data.catatan);
                $('#terapi').val(data.terapi);
            }
        });
    });

    $('#batal-terapi').click(function(){
        $('#edit-terapi').hide();
        $('#simpan').show();
        $('#batal-terapi').hide();
        $('.form')[0].reset();
    });

    $('#edit-terapi').on('click', function () {
        $('.form').attr('action', '../../terapi/ubah');
    });

    $('.tomboleditrawat').on('click', function () {
        $('#edit-rawat').show();
        $('#simpan').hide();
        $('#batal-rawat').show();
        const id = $(this).data('id');
        $.ajax({
            url: '../../rawat/ambildata',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_raw').val(data.id_rawat).prop('readonly',true);
                $('#catatan').val(data.catatan);
                $('#tindakan').val(data.tindakan);
                $('#lokasi').val(data.lokasi);
            }
        });
    });

    $('#batal-rawat').click(function(){
        $('#edit-rawat').hide();
        $('#simpan').show();
        $('#batal-rawat').hide();
        $('.form')[0].reset();
    });

    $('#edit-rawat').on('click', function () {
        $('.form').attr('action', '../../rawat/ubah');
    });

    $('.tomboltambahperawat').on('click', function () {
        $('#newMenuModalLabel').html('Tambah Data Perawat');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form')[0].reset();
    });

    $('.tomboleditperawat').on('click', function () {
        $('#newMenuModalLabel').html('Ubah Data Perawat');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'perawat/ubah');

        const id = $(this).data('id');
        $.ajax({
            url: 'perawat/ambildata',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama_perawat);
                $('#nip').val(data.id_perawat).prop('readonly',true);
                $('#no_hp').val(data.no_hp);
                $('#alamat').val(data.alamat);
                $('#jk').val(data.jk);
            }
        });
    });



});