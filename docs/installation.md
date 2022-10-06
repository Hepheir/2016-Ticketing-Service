# Dev Container 사용 (Visual Studio Code, GitHub Codespace)

## 수정 없이 사용

쉽고 빠른 사용을 위해 본 레포지토리에는 `.devcontainer`를 추가해놓았다.

Dev Container는 [Visual Studio Code](https://code.visualstudio.com/)혹은 그 외의 IDE에서 사용이 가능하다. `.devcontainer`내에 정의된 값으로 컨테이너를 생성하면 자동으로 서비스 구동에 필요한 이미지 및 프로그램들을 설치하여 줄 것이다.

본 프로그램은 PHP와 Apache를 사용한다. Dev Container 준비가 완료되었다면, 다음의 스크립트를 터미널에 입력하여 서비스를 시작하면 된다.

```bash
sudo service apache2 start
```

포트포워딩 설정 혹은 직접 접속을 통해 올바르게 페이지에 접속되는지 확인해보면 된다.

## 소스코드 수정

소스코드를 수정 한 뒤 적용하고 싶다면, 변경된 소스코드를 Apache의 루트 디렉터리로 옮겨줄 필요가 있다. 참고로 Linux Ubuntu 기준 Apache 서비스의 루트 디렉터리는 `/var/www/html` 이다.

변경된 소스코드를 옮긴 뒤 Apache 서비스를 재시작해야한다.

```bash
sudo service apache2 restart
```
