<table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>#</th>
        <th>Müşteri Adı</th>
        <th class="nosort">Cep Telefonu</th>
        <th>İşlemler</th>
    </tr>
    </thead>
</table>

<script>
    $(document).ready(function() {
        var table =  $('#example').DataTable( {
            language: {

                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "  <div class=\"spinner-border text-secondary\"></div>",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }

            },
            order : [
                [0 , 'desc']
            ],
            columnDefs: [
                {visible:false,targets:0},
                {
                    targets:['nosort'],
                    orderable: false
                },
                {
                    render: function(data, type, row){
                        var html = '';
                        $.each(row.actions, function(key, action){
                            html += `<button type="button" class="${action.class}" data-row-id="${action.url}" id="${action.id}" onclick="editCustomer(${action.id})">${action.title}</button> `
                            //  html += `<a href="${action.url}" class="${action.class}">${action.title}</a> `
                        })
                        return html;
                    },
                    targets:3
                },

            ],
            "processing": true,
            "serverSide": true,
            ajax:{
                url:   '<?= base_url('customers/getAll'); ?>',
                type: 'POST'
            },
            columns: [
                { data: "musteri_id"},
                { data: "musteri_adi" },
                { data: "musteri_cep_tel" }
            ],
            dom: 'lBfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        } );
    } );
</script>
