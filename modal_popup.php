<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Set Focus on First Text Input inside Bootstrap Modal</title>
<link rel="stylesheet" href="jsnew/bootstrap.min.css">
<script src="jsnew/jquery-3.5.1.min.js"></script>
<script src="jsnew/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $("#myModal").on('shown.bs.modal', function(){
        $(this).find('#inputName').focus();
    });
});
</script>
</head>
<body>
    <!-- Button HTML (to Trigger Modal) -->
    <a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal">Launch Demo Modal</a>
    
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Your Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName">
                        </div>
                        <div class="form-group">
                            <label for="inputComment">Comments</label>
                            <textarea class="form-control" id="inputComment" rows="4"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>