[새로 배운내용] - php

-php의 변수표시 <$>
- %link = mysqli_connect("","","","")
 접속하기. 
- mysqli_query($link,쿼리) 
 $link변수를 통해 사용할 데이터베이스에 데이터 `추가하기.`
- mysqli_error($link)
 어떤 에러가 있는지 데이터 서버가 알려주는 정보를 php가 출력. 
 (echo는 개발할때만 사용하기. 안그럼 다른 사람들에게 중요한 정보를 내뱉는 꼴이 됨.)
- var_dump($result -> num_rows);
해당 객체의 몇 개의 행이 있냐라는 의미.

- $row = mysqli_fetch_array($result);
php에 사용 할 수있도록 전환해서 가져오게하는 코드. 여기서는 $row 변수를 이용해 $query통해서 select 한 내용을 배열처럼 쓸수있게함.
컬럼의 이름을 가져오는 배열을 연관배열 index를 통해 가져오는 것은 배열이라한다.

- $query = "SELECT * FROM oat WHERE id={$_GET['id']}";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  $article = array(
    'title' => $row['title'],
    'description' => $row['description'] 
  글 목록에 따라 본문이 바뀌도록 처리. article이라는 배열 title과 description은 연관배열 역할.
  본문에서 들어온 id에 따라 본문 내용과 제목이 달라져야하므로 get방식.
  if문으로 코드제어 : index에 아무 id 값도없고 그저 홈화면일 경우, 들어온 id값이 없어 에러발생. 
  따라서 id값이 있을때 해당코드를 실행시켜야함. 또한 article 배열을 해당 if문이 실행이 안되면 정의되지 않은 변수이므로
  article 배열을 welcome database is...와 같이 초기화 해준 뒤 if문 실행이 되면 변수값이 변하도록 설정해야함.

 - '<?='는 <? echo 와 같은 의미.
````
<form action="process_create.php" method="POST">
      <p><input type="text" name="title" placeholder="title"></p>
      <pre><textarea name ="description" placeholder="description"></textarea></pre>
      <p><input type="submit"></p> 
</form> 
````
 html태그로 사용자가 입력한 정보를 받는 역할을 함. form태그가 사용자에게 입력 받으면 action 옆 주소로 이동함.
  그럼 insert문을 사용해서 각 컬럼에 값을 넣어주고 값들은 우리가 사용자로부터post 방식으로 받은 정보들임.[새로 배운내용] - mysql
- cd ..
(디렉토리이동)
- show variables like 'general%'
(일반 로그의 파일명과 일반 로그 활성화 유무를 확인한다.)
- cat 명령어
(두개 이상의 파일을 연결해서 출력할때 사용하는 것이 기본임. 이번엔 파일 내용을 확인)

=> 이 세개는 새로 배운내용이라기보다는 컴퓨터관리시스템에서 배운 내용이었지만 리눅스를 잘 사용하지 않아서
   까먹게 된 명령어들이다. 이번에 다시 사용하게되면서 기억을 회상할 수 있었다.

- USE 테이블명
(생성된 데이터베이스 를 사용하려면 use를 입력해서 사용.)
- ENGINE = InnoDB;
(mysql의 데이터베이스 엔진. mysql의 모든 바이너리에 내장되어있다. 또한 트랜잭션지원.(트랜잭션세이프스토리지엔진이라고한다.)

=> 데이터베이스 수업에서 배운내용일지도 모르지만 이번 2주차 수업때 들을때는 처음 듣는 내용이었다. 

[문제 발생 및 고민한 내용(+해결과정)]
- 오타를 찾지 못하고 계속 실행하는 바람에 데이터베이스에 10개 이상의 컬럼들이 들어가있었음.
어떻게 해야할지 몰라서 delete문을 이용해서 각 칼럼들을 삭제했다. (교수님에게 여쭈어보았지만 아직 답변이 없으셔서...)

- process_create에서 "Notice : Undefined index PHP" post title, post description 두개 부분에서 자꾸 발생했었음.
이 에러때문에 첫번째 문제발생이 일어나 계속 실행했었음. ( 하다가 못찾고 졸려서 잠.)
php.ini를 열어 error_reporting 두번 정도 계속 주면 거기서 엄격한 지우고 고지라고 써 주면 에러 발생은하지 발생 (밑 url참고)

[참고할 만한 내용]
https://m.blog.naver.com/PostView.nhn?blogId=herowind7&logNo=220984369750&proxyReferer=https:%2F%2Fwww.google.com%2F

[회고]
html은 실습하면서 다시 회상 할 수있었다. php는 상당이 낯설었다..
아직 익숙하지 않아서 내용을 이해하기에는 조금 아쉽지만조금씩 실습 하면서 깨닫는걸로 해야겠다. 
mysql은 재밌었다. 데이터베이스설계때 배운 쿼리들이 머릿속에서 퍼즐이 맞춰지는 것이재밌었다. 
그리고 교수님과 같이 실습하다가 과제로 개인이 좋아하는 것을 만들어라! 받았을 때 
이걸 다시 어떻게하지..라는 생각이들었다. 그래도 다시 한번 하면서 어느정도 흐름을 이해할 수 있었다. 
아마 과제를 제출하고 다시한번 회상하면서 복습을 해야겠다.

그리고 대면수업이었으면 하는 바람이 조금 있었다.. 
과제하면서..ㅎ 긴 글을 쓰고싶었는데 이것이 가능할지, 또 html에 있는 pre 태그에대해서질문 하고싶었다. 
문자 그대로 입력되는... 뭔가 그러면 내 개인과제가 조금 더 나았을지도 모르는 ㅎ... 
일단 조금씩 더 하면서 수정해 나가는 걸로 해야겠다.마지막으로 깃허브 어렵다...













