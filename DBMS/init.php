<?php
$sql = "CREATE DATABASE S_SC_C;
USE S_SC_C;

CREATE TABLE Student (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sclass INT(2) NOT NULL,
    sno INT(2) NOT NULL,
    sname VARCHAR(10) NOT NULL,
    ssex VARCHAR(5) NOT NULL,
    sage INT(2) NOT NULL,
    Sdept VARCHAR(4) NOT NULL
);

CREATE TABLE SC (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sclass INT(2) NOT NULL,
    sno INT(2) NOT NULL,
    cno INT(2) NOT NULL,
    grade INT(3) NOT NULL
);

CREATE TABLE Course (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cno INT(2) NOT NULL,
    cname VARCHAR(20),
    cpno INT(2),
    ccredit INT(1)
);
CREATE TABLE S (
    SNO INT NOT NULL PRIMARY KEY,
    SNAME VARCHAR(20),
    SSEX VARCHAR(5),
    SAGE INT(2),
    SADDR VARCHAR(20)
);
INSERT INTO Student (sclass,sno,sname,ssex,sage,Sdept)
    VALUES (1,1,'李勇','男',20,'IS');
INSERT INTO Student (sclass,sno,sname,ssex,sage,Sdept)
    VALUES (1,2,'刘晨','女',19,'IS');
INSERT INTO Student (sclass,sno,sname,ssex,sage,Sdept)
    VALUES (1,3,'刘朋','男',20,'IS');
INSERT INTO Student (sclass,sno,sname,ssex,sage,Sdept)
    VALUES (2,1,'王敏','女',18,'MA');
INSERT INTO Student (sclass,sno,sname,ssex,sage,Sdept)
    VALUES (2,2,'张锋','男',19,'MA');
INSERT INTO Student (sclass,sno,sname,ssex,sage,Sdept)
    VALUES (2,3,'李敏','男',20,'MA');
INSERT INTO SC (sclass,sno,cno,grade)
    VALUES (1,1,1,92);
INSERT INTO SC (sclass,sno,cno,grade)
    VALUES (1,1,2,85);
INSERT INTO SC (sclass,sno,cno,grade)
    VALUES (1,1,3,88);
INSERT INTO SC (sclass,sno,cno,grade)
    VALUES (1,2,2,90);
INSERT INTO SC (sclass,sno,cno,grade)
    VALUES (1,2,3,80);
INSERT INTO SC (sclass,sno,cno,grade)
    VALUES (2,1,1,75);
INSERT INTO SC (sclass,sno,cno,grade)
    VALUES (2,1,2,92);
INSERT INTO SC (sclass,sno,cno,grade)
    VALUES (2,2,2,87);
INSERT INTO SC (sclass,sno,cno,grade)
    VALUES (2,2,3,89);
INSERT INTO SC (sclass,sno,cno,grade)
    VALUES (2,3,1,90);
INSERT INTO Course (cno,cname,cpno,ccredit)
    VALUES (1,'数据库',5,4);
INSERT INTO Course (cno,cname,cpno,ccredit)
    VALUES (2,'数学',NULL,2);
INSERT INTO Course (cno,cname,cpno,ccredit)
    VALUES (3,'信息系统',1,4);
INSERT INTO Course (cno,cname,cpno,ccredit)
    VALUES (4,'操作系统',6,3);
INSERT INTO Course (cno,cname,cpno,ccredit)
    VALUES (5,'数据结构',7,4);
INSERT INTO Course (cno,cname,cpno,ccredit)
    VALUES (6,'数据处理',NULL,2);
INSERT INTO Course (cno,cname,cpno,ccredit)
    VALUES (7,'PASCAL语言',6,4);
INSERT INTO `s`(`SNO`, `SNAME`, `SSEX`, `SAGE`, `SADDR`)
VALUES (160400513,'唐大春','男',20,'山东威海');
INSERT INTO `s`(`SNO`, `SNAME`, `SSEX`, `SAGE`, `SADDR`)
VALUES (160400577,'高小齐','女',21,'吉林吉林');
INSERT INTO `s`(`SNO`, `SNAME`, `SSEX`, `SAGE`, `SADDR`)
VALUES (160400591,'张小雅','女',21,'吉林长春');
INSERT INTO `s`(`SNO`, `SNAME`, `SSEX`, `SAGE`, `SADDR`)
VALUES (111111111,'弓小康','男',21,'河北邯郸');
INSERT INTO `s`(`SNO`, `SNAME`, `SSEX`, `SAGE`, `SADDR`)
VALUES (222222222,'江小祺','男',20,'山东济南');
INSERT INTO `s`(`SNO`, `SNAME`, `SSEX`, `SAGE`, `SADDR`)
VALUES (333333333,'石小钿','男',20,'四川泸州');
INSERT INTO `s`(`SNO`, `SNAME`, `SSEX`, `SAGE`, `SADDR`)
VALUES (444444444,'唐小春','男',20,'吉林吉林');
";
