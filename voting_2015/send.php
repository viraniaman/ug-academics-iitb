<form name="myForm" id="myForm" target="_myFrame" action="http://www.ecell.in/fcof/student/receive.php" method="POST">
    <p>
        <input name="username" value="test" />
    </p>
    <p>
        <input type="submit" value="Submit" />
    </p>
</form>

<script type="text/javascript">
    window.onload=function(){
        var auto = setTimeout(function(){ autoRefresh(); }, 100);

        function submitform(){
          alert('test');
          document.forms["myForm"].submit();
        }
    }
</script>
