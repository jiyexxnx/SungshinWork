# 11 주차 회고

## 1.새로 배운 점
---

*리팩토링
```
DB접속 이후에 자원 반납을 하는 것. 반납하지 않으면 DB서버가 해당 SQL문의 결과를 계속 저장하고 있어야 하므로 메모리 낭비가 발생한다. 
그래서 Connection, Statement, ResultSet 객체를 사용하고 close()메소드를 호출해서 자원을 반납해준다.
```

```
반납을 모든 메서드 내에서 일일이 반납하면 코드가 반복되어, 
반납하는 코드들을 clossAll () 메소드로 묶는다.

public void clossAll(Connection conn, PreparedStatement psmt, ResultSet rs) {
        try {
          if (rs != null) rs.close();
          if(psmt != null) psmt.close();
          if(conn != null) conn.close();
          System.out.println("\nAll closed");
        }catch(SQLException sqle) {
          System.out.println("\nError!!");
          sqle.printStackTrace();
        }
```

*JDBC -SQL 쿼리 전송 인터페이스
 -자바에서 DB로 쿼리 문을 사용할 때 사용할 수있는 인터페이스
```
SQL 질의 문을 전달하는 역할
사용할 때 반드시 catch 문 또는 throws 처리를해야 함 (statement)
```

*Statement VS PreparedStatement Statement와 비교
```
한번 분석되고나면 재사용가능.
미리 컴파일하고 실행시간 동안에 인수값을 위한 공간을 확보가능.
동적 쿼리를 할 수 있음.
""나 ''같은 기호에 신경 쓸 필요없음.
보안 공격을 방어.

PreparedStatement pstm = conn.prepareStatement(“select * from T wherer a = ?”); 
>> 물음표엔 무엇이 들어갈지 모른다. 그리고 물음표의 개수는 2,3개 되어도 상관없다.
```

## 2. 문제발생 및 고민 해결방법
---

* 같은 내용이 출력
```
코드는 실습과 똑같이 하였고, 테이블만 다르게 해서 실습을 하였다.
그래서 다른부분에서는 특별하게 오류가 일어나지 않았다. 하지만
슬랙에서 다른 수정님이 오류 났던 부분이 나에게도 일어났다.
먼저 하신 수정님 덕분에 오류를 잡을 수 있었다.. 감사합니다 (꾸벅)
```

* 해결 방안
```
> select * from (select rownum, e.* from employees e order by rownum DESC) where rownum = 1;
= 이 첫 번째 코드로 실행 해보았지만 오류를 잡진 못했다. 똑같은 결과가 계속 출력되었다.

> select e.* from ( select a.* from employees a order by a.employee_id desc ) e where rownum = 1
= 이 쿼리로 실행해보았다. 처음에는 안되나싶었는데 세미콜론 안지워서 오류가났었고 다시 해보니까 정상적으로 출력되었다. 
```

## 3. 동작영상
---

https://www.youtube.com/watch?v=3wS8gNdbM-I

## 4. 회고 (+, -, !)
---

(-) 자바를 너무 많이 까먹었다. 거의 백지상태수준이 된것같다... 심각하다.
그리고 이클립스 오류뜨는 모습이 너무 무섭다...
빨간글자로 뜨는게 나에게 압박감을 주는 느낌이 든다.. vscode로 돌아가고싶다...

(+) oracle과 java를 연결해서 무언가를 만들 수 있다는 점이 흥미로웠다. 
자바 공부할 의지가 생겼다. DB쪽으로 공부하고 싶은 생각만 했었지, 
실행은 70%정도? 안했다. 그런데 이번 실습 및 수업을 통해서 
더욱 더 능숙하게 하고싶은 생각이 들었다.
