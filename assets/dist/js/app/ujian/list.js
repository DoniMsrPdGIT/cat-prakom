var table;

$(document).ready(function () {

    ajaxcsrf();

    table = $("#ujian").DataTable({
        initComplete: function () {
            var api = this.api();
            $('#ujian_filter input')
                .off('.DT')
                .on('keyup.DT', function (e) {
                    api.search(this.value).draw();
                });
        },
        oLanguage: {
            sProcessing: "loading..."
        },
        processing: true,
        serverSide: true,
        ajax: {
            "url": base_url+"ujian/list_json",
            "type": "POST",
        },
        columns: [
            {
                "data": "id_ujian",
                "orderable": false,
                "searchable": false
            },
            { "data": 'nama_ujian' },
            { "data": 'nama_matkul' },
            { "data": 'nama_dosen' },
            { "data": 'jumlah_soal' },
            { "data": 'waktu' },
            {
                "searchable": false,
                "orderable": false
            }
        ],
		
        columnDefs: [
            {
                "targets": 6,
                "data": {
                    "id_ujian": "id_ujian",
                    "ada": "ada"
                },
                "render": function (data, type, row, meta) {
                    var btn;
                    if (data.ada > 0) {
						if (data.nilai >= 270) {
							 btn = `
								
								<div class="alert alert-success">
  <strong><i class="fa fa-star"></i> ${data.nilai} </strong> <br/>Selamat, Anda Lulus Passing Grade<br/>
</div>
<a class="btn btn-xs btn-warning" href="${base_url}ujian/pembahasan/01930304023${data.id}49203324">
								<i class="fa fa-eye"></i> Jawaban & Pembahasan
							</a>`;
						}else{
							btn = `
								
								<div class="alert alert-danger">
  <strong><i class="fa fa-star"></i> ${data.nilai} </strong> <br/>Maaf, Anda Belum Lulus Passing Grade<br/>
</div>
<a class="btn btn-xs btn-warning" href="${base_url}ujian/pembahasan/01930304023${data.id}49203324">
								<i class="fa fa-eye"></i> Jawaban & Pembahasan
							</a>`;
							
						}
                       
                    } else {
                        btn = `<a class="btn btn-xs btn-primary" href="${base_url}ujian/token/${data.id_ujian}">
								<i class="fa fa-pencil"></i> Ikut Ujian
							</a>`;
                    }
                    return `<div class="text-center">
									${btn}
								</div>`;
                }
            },
			 {
                "targets": 7,
                "data": {
                    "id_ujian": "id_ujian",
                    "tot_toman": "tot_toman",
					"ada": "ada"
                },
                "render": function (data, type, row, meta) {
                    var btn;
					
                    if (data.tot_toman <= 29 ) {
							 btn = `<a class="btn btn-xs btn-default" disabled><i class="fa fa-refresh"></i> Reset</a>`;
                    } else {
                        if (data.ada <= 0) {
							 btn = `<a class="btn btn-xs btn-default" disabled><i class="fa fa-refresh"></i> Reset</a>
						`;
						} else {
                        btn = `<a class="btn btn-xs btn-warning" href="${base_url}DataPeserta/reset_toman/01930304023${data.mahasiswa_id}49203324"><i class="fa fa-refresh"></i> Reset</a>
						`;
                    }
                    }
                    return `<div class="text-center">
									${btn}
								</div>`;
                }
            },
        ],
        order: [
            [1, 'asc']
        ],
        rowId: function (a) {
            return a;
        },
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });
});