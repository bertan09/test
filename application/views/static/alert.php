<?php

$alert = $this->session->userdata("alert");

if($alert){

    if($alert["type"] === "success"){ ?>

        <script>
            toastr.success('<?php echo $alert["text"]; ?>')

        </script>

    <?php } else { ?>

        <script>
            toastr.error('<?php echo $alert["text"]; ?>')

        </script>

    <?php }
} ?>