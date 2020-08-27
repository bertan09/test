<?php $this->load->view('static/header')?>;
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0 text-dark"><?php if(isset($title))echo $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-2">
                    <a href="customers/save"> <button type="button" class="btn btn-block btn-outline-primary">Müşteri Ekle</button></a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                         <? $this->load->view("{$viewfolder}/{$subviewfolder}/content");?>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
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
        <?php $this->load->view('static/footer')?>;
