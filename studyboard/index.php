<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        
    </head>
    <body>
        <form>
            <select id="page" name="page">
                <option value="1">1page</option>
                <option value="2">2page</option>
                <option value="3">3page</option>
            </select>
        </form>
        <h1>confirm!!</h1>
        <script>
            let tt;
            $("#page").change(function(){
                tt = $("form").serialize();
                console.log(tt);
                Ajaxfunc();
            });
            const Ajaxfunc = (si) =>
            {
                $.ajax({
                    type:'get',
                    url:"data.php",
                    dataType:"json",
                    data:tt
                }).done(function(data){
                    console.log(data);
                }).fail(function(){
                    alert("AJAX ERROR!");
                });
            }
            
        </script>
    </body>
</html>