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
                    <a href="customers/new_form"> <button type="button" class="btn btn-block btn-outline-primary">Müşteri Ekle</button></a>
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
                         <? $this->load->view("{$viewFolder}/{$subViewFolder}/content");?>
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
    $(document).ready(function() {
        var url = '<?= base_url('customers/getAll'); ?>';
        table =  $('#customers').DataTable( {
            "pageLength": 5,
            "lengthMenu": [[5, 10, 50, 100], [5, 10, 50, 100]],
            "language": {
                "url":"<?=base_url('assets/plugins/datatables/Turkish.json')?>"
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
                            html += `<${action.type} href="${action.url}"  onclick="${action.method}(${action.id})" class="${action.class}">${action.title}</${action.type}> `
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
                { data: "customer_id"},
                { data: "customer_name" },
                { data: "customer_gsm" }
                ],
            //   dom: 'lBfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        } );
    } );
</script>
        <?php $this->load->view('static/footer')?>;
