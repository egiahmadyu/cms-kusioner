// $(document).ready(function() {
//   try {
//       $("input").each(function() {
//           $(this).attr("autocomplete", "off");
//       });
//   } catch (e) {}
// });

function callAPI(method_input, url_input, body_input, onsuccess) {
    var urli = url_input;
    var datai = body_input;
    var method = method_input;

    $.ajax({
        url: urli,
        // Automatically parses JSON response
        dataType: 'json',
        beforeSend: function() {
            $('.loader-view').css('display', 'block');
        },
        type: method,
        data: datai,
        success: function (data, status, xhr) {
            // success callback function
            $('.loader-view').css('display', 'none');
            if (data.status !== 200) {
               add_notification({
                type: "error",
                msg: data.message,
                position: "center",
                width: 320,
                height: 60,
                autohide: true
            })
            } else {
                window[onsuccess](data);
            }
        },
        error: function (data) {
            console.log(data.responseJSON.message)
            $('.loader-view').css('display', 'none');
            add_notification({
                type: "error",
                msg: data.responseJSON.message,
                position: "center",
                width: 320,
                height: 60,
                autohide: true
            })
        }
      });
}

function callAPIFile(method_input, url_input, body_input, onsuccess) {
    var urli = url_input;
    var datai = body_input;
    var method = method_input;

    $.ajax({
        url: urli,
        beforeSend: function() {
            $('.loader-view').css('display', 'block');
        },
        type: method,
        data: datai,
        processData: false,
        contentType: false,
        success: function (data, status, xhr) {
            // success callback function
            $('.loader-view').css('display', 'none');
            window[onsuccess](data);
        },
        error: function (jqXhr, textStatus, errorMessage) {
            $('.loader-view').css('display', 'none');
            add_notification('.snackbar-bg-danger', {
                text: errorMessage,
                actionTextColor: '#fff',
                backgroundColor: '#e7515a',
                pos: 'top-center'
            })
        }
      });
}

function add_notification(options) {
    notif(options);
    // notif();
}

var table = '';
function getDataTable(id, url, kolom) {

  table = $('#'+id).DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      "pageLength": 10,
      ajax: {
          url: url,
          method: "post",
          data: function (d) {
              return $('#filter_table').serialize() + "&" + $.param(d);
             }
      },
      columns : kolom,
      // createdRow: (row, data, dataIndex, cells) => {
      //   $(cells).css('background-color', "#FF8000")
      // },
  });
}