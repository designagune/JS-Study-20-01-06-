# JS-Study-20-01-06-
ES6, Vanilia, Ajax, jQuery, React .. and anything
<hr/>
VSC FTP onload on save setting...
<ul>
  <h2><a href="#">LIST</a></h2>
  <li><a href="#user-content-t1">First - install sftp, remote fs</a></li>
  <li><a href="#user-content-t2">Second - install open folder, search config</a></li>
  <li><a href="#user-content-t3">Third - sftp.json set up</a></li>
  <li><a href="#user-content-t4">Last - +remote->local</a></li>
</ul>
<br/><br/><h2 id="t1">FIRST</h2><br/><br/>

<img src="https://user-images.githubusercontent.com/49800442/73459458-3f1c0380-43ba-11ea-80b2-0a91c6e1c09e.png" width="600px"/>
<img src="https://user-images.githubusercontent.com/49800442/73459585-7a1e3700-43ba-11ea-96ef-75df357db150.png" width="600px"/>

<b>Install "SFTP", after Install "Remote FS" too..</b><br/> sftp와 remote fs 를 설치해준다.

<br/><br/><h2 id="t2">SECOND</h2><br/><br/>

<img src="https://user-images.githubusercontent.com/49800442/73461734-febe8480-43bd-11ea-913a-7996d3805cdc.png" width="600px"/>
<img src="https://user-images.githubusercontent.com/49800442/73461866-39282180-43be-11ea-8285-e2ffd63f98ff.png" width="600px"/>

<b>Open the folder u want to set up! and search "sftp config" after press f1 key.</b><br/>
ftp 설정할 폴더를 열고 f1키를 눌러서 sftp config를 검색하고 선택한다.

<br/><br/><h2 id="t3">THIRD</h2><br/><br/>

<img src="https://user-images.githubusercontent.com/49800442/73462609-70e39900-43bf-11ea-9e85-528aeb823aa5.png" width="600px"/>

<b>Insert domain address to host key's value.<br/>
Protocol is ftp and port number 21 because I'm using the 'dothome' hosting site.<br/>
Username key's value is id. and If you want to uploadOnSave easily, password key and value must be added.
</b><br/>
host 키값에 도메인주소가 들어간다. 이때 http, https등 타 프로토콜을 써주지않도록 주의한다.<br/>
나는 dothome 호스팅 사이트를 사용하고 있기때문에 프로토콜은 ftp, 포트번호는 21번으로 해줬다.<br/>
username 키값에는 id가 들어가게 되고, uploadOnSave 기능을 쉽게 사용하고 싶다면 password라는 키와 value를 지정해주면 된다.

<br/><br/><h2 id="t4">LAST</h2><br/><br/>

<img src="https://user-images.githubusercontent.com/49800442/73464531-72fb2700-43c2-11ea-837c-0b3c24a83160.png" width="600px"/>

Sync local -> Remote 는 로컬에서 서버로 올리는 부분이고 반대로 Sync Remote -> Local은 서버에서 로컬로 받아오는부분이다.

<b>VSC에서 Remote -> Local 은 시간이 다소 걸리는편이고, 간혹 생각한 결과와 다르게 다운받아지는 경우도 있고 저장했는데 올려지지 않은것 처럼 보이는경우가 있다.
이 경우 filezilla 혹은 직접 ftp로 접속하여 상태를 확인후 수정하여 진행하면 수월하다.</b>
