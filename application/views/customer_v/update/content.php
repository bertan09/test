<form action="<?= base_url("customers/update/$item->customer_id") ?>" method="post" id="customerForm">
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group">
                <label for="customer_name">Müşteri Adı</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Müşteri Adı Girin ..." value="<?= $item->customer_name?>">
                <?php if(isset($form_error)){ ?>
                    <small class="text-danger"> <?php echo form_error("customer_name"); ?></small>
                <?php } ?>
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
                <input type="text" id="customer_gsm" name="customer_gsm" class="form-control" placeholder="Cep Telefonu Girin ..." value="<?= $item->customer_gsm?>">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="customer_phone">Sabit Telefon</label>
                <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Sabit Telefon Girin..." value="<?= $item->customer_phone?>">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="customer_fax">Fax Numarası</label>
                <input type="text" class="form-control" id="customer_fax" name="customer_fax" placeholder="Fax Numarası Girin..." value="<?= $item->customer_fax?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="customer_email">E-Posta</label>
                <input type="email" class="form-control  <?php if(isset($form_error)){ ?>is-invalid<?php } ?>" id="customer_email" name="customer_email" placeholder="E-Posta Adresi Girin..." value="<?= $item->customer_email?>">
                <?php if(isset($form_error)){ ?>
                    <small class="text-danger"> <?php echo form_error("customer_email"); ?></small>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="customer_identity">TC Kimlik No</label>
                <input type="text" class="form-control" id="customer_identity" name="customer_identity" placeholder="T.C. Kimlik No. Girin..." value="<?= $item->customer_identity?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="customer_address">Adres</label>
                <textarea class="form-control" rows="2" id="customer_address" name="customer_address" placeholder="Adres Girin..."><?= $item->customer_address?></textarea>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="customer_city">İl</label>
                <select class="form-control" id="customer_city" name="customer_city">
                    <option value="<?= $item->customer_city?>"><?= $item->customer_city?></option>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="customer_town">İlçe</label>
                <select class="form-control" id="customer_town" name="customer_town">
                    <option value="<?= $item->customer_town?>"><?= $item->customer_town?></option>
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
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Firma Adı Girin ..." value="<?= $item->company_name?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="tax_office">Vergi Dairesi</label>
                    <input type="text" class="form-control" id="tax_office" name="tax_office" placeholder="Vergi Dairesi Girin ..." value="<?= $item->tax_office?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="tax_number">Vergi Numarası</label>
                    <input type="text" class="form-control" id="tax_number" name="tax_number" placeholder="Vergi Numarası ..." value="<?= $item->tax_number?>">
                </div>
            </div>
        </div>
    </div>
    <div class="float-right">
        <a href="<?= base_url('customers')?>"><button type="button" class="btn btn-danger">Geri</button></a>
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </div>
