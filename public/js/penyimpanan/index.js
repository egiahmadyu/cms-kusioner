
$(document).ready(function () {
    datalist();
});

function datalist() {
    var kolom = [
        {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            orderable: false,
            searchable: false,
            responsivePriority: 0,
        },
        {
            data: "report",
            name: "report",
            responsivePriority: -1,
        },
        {
            data: "violator",
            name: "violator",
            responsivePriority: -1,
        },
        {
            data: "barangbukti",
            name: "barangbukti",
            orderable: false,
            searchable: false,
            responsivePriority: -1,
        },
        {
            data: "status",
            name: "status",
            orderable: true,
            searchable: true,
            responsivePriority: -1,
        },
        {
            data: "action",
            name: "action",
            responsivePriority: -1,
        },
    ];
    getDataTable("zero-config", "/penyimpanan/list", kolom);
    // getData()
}

function approveDraft(id) {
  $("#approveModal").modal("show");
  $("#approveModal #confirmApprove").attr("data-id", id);
}

function approveConfirm() {
  id = $("#approveModal #confirmApprove").data("id");
  password = document.getElementById(`password`).value;
  var csrfToken = $('meta[name="csrf-token"]').attr('content');

  $.ajax({
    type: 'put',
    url: `/penyimpanan/approve-draft/${id}`,
    dataType: "json",
    headers: {
      'X-CSRF-TOKEN': csrfToken
    },
    data: {
      password: password
    },
    success: function (response) {
      $("#approveModal").modal("hide");
      $(".datatables-storages").DataTable().ajax.reload();
      success_insert(response);
  },
  error: function (error) {
      $("#approveModal").modal("hide");
      console.error("Approve error:", error);
      success_insert(error);
  },
  });
}
function deleteUser(id) {
    $("#deleteModal").modal("show");
    $("#deleteModal #confirmDelete").attr("data-id", id);
}

function confirmDelete() {
    id = $("#deleteModal #confirmDelete").data("id");
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: "delete",
        url: `/user/${id}`,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (response) {
            $("#deleteModal").modal("hide");
            $(".datatables-storages").DataTable().ajax.reload();
            success_insert(response);
            add_notification({
              type: "success",
              msg: data.responseJSON.message,
              position: "center",
              width: 320,
              height: 60,
              autohide: true
          })
        },
        error: function (error) {
            $("#deleteModal").modal("hide");
            console.error("Delete error:", error);
            success_insert(error);
        },
    });
}

function success_insert(result) {
    if (result.status == 200) {
      add_notification({
        type: "success",
        msg: result.message,
        position: "center",
        width: 320,
        height: 60,
        autohide: true
    })
    } else {
      add_notification({
        type: "error",
        msg: result.message,
        position: "center",
        width: 320,
        height: 60,
        autohide: true
    })
    }
}
