$().ready(function(){
  var $table = $('#bootstrap-table');
  var url = $table.data('url');

  if($table.length) {
    window.icons = {
      refresh: 'fa-refresh'
    };

    window.operateEvents = {
      'click .view': function(e, value, row, index) {
        location.href = url + '/' + row.id;
      },
      'click .edit': function(e, value, row, index) {
        location.href = url + '/' + row.id + '/edit';
      },
      'click .remove': function(e, value, row, index) {
        swal.fire({
          title: "Are you sure?",
          text: "This action can not be recovered!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn btn-danger btn-fill",
          confirmButtonText: "Yes, delete it!",
          cancelButtonClass: "btn btn-primary btn-fill"
        }).then(function() {
          $table.bootstrapTable('remove', {
            field: 'id',
            values: [row.id]
          });

          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "delete",
            url: url + '/' + row.id,
            contentType: 'application/json',
            dataType: 'json',
            success: function(res) {
              swal.fire("Deleted!", "The row has been deleted.", "success");
            },
            error: function(res) {
              console.log("ERR" , res);
            }
          });
        });
      }
    };

    $table.bootstrapTable({ 
      search: true,
      searchAlign: 'left',
      toolbar: ".toolbar",
      toolbarAlign: 'right',
      showRefresh: true,
      pagination: true,
      pageSize: 10,
      sidePagination: 'server',
      clickToSelect: false
    });
  }

   $(window).resize(function () {
    $table.bootstrapTable('resetView')
  });
});