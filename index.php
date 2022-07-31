<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <!-- BUTTON SECTON -->
        <div class="d-flex justify-content-between my-3">
            <!-- ADD TUTORIAL -->
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTutorialModal">
                    Add Tutorial
                </button>
                <div class="modal fade" id="addTutorialModal" tabindex="-1" aria-labelledby="addTutorialModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Tutorial</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tutorial_title">Title</label>
                                <input type="email" class="form-control" id="tutorial_title" placeholder="tutorial title">
                            </div>
                            <div class="form-group">
                                <label for="tutorial_author">Author</label>
                                <input type="email" class="form-control" id="tutorial_author" placeholder="tutorial author">
                            </div>
                            <div class="form-group">
                                <label for="submission_date">Submission Date</label>
                                <input type="date" class="form-control" id="submission_date" placeholder="submission date">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="addData" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CSV SECTION -->
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadcsvModal">
                    Upload CSV
                </button>
                <div class="modal fade" id="uploadcsvModal" tabindex="-1" aria-labelledby="uploadcsvModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="exampleFormControlFile1">Select CSV File</label> 
                                <input type="file" name="importCsv" class="form-control-file" id="csvFile">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="importCsvBtn" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
                <a href="controller.php?export=csv" class="btn btn-primary" id="exportCsv">Download CSV</a>
            </div>

            <!-- UPDATE MODAL -->
            <div class="modal fade" id="updateTutorialModal" tabindex="-1" aria-labelledby="updateTutorialModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Tutorial</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="tutorial_id" />
                            <div class="form-group">
                                <label for="tutorial_title_edit">Title</label>
                                <input type="email" class="form-control" id="tutorial_title_edit" placeholder="tutorial title">
                            </div>
                            <div class="form-group">
                                <label for="tutorial_author_edit">Author</label>
                                <input type="email" class="form-control" id="tutorial_author_edit" placeholder="tutorial author">
                            </div>
                            <div class="form-group">
                                <label for="submission_date_edit">Submission Date</label>
                                <input type="date" class="form-control" id="submission_date_edit" placeholder="submission date">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="updateData" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- TABLES -->
        <div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Submission Date</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="showHere">
                    
                </tbody>
            </table>
        </div>
    </div>


    <!-- Bootstrap JS  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="main.js" ></script>
</body>
</html>