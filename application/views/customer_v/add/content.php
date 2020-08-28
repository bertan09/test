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

    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </div>