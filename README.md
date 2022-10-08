# Ticketing Service by UNIT (ICW. MMC)

> A collaborative project of the team UNIT with club MMC.

- 참여자: 김동주 <<hepheir@gmail.com>>, 박종훈, 이현오, 김법기
- 단체명: 자율동아리 UNIT - (연극영화부동아리 MMC와 콜라보)
- 소속: [보정고등학교](https://bojeong.hs.kr/)
- 기간: 2016-05-25 ~ 2016-08-11

# Summary

이 프로젝트는 "Web 개발 스터디" 및 "디자이너와 개발자간의 협업"을 주제로 모인 4인조 자율동아리 'UNIT'에 의해 기획되어, 동일한 고교내 연극영화부 동아리 'MMC'와의 콜라보를 통해 실제로 서비스 된 바가 있습니다. PHP 언어로 작성된 서버위에 plain text file를 통해 동작하는 데이터베이스, 순수한 HTML/CSS/JS로 개발되어진 이 서비스는 Apache 서버를 이용하여 사용하는데에 최적화 되어 있습니다.

> [제](https://github.com/Hepheir)게 있어 처음으로 기획/디자인/개발 파트로 인원이 모여서 협업해보았던 개발경험입니다. 한 학기동안 진행했던 이 프로젝트는 지금까지도 아주 즐거웠던 경험으로 기억에 남아있습니다. 고등학생 때 작성한 코드임을 감안하고 귀엽게 봐주세요 :)

# Service

## 일반 사용자

사용자는 학번과 이름을 통해 로그인을 할 수 있으며, 원하는 좌석을 선택하여 저장할 수 있습니다.

### 로그인 화면

![](/images/login-page.png)

### 좌석 선택 화면

![](/images/seat-selection.png)


## 관리자

예매 불가석을 지정하거나, 티켓팅이 종료 된 후 예매된 좌석들을 정리하기 위해서는 관리자

### 관리자 페이지 진입

관리자는 로그인 시 이름에 'admin'을 입력하여 제출하면 특수한 암호를 통해 관리자 페이지로 진입을 시도 할 수 있습니다.

![](/images/how-to-open-admin-page.png)

### 관리자 페이지

관리자 페이지에는 4가지 기능이 있습니다.

![](/images/admin-page.png)
![](/images/admin-page_empty.png)


# Read more

- [구동 방법](/docs/installation.md)
- [동아리 구성원 소개](/docs/unit-members.md)
- [사용되지 못한 아쉬운 디자인](/docs/unused-designs.md)
