<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $.ajax({
            url:"http://api.visitkorea.or.kr/openapi/service/rest/KorService/areaCode?serviceKey=YbaoQ9SGQjDxsUjX%2B5Ef2KC0mxK0obHuDVcsxSdMfFFE487jz0S0X9dEiTFabL%2FC9L5cMjNQyeOmmh8zP%2F9GpQ%3D%3D",
            dataType:"xml",
            data:
            {
                numOfRows:20,
                pageNo:1,
                Mobile0S:"ETC",
                MobileApp:"AppTest"
            }
        }).done(function(data){
                    $.each($(data).find("item"),function(i,v){ //object형태로 파싱해서 넘어오는 json형태와는 달리 xml은 태그형식이므로 $(data) 와 같이 태그찾듯이 적어줘야한다
                        const code = $(v).find("code").text(); // $(v).find("code") 까지만 적어주게되면 xml 태그자체가 호출되게 된다. 우리가 원하는건 태그의 내용이므로 text()함수 활용하자
                        const name = $(v).find("name").text();
                        $("#sido").append("<option value = " +code+">"+name+"</option>"); // sido라는 id에 option태그를 append시킬 예정이고 그 option의 value(지역코드)에따라 우리가  원하는 지역을 호출할때 보여줄수 있어야한다
                    });
                }).fail(function(){
                    alert("error");
                });
    </script>
</head>
<body>
    <div>
        <select id="select"></select>
    </div>
    <article>
        <ul class="list">

        </ul>
        <input type="button" value="더 보기" id="more">
    </article>
    <script>
        let num = 1,
        let code = 1;
        $("#select").change(function(){
            code = $(this).val();
            loadInfo("html");
        })
    </script>
</body>
</html>