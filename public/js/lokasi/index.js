
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
            data: "sk",
            name: "sk",
            responsivePriority: -1,
        },
        {
            data: "type",
            name: "type",
            responsivePriority: -1,
        },
        {
            data: "storage",
            name: "storage",
            responsivePriority: -1,
        },
        {
            data: "date",
            name: "date",
            orderable: false,
            searchable: false,
            responsivePriority: -1,
        },
        {
            data: "action",
            name: "action",
            responsivePriority: -1,
        },
    ];
    getDataTable("zero-config", "/lokasi/list", kolom);
    // getData()
}

function deleteData(id) {
    $("#deleteModal").modal("show");
    $("#deleteModal #confirmDelete").attr("data-id", id);
}

function confirmDelete() {
    id = $("#deleteModal #confirmDelete").data("id");
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: "delete",
        url: `/lokasi/${id}`,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (response) {
            $("#deleteModal").modal("hide");
            $(".datatables-locations").DataTable().ajax.reload();
            success_insert(response);
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
