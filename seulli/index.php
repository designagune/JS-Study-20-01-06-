<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
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
        <table>
            
        </table>
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
                    url:"../studyboard/data.php",
                    dataType:"json",
                    data:tt
                }).done(function(data){

                    let table = "";
                    console.log(data);
                    $.each(data,function(i,v){
                        table +="<tr> <th>board</th>"+"<td>"+v.board+"</td></tr>"+"<tr> <th>title</th>"+"<td>"+v.title+"</td></tr>"+"<tr> <th>date</th>"+"<td>"+v.date+"</td></tr>"+"<tr> <th>hit</th>"+"<td>"+v.hit+"</td></tr>"+"<tr> <th>writer</th>"+"<td>"+v.writer+"</td></tr>"
                    });
                    
                    $("table").append(table);
                    
                }).fail(function(){
                    alert("AJAX ERROR!");
                });
            }
            
        </script>
    </body>
</html>