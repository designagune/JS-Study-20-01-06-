<!DOCTYPE html>
<html>
    <head>
        <title></title>
     
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <style type="text/css">
            table,tr,th,td {border: 1px solid #ccc; border-collapse: collapse;}
    
        </style>
    </head>
    <body>
        <form>
            <select id="page" name="page">
                <option value="1">1page</option>
                <option value="2">2page</option>
                <option value="3">3page</option>
            </select>
        </form>
        <table class="callData">
            <tr>
                <th style="width:70px">board</th>
                <th style="width:400px">title</th>
                <th style="width:150px">date</th>
                <th style="width:100px">hit</th>
                <th style="width:100px">writer</th>
            </tr>

        </table>


   

        <script>
  
            $(document).ready(function(){
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
                    let el = '';

                    console.log(data);
                    $.each(data,function(i,v){
                        el += "<tr><td style ='text-align: center;'>"+v.board+"</td> <td>"+v.title+"</td> <td style ='text-align: center;'>"+v.date+"</td> <td style ='text-align: center;'>"+v.hit+"</td> <td style ='text-align: center;'>"+v.writer+"</td></tr>"
                        console.log(i,v)
                    });
                    $(".callData").append(el)
                }).fail(function(){
                    alert("AJAX ERROR!");
                });
            }

        </script>
    </body>
</html>