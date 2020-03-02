let num  = 1; //더보기 버튼을 누를때 마다 pageNo가 올라가야하는 변수
let code = 1; // 초기값 1로 성정해준 지역코드 number

$("#sido").change(function(){ //sido select값이 변할때마다 function발생
    num = 1;
    code = $(this).val(); //code변수에 id sido의 value를 저장
    loadInfo("html"); // 매개변수 "html" 을 가진 loadInfo() 함수 호출
});

$("#more").click(function(){ //id more버튼을 클릭할때마다 function발생
    num++; //페이지 수가 늘어나야 함으로 1씩 증가
    loadInfo("append"); // "append" 파라미터를 가진 loadInfo()함수 호출
    console.log(num);
});

function loadInfo(act){ // loadInfo()함수 정의
    $.ajax({ //ajax선언
        url:"http://api.visitkorea.or.kr/openapi/service/rest/KorService/areaBasedList?serviceKey=bpA5DgrTFSByQgOsw4GG9R7SRo7EIyZuZ1OJK2K4FydxoTlOzyrBgpsXJliH5RWXUz4UlZDC7oYC%2BUtqmXB87Q%3D%3D",
        data:{
            pageNo:num, //페이지넘버 부분 동적으로 바꿔줘야하므로 변수 num 설정
            numOfRows:9, // 한번에 보여질 데이터 갯수
            MobileApp:"AppTest",
            MobileOS:"ETC",
            arrange:"A",
            contentTypeId:"12",
            areaCode:code, // 지역코드. 사용자가 select한 지역의 코드가 동적으로 들어감
            listYN:"Y"
        },
        dataType:"xml" //데이터타입 xml
    }).done(function(data){
        let el = ""; // element라는 변수를 선언 li태그를 class list 안에 append나 html로 추가해주기위해 선언
        console.log(data); //console로 찍어서 데이터가 잘 들어오는 지 어떤데이터 형식인지 어떻게 불러와야할지 보고 구상
        $.each($(data).find("item"),function(i,v){ // xml 형식은 태그단위 형식이므로 $(data)라고 선언을 해줘야하고 data내부에서 item이라는 태그를찾고 그 갯수만큼 each로 반복
            let title = $(v).find("title").text(); //$(v).find("title") 이라고만 써주면 태그자체가 호출됨. 우리가 호출해야할건 태그의 내용이므로 text()함수 사용
            let img  = $(v).find("firstimage").text(); //find 안에있는 "xxx" 내용은 xml내부 태그명 console로 찍은 데이터를 확인해보면 알 수 있음
            let addr  = $(v).find("addr1").text();
            el += "<li><h3>"+title+"</h3><div class='img_wrap'><img src='"+img+"' alt='#'/></div><p>"+addr+"</p></li>"; //el변수에 누적되서 li태그가 추가되도록함
        });

        // if(act === "html"){
        //     $(".list").html(el);
        // }
        // else{
        //      $(".list").append(el);
        // }
        // 이렇게 써줄수 있지만 다소 비효율적인 방법이므로 아래와 같이 삼항연산자를 사용해서 한줄로 정리

        act === "html" ? $(".list").html(el) : $(".list").append(el); // act(loadinfo함수의 매개변수) 가 "html" 일경우 $(".list").html(el) 실행. 아니라면 $(".list").append(el) 실행
        
       $(".img_wrap img").each(function(){
           if($(this).attr("src").length <= 0) $(this).attr("src","http://placehold.it/300x180");
       });
       $("li h3").each(function(){
           if($(this).text().length >= 19) $(this).css("font-size","0.98em");
           console.log(this);
       })

    }).fail(function(){
        alert("second ajax error");
    })
}

$(document).ready(function(){
    loadInfo("html");
    console.log($(".list li"));
});