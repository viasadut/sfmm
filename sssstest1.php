
<!doctype html>
<html>
<head>

    
    
    <link href="dist/jquery-editable-select.min.css" rel="stylesheet" />
    
  </head>
  <body>
    







        
            <select id="basic">
			
              <option>test</option>
			  <option>test1</option>
			  <option>test2</option>
			  <option>test3</option><option>test4</option>
			  <option>test5</option>
			  
            </select>
        


    <script src="jsnew/jquery-latest.min.js"></script>
    <script src="dist/jquery-editable-select.min.js"></script>
    <script>
      window.onload = function () {
        $('#basic').editableSelect();
        $('#default').editableSelect({ effects: 'default' });
        $('#slide').editableSelect({ effects: 'slide' });
        $('#fade').editableSelect({ effects: 'fade' });
        $('#filter').editableSelect({ filter: false });
        $('#html').editableSelect();
        $('#onselect').editableSelect({
          onSelect: function (element) {
            $('#afterSelect').html($(this).val());
          }
        });
      }
    </script>
        
        
  </body>
</html>
