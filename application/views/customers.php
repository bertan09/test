<table id="customers" class="table table-bordered table-hover" style="width:100%">
    <thead>
    <tr>
        <th>#</th>
        <th class="nosort">Müşteri Adı</th>
        <th class="nosort">Cep Telefonu</th>
        <th class="nosort">İşlemler</th>
    </tr>
    </thead>
</table>

<div class="modal fade" id="costumerModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Müşteri Ekle</h4>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('customers/save') ?>" method="post" id="customerForm">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="customer_name">Müşteri Adı</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Müşteri Adı Girin ...">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group mt-2">
                            <label></label>
                            <button type="button" class="btn btn-block btn-secondary" id="company-btn">Firma Bilgisi</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="customer_gsm">Cep Telefonu</label>
                            <input type="text" id="customer_gsm" name="customer_gsm" class="form-control" placeholder="Cep Telefonu Girin ...">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="customer_phone">Sabit Telefon</label>
                            <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Sabit Telefon Girin...">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="customer_fax">Fax Numarası</label>
                            <input type="text" class="form-control" id="customer_fax" name="customer_fax" placeholder="Fax Numarası Girin...">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="customer_email">E-Posta</label>
                            <input type="text" class="form-control" id="customer_email" name="customer_email" placeholder="E-Posta Adresi Girin...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="customer_identity">TC Kimlik No</label>
                            <input type="text" class="form-control" id="customer_identity" name="customer_identity" placeholder="T.C. Kimlik No. Girin...">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="customer_address">Adres</label>
                            <textarea class="form-control" rows="2" id="customer_address" name="customer_address" placeholder="Adres Girin..."></textarea>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="customer_city">İl</label>
                            <select class="form-control" id="customer_city" name="customer_city">
                                <option selected>KAHRAMANMARAŞ</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="customer_town">İlçe</label>
                            <select class="form-control" id="customer_town" name="customer_town">
                                <option selected>ŞEBİNKARAHİSAR</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
                <div style="display: none" id="company-detail">
                <div class="row" >
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="company_name">Firma Adı</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Firma Adı Girin ...">
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tax_office">Vergi Dairesi</label>
                                <input type="text" class="form-control" id="tax_office" name="tax_office" placeholder="Vergi Dairesi Girin ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tax_number">Vergi Numarası</label>
                                <input type="text" class="form-control" id="tax_number" name="tax_number" placeholder="Vergi Numarası ...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    </form>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="deleteCustomerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Müşteri Sil</h4>
            </div>
            <div class="modal-body">
                <p>Müşteri Kaydını silmek istediğinize emin misiniz?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                <input type="hidden" name="delete_customer_id" id="delete_customer_id" />
                <input type="submit" name="deleteCustomerBtn" id="deleteCustomerBtn" class="btn btn-danger" value="Sil" />
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
 //   var table;

   $(document).ready(function() {
       $("#addButtton").on("click", function(){
           $('#customerForm').trigger("reset");
           $("#company-detail").hide();
           toastr.remove();
       });
        var url = '<?= base_url('customers/getAll'); ?>';
           table =  $('#customers').DataTable( {
               "pageLength": 5,
               "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Tümü"]],
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
                [0 , 'asc']
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
                            html += `<button type="button" class="${action.class}" data-row-id="${action.url}" id="${action.id}" onclick="${action.mission}(${action.id})">${action.title}</button> `
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
                url:  url,
                type: 'POST'
            },
            columns: [
                { data: "musteri_id"},
                { data: "musteri_adi" },
                { data: "musteri_cep_tel" }
            ],
         //   dom: 'lBfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        } );

        $("#company-btn").on("click", function(){
            $("#company-detail").toggle();
        });


    } );
    function editCustomer(musteri_id) {
//        $('.form-control').removeClass('is-invalid').removeClass('is-valid');
   //     toastr.remove();

        $.ajax({
            url:"<?php echo base_url(); ?>/customers/fetch_single_data",
            method:"POST",
            data:{customer_id:musteri_id},
            dataType:"json",
            success:function(data)
            {
                $('#costumerModal').modal('show');
                $('.modal-title').text("Müşteri Düzenle");
                $('#customer_name').val(data.customer_name);
                $('#customer_gsm').val(data.customer_gsm);
                $('#customer_phone').val(data.customer_phone);
                $('#customer_fax').val(data.customer_fax);
                $('#customer_email').val(data.customer_email);
                $('#customer_identity').val(data.customer_identity);
                $('#customer_address').val(data.customer_address);
                $('#customer_city').val(data.customer_city);
                $('#customer_town').val(data.customer_town);
                $('#company_name').val(data.company_name);
                $('#tax_office').val(data.tax_office);
                $('#tax_number').val(data.tax_number);


                $('#action').val('Düzenle');
                $('#operation').val('Edit');
            }
        });
    }

    function deleteCustomer(customer_id) {
        toastr.remove();
        $('#deleteCustomerModal').modal('show');
        $('#delete_customer_id').val(customer_id);
        // click on remove button to remove the brand
        $("#deleteCustomerBtn").unbind('click').bind('click', function() {
            $.ajax({
                url:"<?php echo base_url(); ?>/customers/delete_data",
                type: 'post',
                data: {customer_id : customer_id},
                dataType: 'json',
                success:function(data)
                {
                    $('#deleteCustomerModal').modal('hide');
                    toastr.error(data);
                    table.ajax.reload(null, false);
                }
            });
        });
    }
</script>
