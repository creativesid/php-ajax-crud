$(document).ready(function () {
  //get all data
  function showAll() {
    $.ajax({
      url: "controller.php",
      type: "POST",
      data: { actionType: "read" },
      success: function (res) {
        $("#showHere").html(res);
      },
    });
  }

  //insert data
  $("#addData").click(function () {
    let tutorial_title = $("#tutorial_title").val();
    let tutorial_author = $("#tutorial_author").val();
    let submission_date = $("#submission_date").val();

    // check wheater user filled all the field or not
    if (tutorial_author && tutorial_title && submission_date) {
      $.ajax({
        url: "controller.php",
        type: "POST",
        data: {
          actionType: "insert",
          tutorial_title: tutorial_title,
          tutorial_author: tutorial_author,
          submission_date: submission_date,
        },
        success: function (res) {
          if (res == 1) {
            alert("data inserted successfully.");
            showAll();
            $("#addTutorialModal").modal("hide");
          } else {
            alert("failed to insert data.");
          }
        },
      });
    } else {
      alert("please fill all the fields");
    }
  });

  //show update data
  $(document).on("click", "#updateData", function () {
    let id = $(this).attr("data-update-id");

    $.ajax({
      url: "controller.php",
      type: "POST",
      data: {
        actionType: "showUpdateData",
        id: id,
      },
      success: function (res) {
        const data = JSON.parse(res);
        $("#tutorial_id").val(data.tutorial_id);
        $("#tutorial_title_edit").val(data.tutorial_title);
        $("#tutorial_author_edit").val(data.tutorial_author);
        $("#submission_date_edit").val(data.submission_date);
      },
    });
  });

  //update data
  $("#updateData").click(function () {
    let tutorial_id = $("#tutorial_id").val();
    let tutorial_title = $("#tutorial_title_edit").val();
    let tutorial_author = $("#tutorial_author_edit").val();
    let submission_date = $("#submission_date_edit").val();

    // check wheater user filled all the field or not
    if (tutorial_author && tutorial_title && submission_date && tutorial_id) {
      $.ajax({
        url: "controller.php",
        type: "POST",
        data: {
          actionType: "update",
          tutorial_id: tutorial_id,
          tutorial_title: tutorial_title,
          tutorial_author: tutorial_author,
          submission_date: submission_date,
        },
        success: function (res) {
          if (res == 1) {
            alert("data updated successfully.");
            showAll();
            $("#updateTutorialModal").modal("hide");
          } else {
            alert("failed to update data.");
          }
        },
      });
    } else {
      alert("please fill all the fields");
    }
  });

  //delete data
  $(document).on("click", "#deleteData", function () {
    let id = $(this).attr("data-id");
    $.ajax({
      url: "controller.php",
      type: "POST",
      data: { actionType: "delete", id: id },
      success: function (res) {
        if (res == 1) {
          alert("data deleted successfully.");
          showAll();
        } else {
          alert("failed to delete data.");
        }
      },
    });
  });

  // import data from CSV
  $("#importCsvBtn").click(function () {
    var formData = new FormData();
    if ($("#csvFile")[0].files[0]) {
      formData.append("file", $("#csvFile")[0].files[0]);
      formData.append("actionType", "importCsv");

      $.ajax({
        url: "controller.php",
        data: formData,
        processData: false,
        contentType: false,
        type: "POST",
        success: function (res) {
          if (res == 1) {
            alert("data inserted successfully.");
            showAll();
            $("#uploadcsvModal").modal("hide");
          } else {
            alert("failed to insert data.");
          }
        },
      });
    } else {
      alert("Please select a file");
    }
  });

  showAll();
});
