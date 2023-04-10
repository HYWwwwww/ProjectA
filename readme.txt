
DB 세팅 내역은 다음과 같습니다.
- MySQL DB ID and Password: scs, 1234
- Database Name: scs
- Setting File: db.php
  define("DefaultDBServer","localhost");
  define("MyDBUser","scs");
  define("MyDBPasswd","1234");  
  define("DefaultDBName","scs");


    HYW 홈페이지를 이용하기 전에 반드시 xampp 설치 및 mysql scs 계정을 생성하셔야 합니다.
    깃허브에서 다운받으신 hyw 폴더는 xampp 설치후 C:\xampp\htdocs\hyw에 넣어주셔야 합니다.


    1) MySQL 계정 생성 sql구문은 다음과 같습니다.
           - C:\xampp\mysql\bin>mysql -u root -p
           > create database scs;
           > use scs;
           > create user 'scs'@'localhost' identified by '1234';
           > grant all privileges on *.* to 'scs'@'localhost';
         

    2) 두개의 테이블도 만들어 주셔야 합니다.
        create table wp_member (
                id varchar(20) PRIMARY KEY,
                name varchar(200),
                password varchar(200),
                email varchar(20),
                gender char(1),
                discription varchar(2000),
                );



        create table wp_bbs(
	        idx int AUTO_INCREMENT primary key,
	        bbstype varchar(20),
	        title varchar(1000),
	        contents varchar(2000),
	        id varchar(20),
	        filename varchar(200),
	        writedate varchar(20)
        );

     3) XAMPP 설치 (아파치, mysql 실행하여야함) 및 mysql 계정 생성이 완료되었으면 아래의 url로 접속하시면 됩니다.
        URL: http://127.0.0.1/hyw/index.php
