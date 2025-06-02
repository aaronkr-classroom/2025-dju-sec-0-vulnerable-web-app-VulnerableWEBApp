# VulnerableWEBApp

학습 목적으로 취약한 웹 애플리케이션 샘플을 코딩했습니다.

다음과 같은 악용 가능한 취약점이 있습니다.

--> SQLI(Select, Update, Insert, Delete)
[로그인 우회 시 SQLI 선택]
[등록 프로세스 시 SQLI 삽입]
[프로필 업데이트 시 SQLI 업데이트, 비밀번호 변경]
[계정 삭제 시 SQLI 삭제]
[비밀번호 분실 시 블라인드 SQLI]

--> 클릭재킹(프레임버스팅 기법, X-프레임 옵션 누락)
[sandbox="allow-forms"를 사용하여 악용 가능한 모든 페이지에서 프레임버스팅 사용]
[모든 페이지에서 X-프레임 옵션 누락]

-->안전하지 않은 직접 객체 참조
[계정 삭제]
[비밀번호 변경]
[비밀번호 재설정]

-->명령어 삽입
[|를 사용하여 명령어 삽입에 취약한 ping 기능] 명령을 연결할 수 있습니다]

-->CSRF
[CSRF 토큰 누락]
[프로필 업데이트 중]

-->XSS
[사용자 입력 인코딩/삭제 없음. 출력도 인코딩/삭제 없이 처리되어 XSS에 취약함]
[등록 중]
[설정 페이지]

-->로컬 파일 포함(LFI):
(TOS 파일 포함 중)

---

# VulnerableWEBApp

Coded a sample vulnerable web application for learning purpose..

It has following vulnerabilities which can be exploited

--> SQLI (Select , Update , Insert, Delete)
[select SQLI in login bypass]
[Insert SQLI in Register process]
[Update SQLI in profile update , changing password]
[Delete SQLI in Deleting account]
[Blind SQLI in forgot password]

--> Clickjacking (Framebursting technique, X-frame options missing)
[Framebursting is used in all the pages which can be exploited using sandbox="allow-forms" ]
[X-frame options missing in all pages]

-->Insecure Direct Object reference
[Account deletion ]
[Password change]
[Password reset]

-->Command Injection
[ping functionality vulnerable to command injection using | we can concatenate commands]

-->CSRF
[ csrf token missing]
[while profile update]

-->XSS
[No user input enconding/sanitizaion . output also without encoding/sanitization which is vulnerable to xss ]
[While registering]
[At setting page]

-->Local File Inclusion (LFI) :
(While including TOS file)
