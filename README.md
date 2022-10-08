# MMC Ticketing Service

> A collaborative project of the team UNIT with club MMC.

- 참여자: 김동주 <<hepheir@gmail.com>>, 박종운<<dfc7936@naver.com>>, 이현오, 김법기
- 단체명: 자율동아리 UNIT - (연극영화부동아리 MMC와 콜라보)
- 소속: [보정고등학교](https://bojeong.hs.kr/)
- 기간: 2016-04-19[^properties-1] ~ 2016-12-18[^properties-2]

[^properties-1]: 정확한 최초 날짜 미상. [페이스북 개시글](https://www.facebook.com/hepheir/posts/pfbid02t7s3kHEhXNUrsEtCtJTZc1p7bm6Ve4nZCSJQeSgQr7RL8aiGDaER2z23if9XSN7sl)을 통해 추정됨.
[^properties-2]: 정확한 날짜 미상. [페이스북 개시글](https://www.facebook.com/hepheir/posts/pfbid02uDRYYEVXqWVW196RYH4SqynBTBAGwhsEYJV8y9BrF5fCMami3LAuHLqhAhzUpAHal)을 통해 추정됨.

# Summary

이 서비스는 *보정고등학교 연극영화부 동아리 MMC*의 연말 **정기공연 티켓 예매를 웹 상**에서도 가능하게 하는 것을 목표로 개발되었습니다.

**Web 개발 스터디** 및 **디자이너와 개발자간의 협업**을 주제로 모인 4인조 자율동아리 *UNIT*에 의해 기획·주도된 이 프로젝트는 학교 선생님들의 아낌없는 지원[^summary-1]과 *MMC*와의 긴밀한 협업[^summary-2]을 통해 실제로 서비스 되어진 바가 있습니다.

[^summary-1]: 교사용 노트북 1대와 학교 서브도메인 https://unit.bojeong.hs.kr/을 제공받아 사용함.
[^summary-2]: 사용자 테스트에 도움을 받았고, 디자인에 대한 다양한 피드백을 받았으며, 홈페이지에 첨부할 영상자료를 제공받음.

오직 Apache와 PHP 프레임워크만을 사용하여 구동되는 이 서비스는, 필요한 데이터 `/data` 디렉토리 아래 평문의 형태로 저장하기에 보안성은 굉장히 취약한 면이 있지만, 굉장히 단순하고 직관적인 구조로 설계되어 있다는 장점이 있습니다.

# 서비스 구성

서버는 **일반 사용자**(학생)과 **관리자**를 구분하여 각자에게 필요한 서비스를 알맞게 제공합니다.

- 일반 사용자:
    - [ ] ~~랜딩 페이지에서 동아리 소개 보기[^service-structure-1]~~
    - [x] 학번/이름을 사용한 로그인하기
    - [x] 예매 가능한 좌석보기
    - [x] 좌석 선택하기
    - [x] 선택한 좌석 예매하기 (저장)
    - [x] 자신이 예매한 좌석보기

- 관리자:
    - [x] 공연 회수 조절
    - [x] 좌석 배치도 조절
    - [x] 예매 불가석 지정[^service-structure-2]
    - [ ] ~~좌석별 예매자 조회[^service-structure-3]~~

[^service-structure-1]: 개발 과정에서 삭제됨.
[^service-structure-2]: 교사용 지정석 혹은 배우들의 지인을 위해 제공되는 좌석 등.
[^service-structure-3]: 시간 부족으로 기능이 구현되지 못하여 서비스 종료 후 예매자를 수동으로 파악하였음.

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

# Acknowledgements

콜라보 작업을 흔쾌히 수락해주시고 디자인에 대한 다양한 의견 및 영상자료를 제공해주신 MMC 부원들께 진심으로 감사드립니다. 또한 이 프로젝트를 묵묵히 지켜봐주시고 아낌없이 지원해주신 선생님들께 진심으로 감사드립니다.

# Read more

- [구동 방법](/docs/installation.md)
- [동아리 구성원 소개](/docs/unit-members.md)
- [사용되지 못한 아쉬운 디자인](/docs/unused-designs.md)
