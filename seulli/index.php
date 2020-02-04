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
                
            </select>
        </form>
        <table>
            
        </table>
        <script>
            let tt;
            $(document).ready(function(){
            // $("#page").change(function(){
                tt = $("form").serialize();
                console.log(tt);
                Ajaxfunc();
            });
            const Ajaxfunc = (si) =>
            {
                $.ajax({
                    type:'get',
                    url:"http://api.visitkorea.or.kr/openapi/service/rest/KorService/areaCode?serviceKey=YbaoQ9SGQjDxsUjX%2B5Ef2KC0mxK0obHuDVcsxSdMfFFE487jz0S0X9dEiTFabL%2FC9L5cMjNQyeOmmh8zP%2F9GpQ%3D%3D",
                    dataType:"xml",
                    data : {
                        "numOfRows":"20",
                        "pageNo":"1",
                        "MobileOS":"ETC",
                        "MobileApp":"AppTest"
                    },
                }).done(function(data){
                    $.each($(data).find("item"),function(i,v){
                        let code = $(v).find("code").text();
                        let name = $(v).find("name").text();
                        $("#page").append("<option value='"+code+"'>"+name+"</option>");
                    })
                }).fail(function(){
                    alert("ajax error!");
                });
                        }
            
        </script>
    </body>
</html>