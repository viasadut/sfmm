<?php
if(isset($_POST['Submit']))
{

echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

}
?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <label>Name</label>
    <input type="text" class="myText" id="name"> <!-- i only added name id to this element -->

    <br>

    <label>Age</label>
    <input type="text" class="myText" id="age"> <!-- i only added age id to this element -->

    <br>

    <!-- Button trigger modal -->
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" onClick="submitText()"> <!-- here was an syntax error. you were calling method by uts name without () sign -->
      Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="bodyModal">
       
	   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="Submit">Confirm</button>
          </div>
        </div>
      </div>
    </div>

<script>

        function submitText(){
            var html1="Your name is "+$("#name").val()+"<br>Your age is "+$("#age").val();
			var html2='<input type="text" class="myText" id="comments">';
            $("#bodyModal").html(html1 + html2);
			//$("#bodyModal").html(html2);
        }
		
		</script>
