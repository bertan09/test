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
    $(document).ready(function(){
        $('#customer_city').change(function(){
            var city_id = $('#customer_city').val();
            if(city_id != '')
            {
                $.ajax({
                    url:"<?= base_url('customers/getTown'); ?>",
                    method:"POST",
                    data:{city_id:city_id},
                    success:function(data)
                    {
                        $('#customer_town').html(data);
                    }
                });
            }
            else
            {
                $('#customer_town').html('<option value="">İlçe Seçin</option>');
            }
        });
    });
</script>
<?php $this->load->view('static/footer')?>
