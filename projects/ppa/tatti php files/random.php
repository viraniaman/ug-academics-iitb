<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
        $(function() 
        {
            $( "#datepicker" ).datepicker();
        });
        </script>
    </head>    

<body>

<p>
Depending on browser support:<br>
A date picker can pop-up when you enter the input field.
</p>

<form action="">
  Birthday:
  <input type="text" name="bday" id="datepicker">
  <input type="submit">
</form>

<p><strong>Note:</strong> type="date" is not supported in Internet Explorer 10 and earlier versions.</p>

</body>
</html>