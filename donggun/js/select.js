$.ajax({
    url:"http://api.visitkorea.or.kr/openapi/service/rest/KorService/areaCode?serviceKey=bpA5DgrTFSByQgOsw4GG9R7SRo7EIyZuZ1OJK2K4FydxoTlOzyrBgpsXJliH5RWXUz4UlZDC7oYC%2BUtqmXB87Q%3D%3D",
    //서비스키값 까지는 동적으로 변환해줄 없으니까 그대로 url에 적어준다
    dataType:"xml", // 타입은 당연히 xml형식이니까 xml
    data: //데이터에 query string부분을 적어준다. 여러개이므로 object를 활용하자
    {
        numOfRows:20, // 한페이지당 보여줄 데이터 갯수 , 전국이 들어가야하니 넉넉히 20주자
        pageNo:1, //페이지는 1로 설정
        MobileOS:"ETC", 
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