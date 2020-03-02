<!DOCTYPE html>
<html>
    <head>
        <title>공공데이터</title>
        <meta charset="utf-8"/>
     
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>
      
     $.ajax({
            url: "http://api.visitkorea.or.kr/openapi/service/rest/KorService/areaCode?serviceKey=bpA5DgrTFSByQgOsw4GG9R7SRo7EIyZuZ1OJK2K4FydxoTlOzyrBgpsXJliH5RWXUz4UlZDC7oYC%2BUtqmXB87Q%3D%3D",
            dataType:"xml",
            data:
            {
                numOfRows:20,
                pageNo:1,
                MobileOS:"ETC",
                MobileApp:"AppTest"
            }
        }).done(function(data){
            console.log(data)
            $.each($(data).find("item"),function(i,v){
                const code = $(v).find("code").text();
                const name = $(v).find("name").text();
                $("#sido").append("<option value =" +code+">"+name+"</option>");

            });

        }).fail(function(){
            alert("error");
        });
      
        </script>
    </head>
    <body>

    <header>
        <select id="sido"></select>
    </header>
        <article>
            <section>
                <ul class="list">
                </ul>
            </section>
            <input type="button" value="더 보기" id="more"/>
        </article>



        <script>
          
 
            let num = 1;
            let code = 1;

            $("#sido").change(function(){
                code = $(this).val();
                loadInfo("html");
              
            });

            $("#more").click(function(){
                num++;
                loadInfo("append");

            });

            function loadInfo(act){
           
                $.ajax({
                    url:"http://api.visitkorea.or.kr/openapi/service/rest/KorService/areaBasedList?serviceKey=bpA5DgrTFSByQgOsw4GG9R7SRo7EIyZuZ1OJK2K4FydxoTlOzyrBgpsXJliH5RWXUz4UlZDC7oYC%2BUtqmXB87Q%3D%3D",
                    data:{
                        pageNo: num,
                        numOfRows:6,
                        MobileApp:"AppTest",
                        MobileOS:"ETC",
                        arrange:"A",
                        contentTypeId:"12",
                        areaCode:code,
                        listYN:"Y"
                    },
                    dataType:"xml"

                }).done(function(data){
                    let el = "";
                    console.log(data);
                    $.each($(data).find("item"),function(i,v){
                        let title =$(v).find("title").text();
                        let img =$(v).find("firstimage").text();
                    let addr =$(v).find("addr1").text();
                    el += "<li><h3>"+title+"</h3><p><img src ='"+img+"' alt = '#' /></p><p>"+addr+"</p></li>";

                    });


                    act === "html" ? $(".list").html(el) : $(".list").append(el);
                }).fail(function(){
                    alert("second ajax error")
                })


            }

        </script>
    </body>
</html>