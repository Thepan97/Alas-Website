<div class="row ">
    <div class="col-xl-12">
         <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                </h4>
    </div><!-- end col-->
</div>

<div class="row">
  <div class="col-lg-12">
      <div class="card custom_table dash_card table-responsive-sm">
        <div class="card-body p-0" data-collapsed="0">
          <h4 class="header-title p-3"><?php echo get_phrase('Contact Users'); ?></h4>
          <table class="table table-striped table-centered w-100" id="server_side_users_data">
            <thead>
              <tr>
                <th>#</th>
                <th><?php echo get_phrase('Name'); ?></th>
                <th><?php echo get_phrase('Contact'); ?></th>
                <th><?php echo get_phrase('Message'); ?></th>
                <th><?php echo get_phrase('Action'); ?></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
      </div>
    </div>
  </div><!-- end col-->
</div>

<script>
  $(document).ready(function () {
     var table = $('#server_side_users_data').DataTable({
      responsive: true,
      "processing": true,
      "serverSide": true,
      "ajax":{
        "url": "<?php echo base_url('admin/contact/data-table') ?>",
        "dataType": "json",
        "type": "GET",
        "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
      },
      order: [[0, 'desc']],
      "columns": [
        { "data": "key" },
        { "data": "name" },
        { "data": "contact" },
        { "data": "message" },
        { "data": "action" }
      ]   
    });
   });

  function refreshServersideTable(tableId){
    $('#'+tableId).DataTable().ajax.reload();
  }
</script>